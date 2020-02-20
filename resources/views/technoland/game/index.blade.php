@extends('technoland.game.master')
@section('title', __('تکنوگیم'))

@section('content')
    <!--start header section-->
    <header class="header">
        <!--start navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="img/logo.png" alt="logo_technoland">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar"
                        aria-controls="myNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav mr-auto navbar-right">
                        <li class="active"><a class="page-scroll" href="#hero">خانه</a></li>
                        <li><a class="page-scroll" href="#products">مقالات گیمینگ</a></li>
                        {{--                            <li><a class="page-scroll" href="#features">ویژگی ها</a></li>--}}
                        <li><a class="page-scroll" href="#faqs">پرسش و پاسخ</a></li>
                        <li><a class="page-scroll" href="#contact">تماس با ما</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--end navbar-->
    </header>
    <!--end header section-->

    <!--start hero section-->
    <section id="hero" class="section-hero section-rotate">
        <div class="section-inner">
        </div>
        <!--background circle shape-->
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="hero-product-img">
                        <div class="offer-badge">
                            <p><strong>خبر</strong>جدید</p>
                        </div>
                        <div class="hero-img-1">
                            <img src="{{url('user/game/img/metro-exodus.jpg')}}" alt="hero-img" class="img-responsive">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="hero-content-wrap-1">
                        <div class="hero-content">
                            <h3 style="text-align: right;color: white;">
                                تاریخ انتشار Metro Exodus برای استیم مشخص شد		</h3>
                            <p>
                                بالاخره پس از گذشت یک سال تاخیر، بازی Metro Exodus هفته آینده در دسترس کاربران فروشگاه استیم قرار می‌گیرد.
                            </p>
                            <div class="slider-action-btn">
                                <a style="cursor: unset;" class="page-scroll btn softo-solid-btn">معرفی</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end hero section-->

    <!--start product section-->
    <section id="products" class="biz-product-section ptb-90">
        <div class="biz-product-wrap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="text-center section-heading">
                            <h3>جدیدترین مقالات گیمینگ</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme biz-products carousel-indicator">
                            @foreach($games as $game)
                                <div class="biz-single-product item">
                                <div class="biz-product-img">
                                    <a href="{{route('techno.show.game',$game->slug)}}">
                                        <img src="{{url($game->url)}}" alt="{{$game->title}}" class="img-responsive">
                                    </a>
                                </div>
                                <div class="biz-product-content">
                                    <p>{{$game->title}}</p>
                                    <div class="product-action-btn text-center mt-20">
                                        <a href="{{route('techno.show.game',$game->slug)}}" class="btn">مشاهده جزئیات</a>
                                    </div>
                                </div>
                            </div>
                             @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end product section-->

    <!--testimonial section start-->
    <section id="faqs" class="testimonial-section ptb-90">
        <div class="testimonial-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="section-heading">
                            <h3>از مشتریان ما بشنوید</h3>
                            <p>
                                تماس های شما
                                <br>
                                هر سوال، انتقاد و یا پیشنهادی دارید می‌توانید آن را به تکنو گیم منتقل کنید</p>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="owl-carousel owl-theme testimonial-slider">
                            @foreach($questions as $question)
                            <div class="item">
                                <div class="single-testimonial-item">
                                    <span class="blockquote-icon"><i class="fa fa-quote-left"></i></span>
                                    <div class="testimonial-content">
                                        <p>{{$question->description}}</p>
                                    </div>
                                    <div class="testimonial-author">
                                        <img src="img/testimonial-4.png" alt="">
                                        <div class="testimonial-author-info">
                                            <h6>{{$question->first_name}} {{$question->last_name}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--testimonial section end-->


    <!--start download section-->
    <section class="download-section ptb-90"
             style="background: url('/user/game/img/wallpaper.jpg')no-repeat center center fixed">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-12">
                    <div class="download-app-text section-heading text-center">
                        <h3>چرا تکنو گیم ؟</h3>
                        <p>
                            تکنو گیم تنها سایت ارائه دهنده فایل های بازی با کیفیت بالا و پشتیبانی فوق العاده میباشد که محصولات خود را به کاربران و طرفداران گیم در ایران به فروش میرساند.

                            ما در تکنو گیم مدعی هستیم بهترین تیم در زمینه « حل مشکلات بازی » در ایرانیم و  رتبه یک گوگل در زمینه حل مشکلات بازی و مقالات گیمینگ میباشیم.
                            <br>
                            <br>
                             اولین نیستیم اما اومدیم بهترین باشیم!
                        </p>
                    </div>
{{--                    <div class="download-app-button text-center">--}}
{{--                        <a href="#" class="download-btn hover-active">--}}
{{--                            <span class="ti-apple"></span>--}}
{{--                            <p>--}}
{{--                                <small>Download On</small>--}}
{{--                                <br> App Store--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                        <a href="#" class="download-btn">--}}
{{--                            <span class="ti-android"></span>--}}
{{--                            <p>--}}
{{--                                <small>Git It On</small>--}}
{{--                                <br>Google Play--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
    <!--end download section-->

    <!--contact us section start-->
    <section id="contact" class="contact-us ptb-90">
        <div class="contact-us-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="section-heading">
                            <h3>تماس با ما</h3>
                            <p>
                                درباره چه چیزی میخواین صحبت کنین؟
                                <br>
                                شما عزیزان می‌توانید از طریق فرم زیر هر گونه سوال انتقاد و یا پیشنهاد خود را برای ما ارسال نمائید و بدانید که تیم تکنو گیم در سریعترین زمان ممکن با شما در تماس خواهند شد و موضوع را پیگیری خواهند کرد.
                            </p>
                        </div>
                        <div class="footer-address">
                            <h6>دفتر مرکزی</h6>
                            <p>{{setting('address')}}</p>
                            <ul>
                                <li><i class="fa fa-phone"></i> <span>تلفن: {{setting('tel')}}</span></li>
                                <li><i class="fa fa-envelope-o"></i> <span>ایمیل : <a
                                                href="mailto:{{setting('email')}}">{{setting('email')}}</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <form action="{{route('user.contact_us')}}" method="post" class="contact-us-form" novalidate="novalidate">
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    <div>{{session('success')}}</div>
                                </div>
                            @endif
                            @csrf
                            <input type="hidden" name="show" value="game">
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}"
                                               placeholder="نام" required="required">
                                        @if($errors->has('first_name'))
                                            <span style="color:red;font-size:13px">{{ $errors->first('first_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <input name="last_name" value="{{old('last_name')}}" class="form-control" type="text"
                                               placeholder="نام خانوادگی ">
                                        @if($errors->has('last_name'))
                                            <span style="color:red;font-size:13px">{{ $errors->first('last_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <div class="form-group">
                                        <input name="email" value="{{old('email')}}" class="form-control" type="email"
                                               placeholder="  ایمیل ">
                                        @if($errors->has('email'))
                                            <span style="color:red;font-size:13px">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                                <textarea name="description" class="form-control" rows="7"
                                                          cols="25"  placeholder=" متن ">{{old('description')}}</textarea>
                                        @if($errors->has('description'))
                                            <span style="color:red;font-size:13px">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-20">
                                    <button type="submit" class="btn softo-solid-btn pull-right"
                                            id="btnContactUs">
                                        ارسال
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--contact us section end-->
@endsection