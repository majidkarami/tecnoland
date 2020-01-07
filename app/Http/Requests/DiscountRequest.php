<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
            'code' => 'required',
            'value' => 'required|integer',
            'code_time' => 'required|integer',
        ];
    }

    public function attributes()
    {
        return
            [
                'code' => 'کد تخفیف',
                'value' => 'مقدار تخفیف بر حسب درصد',
                'code_time' => 'مدت زمان تخفیف',
            ];
    }
}
