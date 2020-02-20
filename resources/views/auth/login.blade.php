@extends('technoland.layout.master')
@section('title', __('صفحه ورود'))

@section('content')

<main class="main default">
    <div class="container">
        <div class="row">
            <div class="main-content col-12 col-md-7 col-lg-5 col-xs-12 mx-auto">
                <div class="account-box">
                    <a href="#" class="logo">
                        <img src="{{asset('/user/img/logo.png')}}" alt="">
                    </a>
                    <div class="account-box-title text-right">ورود به {{setting('name')}}</div>
                    <div class="account-box-content">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                <div>{{session('success')}}</div>
                            </div>
                        @endif
                        <form method="post" class="form-account" action="{{ route('login') }}">
                            @csrf
                            <div class="form-account-title">پست الکترونیک  یا شماره موبایل</div>
                            <div class="form-account-row">
                                <label class="input-label"><i class="now-ui-icons users_single-02"></i></label>
                                <input class="input-field" type="text" value="{{ old('username') }}" name="username" placeholder="پست الکترونیک  یا شماره موبایل خود را وارد نمایید">
                                @if($errors->has('username'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                            <div class="form-account-title">رمز عبور
                                <a href="{{ route('password.request')}}" class="btn-link-border form-account-link">رمز
                                    عبور خود را فراموش
                                    کرده ام</a>
                            </div>
                            <div class="form-account-row">
                                <label class="input-label"><i class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                <input class="input-field" type="password" name="password" placeholder="رمز عبور خود را وارد نمایید">
                                @if($errors->has('password'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-account-row form-account-submit">
                                <div class="parent-btn">
                                    <button class="dk-btn dk-btn-info">
                                        ورود به {{setting('name')}}
                                        <i class="fa fa-sign-in"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="form-account-agree">
                                <label class="checkbox-form checkbox-primary">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="agree">
                                    <span class="checkbox-check"></span>
                                </label>
                                <label for="agree">مرا به خاطر داشته باش</label>
                            </div>
                        </form>
                    </div>
                    <div class="account-box-footer">
                        <span>کاربر جدید هستید؟</span>
                        <a href="{{route('register')}}" class="btn-link-border">ثبت&zwnj;نام در
                            {{setting('name')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection

