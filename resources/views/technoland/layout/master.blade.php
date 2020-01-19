<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {{ (str_replace('_', '-', app()->getLocale()) == 'fa') || (str_replace('_', '-', app()->getLocale()) == 'ar') ? "dir=rtl" : "dir=ltr" }}>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <title>@yield('title') | {{env('APP_NAME',' فروشگاه اینترنتی تکنولند')}} </title>
    <link rel="shortcut icon" type="image/png" href="{{url('favicon.ico')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('user/img/apple-icon.png') }}">
    <!-- Fonts and icons-->
    <link rel="stylesheet" href="{{ asset('user/fonts/font-awesome/css/font-awesome.min.css') }}"/>
    <!-- CSS Files -->
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('user/css/now-ui-kit.css') }}" rel="stylesheet"/>
    <link href="{{ asset('user/css/plugins/owl.carousel.css') }}" rel="stylesheet"/>
    <link href="{{ asset('user/css/plugins/owl.theme.default.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('user/css/main.css') }}" rel="stylesheet"/>
    @yield('styles')
</head>

<body class="index-page sidebar-collapse">

@include('technoland.layout.navbar')

<div class="wrapper default">

    @include('technoland.layout.header')

    @yield('content')


    @include('technoland.layout.footer')

</div>
</body>


<!--   Core JS Files   -->
<script src="{{ asset('user/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('user/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('user/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('user/js/plugins/bootstrap-switch.js') }}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('user/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="{{ asset('user/js/plugins/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<!-- Share Library etc -->
<script src="{{ asset('user/js/plugins/jquery.sharrre.js') }}" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('user/js/now-ui-kit.js') }}" type="text/javascript"></script>
<!--  CountDown -->
<script src="{{ asset('user/js/plugins/countdown.min.js') }}" type="text/javascript"></script>
<!--  Plugin for Sliders -->
<script src="{{ asset('user/js/plugins/owl.carousel.min.js') }}" type="text/javascript"></script>
<!--  Jquery easing -->
<script src="{{ asset('user/js/plugins/jquery.easing.1.3.min.js') }}" type="text/javascript"></script>
<!--  Plugin ez-plus -->
<script src="{{asset('user/js/plugins/jquery.ez-plus.js')}}" type="text/javascript"></script>
<!--  LocalSearch -->
<script src="{{ asset('user/js/plugins/JsLocalSearch.js') }}" type="text/javascript"></script>
<!-- Main Js -->
<script src="{{ asset('user/js/main.js') }}" type="text/javascript"></script>
@yield('scripts')
{{--<script type="text/javascript" src="{{ url('user/js/user.js') }}"></script>--}}
<script type="text/javascript">
    $(function(){
        $('.newsletter-form').on('submit', function(e){
            e.preventDefault();

            var that = this;
            var data = {};

            var email = $(that).find('input.newsletter-email').val();
            data['email'] = email;

            data['_token'] = '{{csrf_token()}}';

            $('#newsletter-register-button').prop('disabled', true);

            $.post('{{route('email.register')}}', data, function(result){
                $('#newsletter-register-button').prop('disabled', false);
                $(that).find('.newsletter-message').remove();

                if(result.status == 'err'){
                    html = '<p class="newsletter-message" style="color: red;">'+result.message+'</p>';
                }else{
                    html = '<p class="newsletter-message" style="color: green;">'+result.message+'</p>';
                }

                $(that).prepend(html);
            });
        });
    });
</script>
</html>
