@extends('technoland.layout.master')
@section('title', __(' تغییر کلمه عبور'))

@section('content')

    <main class="main default">
        <div class="container">
            <div class="row">
                <div class="main-content col-12 col-md-7 col-lg-5 mx-auto">
                    <div class="account-box" style="width: 500px;">
                        <a href="#" class="logo">
                            <img src="{{asset('/user/img/logo.png')}}" alt="">
                        </a>
                        <div class="account-box-title">تغییر رمز عبور</div>
                        <div class="account-box-content">
                            <form class="form-account" method="POST" action="{{ route('password.request') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-account-title"> پست الکترونیک </div>
                                <div class="form-account-row">
                                    <label class="input-label"><i
                                                class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                    <input type="email" class="input-field" name="email" value="{{ old('email') }}" placeholder="پست الکترونیک خود را وارد نمایید">
                                    @if($errors->has('email'))
                                        <span style="color:red;font-size:13px">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-account-title">رمز عبور جدید</div>
                                <div class="form-account-row">
                                    <label class="input-label"><i
                                                class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                    <input class="input-field" type="password"  name="password"
                                           placeholder="رمز عبور جدید خود را وارد نمایید">
                                    @if($errors->has('password'))
                                        <span style="color:red;font-size:13px">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-account-title">تکرار رمز عبور جدید</div>
                                <div class="form-account-row">
                                    <label class="input-label"><i
                                                class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                    <input class="input-field" type="password" name="password_confirmation"
                                           placeholder="رمز عبور جدید خود را مجددا وارد نمایید">
                                    @if($errors->has('password_confirmation'))
                                        <span style="color:red;font-size:13px">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>
                                <div class="form-account-row form-account-submit">
                                    <div class="parent-btn">
                                        <button class="dk-btn dk-btn-info">
                                            تغییر رمز عبور
                                            <i class="now-ui-icons arrows-1_refresh-69"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
