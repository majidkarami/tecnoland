@extends('technoland.layout.master')
@section('title', __('صفحه اصلی'))

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ url('user/css/flipclock.css') }}">
@endsection

@section('content')
    <main class="main default">
        <div class="container">
            <!-- banner -->
            <div class="row banner-ads">
                <div class="col-12">
                    <section class="banner">
                        <a href="#">
                            <img src="{{ asset('user/img/banner/banner.jpg') }}" alt="">
                        </a>
                    </section>
                </div>
            </div>
            <!-- banner -->
            <div class="row">

                <aside class="sidebar col-12 col-lg-3 order-2 order-lg-1">
                    <div class="sidebar-inner default">
                        <div class="widget-banner widget card">
                            <a href="#" target="_top">
                                <img class="img-fluid" src="{{ asset('user/img/banner/1455.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="widget-services widget card">
                            <div class="row">
                                <div class="feature-item col-12">
                                    <a href="#" target="_blank">
                                        <img src="{{ asset('user/img/svg/return-policy.svg') }}">
                                    </a>
                                    <p>ضمانت برگشت</p>
                                </div>
                                <div class="feature-item col-6">
                                    <a href="#" target="_blank">
                                        <img src="{{ asset('user/img/svg/payment-terms.svg') }}">
                                    </a>
                                    <p>پرداخت درمحل</p>
                                </div>
                                <div class="feature-item col-6">
                                    <a href="#" target="_blank">
                                        <img src="{{ asset('user/img/svg/delivery.svg') }}">
                                    </a>
                                    <p>تحویل اکسپرس</p>
                                </div>
                                <div class="feature-item col-6">
                                    <a href="#" target="_blank">
                                        <img src="{{ asset('user/img/svg/origin-guarantee.svg') }}">
                                    </a>
                                    <p>تضمین بهترین قیمت</p>
                                </div>
                                <div class="feature-item col-6">
                                    <a href="#" target="_blank">
                                        <img src="{{ asset('user/img/svg/contact-us.svg') }}">
                                    </a>
                                    <p>پشتیبانی 24 ساعته</p>
                                </div>
                            </div>
                        </div>
                        <div class="widget-suggestion widget card">
                            <header class="card-header">
                                <h3 class="card-title">پیشنهاد لحظه ای</h3>
                            </header>
                            <div id="progressBar">
                                <div class="slide-progress"></div>
                            </div>
                            <div id="suggestion-slider" class="owl-carousel owl-theme">
                                @foreach($random_product as $key=>$value)
                                <div class="item">
                                    @if(!empty($value->get_img->url))
                                    <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                        <img src="{{ url($value->get_img->url) }}" class="w-100"
                                             alt="{{$value->title}}">
                                    </a>

                                        @else
                                        <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                            <img src="{{ asset('/user/img/not-img.png') }}"
                                                 class="img-fluid" alt="{{$value->title}}">
                                        </a>
                                    @endif
                                    <h3 class="product-title">
                                        <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                            @if(strlen($value->title)>50)
                                                {{ mb_substr($value->title,0,33).' ... ' }}
                                            @else
                                                {{ $value->title }}
                                            @endif
                                        </a>
                                    </h3>
                                    <div class="price">
                                            <del><span>
                                                    @if(!empty($value->discounts) && !empty($value->price))
                                                        {{ number_format($value->price) }}
                                                    @endif
                                                            <span>تومان</span></span>
                                            </del>

                                        <span class="amount">
                                           @if(!empty($value->discounts) && !empty($value->price))
                                                {{ number_format($value->price-$value->discounts) }}
                                            @elseif(!empty($value->price))
                                                {{ number_format($value->price) }}
                                            @endif
                                            <span>تومان</span></span>
                                    </div>
                                </div>
                               @endforeach
                            </div>
                        </div>
                        <div class="widget-banner widget card">
                            <a href="#" target="_blank">
                                <img class="img-fluid" src="{{ asset('user/img/banner/1000001422.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="widget-banner widget card">
                            <a href="#" target="_blank">
                                <img class="img-fluid" src="{{ asset('user/img/banner/side-banner-01.jpeg') }}" alt="">
                            </a>
                        </div>
                        <div class="widget-banner widget card">
                            <a href="#" target="_top">
                                <img class="img-fluid" src="{{ asset('user/img/banner/1000001322.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="widget-banner widget card">
                            <a href="#" target="_blank">
                                <img class="img-fluid" src="{{ asset('user/img/banner/1000001442.jpg') }}" alt="">
                            </a>
                        </div>
                        <div class="widget-banner widget card">
                            <a href="#" target="_blank">
                                <img class="img-fluid"
                                     src="{{ asset('user/img/banner/8d546388-29d7-4733-871f-2d84a3012cc227_21_1_6.jpeg') }}"
                                     alt="">
                            </a>
                        </div>
                        <div class="widget-banner widget card">
                            <a href="#" target="_blank">
                                <img class="img-fluid" src="{{ asset('user/img/banner/1000001422.jpg') }}" alt="">
                            </a>
                        </div>
                    </div>
                </aside>

                <div class="col-12 col-lg-9 order-1 order-lg-2">
                    @if(sizeof($slider)>0)
                        <section id="main-slider" class="carousel slide carousel-fade card" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach($slider as $key=>$value)
                                    <li data-target="#main-slider" data-slide-to="{{$key}}"
                                        class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                @foreach($slider as $key=>$value)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <a class="d-block">
                                            <img src="{{ url($value->url) }}"
                                                 class="d-block w-100" alt="{{$value->title}}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#main-slider" role="button" data-slide="prev">
                                <i class="now-ui-icons arrows-1_minimal-right"></i>
                            </a>
                            <a class="carousel-control-next" href="#main-slider" data-slide="next">
                                <i class="now-ui-icons arrows-1_minimal-left"></i>
                            </a>
                        </section>
                    @endif


                    @if(sizeof($amazing)>0)

                        <?php

                        $array = array(
                            6 => 'هزار تومان',
                            7 => 'میلیون تومان'
                        )

                        ?>
                        <section id="amazing-slider" class="carousel slide carousel-fade card" data-ride="carousel">
                            <div class="row m-0">
                                <ol class="carousel-indicators pr-0 d-flex flex-column col-lg-3">
                                    @foreach($amazing as $key=>$value)
{{--                                        @if($value->timestamp > time())--}}
                                        <li class="{{ $loop->first ? 'active' : '' }}" data-target="#amazing-slider"
                                            data-slide-to="{{$key}}">
                                            <span> {{ $value->m_title }} </span>
                                        </li>
{{--                                        @endif--}}
                                    @endforeach
                                    <li class="view-all">
                                        <a href="#" class="btn btn-primary btn-block hvr-sweep-to-left">
                                            <i class="fa fa-arrow-left"></i>مشاهده همه شگفت انگیزها
                                        </a>
                                    </li>
                                </ol>
                                <div class="carousel-inner p-0 col-12 col-lg-9">
                                    <img class="amazing-title"
                                         src="{{ asset('user/img/amazing-slider/amazing-title-01.png') }}"
                                         alt="">
                                    @foreach($amazing as $key=>$value)

