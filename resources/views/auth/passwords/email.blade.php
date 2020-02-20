@extends('technoland.layout.master')
@section('title', __('یادآوری کلمه عبور'))

@section('content')
    <main class="main default">
        <div class="container">
            <div class="row">
                <div class="main-content col-12 col-md-7 col-lg-5 mx-auto">
                    <div class="account-box" style="width: 500px;">
                        <a href="#" class="logo">
                            <img src="{{asset('/user/img/logo.png')}}" alt="">
                        </a>
                        <div class="account-box-title">یادآوری کلمه عبور</div>
                        <div class="account-box-content">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <div class="alert alert-danger">
                                            <p> کاربر گرامی : اگر با پیغام ایمیل آدرس یافت نشد مواجه شدید با اکانت ایمیل ثبت نام نکرده اید لطفا دوباره ثبت نام کنید</p>
                                        </div>
                             </span>
                                @endif
                            <form class="form-account" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-account-title">پست الکترونیک </div>
                                <div class="form-account-row">
                                    <label class="input-label"><i
                                                class="now-ui-icons ui-1_email-85"></i></label>
                                    <input id="email" type="email" class="input-field" name="email" value="{{ old('email') }}"  placeholder="پست الکترونیک  خود را وارد نمایید">
                                    @if($errors->has('email'))
                                        <span style="color:red;font-size:13px">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-account-row form-account-submit">
                                    <div class="parent-btn">
                                        <button class="dk-btn dk-btn-info">
                                            ارسال رمز عبور
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
