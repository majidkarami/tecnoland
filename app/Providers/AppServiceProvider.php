<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        /* check username for email and mobile*/
        Validator::extend('check_username', function ($attr, $value, $params) {
            if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                return true;
            } else {
                $len = strlen($value);
                if ($len == 10) {
                    if (substr($value, 0, 1) == '9') {
                        return true;
                    } else {
                        return false;
                    }
                } elseif ($len == 11) {
                    if (substr($value, 0, 2) == '09') {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            }
        });
        /* check username unique*/
        Validator::extend('unique_username', function ($attr, $value, $params) {
            $user = DB::table('users')->where('username', $value)->first();
            if ($user) {
                return false;
            } else {
                return true;
            }
        });

    }
}