{{--                                        @if($value->timestamp > time())--}}
                                        <?php

                                        $url = url('') . '/product/';
                                        if ($value->get_product) {
                                            $url .= $value->get_product->code_url . '/' . $value->get_product->title_url;
                                        }
                                        ?>
                                        <a href="{{ $url }}">
                                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">

                                                <div class="row m-0">
                                                    <div class="right-col col-5 d-flex align-items-center" style="top: -20px;">
                                                        @if($value->get_img)
                                                            <a class="w-100 text-center" href="#">
                                                                <img src="{{ url($value->get_img->url) }}"
                                                                     class="img-fluid" alt="">
                                                            </a>
                                                        @endif
                                                    </div>
                                                    <div class="left-col col-7">
                                                        <div class="price">
                                                            <del>
                                                                <span>
                                                                   <?php
                                                                    $price1 = str_replace('000', '', $value->price1);
                                                                    ?>
                                                                    {{ number_format($price1) }}

                                                                        <span>تومان</span>
                                                                 </span>
                                                            </del>
                                                            <ins>
                                                                    <span>
                                                                         <?php
                                                                        $price2 = str_replace('000', '', $value->price1 - $value->price2);
                                                                        $price3 = $value->price1 - $value->price2;
                                                                        ?>
                                                                        {{ number_format($price2) }}<span
                                                                                style="padding-right:5px;"></span> {{ array_key_exists(strlen($price3),$array) ? $array[strlen($price3)] : '' }}
                                                                     <span></span></span>
                                                            </ins>

                                                            <span class="discount-percent">{{difference($value->price1,$value->price2,1)}} تخفیف </span>
                                                        </div>
                                                        <h2 class="product-title">
                                                            <a href="#"> {!! Str::limit($value->title, 50, '...') !!} </a>
                                                        </h2>
                                                        <ul class="list-group" style="margin-top: -22px;">
                                                            <li style="font-size: small;">{!!   nl2br($value->tozihat) !!} </li>
                                                        </ul>
                                                        <hr>
                                                        <div class="timer-title">زمان باقی مانده تا پایان سفارش</div>
                                                        <div class="clock" id="amazing_clock_{{ $key }}" style="margin-top: 20px;">
                                                        </div>

                                                        <div class="Finished_Badge" id="amazing_img_{{ $key }}"
                                                             style="display:none;margin-top: 20px;">
                                                            <img src="{{ url('user/img/Finished_Badge.png') }}">
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </a>

