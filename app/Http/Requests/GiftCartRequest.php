<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidDate;

class GiftCartRequest extends FormRequest
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
            'value' => 'required|integer',
            'user_id' => 'required|integer',
            'code_time' => ['required', new ValidDate()]
        ];
    }

    public function attributes()
    {
        return
            [
                'value' => 'مقدار کارت هدیه',
                'user_id' => 'شناسه کاربر',
                'code_time' => 'مدت زمان کارت هدیه',
            ];
    }
}
