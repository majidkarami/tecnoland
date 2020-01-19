<?php

namespace App\Http\Controllers\Admin;

use App\Email;
use App\Http\Controllers\Controller;
use App\Mail\SendNewsMailUser;
use App\NewsLetter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class NewsLetterController extends Controller
{

    public function index()
    {
        $objects = NewsLetter::paginate(10);

        return view('admin.newsletter.index', compact('objects'));
    }

    public function create()
    {
        return view('admin.newsletter.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        $newNewsletter = new NewsLetter();
        $newNewsletter->fill($request->only($newNewsletter->getFillable()));
        $newNewsletter->save();

        /* send email news letter*/
        if ($request->check_mail == 'managers') {
            $users_emails = User::where('role', 'admin')->pluck('email')->toArray();
            $news_emails = Email::pluck('email')->toArray();
            $news_users = array_filter(array_unique(array_merge($users_emails, $news_emails)));

            if (filter_var_array($news_users, FILTER_VALIDATE_EMAIL)) {
                foreach ($news_users as $user) {
                    Mail::to($user)->send(new SendNewsMailUser($newNewsletter));
                    sleep(5);
                }

            }

            $newNewsletter->done = 1;
            $newNewsletter->saveOrFail();
        }
        if ($request->check_mail == 'verified') {
            $users_emails = User::where('active', 1)->pluck('email')->toArray();
            $news_emails = Email::pluck('email')->toArray();
            $news_users = array_filter(array_unique(array_merge($users_emails, $news_emails)));
            if (filter_var_array($news_users, FILTER_VALIDATE_EMAIL)) {
                foreach ($news_users as $user) {
                    Mail::to($user)->send(new SendNewsMailUser($newNewsletter));
                    sleep(5);
                }
            }

            $newNewsletter->done = 1;
            $newNewsletter->saveOrFail();
        }
        if ($request->check_mail == 'unverified') {
            $users_emails = User::where('active', 0)->pluck('email')->toArray();
            $news_emails = Email::pluck('email')->toArray();
            $news_users = array_filter(array_unique(array_merge($users_emails, $news_emails)));
            if (filter_var_array($news_users, FILTER_VALIDATE_EMAIL)) {
                foreach ($news_users as $user) {
                    Mail::to($user)->send(new SendNewsMailUser($newNewsletter));
                    sleep(5);
                }
            }

            $newNewsletter->done = 1;
            $newNewsletter->saveOrFail();
        }
        if ($request->check_mail == 'special') {
            $user_email = User::where('email', $request->get('email'))->pluck('email')->toArray();
            if (empty($user_email)) {
                return redirect()->back()->withErrors(['کاربر ایمیل وارد شده وجود ندارد']);
            } else {
                foreach ($user_email as $user) {
                    Mail::to($user)->send(new SendNewsMailUser($newNewsletter));
                }
            }

            $newNewsletter->done = 1;
            $newNewsletter->saveOrFail();
        }

        Session::flash('success', 'خبر با موفقیت ایجاد و برای گیرنده مورد نظر ارسال گردید.');
        return redirect(route('admin.newsletter.index'));

    }

    public function destroy($id)
    {
        $newsletter = Newsletter::findOrFail($id);
        $newsletter->delete();
        Session::flash('success', 'خبرنامه با موفقیت حذف گردید.');
        return redirect()->back();
    }

    public function create_phone()
    {
        return view('admin.newsletter.create-phone');
    }

    public function store_phone(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
        ]);

        $newNewsletter = new Newsletter;

        $newNewsletter->fill($request->only($newNewsletter->getFillable()));

        $newNewsletter->save();

        /* send sms */
        if ($request->check_phone == 'managers') {
            $users = User::where('admin', 1)->pluck('phone')->toArray();
            $users_phone = array_filter(array_unique($users));
            sms_wrapper('newsletter', $users_phone, ['content' => $newNewsletter->content, 'sign' => sms_sign()]);
            // Sms::send($users_phone, $newNewsletter->content);

            $newNewsletter->done = 1;
            $newNewsletter->saveOrFail();

        }
        if ($request->check_phone == 'verified') {
            $verification = \App\Verification::where('identity_status', '!=', ' ')->where('identity_status', 'verified')->pluck('user_id')->toArray();
            $users_phones = User::find($verification)->pluck('phone')->toArray();
            $news_phone = array_filter(array_unique($users_phones));
            sms_wrapper('newsletter', $news_phone, ['content' => $newNewsletter->content, 'sign' => sms_sign()]);
            // Sms::send($news_phone, $newNewsletter->content);

            $newNewsletter->done = 1;
            $newNewsletter->saveOrFail();
        }
        if ($request->check_phone == 'unverified') {
            $verification = \App\Verification::where('identity_status', '!=', ' ')->where('identity_status', 'unverified')->pluck('user_id')->toArray();
            $users_phones = User::find($verification)->pluck('phone')->toArray();
            $news_phone = array_filter(array_unique($users_phones));
            sms_wrapper('newsletter', $news_phone, ['content' => $newNewsletter->content, 'sign' => sms_sign()]);
            // Sms::send($news_phone, $newNewsletter->content);

            $newNewsletter->done = 1;
            $newNewsletter->saveOrFail();

        }
        if ($request->check_phone == 'special') {
            $users_phones = User::where('phone', $request->get('phone'))->pluck('phone')->toArray();
            if (!$users_phones) {
                return redirect()->back()->withErrors(['شماره موبایل وارد شده صحیح نمی‌باشد']);
            }
            $news_phone = array_filter(array_unique($users_phones));
            sms_wrapper('newsletter', $news_phone, ['content' => $newNewsletter->content, 'sign' => sms_sign()]);
            // Sms::send($news_phone, $newNewsletter->content);

            $newNewsletter->done = 1;
            $newNewsletter->saveOrFail();
        }

        Session::flash('success', true);

        return redirect()->back();

    }


}
