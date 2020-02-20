@extends('technoland.layout.master')
@section('title', __('اطلاعات ارسال'))
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
                                <a href="{{route('user.review')}}">
                                    <span>بازبینی سفارش</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="active">
                                    <span>شیوه پرداخت</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-shopping -->

        <main class="cart-page default">
            <div class="container">
                <div class="row">
                    <div class="cart-page-content col-xl-12 col-lg-12 col-md-12 order-1">
                        <div class="cart-page-title">
                            <h1>انتخاب شیوه پرداخت</h1>
                        </div>
                        <section class="page-content default">
                            <div class="headline">
                                <span>کارت هدیه</span>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <div class="checkout-price-options">
                                        <div class="checkout-price-options-form">
                                            <section class="checkout-price-options-container" id="gift_cart">
                                                <div class="checkout-price-options-header">
                                                    <span>استفاده از کارت هدیه {{setting('name')}} &zwnj;</span>
                                                </div>
                                                <div class="checkout-price-options-content">
                                                    <p class="checkout-price-options-description">
                                                        با ثبت کارت هدیه، مبلغ کارت هدیه از “مبلغ قابل پرداخت” کسر می&zwnj;شود.
                                                    </p>
                                                    <div class="checkout-price-options-row">
                                                        <div class="checkout-price-options-form-field">
                                                            <label class="ui-input">
                                                                <input class="ui-input-field" name="gift_cart" id="gift_carts"type="text" placeholder="مثلا 837A2CS">
                                                            </label>
                                                        </div>
                                                        <div class="checkout-price-options-form-button">
                                                            <button type="button" class="btn-primary" onclick="send_gift_cart()">
                                                                ثبت کارت هدیه
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="gift_cart_message">
                                                    <?php
                                                    $gift_array=Session::get('gift_list',[]);
                                                    ?>
                                                    @foreach($gift_array as $key=>$value)

                                                        <div style="background: #FCF5F5;margin-top: 10px;">
                                                            <p style="color:red;padding: 20px">

                                                                <span>کارت هدیه وارد شده با کد </span>
                                                                <span>{{ $value  }}</span>
                                                                <span>  صحیح می باشد و مبلغ کارت هدیه از هزینه سفارش کسر شد مبلغ نهایی برای پرداخت :</span>
                                                                <span>{{ \App\Cart::getPrice()  }}</span>
                                                            </p>
                                                        </div>

                                                    @endforeach

                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>


                            <div class="headline">
                                <span>کد تخفیف</span>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <div class="checkout-price-options">
                                        <div class="checkout-price-options-form">
                                            <?php
                                            $d=Session::get('discount',0);
                                            ?>
                                            @if($d==0)
                                                <section class="checkout-price-options-container">
                                                <div class="checkout-price-options-header">
                                                    <span>استفاده از کد تخفیف {{setting('name')}} &zwnj;</span>
                                                </div>
                                                <div class="checkout-price-options-content" id="discount_box">
                                                    <p class="checkout-price-options-description">
                                                        با ثبت کد تخفیف، مبلغ کد تخفیف از “مبلغ قابل پرداخت” کسر می&zwnj;شود.
                                                    </p>
                                                    <div class="checkout-price-options-row">
                                                        <div class="checkout-price-options-form-field">
                                                            <label class="ui-input">
                                                                <input class="ui-input-field" name="discount_code" id="discount_code" type="text" placeholder="مثلا 837A2CS">
                                                            </label>
                                                        </div>
                                                        <div class="checkout-price-options-form-button">
                                                            <button type="button" class="btn-primary" onclick="send_code()">
                                                                ثبت کد تخفیف
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div>
                                                        <div style="background: #FCF5F5;">
                                                            <p style="color: red;" id="loading">
                                                            </p>
                                                        </div>
                                                    </div>
                                                 </section>

                                            @else
                                                <?php
                                                    $price=Session::get('price');
                                                    $price2=$price-(($d*$price)/100);
                                                    $p=explode('.',$price2);
                                                if(sizeof($p)==2)
                                                {
                                                    $price2=$p[0];
                                                }

                                                ?>
                                            <section class="checkout-price-options-container">
                                                <div class="checkout-price-options-header">
                                                    <span>استفاده از کد تخفیف {{setting('name')}} &zwnj;</span>
                                                </div>

                                                <div style="background: #FCF5F5;">
                                                    <p style="padding:20px;color: red;">
                                                        <span>مبلغ قابل پرداخت با توجه به تخفیف اعمال شده </span>
                                                        <span> <?=  number_format($price2);  ?> </span>
                                                    </p>
                                                </div>
                                            </section>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <br>


                            <div class="headline">
                                <span>شیوه پرداخت</span>
                            </div>
                            <form action="{{ url('Payment') }}" method="post">
                                @csrf
                                <ul class="checkout-paymethod" id="tab_payment_1">
                                    <li>
                                        <div class="checkout-paymethod-item checkout-paymethod-item-cc has-options">
                                            <div class="radio" id="pay_radio_4" onclick="set_pay(4)">
                                                <input type="radio" id="post_radio_4"  value="4" name="pay_radio" checked="checked">
                                                <label for="radio4">
                                                    <div>
                                                        <h4 class="checkout-paymethod-title">
                                                            <div>
                                                                <p class="checkout-paymethod-title-label">
                                                                    پرداخت اینترنتی ( آنلاین با تمامی کارت&zwnj;های بانکی )
                                                                </p>
                                                            </div>
                                                            <span>سرعت بیشتر در ارسال و پردازش سفارش </span>
                                                        </h4>
                                                        <div class="checkout-paymethod-one-gateway">
                                                            <div class="checkout-paymethod-one-gateway-img">
                                                                <img src="{{asset('user/img/zarinpal.jpg')}}">
                                                            </div>
                                                            درگاه پرداخت اینترنتی زرین پال
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

