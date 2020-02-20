<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--title-->
    <title>@yield('title') | {{env('APP_NAME',' فروشگاه اینترنتی تکنولند')}} </title>

    <!--favicon icon-->
    <link rel="shortcut icon" type="image/png" href="{{url('favicon.ico')}}">

    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{ asset('user/fonts/font-awesome/css/font-awesome.min.css') }}"/>

    <!--themify icon-->
    <link rel="stylesheet" href="{{asset('user/game/css/themify-icons.css')}}">

    <!--flaticon icon-->
    <link rel="stylesheet" href="{{asset('user/game/fonts/flaticon.css')}}">

    <!-- magnific popup css-->
    <link rel="stylesheet" href="{{asset('user/game/css/magnific-popup.css')}}">

    <!--owl carousel -->
    <link href="{{asset('user/game/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('user/game/css/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- bootstrap core css -->
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet"/>

    <!-- custom css -->
    <link href="{{asset('user/game/css/style.css')}}" rel="stylesheet">

    <!-- responsive css -->
    <link href="{{asset('user/game/css/responsive.css')}}" rel="stylesheet">

    <script src="{{asset('user/game/js/vendor/modernizr-2.8.1.min.js')}}"></script>
    <!-- HTML5 Shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('user/game/js/vendor/html5shim.js')}}"></script>
    <script src="{{asset('user/game/js/vendor/respond.min.js')}}"></script>
    <![endif]-->
</head>


<body>

<!-- Preloader -->
<div id="preloader">
    <div id="loader"></div>
</div>
<!--end preloader-->

<div id="main" class="main-content-wraper">
    <div class="main-content-inner">

     @yield('content')

        <!--start footer section-->
        <footer class="footer-section bg-secondary ptb-40">
            <div class="footer-wrap">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="footer-single-col text-center">
                                <div class="footer-social-list">
                                    <ul class="list-inline">
                                        <li><a href="{{setting('instagram')}}"> <i class="fa fa-instagram"></i></a></li>
                                        <li><a href="{{setting('whatsapp')}}"> <i class="fa fa-whatsapp" style="color: #20d772;"></i></a></li>
{{--                                        <li><a href="#"> <i class="fa fa-linkedin"></i></a></li>--}}
{{--                                        <li><a href="#"> <i class="fa fa-google-plus"></i></a></li>--}}
{{--                                        <li><a href="#"> <i class="fa fa-youtube"></i></a></li>--}}
                                    </ul>
                                </div>
                                <div class="copyright-text">
                                    <p>&copy; تمامی حقوق نزد این وب سایت {{setting('name')}} محفوظ می باشد
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--end footer section-->

    </div>
    <!--end main content inner-->
</div>
<!--end main container -->


<!--=========== all js file link ==============-->

<!-- main jQuery -->
<script src="{{ asset('user/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>

<!-- bootstrap core js -->
<script src="{{ asset('user/js/core/bootstrap.min.js') }}" type="text/javascript"></script>

<!-- smothscroll -->
<script src="{{ asset('user/game/js/jquery.easeScroll.min.js') }}"></script>

<!--owl carousel-->
<script src="{{ asset('user/game/js/owl.carousel.min.js') }}"></script>

<!-- scrolling nav -->
<script src="{{ asset('user/game/js/jquery.easing.min.js') }}"></script>

<!--magnific popup js-->
<script src="{{ asset('user/game/js/magnific-popup.min.js') }}"></script>

<!-- custom script -->
<script src="{{ asset('user/game/js/scripts.js') }}"></script>

</body>

</html>