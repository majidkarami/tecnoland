<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/user/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('/admin/bootstrap/css/bootstrap-rtl.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/user/fonts/font-awesome/css/font-awesome.min.css') }}"/>
    <link href="{{ url('/user/css/user.css') }}" rel="stylesheet">

    <title>{{setting('name')}} - تغییر کلمه عبور</title>
</head>
<body style="direction: rtl">
<nav class="navbar navbar-inverse" style="background-color: #27385c;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href=""> فروشگاه اینترنتی {{setting('name')}}</a>
            <a class="navbar-text" style="float: left">خوش آمدید</a>
        </div>

    </div>
</nav>
<div class="container">
    <div class="well">
        <table class="table table-sm">
            <thead>
            <tr>
                <th>  کاربر </th>
                <?php $a = Request::all();?>
                <th>{{ $a['email'] }}</th>
                <th></th>
            </thead>
            <tbody>
            <tr>
                <td scope="row">پیام</td>
                <th>لینک زیر به درخواست شما برای بازیابی کلمه عبورتان در سایت {{setting('name')}} برای شما ارسال شده است</th>
            </tr>
            <tr>
                <th scope="row">تغییر کلمه عبور</th>
                <td>
                    <a href="{{url('password/reset'.'/'.$a['_token'])}}"><button class="btn btn-success">تغییر کلمه عبور</button></a>
                </td>
            </tr>
            <tr>
                <td scope="row">پیام</td>
                <th>اگر تنظیم مجدد رمز عبور را درخواست نکردید، هیچ اقدام دیگری لازم نیست، به وبسایت برگردید</th>
            </tr>
            <tr>
                <th scope="row">برگشت به وبسایت</th>
                <td>
                    <a href="{{url('/')}}"><button class="btn btn-info">برگشت</button></a>
                </td>
            </tr>
            </tbody>
        </table>

    </div>

    <div class="col-md-4">
        <a href="https://telegram.me/technoland" title="به کانال تلگرام {{setting('name')}} بپیوندید"  alt="به کانال تلگرام {{setting('name')}} بپیوندید"><span class="fa fa-telegram" style="color: #16C1F3">  کانال تلگرام </span></a><br>
        <a href="https://instagram.com/technoland" title="به کانال اینستاگرام {{setting('name')}} بپیوندید"  alt="به کانال اینستاگرام {{setting('name')}} بپیوندید"><span class="fa fa-instagram" style="color: #d9534f">  کانال اینستاگرام </span></a>
    </div>
</div>


<footer style="padding-top: 15px;margin-top: 200px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="footer-about">
                    <h3 style="color: white;"> درباره {{setting('name')}}</h3>
                    <p>{{setting('name')}} برای کاربران خود «تجربه‌ی لذت‌بخش یک خرید اینترنتی» را تداعی می‌کند.
                        «ارسال سریع»، «ضمانت بهترین قیمت» و «تضمین اصل بودن کالا» سه اصل اولیه ماست.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="footer-about">
                    <h3 style="color: white;">در صورت بروز مشکل با ما تماس بگیرید</h3>
                    <span style="color: white;"><i class="fa fa-map-marker"></i>  {{setting('address')}}</span><br>
                    <span style="color: white;"><i class="fa fa-envelope-o"></i>      {{setting('email')}} </span><br>
                    <span style="color: white;"><i class="fa fa-phone"></i>      {{setting('tel')}} </span><br>
                    <span style="color: white;"><i class="fa fa-mobile"></i>     {{setting('mobile')}}  </span>
                </div>
            </div>

        </div>
    </div>
</footer>

<script src="{{ asset('user/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('user/js/core/bootstrap.min.js') }}" type="text/javascript"></script>

</body>
</html>