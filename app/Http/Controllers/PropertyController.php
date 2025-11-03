<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContractType;
use App\Models\PropertyType;
use App\Models\Property;
use App\Http\Resources\PropertyResource;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    // Public filtering endpoint
    public function index(Category $category, ContractType $contractType, PropertyType $propertyType)
    {
        $properties = Property::where('category_id', $category->id)
            ->where('contract_type_id', $contractType->id)
            ->where('property_type_id', $propertyType->id)
            // ->with(['user', 'category', 'propertyType', 'contractType', 'features', 'propertyAttributeValues.attribute'])
            ->latest()
            ->paginate(15);

        return PropertyResource::collection($properties);
    }

    // Public show endpoint
    public function show($id)
    {
        $property = Property::with(['user', 'category', 'propertyType', 'contractType', 'features', 'propertyAttributeValues.attribute'])
            ->find($id);
        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }
        return new PropertyResource($property);
    }

    // User's properties - list all ads
    public function myProperties(Request $request)
    {
        $user = $request->user();
        $properties = Property::where('user_id', $user->id)
            ->with(['category', 'propertyType', 'contractType', 'features'])
            ->latest()
            ->paginate(15);

        return PropertyResource::collection($properties);
    }

    // User's properties - create new ad
    public function store(StorePropertyRequest $request)
    {
        $user = $request->user();
        $data = $request->validated();
        $data['user_id'] = $user->id; // Ensure user_id is set to authenticated user
        $features = $data['features'] ?? [];
        unset($data['features']);

        $property = Property::create($data);

        if (!empty($features)) {
            $property->features()->attach($features);
        }

        return new PropertyResource($property->load(['category', 'propertyType', 'contractType', 'features']));
    }

    // User's properties - update ad
    public function update(UpdatePropertyRequest $request, $id)
    {
        $user = $request->user();
        $property = Property::where('user_id', $user->id)->find($id);

        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        $data = $request->validated();
        // Prevent user from changing user_id
        unset($data['user_id']);
        $features = $data['features'] ?? null;
        unset($data['features']);

        $property->update($data);

        if ($features !== null) {
            $property->features()->sync($features);
        }

        return new PropertyResource($property->load(['category', 'propertyType', 'contractType', 'features']));
    }

    // User's properties - delete ad
    public function destroy(Request $request, $id)
    {
        $user = $request->user();
        $property = Property::where('user_id', $user->id)->find($id);

        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        $property->delete();
        return response()->json(['message' => 'Property deleted successfully']);
    }

    // Favorites - list all favorite ads
    public function favorites(Request $request)
    {
        $user = $request->user();
        $favorites = $user->favoriteProperties()
            ->with(['category', 'propertyType', 'contractType', 'features', 'user'])
            ->latest()
            ->paginate(15);

        return PropertyResource::collection($favorites);
    }

    // Favorites - add property to favorites
    public function addToFavorites(Request $request, $id)
    {
        $user = $request->user();
        $property = Property::find($id);

        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        if ($user->favoriteProperties()->where('property_id', $id)->exists()) {
            return response()->json(['message' => 'Property already in favorites'], 422);
        }

        $user->favoriteProperties()->attach($id);

        return response()->json(['message' => 'Property added to favorites'], 200);
    }

    // Favorites - remove property from favorites
    public function removeFromFavorites(Request $request, $id)
    {
        $user = $request->user();
        $property = Property::find($id);

        if (!$property) {
            return response()->json(['message' => 'Property not found'], 404);
        }

        if (!$user->favoriteProperties()->where('property_id', $id)->exists()) {
            return response()->json(['message' => 'Property is not in favorites'], 422);
        }

        $user->favoriteProperties()->detach($id);

        return response()->json(['message' => 'Property removed from favorites'], 200);
    }

    
}
