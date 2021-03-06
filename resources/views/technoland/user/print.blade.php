<html>
<header>
    <meta charset="UTF-8">
    <title>فاکتور سفارش</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('user/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ url('admin/bootstrap/css/bootstrap-rtl.css') }}" rel="stylesheet">
    <link href="{{ url('user/css/print.css') }}" rel="stylesheet">
</header>

<body>

<?php
$code=$order->time;
$user_id=Auth::user()->id;
$order_code=substr($code,1,5).$user_id.substr($code,5,10);
$Jdf=new \App\lib\Jdf();
?>
<div style="width:75%;margin:auto">

    <div style="text-align:center;padding-top:15px;padding-bottom:15px">
{{--        <button class="btn btn-primary">پرینت فاکتور سفارش</button>--}}
        <a class="btn btn-info" href="{{ url('user/order/pdf?id=').$order->id }}">فایل pdf فاکتور سفارش</a>
    </div>

    <div class="header">

        <div class="col-md-6">
            <p style=" margin-left: 281px;">
                <span>شماره سفارش : </span>
                <span>{{ $order_code }}</span>
            </p>
            <p style=" margin-left: 270px;">
                <span>نام و نام خانوادگی خریدار : </span>
                <span>{{ $order->get_address_data->name }}</span>
            </p>
            <p style=" margin-left: 218px;">
                <span>تاریخ ثبت سفارش : </span>
                <span>{{ $Jdf->tr_num($Jdf->jdate('H:i:s',$order->time)) }} - {{ $Jdf->tr_num($Jdf->jdate('d-m-Y',$order->time)) }}</span>

            </p>
        </div>

        <div class="col-md-6" style="text-align:left">
            <img src="{{ url('user/order/create_barcode').'?order_code='.$order_code }}">
        </div>


        <div style="clear:both"></div>
    </div>


    <div style="width:100%;float:right;margin-top:20px">
        <?php
        $toatl_price=0;
        ?>
        @foreach($order->get_order_row as $key=>$value)
            <?php
            $product=$value->get_product;
            ?>
            <div class="product_row">
                <div class="col-md-3">
                    <img class="cart_img" src="{{ url($value->get_product_img->url) }}">

                </div>
                <div class="col-md-9">
                    <p style="padding-top:20px">{{ $product->title }}</p>
                    <p>{{ $product->code }}</p>
                    @if($value->get_color)
                        <p style="color:#777">
                            <span>رنگ : </span>
                            <label style="background:#{{ $value->get_color->color_code }}" class="color_product"></label>
                            <span>{{ $value->get_color->color_name }}</span>
                        </p>
                    @endif
                    @if($value->get_service)
                        <p style="color:#777"><span>گارانتی : </span> {{ $value->get_service->service_name }}</p>
                    @endif
                    <p style="color:#777">
                        <span>تعداد : </span>
                        <span >{{ $value->number }}</span>
                    </p>
                    <p style="color:#777">
                        <span>قیمت واحد : </span>
                        <span>{{ number_format($product->price-$product->discounts) }}</span>
                        <span>تومان</span>
                    </p>

                    <p style="color:#777">
                        <span>قیمت کل : </span>
                        <?php
                        $p=($product->price-$product->discounts)*$value->number;
                        $toatl_price+=$p;
                        ?>
                        <span>{{ number_format($p) }}</span>
                        <span>تومان</span>
                    </p>
                </div>
            </div>
        @endforeach


    </div>


     <div style="width:100%;float:right;margin-top:20px">

         <table class="table table-bordered" style="font-size:13px">


             <tr>
                 <td style="text-align:center">شیوه ارسال محصول</td>
                 <td>
                     @if($order->order_type==1)
                          <span class="badge badge-info" style="font-size: 100%;">تحويل {{setting('name')}}</span>
                     @else
                         <span class="badge badge-info" style="font-size: 100%;">تحويل باربري (پس کرايه | لوازم خانگي سنگين)</span>
                     @endif
                 </td>
             </tr>

             <tr>
                 <td style="text-align:center">استان - شهر</td>
                 <td>
                     {{ $order->get_address_data->get_province->name.' - '.$order->get_address_data->get_city->name }}
                 </td>
             </tr>

             <tr>
                 <td style="text-align:center">شماره تماس</td>
                 <td>
                     {{ $order->get_address_data->mobile }} -
                     {{ $order->get_address_data->tell_code.'-'.$order->get_address_data->tell }}
                 </td>
             </tr>

             <tr>
                 <td style="text-align:center">هزینه پرداخت شده</td>
                 <td>
                         <span>{{ number_format($toatl_price) }} تومان </span>
                    </td>
             </tr>





         </table>

     </div>


</div>



</body>

</html>