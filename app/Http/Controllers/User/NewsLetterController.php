<?php

namespace App\Http\Controllers\User;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Email;
use Illuminate\Support\Facades\Session;

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

    public function contact_us(ContactRequest $request)
    {
        $amazing = new Contact($request->all());
        $amazing->saveOrFail();
        Session::flash('success', 'ثبت تماس با موفقیت ایجاد گردید.');
        return redirect()->back();
    }
}
