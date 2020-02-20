<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
{{--    <title> صفحه مدیریت فروشگاه اینترنتی تکنولند - @yield('title')</title>--}}
    <title>@yield('title') | {{env('APP_NAME','صفحه مدیریت فروشگاه اینترنتی تکنولند')}} </title>
    <link rel="shortcut icon" href="{{url('favicon.ico')}}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('admin/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin/fonts-awesome/css/font-awesome.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/AdminLTE.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/skins/_all-skins.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('admin/plugins/iCheck/flat/blue.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/iCheck/all.css')}}">

    <!-- Morris chart -->
    <link rel="stylesheet" href="{{asset('admin/plugins/morris/morris.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('admin/plugins/datepicker/datepicker3.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('admin/plugins/daterangepicker/daterangepicker-bs3.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

    <link href="{{ asset('admin/dist/css/js-persian-cal.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/plugins/iCheck/all.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('styles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


    <header class="main-header">

        <!-- Logo -->
        <a href="{{route('admin.dashboard')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>T - </b>L</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>پنل</b> مدیریت</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs">فروشگاه آنلاین تکنولند</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p style="text-align: center;">
                                    به صفحه مدیریت خوش آمدید.
                                    <small style="float: left;padding-top: 22px;">{{number2farsi(verta()->format('H:i , Y-n-j'))}}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->

                            <!-- Menu Footer-->
                            <li class="user-footer">
{{--                                <div class="pull-left">--}}
{{--                                    <a href="#" class="btn btn-default btn-flat">Profile</a>--}}
{{--                                </div>--}}
                                <div class="pull-right">
                                    <a onclick="logout()" class="btn btn-default btn-flat">خروج</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar direction">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-right image">
                    <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-right info">
                    <p>تکنولند</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> آنلاین </a>
                </div>
            </div>
            <!-- search form -->
         <!--   <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="جستجو...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form> -->
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">منو اصلی</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cart-plus"></i>
                        <span>محصولات</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('products.index')}}"><i class="fa fa-circle-o"></i>لیست محصولات </a></li>
                        <li><a href="{{route('products.create')}}"><i class="fa fa-circle-o"></i> محصول جدید </a></li>
                        <li><a href="{{route('categories.index')}}"><i class="fa fa-circle-o"></i>لیست دسته بندی ها </a></li>
                        <li><a href="{{route('categories.create')}}"><i class="fa fa-circle-o"></i> دسته جدید </a></li>
                        <li><a href="{{route('filter.index')}}"><i class="fa fa-circle-o"></i>فیلتر های محصول</a></li>
                        <li><a href="{{route('item.index')}}"><i class="fa fa-circle-o"></i>ایتم های محصول </a></li>
                    </ul>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>مدیریت کاربران</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('users.index')}}"><i class="fa fa-circle-o"></i>لیست کاربران </a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="{{route('comment.index')}}">
                        <i class="fa fa-comment"></i>
                        <span>نظرات کاربران  </span>  <span class="label pull-left bg-green" style="padding-top: 5px;"> @if($comment_count ?? ''>0) {{ $comment_count ?? '' }} @else 0  @endif</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="{{route('question.index')}}">
                        <i class="fa fa-question"></i>
                        <span>پرسش کاربران  </span>  <span class="label pull-left bg-green" style="padding-top: 5px;"> @if($question_count ?? ''>0) {{ $question_count ?? '' }} @else 0  @endif</span>
                    </a>
                </li>

                <li class="treeview">
                    <a href="">
                        <i class="fa fa-reorder"></i>
                        <span>سفارشات</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('order.index')}}"><i class="fa fa-circle-o"></i>لیست سفارشات</a></li>
                        <li><a href="{{route('discounts.index')}}"><i class="fa fa-circle-o"></i>کد تخفیف </a></li>
                        <li><a href="{{route('gift_cart.index')}}"><i class="fa fa-circle-o"></i>کارت هدیه</a></li>
                    </ul>
                </li>

            <!--    <li class="treeview">
                    <a href="#">
                        <i class="fa fa-ship"></i>
                        <span>محصولات شگفت انگیز</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('amazings.index')}}"><i class="fa fa-circle-o"></i>لیست شگفت انگیز </a></li>
                    </ul>
                </li>-->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-map-marker"></i>
                        <span>مدیریت استان و شهر</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('provinces.index')}}"><i class="fa fa-circle-o"></i>لیست استان ها </a></li>
                        <li><a href="{{route('cities.index')}}"><i class="fa fa-circle-o"></i>لیست شهر ها </a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-sliders"></i>
                        <span>مدیریت اسلایدر</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('sliders.index')}}"><i class="fa fa-circle-o"></i>لیست اسلایدر </a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-line-chart"></i>
                        <span>نمودار وبسایت</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('statistic.index')}}"><i class="fa fa-circle-o"></i>نمودار آمار بازدید</a> </li>
                        <li><a href="{{route('income.index')}}"><i class="fa fa-circle-o"></i>نمودار میزان درآمد</a></li>
                    </ul>
                </li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-newspaper-o"></i>
                        <span>وبلاگ</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('blog.posts.index')}}"><i class="fa fa-circle-o"></i>پست ها</a></li>
                        <li><a href="{{route('blog.categories.index')}}"><i class="fa fa-circle-o"></i>دسته بندی پست ها</a></li>
                        <li><a href="{{route('blog.comments.index')}}"><i class="fa fa-circle-o"></i>نظرات</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-rss"></i>
                        <span>خبرنامه</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route("admin.newsletter.index")  }}"><i class="fa fa-circle-o"></i> لیست اخبار</a></li>
                        <li><a href="{{ route("admin.newsletter.create")  }}"><i class="fa fa-circle-o"></i>ایمیل</a></li>
{{--                        <li><a href="{{route('admin.newsletter.phone.create')}}"><i class="fa fa-circle-o"></i>پیام کوتاه</a></li>--}}
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-gears"></i>
                        <span>تنظیمات</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('pub_setting_form.create')}}"><i class="fa fa-circle-o"></i> تنظیمات عمومی</a></li>
                        <li><a href="{{route('pay_setting_form.create')}}"><i class="fa fa-circle-o"></i> تنظیمات پرداخت</a></li>
                    </ul>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        @yield('content')

    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer" style="text-align: center;">
        <strong><a href="https://www.techno-land.net">تکنولند</a> _</strong>
        تمام حقوق محفوظ می باشد.
    </footer>