{{--                                <div class="headline">--}}
{{--                                    <span>انتخاب نوع پرداخت </span>--}}
{{--                                </div>--}}

{{--                                <ul class="checkout-paymethod" id="tab_payment_6">--}}
{{--                                    <li>--}}
{{--                                        <div class="checkout-paymethod-item checkout-paymethod-item-cc has-options">--}}
{{--                                            <div class="radio" id="pay_radio_6" onclick="set_pay(6)">--}}
{{--                                                <input type="radio" id="post_radio_6" value="6" name="pay_radio" checked="checked">--}}
{{--                                                <label for="radio6">--}}
{{--                                                    <div>--}}
{{--                                                        <h4 class="checkout-paymethod-title">--}}
{{--                                                            <div>--}}
{{--                                                                <p class="checkout-paymethod-title-label">--}}
{{--                                                                    کارت به کارت--}}
{{--                                                                </p>--}}
{{--                                                            </div>--}}
{{--                                                        </h4>--}}
{{--                                                        <div class="checkout-paymethod-one-gateway">--}}
{{--                                                            شما می توانید وجه سفارش خود را بصورت انتقال وجه کارت به کارت پرداخت نموده و حداکثر تا 24 ساعت پس از سفارش اطلاعات آن را ثبت نمایید.--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
                                <div class="parent-btn pull-left">
                                    <button type="submit" class="dk-btn dk-btn-info btn_m_top">
                                        پرداخت
                                        <i class="fa fa-arrow-left"></i>
                                    </button>
                                </div>
                            </form>

                        </section>
                    </div>
                </div>
            </div>
        </main>

    </div>


@endsection


@section('scripts')
    <?php
    $url=url('site/check_discount_code');
    $url2=url('site/check_gift_cart');
    ?>
  <script>
      send_code=function ()
      {
          var discount_code=document.getElementById('discount_code').value;
          if(discount_code.trim()!='')
          {
              $.ajaxSetup(
                  {
                      'headers':{
                          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                      }
                  });
              $.ajax({
                  url:'{{ $url }}',
                  type:'POST',
                  data:'discount_code='+discount_code,
                  success:function (data) {
alert(data)
                      if(data=='error')
                      {
                          var html='<p style="padding:20px;">کد تخفیف فعال وارد شده معتبر نمی باشد</p>';
                          $("#loading").html(html);
                      }
                      else
                      {
                           var html='<p style="padding:20px;">'+data+'</p>';
                           $("#discount_box").hide();
                           $("#loading").html(html);
                      }

                  }
              });
          }
      };
      send_gift_cart=function ()
      {
          var gift_cart=document.getElementById('gift_carts').value;

          if(gift_cart.trim()!='')
          {
              $.ajaxSetup(
                  {
                      'headers':{
                          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                      }
                  });
              $.ajax({
                  url:'{{ $url2 }}',
                  type:'POST',
                  data:'gift_cart='+gift_cart,
                  success:function (data) {
                      if(data=='error')
                      {
                          alert('کارت هدیه وارد شده صحیح نمی باشد یا قبلا استفاده شده')
                      }
                      else
                      {
                          var html='<div style="background: #FCF5F5;margin-top: 10px;">' +
                              '<p style="color:red;padding: 20px">' +
                              data +
                              '</p>' +
                              '</div>';

                          $("#gift_cart_message").append(html);
                      }
                  }
              });
          }
      }
  </script>
@endsection
