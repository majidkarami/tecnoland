<?php

namespace App\Http\Controllers\Auth;

use App\Category;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $cat=Category::where('parent_id',0)->get();
        View::share('category',$cat);
    }
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ], [], [
            'email' => 'ایمیل',
            'password' => 'رمز عبور',
            'password_confirmation' => 'تایید رمز عبور',
        ]);

        if ($validator) {
            $data = $request->all();
            $user = User::where('email', $data['email'])->get();
//            $user[0]->username = $request->get('email');
            if (!empty($request->get('password'))) {
                $user[0]->password = bcrypt($request->get('password'));
            }
            $user[0]->remember_token = $request->get('token');
            $user[0]->email = $request->get('email');
            $user[0]->update();
            Session::flash('success', 'تغییر کلمه عبور با موفقیت انجام شد.');
            return redirect('/login');
        }else{
            return redirect()->back();
        }
    }

}
