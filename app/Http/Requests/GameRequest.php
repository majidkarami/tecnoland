<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        if ($this->input('slug')) {
            $this->merge(['slug' => make_slug($this->input('slug'))]);
        } else {
            $this->merge(['slug' => make_slug($this->input('title'))]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        if ($this->isMethod('post')) {
            return [
                'title' => 'required',
                'url' => 'required|image|max:1024',
                'slug' => 'required|unique:games',
                'description' => 'required',
                'is_active' => 'required',
            ];
        } else {
            return [
                'title' => 'required',
                'url' => 'image|max:1024',
                'slug' => 'required',
                'description' => 'required',
                'is_active' => 'required',
            ];
        }

    }

    public function attributes()
    {
        return
            [
                'url' => 'تصویر',
                'slug' => 'نام مستعار',
            ];
    }

    public function messages()
    {
        if ($this->isMethod('post')) {
        return [
            'title.required' => 'لطفا عنوان را وارد کنید',
            'title.min' => 'عنوان شما باید بیش از ۱۰ کاراکتر باشد',
            'slug.unique' => 'این نام مستعار قبلا ثبت شده است',
            'slug.required' => 'لطفا نام مستعار را وارد کنید',
            'description.required' => 'لطفا توضیحات را وارد کنید',
            'is_active.required' => 'وضعیت مطلب نامشخص است'
        ];
        } else {
            return [
                'title.required' => 'لطفا عنوان را وارد کنید',
                'title.min' => 'عنوان شما باید بیش از ۱۰ کاراکتر باشد',
                'slug.required' => 'لطفا نام مستعار را وارد کنید',
                'description.required' => 'لطفا توضیحات را وارد کنید',
                'is_active.required' => 'وضعیت مطلب نامشخص است'
            ];
        }

    }
}
