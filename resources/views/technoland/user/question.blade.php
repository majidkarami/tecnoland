@extends('technoland.layout.master')
@section('title', __('نظرات کاربر'))

@section('styles')
    <style>
        .pagination .page-item.active>.page-link, .pagination .page-item.active>.page-link:focus, .pagination .page-item.active>.page-link:hover {
            background-color: #00bfd6;
        }
        .pagination{
            justify-content: center!important;
        }
        .question_box {
            border: 1px solid #298913;
            width: 97%;
            margin: 15px auto;
            padding: 15px;
            border-radius: 5px;

        }

        .question_text {
            width: 100%;
            height: 180px;
        }

        .ansver_box {
            display: none;
        }

        .ansver_box .form-group {
            margin-right: 0px !important;
        }

        .widget-user-header {
            padding: 20px;
            border-radius: 5px;
        }

        main.profile-user-page .content-section p {
            font-size: 14px;
            line-height: 20px;
            color: #ffffff;
        }

        .bg-aqua-active, .modal-info .modal-header, .modal-info .modal-footer {
            background-color: #00a7d0 !important;
        }
        .danger_btn{
            border:1px solid red;padding:5px ;border-radius: 5px;cursor: unset;
        }
        .green_btn{
            border:1px solid #298913;padding:5px ;border-radius: 5px;cursor: unset;
        }
    </style>
@endsection

