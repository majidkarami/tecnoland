<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
      'title' => 'required',
      'slug' => Rule::unique('post_categories')->ignore(request()->category),
    ];
  }

  public function messages()
  {
    return [
      'title.required' => 'لطفا عنوان مطلب را وارد کنید',
      'slug.unique' => 'این نام مستعار قبلا ثبت شده است',
    ];
  }
}
