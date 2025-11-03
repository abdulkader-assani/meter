<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'sometimes|required|exists:categories,id',
            'property_type_id' => 'sometimes|required|exists:property_types,id',
            'contract_type_id' => 'sometimes|required|exists:contract_types,id',
            'price' => 'sometimes|required|numeric|min:0',
            'owner' => 'sometimes|required|string|max:100',
            'offerer' => 'sometimes|required|string|max:200',
            'lat' => 'sometimes|required|numeric',
            'lng' => 'sometimes|required|numeric',
            'location' => 'sometimes|required|string|max:255',
            'features' => 'sometimes|array',
            'features.*' => 'exists:features,id',
        ];
    }
}
