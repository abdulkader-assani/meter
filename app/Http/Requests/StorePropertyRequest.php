<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'slug' => 'nullable|string|max:255|unique:properties,slug',
            'property_type_id' => 'required|exists:property_types,id',
            'contract_type_id' => 'required|exists:contract_types,id',
            'price' => 'required|numeric|min:0',
            'owner' => 'required|string|max:100',
            'offerer' => 'required|string|max:200',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'location' => 'required|string|max:255',
            'features' => 'sometimes|array',
            'features.*' => 'exists:features,id',
        ];
    }
}