{{--                                        @endif--}}
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    @endif

                    <div class="row" id="amazing-slider-responsive">
                        <div class="col-12">
                            <div class="widget widget-product card">
                                <header class="card-header">
                                    <img src="{{ asset('user/img/amazing-slider/amazing-title-01.png') }}" width="150px"
                                         alt="">
                                    <a href="#" class="view-all">مشاهده همه</a>
                                </header>
                                <div class="product-carousel owl-carousel owl-theme">
                                    <div class="item">
                                        <a href="#">
                                            <img src="{{ asset('user/img/product-slider/60eb20-200x200.jpg') }}"
                                                 class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">لپ تاپ ۱۱٫۶ اینچی دل مدل INSPIRON 3168 -AC B</a>
                                        </h2>
                                        <div class="price">
                                            <ins><span>4,180,000<span>تومان</span></span></ins>
                                        </div>
                                        <hr>
                                        <div class="countdown-timer" countdown data-date="05 02 2019 20:20:22">
                                            <span data-days>0</span>:
                                            <span data-hours>0</span>:
                                            <span data-minutes>0</span>:
                                            <span data-seconds>0</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <a href="#">
                                            <img src="{{ asset('user/img/product-slider/4ff777-200x200.jpg') }}"
                                                 class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">لپ تاپ ۱۴ اینچی دل مدل vostro 5471</a>
                                        </h2>
                                        <div class="price">
                                            <ins><span>6,580,000<span>تومان</span></span></ins>
                                        </div>
                                        <hr>
                                        <div class="countdown-timer" countdown data-date="05 02 2019 20:20:22">
                                            <span data-days>0</span>:
                                            <span data-hours>0</span>:
                                            <span data-minutes>0</span>:
                                            <span data-seconds>0</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <a href="#">
                                            <img src="{{ asset('user/img/product-slider/35a2b8-200x200.jpg') }}"
                                                 class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">لپ تاپ ۱۵ اینچی دل مدل Latitude 5580</a>
                                        </h2>
                                        <div class="price">
                                            <ins><span>4,699,000<span>تومان</span></span></ins>
                                        </div>
                                        <hr>
                                        <div class="countdown-timer" countdown data-date="05 02 2019 20:20:22">
                                            <span data-days>0</span>:
                                            <span data-hours>0</span>:
                                            <span data-minutes>0</span>:
                                            <span data-seconds>0</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <a href="#">
                                            <img src="{{ asset('user/img/product-slider/9b3da9-200x200.jpg') }}"
                                                 class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 15-3567 - I</a>
                                        </h2>
                                        <div class="price">
                                            <ins><span>2,780,000<span>تومان</span></span></ins>
                                        </div>
                                        <hr>
                                        <div class="countdown-timer" countdown data-date="05 02 2019 20:20:22">
                                            <span data-days>0</span>:
                                            <span data-hours>0</span>:
                                            <span data-minutes>0</span>:
                                            <span data-seconds>0</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <a href="#">
                                            <img src="{{ asset('user/img/product-slider/c8297f-200x200.jpg') }}"
                                                 class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">لپ تاپ ۱۵ اینچی دل مدل INSPIRON 7577 - D</a>
                                        </h2>
                                        <div class="price">
                                            <ins><span>8,899,000<span>تومان</span></span></ins>
                                        </div>
                                        <hr>
                                        <div class="countdown-timer" countdown data-date="05 02 2019 20:20:22">
                                            <span data-days>0</span>:
                                            <span data-hours>0</span>:
                                            <span data-minutes>0</span>:
                                            <span data-seconds>0</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <a href="#">
                                            <img src="{{ asset('user/img/product-slider/a579bb-200x200.jpg') }}"
                                                 class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">لپ تاپ ۱۵ اینچی دل مدل Inspiron 15-5570 - B</a>
                                        </h2>
                                        <div class="price">
                                            <ins><span>4,279,000<span>تومان</span></span></ins>
                                        </div>
                                        <hr>
                                        <div class="countdown-timer" countdown data-date="05 02 2019 20:20:22">
                                            <span data-days>0</span>:
                                            <span data-hours>0</span>:
                                            <span data-minutes>0</span>:
                                            <span data-seconds>0</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <a href="#">
                                            <img src="{{ asset('user/img/product-slider/19a2cc-200x200.jpg') }}"
                                                 class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">لپ تاپ ۱۵ اینچی دل مدل XPS 15-9560</a>
                                        </h2>
                                        <div class="price">
                                            <ins><span>18,450,000<span>تومان</span></span></ins>
                                        </div>
                                        <hr>
                                        <div class="countdown-timer" countdown data-date="05 02 2019 20:20:22">
                                            <span data-days>0</span>:
                                            <span data-hours>0</span>:
                                            <span data-minutes>0</span>:
                                            <span data-seconds>0</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row banner-ads">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 col-lg-3">
                                    <div class="widget-banner card">
                                        <a href="#" target="_blank">
                                            <img class="img-fluid" src="{{ asset('user/img/banner/banner-1.jpg') }}"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="widget-banner card">
                                        <a href="#" target="_top">
                                            <img class="img-fluid" src="{{ asset('user/img/banner/banner-2.jpg') }}"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="widget-banner card">
                                        <a href="#" target="_top">
                                            <img class="img-fluid" src="{{ asset('user/img/banner/banner-3.jpg') }}"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">
                                    <div class="widget-banner card">
                                        <a href="#" target="_top">
                                            <img class="img-fluid" src="{{ asset('user/img/banner/banner-4.jpg') }}"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="widget widget-product card">
                                <header class="card-header">
                                    <h3 class="card-title">
                                        <span>جدید ترین محصولات فروشگاه</span>
                                    </h3>
                                    <a href="#" class="view-all">مشاهده همه</a>
                                </header>
                                <div class="product-carousel owl-carousel owl-theme">
                                    @foreach($product as $key=>$value)
                                        <div class="item">
                                            @if(!empty($value->get_img->url))
                                                <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                                    <img src="{{ url($value->get_img->url) }}"
                                                         class="img-fluid" alt="{{$value->title}}">
                                                </a>
                                                @else
                                                <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                                    <img src="{{ asset('/user/img/not-img.png') }}"
                                                         class="img-fluid" alt="{{$value->title}}">
                                                </a>
                                            @endif
                                            <h2 class="post-title">
                                                <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                                    @if(strlen($value->title)>50)
                                                        {{ mb_substr($value->title,0,33).' ... ' }}
                                                    @else
                                                        {{ $value->title }}
                                                    @endif
                                                </a>
                                            </h2>
                                            <div class="price">
                                                <div class="text-center"
                                                     @if(!empty($value->discounts) && !empty($value->price)) style="background: #F5F6F7;border-radius: 5px" @endif>
                                                    <del>
                                                    <span>
                                                        @if(!empty($value->discounts) && !empty($value->price))
                                                            {{ number_format($value->price) }}
                                                        @endif
                                                        <span>تومان</span>
                                                    </span>
                                                    </del>
                                                </div>
                                                <div class="text-center">
                                                    <ins>
                                                    <span>
                                                           @if(!empty($value->discounts) && !empty($value->price))
                                                            {{ number_format($value->price-$value->discounts) }}
                                                        @elseif(!empty($value->price))
                                                            {{ number_format($value->price) }}
                                                        @endif
                                                        <span>تومان</span>
                                                    </span>
                                                    </ins>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="widget widget-product card">
                                <header class="card-header">
                                    <h3 class="card-title">
                                        <span>پر فروش ترین محصولات فروشگاه</span>
                                    </h3>
                                    <a href="#" class="view-all">مشاهده همه</a>
                                </header>
                                <div class="product-carousel owl-carousel owl-theme">
                                    @foreach($order_product as $key=>$value)
                                    <div class="item">
                                        <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                            @if(!empty($value->get_img->url))
                                            <img src="{{ url($value->get_img->url) }}"
                                                 class="img-fluid" alt="{{$value->title}}">

                                            @else
                                                <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                                    <img src="{{ asset('/user/img/not-img.png') }}"
                                                         class="img-fluid" alt="{{$value->title}}">
                                                </a>
                                             @endif
                                        </a>
                                        <h2 class="post-title">
                                            <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                                @if(strlen($value->title)>50)
                                                    {{ mb_substr($value->title,0,33).' ... ' }}
                                                @else
                                                    {{ $value->title }}
                                                @endif
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <div class="text-center"
                                                 @if(!empty($value->discounts) && !empty($value->price)) style="background: #F5F6F7;border-radius: 5px" @endif>
                                                    <del><span>
                                                            @if(!empty($value->discounts) && !empty($value->price))
                                                                {{ number_format($value->price) }}
                                                            @endif
                                                            <span>تومان</span></span>
                                                    </del>
                                            </div>
                                            <ins><span>
                                                    @if(!empty($value->discounts) && !empty($value->price))

                                                        {{ number_format($value->price-$value->discounts) }}
                                                    @elseif(!empty($value->price))

                                                        {{ number_format($value->price) }}
                                                    @endif
                                                    <span>تومان</span></span>
                                            </ins>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row banner-ads">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="widget-banner card">
                                        <a href="#" target="_blank">
                                            <img class="img-fluid" src="{{ asset('user/img/banner/banner-9.jpg') }}"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="widget-banner card">
                                        <a href="#" target="_top">
                                            <img class="img-fluid" src="{{ asset('user/img/banner/banner-10.jpg') }}"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="widget widget-product card">
                                <header class="card-header">
                                    <h3 class="card-title">
                                        <span>پر بازدید ترین محصولات فروشگاه</span>
                                    </h3>
                                    <a href="#" class="view-all">مشاهده همه</a>
                                </header>
                                <div class="product-carousel owl-carousel owl-theme">
                                    @foreach($view_product as $key=>$value)
                                    <div class="item">
                                        @if(!empty($value->get_img->url))
                                        <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                            <img src="{{ url($value->get_img->url)}}"
                                                 class="img-fluid" alt="{{$value->title}}">
                                        </a>
                                        @else
                                            <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                                <img src="{{ asset('/user/img/not-img.png') }}"
                                                     class="img-fluid" alt="{{$value->title}}">
                                            </a>
                                        @endif
                                        <h2 class="post-title">
                                            <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                                @if(strlen($value->title)>50)
                                                    {{ mb_substr($value->title,0,33).' ... ' }}
                                                @else
                                                    {{ $value->title }}
                                                @endif
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <div class="text-center"
                                                 @if(!empty($value->discounts) && !empty($value->price)) style="background: #F5F6F7;border-radius: 5px" @endif>
                                                <del><span>
                                                            @if(!empty($value->discounts) && !empty($value->price))
                                                            {{ number_format($value->price) }}
                                                        @endif
                                                            <span>تومان</span></span>
                                                </del>
                                            </div>
                                            <ins><span>
                                                   @if(!empty($value->discounts) && !empty($value->price))

                                                        {{ number_format($value->price-$value->discounts) }}
                                                    @elseif(!empty($value->price))
                                                        {{ number_format($value->price) }}
                                                    @endif
                                                    <span>تومان</span></span>
                                            </ins>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="widget widget-product card">
                                <header class="card-header">
                                    <h3 class="card-title">
                                        <span>گوشی موبایل</span>
                                    </h3>
                                    <a href="#" class="view-all">مشاهده همه</a>
                                </header>
                                <div class="product-carousel owl-carousel owl-theme">
                                    @foreach($cat_product->where('cat_id', 3) as $key=>$value)
                                        @php
                                             $products = App\Product::where('id',$value->product_id)->get();
                                        @endphp
                                        @foreach($products as $product)
                                    <div class="item">
                                            @if(!empty($product->get_img->url))
                                        <a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}">
                                            <img src="{{ url($product->get_img->url)}}"
                                                 class="img-fluid" alt="{{$product->title}}">
                                        </a>
                                        @else
                                            <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                                <img src="{{ asset('/user/img/not-img.png') }}"
                                                     class="img-fluid" alt="{{$value->title}}">
                                            </a>
                                        @endif
                                        <h2 class="post-title">
                                            <a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}">
                                                @if(strlen($product->title)>50)
                                                    {{ mb_substr($product->title,0,33).' ... ' }}
                                                @else
                                                    {{ $product->title }}
                                                @endif
                                            </a>
                                        </h2>
                                        <div class="price">
                                            <div class="text-center"
                                                 @if(!empty($product->discounts) && !empty($product->price)) style="background: #F5F6F7;border-radius: 5px" @endif>
                                                <del><span>
                                                            @if(!empty($product->discounts) && !empty($product->price))
                                                            {{ number_format($product->price) }}
                                                        @endif
                                                            <span>تومان</span></span>
                                                </del>
                                            </div>
                                            <ins>
                                                <span>
                                                   @if(!empty($product->discounts) && !empty($product->price))

                                                        {{ number_format($product->price-$product->discounts) }}
                                                    @elseif(!empty($product->price))
                                                        {{ number_format($product->price) }}
                                                    @endif
                                                    <span>تومان</span>
                                                </span>
                                            </ins>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row banner-ads">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <div class="widget widget-banner card">
                                        <a href="#" target="_blank">
                                            <img class="img-fluid" src="{{ asset('user/img/banner/banner-11.jpg') }}"
                                                 alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="widget widget-product card">
                                <header class="card-header">
                                    <h3 class="card-title">
                                        <span>موبایل و لوازم جانبی</span>
                                    </h3>
                                    <a href="#" class="view-all">مشاهده همه</a>
                                </header>
                                <div class="product-carousel owl-carousel owl-theme">
                                    <div class="item">
                                        <a href="#">
                                            <img src="{{ asset('user/img/product-slider/60eb20-200x200.jpg') }}"
                                                 class="img-fluid" alt="">
                                        </a>
                                        <h2 class="post-title">
                                            <a href="#">لپ تاپ ۱۱٫۶ اینچی دل مدل INSPIRON 3168 -AC B</a>
                                        </h2>
                                        <div class="price">
                                            <del><span>4,299,000<span>تومان</span></span></del>
                                            <ins><span>4,180,000<span>تومان</span></span></ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="brand-slider card">
                        <header class="card-header">
                            <h3 class="card-title"><span>برندهای ویژه</span></h3>
                        </header>
                        <div class="owl-carousel">
                            <div class="item">
                                <a href="#">
                                    <img src="{{ asset('user/img/brand/1076.png') }}" alt="">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="{{ asset('user/img/brand/1078.png') }}" alt="">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="{{ asset('user/img/brand/1080.png') }}" alt="">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="{{ asset('user/img/brand/2315.png') }}" alt="">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="{{ asset('user/img/brand/5189.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop

@section('scripts')
    <script type="text/javascript" src="{{ url('user/js/flipclock.min.js') }}"></script>
    <script>
        var amazing_time = new Array;
        var i = 0;
        <?php
            foreach ($amazing as $key=>$value)
            {
            $time = ($value->timestamp - time() > 0) ? $value->timestamp - time() : 0;
            ?>
            amazing_time[i] ={{$time}};
        i++;
        <?php
        }
        ?>
    </script>
    <script>
        for (var j = 0; j < amazing_time.length; j++) {
            var clock;
            clock = $('#amazing_clock_' + j).FlipClock({
                clockFace: 'HourlyCounter',
                autoStart: false,
                id: 'c_' + j,
                callbacks: {
                    stop: function () {
                        var a = this.id.replace('c_', '');
                        $('#amazing_clock_' + a).hide();
                        $('#amazing_img_' + a).show();
                    }
                }
            });
            clock.setTime(amazing_time[j]);
            clock.setCountdown(true);
            clock.start();
        }
    </script>
@endsection