<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ورود به بخش مدیریت</title>
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('/admin/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/bootstrap/css/bootstrap-rtl.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/dist/css/AdminLTE.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/plugins/iCheck/all.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/fonts-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/admin/css/admin.css') }}">
    <style>
        img {
            width: 50%;
        }
    </style>
</head>
<body>

<div class="login_box">

    <div class="header_login">
        <h4>ورود به بخش مدیریت فروشگاه</h4>
    </div>
    <form method="post" action="{{ route('login') }}">
      @csrf
        <div class="form-group">
            <label>نام کاربری</label>
            <input type="text" value="{{ old('username') }}" class="form-control" name="username"
                   placeholder="نام کاربری ">
            @if($errors->has('username'))
                <span class="has-error">{{ $errors->first('username') }}</span>
            @endif
        </div>


        <div class="form-group">
            <div class="form-label-group">
                <label for="inputPassword">رمز عبور</label>
                <input type="password" name="password" class="form-control input-psswd" id="inputPassword" psswd-shown="false" placeholder="رمز عبور"  required data-parsley-error-message="فیلد رمز عبور را وارد نمایید">
                <span class="button-psswd" style="padding-right: 95%"><i class="fa fa-eye-slash" style="color: #cecece"></i></span>
                @if($errors->has('password'))
                    <span class="has-error" style="color: red;font-size: 12px;">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>


        <div class="form-group">
            <div class="form-label-group">
                <label for="captcha">کد امنیتی</label>
                <input type="text" autocomplete="off" id="captcha" class="form-control" name="captcha" placeholder="کد امنیتی"
                       required data-parsley-error-message="فیلد کد امنیتی را وارد نمایید">
                @if($errors->has('captcha'))
                    <span class="has-error" style="color: red;font-size: 12px;">{{ $errors->first('captcha') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group">
            <div class="captcha">
                <span>{!! captcha_img('flat') !!}</span>
                <a class="btn-reset btn-refresh"><i
                            style="padding-right: 20px;color: #cecece" class="fa fa-lg fa-refresh"></i>
                </a>
            </div>
        </div>

        <div class="form-group">
            <input type="checkbox" class="flat-red" name="remember" {{ old('remember') ? 'checked' : '' }}> مرا به خاطر بسپار
        </div>

        <div class="form-group">
            <input  type="submit" style="width:100%" class="button button2" value="ورود به بخش مدیریت">
        </div>


    </form>

</div>

</body>
</html>
<script src="{{asset('/admin/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
<script src="{{asset('/admin/plugins/iCheck/icheck.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('admin/js/admin.js') }}"></script>
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

    /* show and hide password*/
    $(document).ready(function() {
        $('.button-psswd').on('click', function() {
            if ($('.input-psswd').attr('psswd-shown') == 'false') {
                $('.input-psswd').removeAttr('type');
                $('.input-psswd').attr('type', 'text');
                $('.input-psswd').removeAttr('psswd-shown');
                $('.input-psswd').attr('psswd-shown', 'true');
                $('.button-psswd').html('<i class="fa fa-fw fa-eye" style="color: #cecece"></i>');
            }else {
                $('.input-psswd').removeAttr('type');
                $('.input-psswd').attr('type', 'password');
                $('.input-psswd').removeAttr('psswd-shown');
                $('.input-psswd').attr('psswd-shown', 'false');
                $('.button-psswd').html('<i class="fa fa-fw fa-eye-slash" style="color: #cecece"></i>');
            }
        });
    });
</script>

