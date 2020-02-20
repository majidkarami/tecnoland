@extends('technoland.layout.master')
@section('title', __('آدرس کاربر'))

@section('styles')
    <link href="{{ url('user/css/user.css') }}" rel="stylesheet">
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


    <main class="profile-user-page default">
        <div class="container">
            <div class="row">
                <div class="profile-page col-xl-9 col-lg-8 col-md-12 order-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-12">
                                <h1 class="title-tab-content">آدرس ها</h1>
                            </div>
                            <div class="content-section default">
                                <div class="row">
                                    <div class="cart-page-content col-xl-12 col-lg-12 col-md-12 order-1">
                                    <section class="page-content default">
                                    <div class="address-section">
                                    @if(count($address))
                                        <div class="checkout-contact">
                                            <div class="checkout-contact-content">
                                                @foreach($address as $key=>$value)
                                                    <table id="address_table_<?= $value->id ?>"
                                                           class="user_address @if($key==0) active_address @endif">
                                                        <tr>
                                                            <td class="first_td" rowspan="3">
                                                                <div style="width:100%;position:absolute;top:-1px;right:0px">
                                                                   <span id="span_action_<?= $value->id ?>"
                                                                         class=" active-address  span_address ">
                                                                   <li class="icon-shopping-white-mark"></li>
                                                                   </span>
                                                                </div>


                                                            </td>
                                                            <td colspan="1">
                                                                نام :     {{ $value->name }}
                                                            </td>
                                                            <td colspan="2">
                                                                ایمیل :  {{ ($value->email) ? $value->email : 'ندارد'}}
                                                            </td>


                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <span>استان :  </span>
                                                                <span>

                                                       {{ $value->get_province->name }}
                                                   </span>
                                                            </td>

                                                            <td rowspan="2">
                                                                <p>{{ $value->address }}</p>
                                                                <p><span>کد پستی : </span>
                                                                    <span>{{ $value->zip_code }}</span></p>
                                                            </td>

                                                            <td style="text-align:center">
                                                                <span>شماره تماس اضطراری : </span>
                                                                <span>{{ $value->mobile }}</span>
                                                            </td>

                                                        </tr>
                                                        <tr>

                                                            <td>
                                                                <span>شهر : </span>
                                                                <span>{{ $value->get_city->name }}</span>
                                                            </td>
                                                            <td style="text-align:center">
                                                                <span>شماره تماس ثابت : </span>
                                                                <span>{{ $value->tell.' - '.$value->tell_code }}</span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
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
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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