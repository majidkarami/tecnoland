<?php

namespace App\Http\Controllers\Backend;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{

    public function index()
    {
        $settings = Setting::paginate(10);
        return view('admin.settings.index', compact('settings'));
    }


    public function create()
    {
        return view('admin.settings.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:settings',
            'value' => 'required',

        ]);

        $setting = new Setting();
        $setting->name = $request->post('name');
        $setting->value = $request->post('value');

        $setting->save();
//        alert()->success('تنظیمات با موفقیت ایجاد شد.', 'موفقیت');
        return redirect(route('settings.index'));
    }


    public function edit($name)
    {
        $setting = Setting::where('name', $name)->first();
        return view('admin.settings.edit', compact('setting'));
    }


    public function update(Request $request, $name)
    {
        $request->validate([
            'name' => 'required|unique:settings',
            'value' => 'required',

        ]);
        Setting::where('name', $name)->update(
            [
                'name' => $request->post('name'),
                'value' => $request->post('value')
            ]
        );
//        alert()->success('تنظیمات با موفقیت ویرایش شد.', 'موفقیت');
        return redirect(route('settings.index'));
    }


    public function destroy($name)
    {
        Setting::where('name', $name)->delete();
//        alert()->success('تنظیمات با موفقیت حذف شد.', 'موفقیت');
        return redirect(route('settings.index'));
    }
}
