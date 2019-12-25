<?php

namespace App\Http\Requests\slider;

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
        if($this->isMethod('post'))
        {
            return [
                'title'=>'required',
//                'url'=>'required|url',
                'img'=>'required|image|max:1024'
            ];
        }
        else
        {
            return [
                'title'=>'required',
//                'url'=>'required|url',
                'img'=>'image|max:1024'
            ];
        }

    }
    public function attributes()
    {
        return
            [
                'title'=>'عنوان اسلایدر',
//                'url'=>'آدرس اسلایدر',
                'img'=>'تصویر اسلاید'
            ];
    }

}
