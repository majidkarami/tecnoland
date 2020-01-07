<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{

//    public function index()
//    {
//        $settings = Setting::paginate(10);
//        return view('admin.settings.index', compact('settings'));
//    }
//
//
//    public function create()
//    {
//        return view('admin.settings.create');
//    }
//
//
//    public function store(Request $request)
//    {
//        $request->validate([
//            'option_name' => 'required|unique:settings',
//            'option_value' => 'required',
//
//        ]);
//
//        $setting = new Setting();
//        $setting->option_name = $request->post('option_name');
//        $setting->option_value = $request->post('option_value');
//
//        $setting->save();
//        Session::flash('success', 'تنظیمات با موفقیت ایجاد شد.');
////        alert()->success('تنظیمات با موفقیت ایجاد شد.', 'موفقیت');
//        return redirect(route('settings.index'));
//    }
//
//
//    public function edit($option_name)
//    {
//        $setting = Setting::where('option_name', $option_name)->first();
//        return view('admin.settings.edit', compact('setting'));
//    }
//
//
//    public function update(Request $request, $option_name)
//    {
//        $request->validate([
//            'option_option_name' => 'required|unique:settings',
//            'option_value' => 'required',
//
//        ]);
//        Setting::where('option_name', $option_name)->update(
//            [
//                'option_name' => $request->post('option_name'),
//                'option_value' => $request->post('option_value')
//            ]
//        );
//        Session::flash('success', 'تنظیمات با موفقیت ویرایش شد.');
////        alert()->success('تنظیمات با موفقیت ویرایش شد.', 'موفقیت');
//        return redirect(route('settings.index'));
//    }
//
//
//    public function destroy($option_name)
//    {
//        Setting::where('option_name', $option_name)->delete();
//        Session::flash('success', 'تنظیمات با موفقیت حذف شد.');
////        alert()->success('تنظیمات با موفقیت حذف شد.', 'موفقیت');
//        return redirect(route('settings.index'));
//    }

    public function pub_setting_form()
    {
        $name = Setting::get_value('name');
        $tel = Setting::get_value('tel');
        $mobile = Setting::get_value('mobile');
        $email = Setting::get_value('email');
        $address = Setting::get_value('address');
        return view('admin.settings.pub_setting', compact('name', 'tel', 'mobile','email', 'address'));
    }

    public function pay_setting_form()
    {
        $TerminalId = Setting::get_value('TerminalId');
        $Username = Setting::get_value('Username');
        $Password = Setting::get_value('Password');
        $MerchantID = Setting::get_value('MerchantID');
        return view('admin.settings.pay_setting', compact('TerminalId', 'Username', 'Password', 'MerchantID'));
    }

    public function pay_setting(Request $request)
    {
        Setting::set_value($request->all());
        Session::flash('success', 'تنظیمات با موفقیت بروز رسانی گردید.');
        return redirect()->back();
    }
}
