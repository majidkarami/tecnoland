@extends('technoland.layout.master')
@section('title', __('صفحه عضویت'))

@section('styles')
    <style>
        .captcha_img img {
            width: 50%;
        }
    </style>
@endsection
@section('content')
<main class="main default">
    <div class="container">
        <div class="row">
            <div class="main-content col-12 col-md-7 col-lg-5 mx-auto">
                <div class="account-box">
                    <a href="#" class="logo">
                        <img src="{{asset('/user/img/logo.png')}}" alt="">
                    </a>
                    <div class="account-box-title">ثبت‌نام در {{setting('name')}}</div>
                    <div class="message-light">اگر قبلا با ایمیل ثبت‌نام کرده‌اید، نیاز به
                        ثبت‌نام مجدد با شماره
                        همراه ندارید</div>
                    <div class="account-box-content">
                        <form class="form-account" method="post" action="{{ route('register') }}">
                            @csrf
                            <div class="form-account-title">پست الکترونیک یا شماره موبایل</div>
                            <div class="form-account-row">
                                <label class="input-label"><i class="now-ui-icons users_single-02"></i></label>
                                <input class="input-field" type="text" value="{{ old('username') }}" name="username"
                                       placeholder="پست الکترونیک یا شماره موبایل خود را وارد نمایید">
                                @if($errors->has('username'))
                                    <span class="has-error" style="color: red;font-size: 12px;">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                            <div class="form-account-title">کلمه عبور</div>
                            <div class="form-account-row">
                                <label class="input-label"><i
                                            class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                <input class="input-field" type="password" name="password"
                                       placeholder="کلمه عبور خود را وارد نمایید">
                                @if($errors->has('password'))
                                    <span class="has-error" style="color: red;font-size: 12px;">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="form-account-title">کد امنیتی</div>
                            <div class="form-account-row">
                                    <label  for="captcha" class="input-label">
                                        <i class="now-ui-icons ui-1_lock-circle-open"></i></label>
                                    <input type="text" autocomplete="off" id="captcha" class="input-field" name="captcha" placeholder="کد امنیتی">
                                    @if($errors->has('captcha'))
                                        <span class="has-error" style="color: red;font-size: 12px;">{{ $errors->first('captcha') }}</span>
                                    @endif
                            </div>
                            <div class="form-account-row">
                                <div class="captcha">
                                    <span class="captcha_img">{!! captcha_img('flat') !!}</span>
                                    <a class="btn-reset btn-refresh" style="cursor: pointer;"><i
                                                style="padding-right: 20px;color: #cecece" class="fa fa-lg fa-refresh"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="form-account-agree">
                                <label class="checkbox-form checkbox-primary">
                                    <input type="checkbox" checked="checked" name="term">
                                    <span class="checkbox-check"></span>
                                </label>
                                <label for="agree">
                                    <a href="#" class="btn-link-border">حریم خصوصی</a> و <a href="#"
                                                                                            class="btn-link-border">شرایط و قوانین</a> استفاده از سرویس های سایت
                                    {{setting('name')}} را مطالعه نموده و با کلیه موارد آن موافقم.</label>
                                @if($errors->has('term'))
                                    <span class="has-error" style="color: red;font-size: 12px;">{{ $errors->first('term') }}</span>
                                @endif
                            </div>
                            <div class="form-account-row form-account-submit">
                                <div class="parent-btn">
                                    <button class="dk-btn dk-btn-info">
                                        ثبت نام در {{setting('name')}}
                                        <i class="now-ui-icons users_circle-08"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="account-box-footer">
                        <span>قبلا در {{setting('name')}} ثبت‌نام کرده‌اید؟</span>
                        <a href="{{route('login')}}" class="btn-link-border">وارد شوید</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script type="text/javascript">
    $('.btn-refresh').on('click',function(){
        $.ajax({
            type:'GET',
            url:'/refresh_captcha',
            success:function(data){
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>

@endsection