@extends('technoland.layout.master')
@section('title', __('مقررات وبسایت'))
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
                                <h1 class="title-tab-content">مقررات وبسایت</h1>
                            </div>
                            <div class="content-section default">
                                <div class="contact-details" style="padding: 30px;">
                                    <div class="container well">
                                        <div class="title-head">
                                            <div style="direction: rtl">
                                                <h5 style=" color: #db4360;">شرایط و قوانین استفاده از خدمات فروشگاه اینترنتی {{setting('name')}}</h5>
                                                <br>
                                                <p style="font-size: 14px;">کاربر گرامی لطفاً موارد زیر را جهت استفاده بهینه از خدمات فروشگاه اینترنتی روژا به دقت ملاحظه فرمایید.</p>
                                                <p style="font-size: 14px;">ورود کاربران به وب‏‌سایت فروشگاه اینترنتی {{setting('name')}} و ثبت سفارش در هر زمان به معنی پذیرفتن کامل کلیه شرایط و قوانین فروشگاه اینترنتی {{setting('name')}} از سوی کاربر است.</p>
                                                <p style="font-size: 14px;">لازم به ذکر است شرایط و قوانین مندرج، جایگزین کلیه توافق‏‌های قبلی محسوب می‏‌شود.</p>
                                            </div>
                                            <br>
                                            <div style="direction: rtl; ">
                                                <h6 style="; color: #0DB9FA;">مشخصات کالا</h6><br>
                                                <p style="font-size: 14px;">فروشگاه اینترنتی {{setting('name')}} موظف است کالایی مطابق با مشخصات فنی درج شده در سایت که شما آنرا انتخاب کرده و سفارش داده‌اید برای شما ارسال کند.</p>
                                                <p style="font-size: 14px;">فروشگاه اینترنتی {{setting('name')}} موظف است مشخصات كالا از نظر گارانتي و رنگ را دقيقا مانند آنچه شما انتخاب کرده‌اید برای شما ارسال نماید.</p>
                                                <p style="font-size: 14px;">فروشگاه اینترنتی {{setting('name')}} بنا به درخواست مشتري اجناس را بصورت آكبند بدون تست و يا در صورت درخواست مشتری باز شده و تست شده ارسال مي‌نمايد.</p>
                                            </div>
                                            <br>
                                            <div style="direction: rtl; ">
                                                <h6 style="; color: #0DB9FA;">فاکتور فروش</h6><br>
                                                <p style="font-size: 14px;">قيمت تمامي كالاها در سايت مشخص است و هيچ هزينه‌اي بجز هزینه حمل (برای سفارشاتی با قیمت زیر 100 هزار تومان) به آن اضافه نخواهد شد</p>
                                                <p style="font-size: 14px;">پس از تایید اقلام موجود در سبد خرید توسط شما درخواست سفارش شما ثبت می‌شود و پس از تایید فروشگاه اینترنتی {{setting('name')}} فاکتور شما تایید شده و آماده پرداخت است.</p>
                                                <p style="font-size: 14px;">پس از ثبت سفارش در صورتیکه نیاز به تایید فروشگاه اینترنتی {{setting('name')}} باشد مدت اعتبار فاكتور از زمان ثبت سفارش توسط کاربر بمدت 24 ساعت خواهد بود و پس از آن فاكتور فاقد اعتبار مي‌باشد و در صورت عدم پرداخت در اين مدت بايد مجددا سفارش توسط مشتری ثبت شود.</p>
                                                <p style="font-size: 14px;">تایید سفارشات در روزهای کاری انجام می‌شود و پردازش همه سفارشات در تعطیلات رسمی امکان‌پذیر نیست.</p>
                                                <p style="font-size: 14px;">در صورت پرداخت بوسيله كارت و يا واريز به حساب، بايد شماره فيش بانكي و يا چهار رقم آخر کارت بانکی بهمراه نام صاحب حساب و زمان دقیق پرداخت را به ایمیل info@mobiiran.com فرستاده شود، پس از ثبت مشخصات پرداخت، این مشخصات توسط فروشگاه اینترنتی {{setting('name')}} كنترل شده و تاييد پرداخت به اطلاع شما خواهد رسيد. ضمنا مرحله تایید پرداخت برای پرداختهای کارت به کارت و یا واریز به حساب تنها در روزهای کاری ممکن می‌باشد</p>
                                                <p style="font-size: 14px;">تاييد و پرداخت فاكتور توسط شما به منزله تاييد تمامي موارد در بخش مقررات سایت فروشگاه اینترنتی {{setting('name')}} می‌باشد.</p>
                                            </div>
                                            <br>
                                            <div style="direction: rtl; ">
                                                <h6 style=" color: #0DB9FA;">ارسال سفارش</h6><br>
                                                <p style="font-size: 14px;">کلیه سفارشات از طریق پست پیشتاز ارسال می‌شود اما با در نظر گرفتن آدرس خریدار و سرویس‌دهی شرکتهای حمل دیگر در آن منطقه پستی چنانچه روش حمل سریعتر و بهتری جهت ارسال وجود داشته باشد، فروشگاه اینترنتی {{setting('name')}} در هنگام ارسال سفارش از آن روش استفاده کرده و کدرهگیری مرسوله را به خریدار اعلام  می‌کند.</p>
                                                <p style="font-size: 14px;">سفارشاتی که قبل از ساعت 11 صبح تایید و پرداخت شده باشد همان روز به پست تحویل داده می‌شود و اگر پرداخت پس از ساعت 11 صبح باشد ارسال سفارش به روز کاری بعد محول می‌شود.</p>
                                                <p style="font-size: 14px;">سفارشاتی که به شیراز ارسال می‌شود پس از یک روز کاری به دست خریدار می‌رسد و تحویل سفارشات در سایر شهرهای بزرگ بین یک تا دو روز کاری توسط پست انجام می شود و سفارشاتی که به شهرهای کوچکتر و دورافتاده ارسال شده است تحویل آن بین سه تا چهار روز کاری صورت می‌گیرد.</p>
                                                <p style="font-size: 14px;">مسئوليت تمامي كالاها در هنگام ارسال بر عهده شركتهاي حمل و نقل و يا بيمه كننده شركت حمل و نقل مي‌باشد و تمامی کالاهای گران قیمت از قبیل موبایل، تبلت و لپ تاپ بیمه حمل می‌گردند.</p>
                                                <p style="font-size: 14px;">مدت زمان تحویل سفارشات که در فوق ذکر شده‌ رویه معمول شرکتهای حمل و نقل است اما گاهی ممکن است تحویل کالا توسط پست با تاخیر همراه شود که این موضوع به دلایل مختلفی صورت می‌گیرد از جمله بالا رفتن حجم کار شرکتهای حمل و نقل در روزهای پایانی سال، پیدانکردن آدرس گیرنده توسط مامورین پست و یا عدم حضور گیرندۀ مرسوله که البته کدرهگیری مرسوله جهت پیگیری خریدار توسط فروشگاه اینترنتی {{setting('name')}} اعلام می‌شود.</p>
                                                <p style="font-size: 14px;">در هنگام دریافت سفارش خریدار موظف به کنترل بسته بندی سفارش می‌باشد تا در صورتیکه نقصی در بسته و یا محتوی آن در اثر حمل پیش آمده باشد آنرا در حضور مامور شرکت حمل و نقل بصورت رسمی صورت جلسه کرده و از دریافت کالا خودداری نماید و مراتب حداکثر ظرف 24 ساعت به فروشگاه اینترنتی {{setting('name')}} اطلاع داده شود تا فروشگاه اینترنتی {{setting('name')}} بتواند پیگیری‌های لازم را انجام دهد.</p>
                                            </div>
                                            <br>
                                            <div style="direction: rtl;">
                                                <h6 style="color: #0DB9FA;">مهلت تست ویژه فروشگاه اینترنتی {{setting('name')}}</h6>
                                                <br>
                                                <p style="font-size: 14px;">پیگیری سفارش و اعلام هر نوع اشکال در سفارش بصورت اینترنتی (در تمام ساعات شبانه روز و تمام ایام هفته) تنها با درخواست بررسی از طریق گزینه "پیگیری این سفارش"  که در صفحه اطلاعات سفارش وجود دارد و یا تماس تلفنی در روزهای کاری با بخش پشتیبانی با اعلام شماره سفارش شما امکان پذیر است و در صورت اعلام اشکال به هر روش دیگر (ارسال ایمیل به سایت فروشگاه اینترنتی {{setting('name')}}، ارسال پیام کوتاه به شماره ذکر شده در فروشگاه اینترنتی {{setting('name')}} و ...) این موارد بررسی نشده و نادیده گرفته می‌شوند.</p>
                                                <p style="font-size: 14px;">خریدار موظف است فورا پس از دریافت سفارش آنرا از نظر ظاهری بررسی نماید و در صورت داشتن هر نوع اشکال ظاهری شرح اشکال را به فروشگاه اینترنتی {{setting('name')}} اعلام نماید؛ در صورت تاخیر در اعلام مشکل ظاهری فروشگاه اینترنتی {{setting('name')}} مسئولیتی در قبال آن نخواهد داشت.</p>
                                                <p style="font-size: 14px;">خریدار موظف است در هنگام دریافت سفارش کاملا آن را از نظر مشخصات کالا بررسی کرده تا در صورتیکه مشخصات کالا مغایرتی با مشخصات ثبت شده در سایت فروشگاه اینترنتی {{setting('name')}} داشته باشد آنرا به فروشگاه اینترنتی {{setting('name')}} اعلام نماید، در صورت تاخیر در اعلام مغایرت مشخصات فروشگاه اینترنتی {{setting('name')}} مسئولیتی در قبال آن نخواهد داشت.</p>
                                                <p style="font-size: 14px;">در صورتیکه خریدار در مدت 7 روز از زمان دریافت سفارش متوجه اشکال فنی در سفارش خود شود باید مراتب را فورا به فروشگاه اینترنتی {{setting('name')}} اعلام کرده تا پس از هماهنگی با بخش پشتیبانی فروشگاه اینترنتی {{setting('name')}} ظرف یک روز کاری کالا را به آدرس فروشگاه اینترنتی {{setting('name')}} ارسال نماید.</p>
                                                <p style="font-size: 14px;">کالایی که دارای اشکال فنی می‌باشد پس از برگشت به فروشگاه اینترنتی {{setting('name')}} مورد بررسی قرار می‌گیرد و در صورت تایید اشکال فنی توسط کارشناسان فروشگاه اینترنتی {{setting('name')}} کالای جایگزین برای شما ارسال شده و یا وجه آن ظرف یک روز کاری به حساب شما عودت داده می شود.</p>
                                                <p style="font-size: 14px;">در صورتيكه كالاي شما دچار نقص فني باشد و توسط افرادي غير از كارشناسان تعميرگاه فروشگاه اینترنتی {{setting('name')}} باز شود فروشگاه اینترنتی {{setting('name')}} مسؤوليت آنرا بر عهده نخواهد گرفت.</p>
                                                <p style="font-size: 14px;">پس از 7 روز از زمان دريافت كالا هر نوع اشكال فني كه براي كالاي شما پيش بيايد در صورت داشتن گارانتي بر عهده شركت گارانتي كننده خواهد بود و بايد آنرا به آدرس مركز خدمات آن شركت جهت تعمير ارسال نماييد.</p>
                                                <p style="font-size: 14px;">چنانچه كالاي شما دچار نقص فني باشد و ظرف 7 روز از زمان دريافت آنرا به فروشگاه اینترنتی {{setting('name')}} عودت دهيد هزينه عودت و ارسال مجدد بر عهده فروشگاه اینترنتی {{setting('name')}} خواهد بود.</p>
                                                <p style="font-size: 14px;">لوازم جانبی از قبیل کیف، برچسب محافظ صفحه و قاب محافظ دارای مهلت تست 7 روز نبوده و تنها و در صورت داشتن اشکال ظاهری در هنگام دریافت کالا و یا مغایرت مشخصات با مشخصات ثبت شده در سایت فروشگاه اینترنتی {{setting('name')}} قابل عودت می‌باشند.</p>
                                                <p style="font-size: 14px;">در صورت انصراف از خرید در شرایطی که کالا کاملا پلمپ باشد و مورد استفاده قرار نگرفته باشد شما می‌توانید آنرا تا یک روز کاری پس از دریافت کالا به آدرس فروشگاه اینترنتی {{setting('name')}} عودت داده و وجه آنرا پس از کسر هزینه ارسال دریافت نمایید. ضمنا هزینه عودت کالا به فروشگاه اینترنتی {{setting('name')}} در صورت انصراف شما از خرید بر عهده شما می‌باشد.</p>
                                                <p style="font-size: 14px;">در صورت وجود اشکال و یا انصراف خریدار برای عودت کالا خریدار موظف است کالا را همراه با همه لوازم همراه بدرستی بسته بندی کرده و آنرا بیمه حمل نموده و به آدرس فروشگاه اینترنتی {{setting('name')}} ارسال نماید؛ در صورت آسیب رسیدن به کالا در حین حمل در صورتیکه کالا بیمه نشده باشد و بدرستی بسته بندی نشده باشد مسئولیت آن بر عهده خریدار است.</p>
                                                <p style="font-size: 14px;">امکان عودت وجه تنها به حسابی که از آن حساب کالا خریداری شده است وجود دارد و از واریز وجه به حساب شخص دیگر یا شماره حساب دیگر معذوریم.</p>
                                            </div>
                                            <br>
                                            <div style="direction: rtl;">
                                                <h5 style="color: #db4360;">مقررات عمومی کاربران</h5><br>
                                                <h6 style="color: #0DB9FA;">قوانين عضويت در سايت فروشگاه اینترنتی {{setting('name')}}</h6>
                                                <br>
                                                <p style="font-size: 14px;">1-   نام و نام خانوادگي بايد كامل و واقعي باشد و با حروف فارسي در سايت ثبت شود.</p>
                                                <p style="font-size: 14px;">2-    آدرس كاربر بايد واقعي ، كامل و به زبان فارسي باشد.</p>
                                                <p style="font-size: 14px;">3-   در صورتيكه نام و يا آدرس شما بصورت غير واقعي و يا انگليسي باشد عواقب ناشي از ارسال كالا به آن نام يا آدرس بر عهده فروشگاه اینترنتی {{setting('name')}} نيست.</p>
                                                <p style="font-size: 14px;">4-   ايميل شما بايد صحيح باشد. از درج ايميل غير واقعي خودداري نماييد در غير اينصورت عضويت شما در سايت فعال نخواهد شد.</p>
                                                <p style="font-size: 14px;">5-   هر حساب کاربری با یک ایمیل تعریف می شود و امکان تغییر آنها در حساب کاربری یا استفاده در حساب کاربری دیگر وجود ندارد.</p>
                                                <p style="font-size: 14px;">6-   شماره تلفن ثابت و شماره موبايل خود را با دقت ثبت نماييد تا  در مواقع لزوم بتوانيم با شما در تماس باشيم.</p>
                                            </div>
                                            <br>
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


