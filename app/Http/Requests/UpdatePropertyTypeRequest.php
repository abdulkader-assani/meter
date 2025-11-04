<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('propertyType')?->id ?? null;
        return [
            'category_id' => 'sometimes|required|exists:categories,id',
            'slug' => 'sometimes|required|string|max:100|unique:property_types,slug,' . $id,
            'code' => 'sometimes|required|string|max:100',
            'name_ar' => 'sometimes|required|string|max:200',
            'name_en' => 'sometimes|required|string|max:200',
        ];
    }
}
