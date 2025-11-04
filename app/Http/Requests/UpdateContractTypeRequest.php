<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContractTypeRequest extends FormRequest
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
        $id = $this->route('contractType')?->id ?? null;
        return [
            'code' => 'sometimes|required|string|max:100|unique:contract_types,code,' . $id,
            'slug' => 'sometimes|required|string|max:100|unique:contract_types,slug,' . $id,
            'name_ar' => 'sometimes|required|string|max:100',
            'name_en' => 'sometimes|required|string|max:100',
        ];
    }
}
