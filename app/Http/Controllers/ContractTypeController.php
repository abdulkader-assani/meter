<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContractType;
use App\Http\Resources\ContractTypeResource;
use Illuminate\Http\Request;

class ContractTypeController extends Controller
{
    public function index(Category $category)
    {
        $contractTypes = $category->contractTypes()->latest()->get();
        return ContractTypeResource::collection($contractTypes);
    }
}
