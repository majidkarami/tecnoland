@extends('technoland.layout.master')
@section('title', __('حریم خصوصی'))
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
                                <h1 class="title-tab-content">حریم خصوصی</h1>
                            </div>
                            <div class="content-section default">
                                <div class="contact-details" style="padding: 30px;">
                                    <div class="container well">
                                        <div class="title-head">
                                            <p style="font-size: 14px;">
                                                فروشگاه {{setting('name')}} ضمن احترامی که برای حریم شخصی کاربران خود قائل است، برای خرید، ثبت نظر یا استفاده از برخی امکانات وب سایت اطلاعاتی را از کاربران درخواست می‌کند تا بتواند خدماتی امن و مطمئن را به کاربران ارائه دهد. برای پردازش و ارسال سفارش، اطلاعاتی مانند آدرس، شماره تلفن و ایمیل مورد نیاز است و از آنجا که کلیه فعالیت‌های فروشگاه {{setting('name')}} قانونی و مبتنی بر قوانین تجارت الکترونیک صورت می‌گیرد و طی فرایند خرید، فاکتور رسمی و بنا به درخواست مشتریان حقوقی گواهی ارزش افزوده صادر می‌شود، از این رو وارد کردن  اطلاعاتی مانند نام و کد ملی برای اشخاص حقیقی یا کد اقتصادی و شناسه ملی برای خریدهای سازمانی لازم است. همچنین آدرس  ایمیل  و تلفن‌هایی که مشتری در پروفایل خود ثبت می‌کند، تنها  آدرس ایمیل و تلفن‌های رسمی و مورد تایید مشتری است  و تمام مکاتبات  و پاسخ‌های فروشگاه از طریق آنها صورت می‌گیرد.
                                                بنابراین درج آدرس، ایمیل و شماره تماس‌های همراه و ثابت توسط مشتری، به منزله مورد تایید بودن صحت آنها است و در صورتی که این موارد به صورت صحیح یا کامل درج نشده باشد، فروشگاه {{setting('name')}} جهت اطمینان از صحت و قطعیت ثبت سفارش می‌تواند از مشتری، اطلاعات تکمیلی و بیشتری درخواست کند.
                                                <br>
                                                مشتریان می‌توانند نام، آدرس و تلفن شخص دیگری را برای تحویل گرفتن سفارش وارد کنند و فروشگاه {{setting('name')}} تنها برای ارسال همان سفارش، از این اطلاعات استفاده خواهد کرد.
                                                <br>
                                                بنابراین ارسال هرگونه پیامک تحت عنوان فروشگاه {{setting('name')}}، با هر شماره دیگری تخلف و سوء استفاده از نام فروشگاه {{setting('name')}} است و در صورت دریافت چنین پیامکی، لطفاً جهت پیگیری قانونی آن را به Info@technoland.com اطلاع دهید.
                                                <br>
                                                فروشگاه {{setting('name')}} ممکن است نقد و نظرهای ارسالی کاربران را در راستای رعایت  قوانین وب سایت ویرایش کند. همچنین اگر نظر یا پیام ارسال شده توسط کاربر، مشمول مصادیق محتوای مجرمانه باشد، فروشگاه {{setting('name')}} می‌تواند از اطلاعات ثبت شده برای پیگیری قانونی استفاده کند.
                                                <br>
                                                حفظ و نگهداری رمز عبور و نام کاربری بر عهده کاربران است و برای جلوگیری از هرگونه سوء استفاده احتمالی، کاربران نباید آن را برای شخص دیگری فاش کنند.همچنین در صورتی که کاربر شماره همراه خود را به فردی دیگر واگذار کرد، جهت جلوگیری از سواستفاده یا مشکلات احتمالی کاربران باید شماره فروشگاه موبایل خود را در پروفایل تغییر داده و شماره جدیدی ثبت نمایند. فروشگاه {{setting('name')}} هویت شخصی کاربران را محرمانه می‌داند و اطلاعات شخصی آنان را به هیچ شخص یا سازمان دیگری منتقل نمی‌کند، مگر اینکه با حکم قانونی مجبور باشد در اختیار مراجع ذی‌صلاح قرار دهد.
                                                <br>
                                                فروشگاه {{setting('name')}} همانند سایر وب سایت‌ها از جمع آوری ای پی و کوکی‌ها استفاده می‌کند، اما پروتکل، سرور و لایه‌های امنیتی فروشگاه {{setting('name')}} و روش‌های مناسب مدیریت داده‌ها اطلاعات کاربران را محافظت و از دسترسی‌های غیر قانونی جلوگیری می‌کند.
                                                <br>
                                                فروشگاه {{setting('name')}} برای حفاظت و نگهداری اطلاعات و حریم شخصی کاربران همه توان خود را به کار می‌گیرد و امیدوار است که تجربه‌ی خریدی امن، راحت و خوشایند را برای همه کاربران فراهم آورد.
                                                <br>
                                                در صورت وجود هرگونه سوال٬ لطفا با اطلاعات تماس زیر ارتباط برقرار کنید.
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

