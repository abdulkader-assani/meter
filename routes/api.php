<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContractTypeController;
use App\Http\Controllers\PropertyTypeController;
use App\Http\Controllers\PropertyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// -------------------------------------------------------------
// Public authentication endpoints (no auth required)
// -------------------------------------------------------------
Route::post('/register', [AuthController::class, 'register']);
Route::post('/send-code', [AuthController::class, 'sendCode']);
Route::post('/verify-code', [AuthController::class, 'login']); // alias for passwordless login

// -------------------------------------------------------------
// Optional alias for legacy clients
// -------------------------------------------------------------
Route::post('/login', [AuthController::class, 'login']);

// -------------------------------------------------------------
// Protected endpoints (require Sanctum token)
// -------------------------------------------------------------
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // -------------------------------------------------------------
    // Homepage endpoints
    // -------------------------------------------------------------
    Route::get('/', [PropertyController::class, 'index']);

    // -------------------------------------------------------------
    // Filtering endpoints
    // -------------------------------------------------------------
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{category:name_en}', [ContractTypeController::class, 'index']);
    Route::get('/categories/{category:name_en}/{contractType:name_en}', [PropertyTypeController::class, 'index']);
    Route::get(
        '/categories/{category:name_en}/{contractType:name_en}/{propertyType:name_en}',
        [PropertyController::class, 'index']
    );
    Route::get('/properties/{id}', [PropertyController::class, 'show']);

    // -------------------------------------------------------------
    // Navbar endpoints
    // -------------------------------------------------------------
    Route::post('/properties', [PropertyController::class, 'store']); // Create new ad
    // Route::get('/search', [PropertyController::class, 'search']);
    // Route::get('/sitting-rooms', [PropertyController::class, 'sittingRooms']);
    Route::get('/favorites', [PropertyController::class, 'favorites']);


    // -------------------------------------------------------------
    // User's properties management (my ads)
    // -------------------------------------------------------------
    Route::prefix('my-properties')->group(function () {
        Route::get('/', [PropertyController::class, 'myProperties']);
        Route::put('/{id}', [PropertyController::class, 'update']);
        Route::delete('/{id}', [PropertyController::class, 'destroy']);
    });

    // -------------------------------------------------------------
    // Favorites management
    // -------------------------------------------------------------
    Route::prefix('favorites')->group(function () {
        Route::post('/{id}', [PropertyController::class, 'addToFavorites']);
        Route::delete('/{id}', [PropertyController::class, 'removeFromFavorites']);
    });

    // -------------------------------------------------------------
    // Logout
    // -------------------------------------------------------------
    Route::post('/logout', [AuthController::class, 'logout']);
});
