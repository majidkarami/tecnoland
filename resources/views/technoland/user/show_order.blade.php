@extends('technoland.layout.master')
@section('title', __('سفارش'))

@section('styles')
    <link href="{{ url('user/css/user.css') }}" rel="stylesheet">
    <style>
        .shopping-page header.header-shopping .checkout-steps li {
            float: right;
            width: 12%;
            position: relative;
        }
        .shopping-page header.header-shopping ul.checkout-steps {
            float: right;
            width: 100%;
            margin: 30px auto 18px;
            list-style: none;
            padding: 0px 105px;
            color: #a0a0a0;
            font-size: 13px;
            position: relative;
        }
        .shopping-page header.header-shopping .checkout-steps li {
            float: right;
            width: 16%;
            position: relative;
        }
        .badge {
            border-radius: 8px;
            padding: 10px 18px;
            text-transform: uppercase;
            font-size: 11px;
            line-height: 12px;
            background-color: transparent;
            border: 1px solid;
            margin-bottom: 5px;
            border-radius: 0.875rem;
        }
        .table td, .table th {
            padding: .75rem;
            border-top: 1px solid #dee2e6;
        }
    </style>
@endsection

@section('content')

    <?php

    $array=array();
    $array[0]='در انتظار پرداخت';
    $array[1]='در انتظار تایید مدیریت';
    $array[2]='پردازش انبار';
    $array[3]='آماده ارسال';
    $array[4]='تحویل داده شده';
    $array[5]='عدم دریافت محصول';
    $array[-1]='عدم پرداخت'
    ?>

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
                                <a href="#" class="active">
                                    <span>در انتظار پرداخت</span>
                                </a>
                            </li>

                            <li>
                                <a href="#" >
                                    <span>در انتظار تایید</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" >
                                    <span>پرداخت شده</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" >
                                    <span>پردازش انبار</span>
                                </a>
                            </li>

                            <li>
                                <a href="#" >
                                    <span>آماده ارسال</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" >
                                    <span>تحویل داده شده</span>
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
                        <section class="page-content default">
                            <div class="order-info default">

                                <div class="cart-page-content col-xl-6 col-lg-6 col-md-6 col-xs-6 order-1">
                                    <div class="cart-page-title">
                                        <h1>از خرید شما سپاسگذاریم</h1>
                                    </div>

                                    <div>
                                        @if($order->pay_status==1)

                                            <p style="color:#298913;padding-top:10px;text-align:justify">
                                                خريد شما با موفقيت انجام شد، در حال آماده سازي براي ارسال مي باشد
                                            </p>

                                            <a class="btn btn-info" href="{{ url('user/order/print').'/?id='.$order->id }}">دریافت فاکتور سفارش</a>
                                        @else

                                            @if($order->pay_type==6 or $order->pay_type==7)
                                                <p style="color:red;padding-top:10px;text-align:justify">
                                                    با توجه به روش ارسال انتخاب شده براي اين سفارش، قبل از ارسال کالا مي‌توانيد پرداخت سفارش خود را تکميل نماييد. توجه کنيد که تا 48 ساعت سفارش شما منتظر پرداخت خواهد بود و پس از آن بطور خودکار از فرآيند خريد خارج مي‌گردد
                                                </p>

                                            @elseif($order->pay_type==5)
                                                <p style="color:red;padding-top:10px;text-align:justify">
                                                    خريد شما با موفقيت انجام شد و در حال آماده سازي براي ارسال مي باشد
                                                </p>
                                            @else
                                                <p style="color:red;padding-top:10px;text-align:justify">
                                                    خريد شما با موفقيت انجام نشد، لطفاً دوباره تلاش کنید.
                                                </p>
                                            @endif

                                        @endif
                                    </div>
                                    <div class="table-responsive default mt-3 mb-3">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2"> <span class="icon_item_name"></span><span style="padding-right:5px;">خلاصه وضعیت سفارش</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>شماره سفارش</td>
                                                    <?php
                                                    $code=$order->time;
                                                    $user_id=Auth::user()->id;
                                                    $order_code=substr($code,1,5).$user_id.substr($code,5,10);
                                                    ?>
                                                    <td style="text-align: end;">{{ $order_code }}</td>
                                                </tr>
                                                <tr>
                                                    <td>قیمت کل </td>
                                                    <td style="text-align: end;">{{ number_format($order->total_price) }} تومان</td>
                                                </tr>
                                                <tr>
                                                    <td>مبلغ واریز شده</td>
                                                    <td style="text-align: end;">{{ number_format($order->price) }} تومان</td>
                                                </tr>
                                                <tr>
                                                    <td>وضعیت پرداخت</td>
                                                    <td style="text-align: end;">
                                                        @if($order->pay_status==1)
                                                            <span class="badge badge-success">پرداخت شده</span>
                                                        @else
                                                            <span class="badge badge-danger"> در انتظار پرداخت</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>وضعیت سفارش</td>
                                                    <td style="text-align: end;">
                                                        <span class="badge badge-info">{{ $array[$order->order_status] }}</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="cart-page-content col-xl-6 col-lg-6 col-md-6 col-xs-6 order-1" style="float:left;">

                                    <div class="table-responsive default mt-3 mb-3">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2"> <span class="icon_item_name"></span><span style="padding-right:5px;">اطلاعات ارسال سفارش</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>نام و نام خانوادگی</td>
                                                    <td style="text-align: end;">
                                                        {{ $order->get_address_data->name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>استان - شهر</td>
                                                    <td style="text-align: end;">
                                                        {{ $order->get_address_data->get_province->name.' - '.$order->get_address_data->get_city->name }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>شماره تماس</td>
                                                    <td style="text-align: end;">
                                                        <p>{{ $order->get_address_data->mobile }}</p>
                                                        <p>{{ $order->get_address_data->tell_code.'-'.$order->get_address_data->tell }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>شیوه ارسال محصول</td>
                                                    <td style="text-align: end;">
                                                        @if($order->order_type==1)
                                                            <span class="badge badge-info"> تحويل {{setting('name')}}</span>
                                                        @else
                                                            <span class="badge badge-success"> باربري (پس کرايه | لوازم خانگي سنگين)</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="order-info default">
                            <div class="table-responsive default mt-3 mb-3" style="border: 0px">

                                <table id="cart_table" class="table table-bordered" style="width: 99%;margin-right: 7px;">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>شرح محصول</th>
                                            <th>تعداد</th>
                                            <th>قیمت واحد</th>
                                            <th>قیمت کل</th>
                                        </tr>
                                    </thead>


                                    @foreach($order->get_order_row as $key=>$value)
                                        <?php
                                        $product=$value->get_product;
                                        ?>
                                        <tbody>
                                             <tr>
                                                <td style="text-align: -webkit-center;">
                                                    <div class="col-lg-6 col-md-4 col-sm-6 col-12">
                                                        <div class="product-box-container">
                                                            <div class="product-box product-box-compact">
                                                                <a class="product-box-img">
                                                                    <img src="{{ url($value->get_product_img->url) }}">
                                                                </a>
                                                                <div class="product-box-title" style="height: unset">
                                                                    <a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}">{{ $product->title }}</a><br>
                                                                    <a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}">{{ $product->code }}</a>
                                                                    @if($value->get_color)
                                                                        <p style="color:#777;font-size: 14px; line-height: 16px;">
                                                                            <span>رنگ : </span>
                                                                            <label  style="background:#{{ $value->get_color->color_code }}" class="color_product"></label>
                                                                            <span style="padding-right: 10px;">{{ $value->get_color->color_name }}</span>
                                                                        </p>
                                                                    @endif
                                                                    @if($value->get_service)
                                                                        <p style="color:#777;font-size: 14px; line-height: 16px;"><span>گارانتی : </span> {{ $value->get_service->service_name }}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </td>
                                                <td class="cart_number">
                                                    <p> {{ $value->number }} </p>
                                                </td>
                                                <td class="cart_price">
                                                    <p>
                                                        <span class="p1">{{ number_format($product->price-$product->discounts) }}</span>
                                                        <span class="p2">تومان</span>
                                                    </p>
                                                </td>
                                                <td class="cart_price">
                                                    <p>
                                                        <?php
                                                        $price=$value->number*($product->price-$product->discounts);
                                                        ?>
                                                        <span class="p1">{{ number_format($price) }}</span>
                                                        <span class="p2">تومان</span>
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach

                                </table>

                            </div>
                            </div>
                        </section>
                </div>
            </div>
        </main>
        <!-- main-shopping -->
    </div>




@endsection