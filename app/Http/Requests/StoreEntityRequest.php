<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntityRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'api' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'link' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ];
    }
    
    public function messages(): array
    {
        return [
            'link.required' => 'The link field is required.',
            'link.string' => 'The link must be a string.',
            'link.max' => 'The link may not be greater than :max characters.',
            'category_id.required' => 'The category field is required.',
            'category_id.exists' => 'The selected category does not exist.',
        ];
    }    
}
