<?php

use App\Setting;

if (!function_exists('setting')) {
    function setting($option_name, $default = null)
    {
        try {
            $setting = Setting::where('option_name', $option_name)->first();
            if ($setting) {
                return $setting->option_value;
            }
        } catch (\Exception $e) {

        }

        return $default;
    }
}

if(!function_exists('num2en')){
    function num2en($string) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];

        $num = range(0, 9);
        $convertedPersianNums = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);

        return $englishNumbersOnly;
    }
}

function number2farsi($srting)
{
    $en_num = array("0","1","2","3","4","5","6","7","8","9");
    $fa_num = array("۰","۱","۲","۳","۴","۵","۶","۷","۸","۹");
    return str_replace($en_num, $fa_num, $srting);
}

if(! function_exists('hasPermission')){
    function hasPermission($permissionName, $user = null) {

        if(auth()->guest() && $user == null){
            return false;
        }

        if($user == null && auth()->check()){
            $user = auth()->user();
        }

        if($user == null){
            return false;
        }

        if($user->role == 'admin'){
            return true;
        }

        if($user->role != 'user'){
            return false;
        }

        return \App\User::where('id', $user->id)->whereHas('permissions', function($q) use ($permissionName){
            $q->where('code', $permissionName);
        })->exists();


    }
}


