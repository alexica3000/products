<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'           => 'required|min:3|max:100',
            'description'     => 'required|min:3|max:150',
            'price'           => 'required|numeric',
            'categories_id'   => 'required|array',
            'categories_id.*' => 'integer|exists:categories,id'
        ];
    }

    public function messages()
    {
        return [
            'categories_id.*.integer' => 'The selected categories is invalid.',
            'categories_id.*.exists'  => 'The selected categories does not exists.'
        ];
    }
}
