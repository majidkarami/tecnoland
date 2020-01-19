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
    <link rel="stylesheet" href="/admin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin/fonts-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/admin/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/admin/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="{{asset('admin/plugins/iCheck/all.css')}}">

    <!-- Morris chart -->
    <link rel="stylesheet" href="/admin/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/admin/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/admin/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <link href="{{ asset('/admin/dist/css/js-persian-cal.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/plugins/iCheck/all.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('styles')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
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
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="/admin/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                AdminLTE Design Team
                                                <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="/admin/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Developers
                                                <small><i class="fa fa-clock-o"></i> Today</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="/admin/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Sales Department
                                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="/admin/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Reviewers
                                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                                            page and may cause design problems
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-red"></i> 5 new members joined
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-red"></i> You changed your username
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Create a nice theme
                                                <small class="pull-right">40%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">40% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Some task I need to do
                                                <small class="pull-right">60%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Make beautiful transitions
                                                <small class="pull-right">80%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">80% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
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
            {{--<form action="#" method="get" class="sidebar-form">--}}
                {{--<div class="input-group">--}}
                    {{--<input type="text" name="q" class="form-control" placeholder="جستجو...">--}}
                    {{--<span class="input-group-btn">--}}
                {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
                {{--</button>--}}
              {{--</span>--}}
                {{--</div>--}}
            {{--</form>--}}
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

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-ship"></i>
                        <span>محصولات شگفت انگیز</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('amazings.index')}}"><i class="fa fa-circle-o"></i>لیست شگفت انگیز </a></li>
                    </ul>
                </li>

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
<script src="/admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="/admin/bootstrap/js/bootstrap.min.js"></script>
@yield('script-vuejs')

<!-- Morris.js charts -->
<script src="/admin/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/admin/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="/admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/admin/plugins/fastclick/fastclick.js"></script>

<!-- AdminLTE App -->
<script src="/admin/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- iCheck 1.0.1 -->
<script src="/admin/plugins/iCheck/icheck.min.js"></script>

<script src="/admin/dist/js/demo.js"></script>
<script src="/admin/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="{{ url('/admin/dist/js/js-persian-cal.min.js') }}"></script>
@yield('scripts')
<script type="text/javascript" src="{{ url('admin/js/admin.js') }}"></script>
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
