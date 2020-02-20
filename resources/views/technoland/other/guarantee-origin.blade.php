@extends('technoland.layout.master')
@section('title', __('تضمین اصالت کالا و گارانتی اصلی'))
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
                                <h1 class="title-tab-content">تضمین اصالت کالا و گارانتی اصلی</h1>
                            </div>
                            <div class="content-section default">

                                <div class="contact-details" style="padding: 30px;">

                                        <div class="container well">
                                            <div class="title-head">
                                                <h6 style="color: #0DB9FA;">فروشگاه {{setting('name')}}, کالای اصلی</h6>
                                                <br>
                                                <p style="font-size: 14px;">
                                                    فروشگاه {{setting('name')}} اصالت همۀ کالاهایش را تضمین و همۀ آن‌ها را با گارانتی اصلی و معتبر عرضه می‌کند. از آنجا که فروشگاه {{setting('name')}} برای تامین کالاهای ارائه شده در وب سایت، تنها با شرکت‌های معتبر و واردکنندگان رسمی و قانونی همکاری می‌کند، مشتریان می‌توانند مطمئن باشند که کالای دارای هولوگرام و برچسب معتبر که هیچگونه دخل و تصرفی در آن صورت نگرفته و از مجاری قانونی وارد کشور شده است، را از فروشگاه {{setting('name')}} خریداری می‌کنند. شرکت‌هایی که دارای شرایط لازم برای واردات رسمی نیستند و یا مجوز نمایندگی رسمی ندارند امکان واردات کالا را ندارند و فعالیت آنها غیرقانونی محسوب می‌شود. ذکر این نکته در اینجا لازم است که کشور سازنده روی اصالت کالا تاثیری ندارد و این برند معتبر است که کیفیت کالا را تعیین می‏‌کند.
                                                </p>
                                                <br>
                                                <h6 style="color: #0DB9FA;">فروشگاه {{setting('name')}}, گارانتی اصلی</h6><br>
                                                <p style="font-size: 14px;">
                                                    شرکت هایی که از طرف وزارت صنعت، معدن و تجارت به عنوان وارد کنندگان قانونی در کشور فعالیت می کنند و اسامی آنها در سایت این وزارتخانه ذکر شده، باید گارانتی و خدمات پس از فروش نیز ارائه کنند. بنابراین گارانتی اینگونه شرکت ها، گارانتی معتبر محسوب می شود. به این ترتیب مشتریانی که گارانتی‌های بی نام و نشان آنها را سردرگم کرده است، می‌توانند گارانتی‌های معتبر را از نامعتبر شناسایی کنند. تمامی محصولات ارائه شده در وب سایت فروشگاه {{setting('name')}} توسط نمایندگان رسمی آن برند در ایران گارانتی شده‌اند و با اخذ مجوزهای لازم، از مبادی قانونی وارد کشور شده‌اند.
                                                    لازم به ذکر است کلیه کالاهای مشمول گارانتی پس از تحویل به خریدار و عدم استفاده از مهلت 7 روز ضمانت بازگشت، در صورتی که با هرگونه ایراد و اشکال اعم از نرم افزاری و سخت افزاری و سایر موارد مواجه شوند، بررسی مساله در حوزه صلاحیت شرکت گارانتی کننده مربوط است و فروشگاه {{setting('name')}} هیچگونه مسئولیتی نسبت به مشکلات مزبور نخواهد داشت.
                                                    بنابراین کلیه کالاهایی که در فروشگاه {{setting('name')}} عرضه می‌شوند اصلی هستند و به هیچ عنوان کالای کار کرده و یا غیر اصلی در سایت فروشگاه {{setting('name')}} به فروش نمی‌رسد.
                                                    از این رو است که فروشگاه {{setting('name')}} اصل بودن همه محصولات موجود در وب سایت را تضمین می‌کند.
                                                </p>

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