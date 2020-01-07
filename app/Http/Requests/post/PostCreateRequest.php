<?php

namespace App\Http\Requests\post;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
    protected function prepareForValidation()
    {
      if($this->input('slug')){
        $this->merge(['slug' => make_slug($this->input('slug'))]);
      }else{
        $this->merge(['slug' => make_slug($this->input('title'))]);
      }
    }
    public function rules()
    {
        return [
          'title' => 'required|min:10',
          'slug' => 'unique:posts',
          'description' => 'required',
          'first_photo' => 'required',
          'category' => 'required',
          'active' => 'required',
        ];
    }

    public function messages()
    {
      return [
        'title.required' => 'لطفا عنوان مطلب را وارد کنید',
        'title.min' => 'عنوان مطلب شما باید بیش از ۱۰ کاراکتر باشد',
        'slug.unique' => 'این نام مستعار قبلا ثبت شده است',
        'description.required' => 'لطفا توضیحات مطلب را وارد کنید',
        'first_photo.required' => 'لطفا تصویر اصلی مطلب را مشخص کنید',
        'category.required' => 'لطفا دسته بندی این مطلب را انتخاب کنید',
        'status.required' => 'وضعیت مطلب نامشخص است'
      ];
    }
}
