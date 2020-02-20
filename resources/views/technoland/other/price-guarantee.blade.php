@extends('technoland.layout.master')
@section('title', __('تضمین قیمت کالا'))
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
                                <h1 class="title-tab-content">تضمین قیمت کالا</h1>
                            </div>
                            <div class="content-section default">
                                <div class="contact-details" style="padding: 30px;">
                                       <div class="container well">
                                                <div class="title-head">
                                                    <p style="font-size: 14px;">
                                                        ما تضمین می‌کنیم محصولات عرضه شده در فروشگاه {{setting('name')}} با گارانتی اصل، بالاترین کیفیت و
                                                        ارزان‌ترین قیمت نسبت به سایر فروشگاه‌های فیزیکی و اینترنتی در سراسر کشور است. اگر پس از خرید از
                                                        فروشگاه {{setting('name')}}، متوجه شدید فروشگاهی همان کالا را با شرایط یکسان و قیمتی پایین‌تر ارائه می‌دهد،
                                                        می‌توانید درخواست استفاده از «تضمین قیمت کالا» را ارسال و در صورت تایید، اختلاف قیمت آن را به طور
                                                        کامل از ما دریافت کنید.
                                                    </p>
                                                    <br>
                                                    <h6 style="color: #0DB9FA;">و اما شرایط</h6><br>
                                                    <p style="font-size: 14px;">
                                                        1- فروشگاه‌ها و وب ‌سایت‌های مجاز: مرجع مقایسه قیمت باید فروشگاه مجاز و وبسایت دارای نماد اعتماد
                                                        الکترونیک از وزارت صنعت معدن و تجارت باشد.
                                                    </p>
                                                    <p style="font-size: 14px;">
                                                        2- کالای اصل: از آنجایی که همه کالاهای موجود در فروشگاه {{setting('name')}} اصل هستند، درخواست کالاهای غیر اصل
                                                        رد
                                                        خواهد شد.
                                                    </p>
                                                    <p style="font-size: 14px;">
                                                        3- گارانتی اصل و یکسان: کالاهای مورد مقایسه باید گارانتی و خدمات پس از فروش اصل و یکسان داشته باشند،
                                                        زیرا نوع و کیفیت خدمات گارانتی‌های مختلف بر قیمت آنها نیز تاثیر می‌گذارد.
                                                    </p>
                                                    <p style="font-size: 14px;">
                                                        4- از آنجا که هدف این طرح اطمینان مشتری از خرید با بهترین قیمت است، اگر در قیمت فروشگاه {{setting('name')}}
                                                        به دلیل خرید از جشنواره های فروش یا استفاده تخفیف اعمال شده باشد، ملاک مقایسه، قیمت نهایی و تمام شده
                                                        ای است که مشتری پرداخت می کند.

                                                        5- با توجه به لزوم یکسان بودن شرایط مقایسه، اگر لحاظ کردن مواردی مانند هزینه حمل و نقل یا مالیات بر
                                                        ارزش افزوده، قیمت اولیه اعلام شده توسط فروشنده یا فروشگاه اینترنتی مورد مقایسه را تغییر دهد، ملاک
                                                        مقایسه قیمت فروشگاه {{setting('name')}}، مبلغ نهایی پرداخت شده توسط خریدار خواهد بود.
                                                    </p>

                                                    <br>
                                                    <h6 style="color: #db4360;">درخواست خود را این گونه بفرستید</h6>
                                                    <br>
                                                    <p style="font-size: 14px;">
                                                        - مدارک زیر را همراه کد سفارش خود، به آدرس ایمیل info@technoland.com ارسال کنید:
                                                    </p>
                                                    <p style="font-size: 14px;">
                                                        1- پیش‌فاکتور فروشگاه به صورت عکس یا فایل اسکن شده؛ پیش فاکتور باید:
                                                    </p>
                                                    <p style="font-size: 14px;">
                                                        - شامل نام فروشگاه، اطلاعات تماس، آدرس و مهر فروشگاه، نام خریدار، تاریخ و مدت اعتبار پیش فاکتور،
                                                        اطلاعات محصول و نام گارانتی مربوط به آن باشد.
                                                    </p>
                                                    <p style="font-size: 14px;">
                                                        - تا 24 ساعت بعد از زمان ارسال ایمیل توسط مشتری دارای اعتبار و کالا در آن فروشگاه موجود و قابل
                                                        خریداری باشد.
                                                    </p>
                                                    <p style="font-size: 14px;">
                                                        - صرفا برای همان محصول به صورت تکی باشد. </p>
                                                    <p style="font-size: 14px;">
                                                        2. در فروشگاه‌های اینترنتی، کافی‌ست آدرس فروشگاه اینترنتی و لینک مستقیم صفحه کالای مورد مقایسه به
                                                        آدرس ایمیل ذکر شده ارسال شود. بدیهی است که اگر به وب سایت‌های مرجع مقایسه قیمت لینک داده شود، ایمیل
                                                        ارسالی قابل بررسی نخواهد بود.
                                                    </p>
                                                    <br>
                                                    <h6 style="color: #db4360;">
                                                        درخواست را چه زمانی میتوانید ارسال کنید.
                                                    </h6>
                                                    <br>
                                                    <p style="font-size: 14px;">درخواست مشتری باید حداکثر تا 48 ساعت بعد از فاکتور شدن سفارش، ارسال شود.</p>
                                                    <p style="font-size: 14px;">بررسی ثبت درخواست تا حداکثر 3 روز کاری انجام می‌شود.</p>
                                                    <p style="font-size: 14px;">پس از ارسال استعلام و در صورت تایید قیمت پایین‌تر، اضافه مبلغ پرداخت شده را به حساب شخص واریز
                                                        می‌کنیم.</p>
                                                    <br>
                                                    <h6 style="color: #db4360;">قوانین ما</h6>
                                                    <p style="font-size: 14px;">
                                                        در صورت مشاهده تخلف یا تلاش برای سوءاستفاده از این طرح، حق عدم پذیرش آن درخواست برای فروشگاه موبایل
                                                        ایران محفوظ
                                                        است.
                                                    </p>
                                                    <p style="font-size: 14px;">
                                                        فروشکاه {{setting('name')}} می‌تواند در هر زمان به تشخیص خود شرایط تضمین قیمت کالا را تغییر داده یا ارائه آن را
                                                        متوقف کند.
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