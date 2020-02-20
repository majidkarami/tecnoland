@extends('technoland.layout.master')
@section('title', __('اطلاعات ارسال سفارش'))

@section('styles')
    <link href="{{ url('user/css/user.css') }}" rel="stylesheet">
@endsection


@section('content')
    <div class="wrapper default shopping-page">
        <!-- header-shopping -->
        <header class="header-shopping default">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center pt-2">
                        <div class="header-shopping-logo default">
                            <a href="#">
                                <img src="{{asset('user/img/logo.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <ul class="checkout-steps">
                            <li>
                                <a href="{{route('user.Shipping')}}">
                                    <span>اطلاعات ارسال</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="active">
                                    <span>بازبینی سفارش</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.Payment')}}">
                                    <span>شیوه پرداخت</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-shopping -->

        <!-- main-shopping -->
        <main class="cart-page default">
            <div class="container">
                <div class="row">
                    <div class="cart-page-content col-xl-12 col-lg-12 col-md-12 order-1">
                        <div class="cart-page-title">
                            <h1>مشخصات محصول</h1>
                        </div>
                        <section class="page-content default">
                            <div class="order-info default">
                                <div class="table-responsive default mt-3 mb-3" style="border: 0px">
                                    <?php
                                    $cart_date=\App\Cart::get();
                                    ?>

                                    <table id="cart_table" class="table table-bordered">

                                            <tr style="text-align: center;">
                                                <th>شرح محصول</th>
                                                <th>تعداد</th>
                                                <th>قیمت واحد</th>
                                                <th>قیمت کل</th>
                                                <th>عملیات </th>
                                            </tr>
                                            <?php
                                            $total_price=0;
                                            $price=0;
                                            ?>
                                            @foreach($cart_date as $key=>$value)

                                                <?php

                                                $product_data=array_key_exists('product_data',$value) ? $value['product_data'] : array();
                                                $j=1;
                                                ?>
                                                @foreach($product_data as $key2=>$value2)
                                                    <?php
                                                    $s_c=explode('_',$key2);
                                                    $service_id=$s_c[0];
                                                    $color_id=$s_c[1];
                                                    $data=\App\Cart::get_date($key,$service_id,$color_id);
                                                    ?>
                                                    @if($data)
                                                        <tr>
                                                            <td style="text-align: -webkit-center;">
                                                                <div class="col-lg-6 col-md-4 col-sm-6 col-12">
                                                                    <div class="product-box-container">
                                                                        <div class="product-box product-box-compact">
                                                                            <a class="product-box-img">
                                                                                <img src="{{ $data['img'] }}">
                                                                            </a>
                                                                            <div class="product-box-title" style="height: unset">
                                                                                <a href="{{ url('product').'/'.$data['code_url'].'/'.$data['title_url'] }}">{{ $data['title'] }}</a><br>
                                                                                <a href="{{ url('product').'/'.$data['code_url'].'/'.$data['title_url'] }}">{{ $data['code'] }}</a>

                                                                                @if(!empty($data['color_name']))
                                                                                    <p style="color:#777;font-size: 14px; line-height: 16px;">
                                                                                        <span>رنگ : </span>
                                                                                        <label  style="background:#{{ $data['color_code'] }}" class="color_product"></label>
                                                                                        <span style="padding-right: 10px;">{{ $data['color_name'] }}</span>
                                                                                    </p>
                                                                                @endif
                                                                                @if(!empty($data['service_name']))
                                                                                    <p style="color:#777;font-size: 14px; line-height: 16px;"><span>گارانتی : </span> {{ $data['service_name'] }}</p>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </td>
                                                            <td class="cart_number">
                                                                <p>{{ $value2 }}</p>
                                                            </td>
                                                            <td class="cart_price">
                                                                <p>
                                                                    <span class="p1">{{ number_format($data['price2']) }}</span>
                                                                    <span class="p2">تومان</span>
                                                                </p>
                                                            </td>
                                                            <td class="cart_price">
                                                                <p>
                                                                    <span class="p1">{{ number_format($data['price2']*$value2) }}</span>
                                                                    <span class="p2">تومان</span>
                                                                </p>
                                                            </td>
                                                            <td class="review_last">
                                                                <div>
                                                                    <a href="{{ url('Cart') }}"><span  class="fa fa-refresh"></span></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                        $total_price+=$data['price1']*$value2;
                                                        $price+=$data['price2']*$value2;
                                                        ?>
                                                        <?php $j++; ?>
                                                    @endif

                                                @endforeach

                                            @endforeach

                                        </table>

                                </div>

                                <p>
                                    <span class="icon_item_name"></span><span style="padding-right:5px;">خلاصه صورت حساب</span>
                                </p>
                                <div class="table-responsive default mt-3 mb-3">
                                    <?php

                                    $order_data=Session::get('order_data');
                                    $order_type=array_key_exists('order_type',$order_data) ? $order_data['order_type'] : 0;
                                    $price2=($order_type==1) ? 10000 : 0;
                                    ?>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">جمع کل خرید</th>
                                            <th scope="col">{{ number_format($total_price) }} </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">هزينه ارسال، بيمه و بسته بندي سفارش</th>
                                            <td style="color: grey;">
                                                @if($order_type==1)
                                                    {{number_format(setting('price_post'))}} تومان

                                                @else
                                                    پس کرايه
                                                @endif
                                            </td>
                                        </tr>
                                        <tr style="color: #ff6461">
                                            <th scope="row">تخفیف</th>
                                            <td>{{number_format(setting('price_post'))}} تومان</td>
                                        </tr>
                                        <tr style="color: green;">
                                            <th scope="row">مبلغ قابل پرداخت</th>
                                            <td>{{ number_format($price+$price2) }} تومان</td>
                                        </tr>
                                        <?php
                                        Session::put('price',$price+$price2);
                                        ?>
                                        </tbody>
                                    </table>
                                </div>

                                <p>
                                    <span class="icon_item_name"></span><span style="padding-right:5px;">اطلاعات ارسال سفارش</span>
                                </p>
                                <div class="table-responsive default mt-3 mb-3">

                                    <table class="table">

                                        <tbody>
                                        <tr>
                                            <th scope="row" style="text-align: center;">
                                                <li class="icon icon-review-location"></li>
                                            </th>
                                            <td style="padding-top: 20px;">
                                                <span>این سفارش به</span>
                                                <span>{{ $address->name }}</span>
                                                <span>به آدرس </span>
                                                <span>{{ $address->address }}</span>
                                                <span>به شماره تماس </span>
                                                <span>{{ $address->mobile }}</span>
                                                <span>تحویل میگردد</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" style="text-align: center;">
                                                <li class="icon icon-review-car"></li>
                                            </th>
                                            <td style="padding-top: 18px;">
                                                @if($order_type==1)
                                                    <span>اين سفارش از طريق تحويل {{setting('name')}} با هزينه {{number_format(setting('price_post'))}} تومان به شما تحويل داده خواهد شد.</span>
                                                @else
                                                    <span>
                                                        سفارش شما به صورت پس کرايه ارايه مي شود
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>

                        <div class="parent-btn pull-left">
                            <a href="{{ url('Payment') }}" class="dk-btn dk-btn-info" style="font-size: 14px;padding: 18px 66px;">
                                تایید و ادامه خرید
                                <i class="fa fa-arrow-left"></i>
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </main>
        <!-- main-shopping -->

    </div>
@endsection
