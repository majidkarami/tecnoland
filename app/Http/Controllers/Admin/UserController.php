<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Order;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Session;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('id', 'DESC')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {

        $user=new User($request->all());
        $user->password=bcrypt($request->get('password'));
        $user->remember_token = Str::random(40);
        $user->saveOrFail();
        Session::flash('success', 'کاربر با موفقیت ایجاد گردید.');
        return redirect(route('users.index'));

    }

    public function show($id)
    {
        $user=User::findOrFail($id);
        $order=Order::where(['user_id'=>$id])->orderBy('id','DESC')->get();
        $total_price=Order::where(['user_id'=>$id,'pay_status'=>1])->sum('price');
        return view('admin.users.show', compact('user','order','total_price'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user=User::find($id);
        $user->username=$request->get('username');
        if (trim($request->post('password') != "") and !empty($request->get('password'))) {
            $user->password =  Hash::make($request->input('password'));
        }
        $user->role=$request->get('role');
        $user->active=$request->get('active');
        $user->remember_token = Str::random(40);
        if (!empty($request->get('email'))){
            $user->email=$request->get('email');
        }
        $user->update();

        Session::flash('success', 'کاربر با موفقیت ویرایش گردید.');
        return redirect(route('users.index'));
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        Session::flash('success', 'کاربر با موفقیت حذف گردید.');
        return redirect(route('users.index'));
    }
}