@section('content')


    <main class="profile-user-page default">
        <div class="container">
            <div class="row">
                <div class="profile-page col-xl-9 col-lg-8 col-md-12 order-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-12">
                                <h1 class="title-tab-content">پرسش ها</h1>
                            </div>
                            <div class="content-section default">
                                <div class="row">
                                    <div class="cart-page-content col-xl-12 col-lg-12 col-md-12 order-1">
                                        <section class="page-content default">
                                            <div class="address-section">
                                                <div class="box-body">

                                                    @php
                                                        $jdf=new \App\lib\Jdf();
                                                    @endphp
                                                    @foreach($question as $key=>$value)

                                                        <div class="question_box" id="question_box_{{ $value->id }}"
                                                             @if($value->status==0) style="border-color:red;border-radius: 5px;" @endif>


                                                            <div class="widget-user-header bg-aqua-active">
                                                                <p>پرسش شماره :<span> {{ $value->id }} </span></p>
                                                                <p> توسط
                                                                    :<span> {{ $value->get_user->username }}  </span>
                                                                </p>
                                                                <p> در تاریخ
                                                                    :<span> {{ $jdf->jdate('n F y',$value->time) }} </span>
                                                                </p>
                                                                @if($value->parent_id!=0)
                                                                    <p style="color: #890000;">ثبت شده در پاسخ به پرسش
                                                                        شماره :
                                                                        <span>
                                                                            {{ $value->parent_id }}
                                                                        </span>
                                                                    </p>
                                                                @endif
                                                                <p> عنوان پرسش
                                                                    :<span>  {!!   strip_tags(nl2br($value->question),'<p><br>') !!} </span>
                                                                </p>
                                                            </div>
                                                            <div class="widget-user-header bg-aqua-gradient"
                                                                 style="background: white !important;">

                                                                <p style="color:#933a39;padding-top:10px">ثبت شده برای
                                                                    محصول : <span style="color: #25254b">{{ $value->get_product->title }}</span>
                                                                </p>

                                                                <p style="padding-top:10px;display: inline-flex;">
                                                                    @if($value->status==0)
                                                                        <span class="text-danger danger_btn"> در انتظار تایید</span>
                                                                    @else
                                                                        <span class="text-success green_btn" style="cursor: unset;"> تایید شده </span>
                                                                     @endif
                                                                </p>
                                                            </div>

                                                        </div>

                                                    @endforeach

                                                    <div class="col-md-12 text-xs-center" style="padding-top: 30px;">
                                                        {!! $question->links() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="profile-page-aside col-xl-3 col-lg-4 col-md-6 center-section order-1">
                    <div class="profile-box">
                        <div class="profile-box-header">
                            <div class="profile-box-avatar">
                                <img src="{{asset('user/img/svg/user.svg')}}" alt="">
                            </div>
                            <button class="profile-box-btn-edit">
                                <i class="fa fa-pencil"></i>
                            </button>

                        </div>
                        <div class="profile-box-username">{{auth()->user()->username}}</div>
                        <div class="profile-box-tabs">
                            <a class="profile-box-tab profile-box-tab-access">
                                <i class="now-ui-icons ui-1_check"></i>
                                خوش آمدید
                            </a>
                            <a href="{{route('logout')}}" class="profile-box-tab profile-box-tab--sign-out">
                                <i class="now-ui-icons media-1_button-power"></i>
                                خروج از حساب
                            </a>
                        </div>
                    </div>
                    <div class="responsive-profile-menu show-md">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-navicon"></i>
                                حساب کاربری شما
                            </button>
                            <div class="dropdown-menu dropdown-menu-right text-right">
                                <a href="{{route('user.profile')}}" class="dropdown-item active-menu">
                                    <i class="now-ui-icons users_single-02"></i>
                                    پروفایل
                                </a>
                                <a href="{{route('user.orders')}}" class="dropdown-item">
                                    <i class="now-ui-icons shopping_basket"></i>
                                    همه سفارش ها
                                </a>
                                <a href="{{route('user.favorites')}}" class="dropdown-item">
                                    <i class="now-ui-icons files_single-copy-04"></i>
                                    لیست علاقمندی ها
                                </a>
                                <a href="{{route('user.question')}}" class="dropdown-item">
                                    <i class="now-ui-icons business_badge"></i>
                                    نظرات من
                                </a>
                                <a href="{{route('user.comment')}}" class="dropdown-item">
                                    <i class="now-ui-icons business_badge"></i>
                                    پرسش های من
                                </a>
                                <a href="{{route('user.address')}}" class="dropdown-item">
                                    <i class="now-ui-icons business_badge"></i>
                                    آدرس ها
                                </a>

                                {{--                                <a href="profile-personal-info.html" class="dropdown-item">--}}
                                {{--                                    <i class="now-ui-icons business_badge"></i>--}}
                                {{--                                    نقدهای من--}}
                                {{--                                </a>--}}
                                {{--                                <a href="profile-personal-info.html" class="dropdown-item">--}}
                                {{--                                    <i class="now-ui-icons business_badge"></i>--}}
                                {{--                                 تکنو بن--}}
                                {{--                                </a>--}}

                            </div>
                        </div>
                    </div>
                    <div class="profile-menu hidden-md">
                        <div class="profile-menu-header">حساب کاربری شما</div>
                        <ul class="profile-menu-items">
                            <li>
                                <a href="{{route('user.profile')}}" class="active">
                                    <i class="now-ui-icons users_single-02"></i>
                                    پروفایل
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.orders')}}">
                                    <i class="now-ui-icons shopping_basket"></i>
                                    همه سفارش ها
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.favorites')}}">
                                    <i class="now-ui-icons files_single-copy-04"></i>
                                    لیست علاقمندی ها
                                </a>
                            </li>

                            <li>
                                <a href="{{route('user.question')}}">
                                    <i class="now-ui-icons business_badge"></i>
                                    نظرات من
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.comment')}}">
                                    <i class="now-ui-icons business_badge"></i>
                                    پرسش های من
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.address')}}">
                                    <i class="now-ui-icons business_badge"></i>
                                    آدرس ها
                                </a>
                            </li>
                            {{--                            <li>--}}
                            {{--                                <a href="profile-favorites.html">--}}
                            {{--                                    <i class="now-ui-icons ui-2_favourite-28"></i>--}}
                            {{--                                    نقدهای من--}}
                            {{--                                </a>--}}
                            {{--                            </li>--}}

                            {{--                            <li>--}}
                            {{--                                <a href="{{route('')}}">--}}
                            {{--                                    <i class="now-ui-icons business_badge"></i>--}}
                            {{--                                    تکنو بن--}}
                            {{--                                </a>--}}
                            {{--                            </li>--}}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection