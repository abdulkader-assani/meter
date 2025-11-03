<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PropertyType;
use App\Http\Resources\PropertyTypeResource;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    public function index(Category $category)
    {
        $propertyTypes = PropertyType::where('category_id', $category->id)
            ->latest()
            ->get();
        return PropertyTypeResource::collection($propertyTypes);
    }
}
