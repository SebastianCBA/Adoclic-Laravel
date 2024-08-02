<?php 
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'category' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'category.required' => 'The category field is required.',
        ];
    }
}