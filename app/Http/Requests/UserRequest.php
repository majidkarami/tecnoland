<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $array = [
            'username' => 'required|unique:users,username,' . $this->user . '',
            'email' => 'unique:users|max:255',
        ];
        if ($this->isMethod('POST')) {
            $array['password'] = 'required|string|min:6';
        }
        return $array;
    }

    public function attributes()
    {
        return [
            'username' => 'نام کاربری',
            'password' => 'کلمه عبور',
            'email' => 'ایمیل'
        ];
    }
}
