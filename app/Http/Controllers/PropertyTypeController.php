<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PropertyType;
use App\Http\Resources\PropertyTypeResource;
use Illuminate\Http\Request;
use App\Http\Requests\StorePropertyTypeRequest;
use App\Http\Requests\UpdatePropertyTypeRequest;

class PropertyTypeController extends Controller
{
    public function index(Category $category)
    {
        $propertyTypes = PropertyType::where('category_id', $category->id)
            ->latest()
            ->get();
        return PropertyTypeResource::collection($propertyTypes);
    }

    public function store(StorePropertyTypeRequest $request)
    {
        $pt = PropertyType::create($request->validated());
        return new PropertyTypeResource($pt);
    }

    public function update(UpdatePropertyTypeRequest $request, PropertyType $propertyType)
    {
        $propertyType->update($request->validated());
        return new PropertyTypeResource($propertyType);
    }

    public function destroy(PropertyType $propertyType)
    {
        $propertyType->delete();
        return response()->noContent();
    }
}
