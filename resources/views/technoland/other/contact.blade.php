@extends('technoland.layout.master')
@section('title', __(' تماس با ما '))
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
                                <h1 class="title-tab-content"> تماس با ما </h1>
                            </div>
                            <div class="content-section default">

                                <div class="contact-details" style="padding: 30px;">

                                    <p style="font-size: 14px;">سؤالی دارید یا با مشکلی روبه‌رو شده‌اید؟ خوشحال می‌شویم
                                        با ما تماس بگیرید. ما هر روز هفته
                                        از ساعت ۸ صبح تا ۲۲ شب به همه‌ی تلفن‌ها پاسخ می‌دهیم. و
                                        در اولین فرصت، رسیدگی صورت خواهد گرفت.
                                        همچنین به ایمیل‌ها معمولاً ظرف چهار ساعت، و در موارد
                                        استثنایی،‌ حداکثر یک روز کاری، رسیدگی می‌شود.</p>

                                    <div class="content-section default">
                                        <div class="row">
                                            <div class="col-12">
                                                <h1 class="title-tab-content">با ما در تماس باشید</h1>
                                            </div>
                                        </div>
                                        @if(Session::has('success'))
                                            <div class="alert alert-success">
                                                <div>{{session('success')}}</div>
                                            </div>
                                        @endif
                                        <form class="form-account" method="post" action="{{route('user.contact_us')}}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-account-title">نام</div>
                                                    <div class="form-account-row">
                                                        <input name="first_name" value="{{old('first_name')}}" class="input-field text-right" type="text"
                                                               placeholder="نام خود را وارد نمایید">
                                                        @if($errors->has('first_name'))
                                                            <span style="color:red;font-size:13px">{{ $errors->first('first_name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-account-title">نام خانوادگی</div>
                                                    <div class="form-account-row">
                                                        <input name="last_name" value="{{old('last_name')}}" class="input-field text-right" type="text"
                                                               placeholder="نام خانوادگی خود را وارد نمایید">
                                                        @if($errors->has('last_name'))
                                                            <span style="color:red;font-size:13px">{{ $errors->first('last_name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-account-title">آدرس ایمیل</div>
                                                    <div class="form-account-row">
                                                        <input name="email" value="{{old('email')}}" class="input-field" type="email"
                                                               placeholder=" آدرس ایمیل خود را وارد نمایید">
                                                        @if($errors->has('email'))
                                                            <span style="color:red;font-size:13px">{{ $errors->first('email') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-account-title"> متن</div>
                                                    <div class="form-account-row">
                                                        <textarea style="text-align: right;" class="input-field" name="description" rows="10"
                                                                  placeholder=" متن خود را وارد نمایید">{{old('description')}}</textarea>
                                                        @if($errors->has('description'))
                                                            <span style="color:red;font-size:13px">{{ $errors->first('description') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="parent-btn text-center">
                                                <button type="submit" class="dk-btn dk-btn-info">
                                                   ثبت
                                                    <i class="now-ui-icons ui-1_simple-add"></i>
                                                </button>
                                            </div>

                                        </form>
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




