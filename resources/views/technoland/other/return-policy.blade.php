@extends('technoland.layout.master')
@section('title', __('شرایط بازگرداندن کالا '))
<?php
$category = App\Category::where('parent_id', 0)->get();
?>

@section('styles')
    <style>
        .biz-product-content {
            text-align: center;
            padding: 10px;
        }

        .social {
            text-align: center;
            margin: 0 auto;
        }

        a.link.telegram {
            background: #2babf3;
            display: inline-block;
            height: 50px;
            width: 50px;
            border-radius: 50%;
            color: #fff;
            font-size: 30px;
            transform: translateY(-50%);
        }

        a.link.instagram {
            background-color: #E65156;
            display: inline-block;
            height: 50px;
            width: 50px;
            border-radius: 50%;
            color: #fff;
            font-size: 30px;
            transform: translateY(-50%);
        }

        a.link.whatsapp {
            background-color: #5BFA7A;
            display: inline-block;
            height: 50px;
            width: 50px;
            border-radius: 50%;
            color: #fff;
            font-size: 30px;
            transform: translateY(-50%);
        }

        .social span {
            padding-top: 10px;
        }

        a.link.telegram:hover {
            border-radius: 0%;
            transition-duration: 1s;
            -webkit-transition-duration: 1s;
            border: 2px solid #2babf3;
            background: transparent;
            color: #2babf3;
        }

        a.link.instagram:hover {
            border-radius: 0%;
            transition-duration: 1s;
            -webkit-transition-duration: 1s;
            border: 2px solid #E65156;
            background: transparent;
            color: #E65156;
        }

        a.link.whatsapp:hover {
            border-radius: 0%;
            transition-duration: 1s;
            -webkit-transition-duration: 1s;
            border: 2px solid #5BFA7A;
            background: transparent;
            color: #5BFA7A;
        }
    </style>
@endsection

@section('content')
    <main class="profile-user-page default">
        <div class="container">
            <div class="row">
                <div class="profile-page col-xl-12 col-lg-12 col-md-12 order-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="col-12">
                                <h1 class="title-tab-content">شرایط بازگرداندن کالا </h1>
                            </div>
                            <div class="content-section default">
                                <div class="contact-details" style="padding: 30px;">
                                    <div class="container well">
                                        <div class="title-head">
                                            <p style="font-size: 14px;">
                                                آسودگی خاطر و رضایت مندی مشتریان همواره از الویت‏‌های فروشگاه {{setting('name')}} بوده است و فروشگاه موبایل
                                                ایران در این راستا می‏‌کوشد تا هر سفارش در شرایط مطلوب و مورد انتظار به دست مشتری برسد. با وجود این
                                                ممکن است مشتریان محترم پس از خرید، با مسایلی روبرو شوند که درچنین مواردی خدماتی در چارچوب خدمات پس
                                                از فروش در نظر گرفته شده است. با توجه به کالای ارایه شده در وب سایت فروشگاه {{setting('name')}}، کلیه
                                                محصولاتی که باید از نظر فیزیکی سالم به دست مصرف کننده برسند )مانند کالاهای گروه‌ موبایل و تبلت)
                                                دارای گارانتی اصالت و سلامت فیزیکی هستند و مشمول 7 روز مهلت تست و بازگشت کالا می‌شوند. فروشگاه
                                                {{setting('name')}} 7 روز فرصت برای بازگشت درنظر گرفته است.
                                            </p>
                                            <br>
                                            <h5 style="color: #0DB9FA;">
                                                استفاده از 7 روز ضمانت بازگشت چه شرایطی دارد؟
                                            </h5><br>
                                            <p style="font-size: 14px;">
                                                1- اگر کالای خریداری شده، ایراد یا اشکال فنی داشته باشد
                                            </p>
                                            <p style="font-size: 14px;">
                                                2- اگر کالای خریداری شده از نظر مشخصات یا ظاهر فیزیکی با اطلاعات وب سایت مغایرت داشته باشد.
                                            </p>
                                            <p style="font-size: 14px;">
                                                3- اگر کالای خریداری شده، آسیب دیدگی یا ایراد فیزیکی و ظاهری داشته باشد.
                                            </p>
                                            {{--<p>--}}
                                            {{--4-اگر مشتری از خرید خود منصرف شود.--}}
                                            {{--</p>--}}
                                            <p style="font-size: 14px;">
                                                4- اگر در اثر حمل و نقل، آسیب دیدگی ایجاد شده باشد
                                            </p>
                                            <br>
                                            <h5 style="color: #db4360;">کالا را چطور ارسال کنید؟</h5><br>
                                            <p style="font-size: 14px;">
                                                - لطفاً قبل از هر اقدامی با کارشناسان پشتیبانی خدمات پس از فروش تماس بگیرید.
                                            </p>
                                            <p style="font-size: 14px;">
                                                - از ارسال کالا بدون هماهنگی با پشتیبانی فروشگاه {{setting('name')}} جداً، خودداری کنید.
                                            </p>
                                            <p style="font-size: 14px;">
                                                - برای ارسال، باید کالا در جعبه یا کارتن اصلی خود به ‏خوبی بسته‌بندی شود و لوازم جانبی و همه اقلام
                                                همراه
                                                مانند کابل، باطری، دفترچه راهنما، کارت گارانتی، کارت بیمه، بند و قطعات بسته بندی به همراه کالای اصلی
                                                ارسال شود.
                                            </p>
                                            <p style="font-size: 14px;">
                                                - برچسب زدن یا نوشتن توضیحات، آدرس یا هر مورد دیگری روی کارتن یا جعبه اصلی کالا و یا پاره و مخدوش
                                                کردن
                                                آن، امکان استفاده از ضمانت بازگشت را از بین خواهد برد. (در صورت لزوم، توضیحات خود را پشت فاکتور خرید
                                                یا
                                                قطعه کاغذ جداگانه‌ای بنویسید.)
                                            </p>
                                            <p style="font-size: 14px;">
                                                -درصورت ارسال با پست پیشتاز، عکس و تصویری از رسید پستی تهیه و به آدرس info@technoland.com ایمیل کنید.
                                            </p>
                                            <p style="font-size: 14px;">
                                                - در صورتی که ساکن سایر شهرها هستید، برای بازگرداندن کالا از پست پیشتاز استفاده کنید. لازم به ذکر
                                                است که
                                                هزینه‌های بازگرداندن کالا به غیر از پست پیشتاز به عهده مشتری است و شرکت تعهدی در قبال این هزینه‌ها
                                                ندارد. ولی هزینه پست پیشتاز با ارائه فاکتور و قبض شرکت پست بر اساس تعرفه‌های شرکت پست و طبق قوانین و
                                                دستورالعمل‌های شرکت، پس از تایید خدمات پس از فروش به حساب مشتری واریز می‌شود.
                                            </p>
                                            <p style="font-size: 14px;">
                                                از آنجا که واریز هزینه ارسال، منوط به دریافت رسید پستی است، برای اطمینان عکس و تصویری از رسید تهیه و
                                                آن
                                                را به آدرس info@technoland.com ایمیل کنید.

                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-3 my-5">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <i class="fa fa-phone fa-3x mb-3" style="color: #69ca6d" aria-hidden="true"></i>
                                                    <h6 class="text-uppercase mb-5"> تلفن </h6>
                                                    <p>{{setting('tel')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3 my-5">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <i style="color: #fa3c55" class="fa fa-mobile fa-3x mb-3" aria-hidden="true"></i>
                                                    <h6 class="text-uppercase mb-5">شماره موبایل</h6>
                                                    <p> {{setting('mobile')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3 my-5">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <i style="color: #3d42ff" class="fa fa-map-marker fa-3x mb-3" aria-hidden="true"></i>
                                                    <h6 class="text-uppercase mb-5">آدرس</h6>
                                                    <p>{{setting('address')}} </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-6 col-lg-3 my-5">
                                            <div class="card border-0">
                                                <div class="card-body text-center">
                                                    <i style="color: #2ca8ff" class="fa fa-globe fa-3x mb-3" aria-hidden="true"></i>
                                                    <h6 class="text-uppercase mb-5">ایمیل</h6>
                                                    <p>{{setting('email')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="social">
                                            <a href="{{setting('telegram')}}" class="link telegram" title="تلگرام"><span
                                                        class="fa fa-telegram"></span></a>
                                            <a href="{{setting('instagram')}}" class="link instagram"
                                               title="اینستاگرام"><span class="fa fa-instagram"></span></a>
                                            <a href="{{setting('whatsapp')}}" class="link whatsapp"
                                               title="واتس اپ"><span class="fa fa-whatsapp"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection



