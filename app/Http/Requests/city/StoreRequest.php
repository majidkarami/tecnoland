<?php

namespace App\Http\Requests\city;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|min:2',
            'province_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نام شهر را وارد کنید',
            'province_id.required' => 'نام استان را اننخاب کنید',
        ];
    }
}
