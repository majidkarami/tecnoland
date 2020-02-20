@extends('technoland.layout.master')
@section('title', __('سفارشات کاربر'))

@section('styles')
    <style>
        .pagination .page-item.active>.page-link, .pagination .page-item.active>.page-link:focus, .pagination .page-item.active>.page-link:hover {
            background-color: #00bfd6;
        }

        .pagination{
            justify-content: center!important;
        }
    </style>
@endsection

@section('content')

    <?php
    $Jdf = new \App\lib\Jdf();
    ?>

    <main class="profile-user-page default">
        <div class="container">
            <div class="row">
                <div class="profile-page col-xl-9 col-lg-8 col-md-12 order-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-12">
                                <h1 class="title-tab-content">همه سفارش ها</h1>
                            </div>
                            <div class="content-section default">
                                <div class="table-responsive">
                                    <table class="table table-order">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">ردیف</th>
                                            <th scope="col">شماره سفارش</th>
                                            <th scope="col">تاریخ ثبت سفارش</th>
                                            <th scope="col">مبلغ کل</th>
                                            <th scope="col">عملیات پرداخت</th>
                                            <th scope="col">جزئیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach($orders as $order)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td class="order-code">{{ $order->create_order_code($order->time) }}</td>
                                                <td>{{ $Jdf->tr_num($Jdf->jdate('Y-m-d',$order->time)) }}
                                                    {{ $Jdf->tr_num($Jdf->jdate('H:i:s',$order->time)) }}
                                                </td>
                                                <td>{{ number_format($order->price) }} تومان</td>
                                                @if($order->pay_status==1)
                                                    <td class="text-success">پرداخت شده</td>
                                                @else
                                                    <td class="text-danger">در انتظار پرداخت</td>
                                                @endif

                                                <td>  <a href="{{ url('user/order?id=').$order->id  }}"> <span class="fa fa-eye"></span></a></td>
                                            </tr>

                                            @php
                                                $i++;
                                            @endphp
                                        @endforeach

                                        </tbody>
                                        @if(sizeof($orders)==0)
                                            <tr>
                                                <td colspan="6" style="color: #d9534f;text-align: center">رکوردی یافت
                                                    نشد
                                                </td>
                                            </tr>
                                        @endif

                                    </table>
                                    <div class="col-md-12 text-xs-center" style="padding-top: 30px;">
                                       {!! $orders->links() !!}
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
                            <a href="#" class="profile-box-tab profile-box-tab--sign-out">
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
                                <a href="{{route('user.profile')}}" class="dropdown-item">
                                    <i class="now-ui-icons users_single-02"></i>
                                    پروفایل
                                </a>
                                <a href="{{route('user.orders')}}" class="dropdown-item active-menu" >
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
{{--                                    تکنو بن--}}
{{--                                </a>--}}


                            </div>
                        </div>
                    </div>
                    <div class="profile-menu hidden-md">
                        <div class="profile-menu-header">حساب کاربری شما</div>
                        <ul class="profile-menu-items">
                            <li>
                                <a href="{{route('user.profile')}}">
                                    <i class="now-ui-icons users_single-02"></i>
                                    پروفایل
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.orders')}}"  class="active">
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
{{--                                <a href="profile-personal-info.html">--}}
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


