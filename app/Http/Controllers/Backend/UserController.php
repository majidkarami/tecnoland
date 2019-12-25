<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\user\StoreRequest;
use App\Http\Requests\user\UpdateRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Str;
use Session;

class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(20);
        return view('admin.users.index', compact('users'));
    }


    public function create()
    {
        return view('admin.users.create');
    }

    public function show($id)
    {
        $user=User::findOrFail($id);
        return view('admin.users.show',compact('user'));
    }


    public function store(StoreRequest $request)
    {
        $user = new User();
        $user->name = $request->post('name');
        $user->last_name = $request->post('last_name');
        $user->national_code = $request->post('national_code');
        $user->birthday = $request->post('birthday');
        $user->gender = $request->post('gender');
        $user->bank_number = $request->post('bank_number');
        $user->email = $request->post('email');
        $user->phone = $request->post('phone');
        $user->password = bcrypt($request->post('password'));
        $user->remember_token = Str::random(40);
        $user->save();
//        alert()->success('کاربر با موفقیت اضافه شد.', 'موفقیت');
        return redirect(route('users.index'));

    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->post('name');
        $user->last_name = $request->post('last_name');
        $user->national_code = $request->post('national_code');
        $user->birthday = $request->post('birthday');
        $user->gender = $request->post('gender');
        $user->bank_number = $request->post('bank_number');
        $user->email = $request->post('email');
        $user->phone = $request->post('phone');
        $user->remember_token = Str::random(40);
        if (trim($request->post('password') != "")) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->update();
//        alert()->success('کاربر با موفقیت ویرایش شد.', 'موفقیت');
        return redirect(route('users.index'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
//        alert()->success('کاربر با موفقیت حذف شد.', 'موفقیت');
        return redirect(route('users.index'));
    }
}
