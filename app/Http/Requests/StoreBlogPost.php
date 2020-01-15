<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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

        'brand_name' => 'required|unique:brand|max:255',
        'brand_url' => 'required',
        //'body' => 'required',

        ];
    }
    public function messages(){
        return [
            'title.required' => 'A title is required',
            'body.required'  => 'A message is required',
            ]; }

手
}
