<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ContractType;
use App\Http\Resources\ContractTypeResource;
use Illuminate\Http\Request;
use App\Http\Requests\StoreContractTypeRequest;
use App\Http\Requests\UpdateContractTypeRequest;

class ContractTypeController extends Controller
{
    public function index(Category $category)
    {
        $contractTypes = $category->contractTypes()->latest()->get();
        return ContractTypeResource::collection($contractTypes);
    }

    public function store(StoreContractTypeRequest $request)
    {
        $ct = ContractType::create($request->validated());
        return new ContractTypeResource($ct);
    }

    public function update(UpdateContractTypeRequest $request, ContractType $contractType)
    {
        $contractType->update($request->validated());
        return new ContractTypeResource($contractType);
    }

    public function destroy(ContractType $contractType)
    {
        $contractType->delete();
        return response()->noContent();
    }
}
