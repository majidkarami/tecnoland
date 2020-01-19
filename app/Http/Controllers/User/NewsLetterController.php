<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Email;

class NewsLetterController extends Controller
{
    public function email_register(Request $request)
    {
        $data = [];
        $token = $request->post('_token');
        if ($email = $request->post('email')) {
            if (Email::where('email', $email)->exists()) {
                $data['status'] = 'err';
                $data['message'] = 'این ایمیل قبلا ثبت شده است.';
            } else {
                $newEmail = new Email();
                $newEmail->email = $email;
                $newEmail->token = $token;
                $newEmail->save();
                $data['status'] = 'ok';
                $data['message'] = 'ثبت نام با موفقیت انجام شد.';
            }

        } else {
            $data['status'] = 'err';
            $data['message'] = 'خطا رخ داد. مجدد تلاش کنید.';
        }

        return $data;
    }
}
