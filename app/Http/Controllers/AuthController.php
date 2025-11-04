<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SendCodeRequest;
use App\Http\Requests\VerifyCodeRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function sendCode(SendCodeRequest $request)
    {
        $phone = $request->validated()['phone'];

        $user = User::where('phone', $phone)->firstOrFail();
        
        if ($user->verification_code) {
            return response()->json(['message' => 'Verification code already sent.'], 400);
        } else {
            $code = '123456';
            // $code = str_pad((string)random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            VerificationCode::create([
                'user_id' => $user->id,
                'phone' => $phone,
                'code' => $code,
                'expires_at' => now()->addMinutes(10),
            ]);
        }

        // TODO: integrate SMS provider here to actually send $code to $phone
        return response()->json(['message' => 'Verification code sent.', 'debug_code' => $code]);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::updateOrCreate(['phone' => $data['phone']], $data);
        // Immediately send code after registration
        $requestSend = new SendCodeRequest();
        $requestSend->merge(['phone' => $user->phone]);
        // bypass FormRequest pipeline here; directly generate code as above
        // $code = str_pad((string)random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $code = '123456';
        VerificationCode::create([
            'user_id' => $user->id,
            'phone' => $user->phone,
            'code' => $code,
            'expires_at' => now()->addMinutes(10),
        ]);
        return response()->json(['user' => new UserResource($user), 'message' => 'Registered. Verification code sent.', 'debug_code' => $code], 201);
    }

    public function login(VerifyCodeRequest $request)
    {
        $payload = $request->validated();
        $record = VerificationCode::where('phone', $payload['phone'])
            ->where('code', $payload['code'])
            ->whereNull('used_at')
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        if (!$record) {
            return response()->json(['message' => 'Invalid or expired code.'], 422);
        }

        $user = User::where('phone', $payload['phone'])->firstOrFail();
        $record->update(['used_at' => now()]);

        $response = ['user' => new UserResource($user)];
        if (method_exists($user, 'createToken')) {
            $token = $user->createToken('main')->plainTextToken;
            $response['token'] = $token;
        }
        Auth::login($user);
        return response()->json($response, 200);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        // Revoke current API token if Sanctum is installed and a token is present
        if ($user && method_exists($user, 'currentAccessToken')) {
            $token = $user->currentAccessToken();
            if ($token) {
                $token->delete();
            }
        }

        // If this is a session (web) request, logout via the web guard
        if (method_exists($request, 'hasSession') && $request->hasSession()) {
            \Illuminate\Support\Facades\Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return response()->json(['message' => 'Logged out successfully']);
    }
}
