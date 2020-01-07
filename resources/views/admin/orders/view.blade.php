@extends('admin.layout.master')
@section('title', __('مشاهده سفارش'))

@section('styles')
    <link href="{{ url('admin/css/bootstrap-select.css') }}" rel="stylesheet">
    <style>
        .cart_price {
            width: 160px;
            position: relative;
        }

        .cart_price p {
            position: absolute;
            text-align: center;
            width: 150px;
            top: 45%;
        }

        .cart_number {
            width: 100px;
            position: relative;
        }

        .cart_number p {
            position: absolute;
            text-align: center;
            width: 90px;
            top: 45%;
        }

        .cart_div p {
            padding-top: 10px;
            text-align: justify;
        }

        #cart_table tr th {
            text-align: center;
            background-color: #F7F9FA;
            font-size: 13px;
            height: 30px;
            color: #666;
            line-height: 30px;
        }
        .bootstrap-select.btn-group .dropdown-toggle .caret
        {
            right:90% !important;
        }
        .color_product
        {
            width:14px;
            height:14px;
            border-radius:50%;
            border:1px solid #777;
            top:9px;
            right:3px;
            position:relative;
            margin-left:10px;
        }
    </style>
@endsection

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right"> سفارش - {{ $order->id }} </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card card-primary card-outline">

                            <?php

                            $array = array();
                            $array[0] = 'در انتظار پرداخت';
                            $array[1] = 'در انتظار تایید مدیریت';
                            $array[2] = 'پردازش انبار';
                            $array[3] = 'آماده ارسال';
                            $array[4] = 'تحویل داده شده';
                            $array[5] = 'عدم دریافت محصول';
                            $array[-1] = 'عدم پرداخت'
                            ?>
                            <div style="width:95%;margin:auto">
                                <table class="table table-bordered table-striped" id="order_data">
                                    <tr>
                                        <td colspan="2" class="text-info">خلاصه وضعیت سفارش</td>
                                    </tr>
                                    <tr>
                                        <td>شماره سفارش</td>
                                        <?php
                                        $code = $order->time;
                                        $user_id = Auth::user()->id;;
                                        $order_code = substr($code, 1, 5) . $user_id . substr($code, 5, 10);
                                        ?>
                                        <td>{{ $order_code }}</td>
                                    </tr>

                                    <tr>
                                        <td>قیمت کل</td>
                                        <td>{{ number_format($order->total_price) }} تومان</td>
                                    </tr>

                                    <tr>
                                        <td>مبلغ واریز شده</td>
                                        <td>{{ number_format($order->price) }} تومان</td>
                                    </tr>

                                    <tr>
                                        <td>وضعیت پرداخت</td>
                                        <td>
                                            @if($order->pay_status==1)
                                                <span class="badge label-success">پرداخت شده</span>
                                            @else
                                              <span class="badge label-danger">در انتظار پرداخت</span>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-info">وضعیت سفارش</td>
                                        <td style="color:red">
                                            <select class="selectpicker" onchange="set_status(<?= $order->id ?>)"
                                                    id="order_status">
                                                @foreach($array as $key=>$value)
                                                    <option value="{{ $key }}"
                                                            @if($key==$order->order_status) selected="selected" @endif >
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                </table>

                                <table class="table table-bordered table-striped">

                                    <tr>
                                        <td colspan="2" class="text-info">اطلاعات ارسال سفارش</td>
                                    </tr>

                                    <tr>
                                        <td style="width: 370px;">نام و نام خانوادگی</td>
                                        <td>
                                            {{ $order->get_address_data->name }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td >استان - شهر</td>
                                        <td>
                                            {{ $order->get_address_data->get_province->name.' - '.$order->get_address_data->get_city->name }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td >شماره تماس</td>
                                        <td>
                                            <p>{{ $order->get_address_data->mobile }}</p>
                                            <p>{{ $order->get_address_data->tell_code.'-'.$order->get_address_data->tell }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-info">شیوه ارسال محصول</td>
                                        <td >
                                            @if($order->order_type==1)
                                             <span class="badge label-info"> تحويل اکسپرس تکنو لند</span>
                                            @else
                                              <span class="badge label-info"> باربري (پس کرايه | لوازم خانگي سنگين)</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>

                                @if(sizeof($order->getOrderGiftCart)>0)
                                    <?php $i = 1; ?>
                                        <p class="text-info" style="padding-top:20px;padding-bottom:15px;">کارت های هدیه استفاده
                                            شده</p>
                                    <table id="cart_table" class="table table-bordered table-striped">
                                        <tr>
                                            <th class="text-center">ردیف</th>
                                            <th class="text-center">کد کارت هدیه</th>
                                            <th class="text-center">مبلغ استفاده شده</th>
                                        </tr>

                                        @foreach($order->getOrderGiftCart as $key=>$value)
                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td class="text-center">{{ $value->getGiftCart->code }}</td>
                                                <td class="text-center">{{ number_format($value->price).' تومان' }}</td>
                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                    </table>
                                @endif

                                <p class="text-info" style="padding-top:20px;padding-bottom:15px;">محصولات خریداری شده</p>
                                <table id="cart_table" class="table table-bordered">

                                    <tr>
                                        <th class="text-center">شرح محصول</th>
                                        <th class="text-center">تعداد</th>
                                        <th class="text-center">قیمت واحد</th>
                                        <th class="text-center" colspan="2">قیمت کل</th>
                                    </tr>
                                    @if(sizeof($order->get_order_row ) > 0)
                                        @foreach($order->get_order_row as $key=>$value)

                                            <?php
                                            $product = $value->get_product;
                                            ?>
                                            <tr>
                                                <td>
                                                    <div style="width:100%" class="cart_div">
                                                        <div class="col-md-4">
                                                            <img class="cart_img"
                                                                 src="{{ url($value->get_product_img->url) }}">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <p>
                                                                <a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}">{{ $product->title }}</a>
                                                            </p>
                                                            <p>
                                                                <a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}">{{ $product->code }}</a>
                                                            </p>
                                                            @if($value->get_color)
                                                                <p style="color:#777">
                                                                    <span>رنگ : </span>
                                                                    <label style="background:#{{ $value->get_color->color_code }}"
                                                                           class="color_product"></label>
                                                                    <span>{{ $value->get_color->color_name }}</span>
                                                                </p>
                                                            @endif
                                                            @if($value->get_service)
                                                                <p style="color:#777">
                                                                    <span>گارانتی : </span> {{ $value->get_service->service_name }}
                                                                </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center cart_number">
                                                    <p> {{ $value->number }}</p>
                                                </td>
                                                <td class="text-center cart_price">
                                                    <p>
                                                        <span class="p1">{{ number_format($product->price-$product->discounts) }}</span>
                                                        <span class="p2">تومان</span>
                                                    </p>
                                                </td>
                                                <td class="text-center cart_price">
                                                    <p>
                                                        <?php
                                                        $price = $value->number * ($product->price - $product->discounts);
                                                        ?>
                                                        <span class="p1">{{ number_format($price) }}</span>
                                                        <span class="p2">تومان</span>
                                                    </p>
                                                </td>
                                            </tr>
                                        @endforeach

                                    @else
                                        <tr>
                                            <td colspan="8" style="color: #d9534f;text-align: center">رکوردی یافت
                                                نشد
                                            </td>
                                        </tr>
                                    @endif


                                </table>
                            </div>

                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ url('admin/js/bootstrap-select.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/defaults-fa_IR.js') }}"></script>
    <script>
        <?php
            $url = url('admin/order/set_status')
            ?>
            set_status = function (order_id) {
            var order_status = document.getElementById('order_status').value;
            $.ajaxSetup(
                {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
                url: '{{ $url }}',
                type: 'POST',
                data: 'order_id=' + order_id + '&status=' + order_status,
                success: function (data) {
                    alert(data);
                }
            });
        }
    </script>
@endsection