</div>
<!-- ./wrapper -->
<!-- jQuery 2.2.0 -->
<script src="{{asset('')}}admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('admin/bootstrap/js/bootstrap.min.js')}}"></script>
@yield('script-vuejs')

<!-- Morris.js charts -->
<script src="{{asset('admin/plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admin/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin/plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('admin/plugins/fastclick/fastclick.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/app.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- iCheck 1.0.1 -->
<script src="{{asset('admin/plugins/iCheck/icheck.min.js')}}"></script>

<script src="{{asset('admin/dist/js/demo.js')}}"></script>
<script src="{{asset('admin/plugins/iCheck/icheck.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/admin/dist/js/js-persian-cal.min.js') }}"></script>
@yield('scripts')
<script type="text/javascript" src="{{ asset('admin/js/admin.js') }}"></script>
<script>
    url='<?= url('logout') ?>';
    token='<?= csrf_token() ?>';
    logout=function () {

        if(confirm('آیا قصد خارج شدن از بخش کاربری را دارید؟'))
        {
            var form = document.createElement("form");
            form.setAttribute("method", "POST");
            form.setAttribute("action",url);

            var hiddenField2 = document.createElement("input");
            hiddenField2.setAttribute("name", "_token");
            hiddenField2.setAttribute("value",token);
            form.appendChild(hiddenField2);

            document.body.appendChild(form);
            form.submit();

            document.body.removeChild(form);
        }

    }
</script>


</body>
</html>
