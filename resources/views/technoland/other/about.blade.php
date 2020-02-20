@extends('technoland.layout.master')
@section('title', __('درباره ما'))
<?php
$category = App\Category::where('parent_id', 0)->get();
?>

@section('styles')
    <style>
        .biz-product-content {
            text-align: center;
            padding: 10px;
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
                                <h1 class="title-tab-content">درباره ما</h1>
                            </div>
                            <div class="content-section default">
                                <div class="row" style="padding: 30px;">
                                    <p style="font-size: 14px;">
                                        با توجه به پیشرفت علم و صنعت در مباحث گوناگون ازجمله اینترنت و تکامل روش های خرید، امروزه روش خرید
                                        اینترنتی به عنوان روش رایج، مطمئن و سریع شناخته شده است. استفاده از خدمات اینترنتی علاوه بر صرفه
                                        جویی در وقت وهزینه، باعث سهولت در انجام امور مختلف شده، و افراد اجازه بررسی آگاهانه در ارائه خدمات
                                        در زمینه های مختلف را دارند.
                                    </p>
                                    <p style="font-size: 14px;">
                                        مجموعه ما با بهره گیری از چندین سال سابقه درخشان در زمینه تعمیرات تلفن همراه و تبلت و فروش موبایل و لوازم جانبی اصلی ، توانست فصل
                                        جدیدی از خدمات خود را در قالب موبایل ایران آغاز کند .
                                    </p>
                                    <p style="font-size: 14px;">
                                        دغدغه افراد از مشکلات ایجاد شده برای دستگاه خود از یک سو و عدم اطمینان در استفاده از قطعات اصلی از
                                        سوی دیگر،مجموعه موبایل ایران را بر آن داشت تا ضمن ارائه خدماتی با کیفیت، خلاء موجود در زمینه تعمیرات
                                        دستگاه های ارتباطی را به نحو مطلوب پر کند.
                                    </p>
                                    <p style="font-size: 14px;">
                                        موبایل ایران تصمیم دارد با استفاده از سرویس پیک رایگان در سریع ترین زمان ممکن خدمات با کیفیتی را در
                                        اختیارمشتریان خود قراردهد، کارکنان مجموعه موبایل ایران در تلاشند تا با بهره گیری از تخصص خود در زمینه
                                        تعمیرات دستگاه های ارتباطی بتوانند خدمت جدیدی را به هموطنان عزیز ارائه دهند.
                                    </p>
                                    <p style="font-size: 14px;">
                                        امید است با ارائه با کیفیت ترین خدمات تخصصی ، زمینه رضایت مندی شما هموطن عزیز را فراهم سازیم.
                                    </p>
                                </div>
                            </div>
                            <section  class="biz-product-section ptb-90">
                                <div class="biz-product-wrap">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-md-6">
                                                <div class="text-center section-heading">
                                                    <h3>تیم ما</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="owl-carousel owl-theme biz-products carousel-indicator owl-rtl owl-loaded owl-drag">

                                                    <div class="owl-stage-outer">
                                                        <div class="owl-stage" style="padding-right: 170px;">
                                                            <div class="owl-item cloned" style="width: 255px; margin-left: 30px;">
                                                                <div class="biz-single-product item">
                                                                    <div class="biz-product-img">
                                                                        <img src="{{asset('user/img/svg/avatar-1.svg')}}" alt="Smart Product" class="img-responsive">
                                                                    </div>
                                                                    <div class="biz-product-content">
                                                                        <p>فروش</p>
                                                                        <div class="price">
                                                                            <h5><span class="original-price">فروش</span></h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="owl-item cloned" style="width: 255px; margin-left: 30px;">
                                                                <div class="biz-single-product item">
                                                                    <div class="biz-product-img">
                                                                        <img src="{{asset('user/img/svg/avatar-6.svg')}}" alt="Smart Product" class="img-responsive">
                                                                    </div>
                                                                    <div class="biz-product-content">
                                                                        <p>بازی</p>
                                                                        <div class="price">
                                                                            <h5><span class="original-price">گیم</span></h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="owl-item cloned" style="width: 255px; margin-left: 30px;">
                                                                <div class="biz-single-product item">
                                                                    <div class="biz-product-img">
                                                                        <img src="{{asset('user/img/svg/avatar-3.svg')}}" alt="Smart Product" class="img-responsive">
                                                                    </div>
                                                                    <div class="biz-product-content">
                                                                        <p>تعمیرات</p>
                                                                        <div class="price">
                                                                            <h5><span class="original-price">تعمیرات</span></h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="owl-item cloned" style="width: 255px; margin-left: 30px;">
                                                                <div class="biz-single-product item">
                                                                    <div class="biz-product-img">
                                                                        <img src="{{asset('user/img/svg/avatar-7.svg')}}" alt="Smart Product" class="img-responsive">
                                                                    </div>
                                                                    <div class="biz-product-content">
                                                                        <p>نرم افزار</p>
                                                                        <div class="price">
                                                                            <h5><span class="original-price">نرم افزار</span></h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
