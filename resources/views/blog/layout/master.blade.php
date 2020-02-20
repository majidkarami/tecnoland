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
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,600,700%7CSource+Sans+Pro:400,600,700' rel='stylesheet'>

    <!-- Css -->
    <link rel="stylesheet" href="{{asset('user/blog/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('user/blog/css/font-icons.css')}}" />
    <link rel="stylesheet" href="{{asset('user/blog/css/style.css')}}" />
    @yield('styles')
</head>

<body class="bg-light style-default style-rounded">

    <!-- Preloader -->
    <div class="loader-mask">
        <div class="loader">
            <div></div>
        </div>
    </div>

    <!-- Bg Overlay -->
    <div class="content-overlay"></div>

    <!-- Sidenav -->
    @include('blog.layout.navbar')


    <main class="main oh" id="main">

        <!-- Navigation -->
    @include('blog.layout.header')

    @yield('content')


        <!-- Footer -->
        @include('blog.layout.footer')

        <div id="back-to-top">
            <a href="#top" aria-label="Go to top"><i class="ui-arrow-up"></i></a>
        </div>

    </main> <!-- end main-wrapper -->



<!-- jQuery Scripts -->
<script src="{{ asset('user/blog/js/jquery.min.js')}}"></script>
<script src="{{ asset('user/blog/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('user/blog/js/easing.min.js')}}"></script>
<script src="{{ asset('user/blog/js/owl-carousel.min.js')}}"></script>
<script src="{{ asset('user/blog/js/flickity.pkgd.min.js')}}"></script>
<script src="{{ asset('user/blog/js/twitterFetcher_min.js')}}"></script>
<script src="{{ asset('user/blog/js/jquery.newsTicker.min.js')}}"></script>
<script src="{{ asset('user/blog/js/modernizr.min.js')}}"></script>
<!-- Lazyload (must be placed in head in order to work) -->
<script src="{{ asset('user/blog/js/lazysizes.min.js')}}"></script>
<script src="{{ asset('user/blog/js/scripts.js')}}"></script>
</body>

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
