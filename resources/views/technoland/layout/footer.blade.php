<footer class="main-footer default">
    <div class="back-to-top">
        <a href="#"><span class="icon"><i class="now-ui-icons arrows-1_minimal-up"></i></span> <span>بازگشت به
                        بالا</span></a>
    </div>
    <div class="container">
        <div class="footer-services">
            <div class="row">
                <div class="service-item col">
                    <a href="#" target="_blank">
                        <img src="{{ asset('user/img/svg/delivery.svg') }}" alt="">
                    </a>
                    <p>تحویل اکسپرس</p>
                </div>
                <div class="service-item col">
                    <a href="#" target="_blank">
                        <img src="{{ asset('user/img/svg/contact-us.svg') }}" alt="">
                    </a>
                    <p>پشتیبانی 24 ساعته</p>
                </div>
                <div class="service-item col">
                    <a href="#" target="_blank">
                        <img src="{{ asset('user/img/svg/payment-terms.svg') }}" alt="">
                    </a>
                    <p>پرداخت درمحل</p>
                </div>
                <div class="service-item col">
                    <a href="#" target="_blank">
                        <img src="{{ asset('user/img/svg/return-policy.svg') }}" alt="">
                    </a>
                    <p>۷ روز ضمانت بازگشت</p>
                </div>
                <div class="service-item col">
                    <a href="#" target="_blank">
                        <img src="{{ asset('user/img/svg/origin-guarantee.svg') }}" alt="">
                    </a>
                    <p>ضمانت اصل بودن کالا</p>
                </div>
            </div>
        </div>
        <div class="footer-widgets">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="widget-menu widget card">
                        <header class="card-header">
                            <h3 class="card-title">راهنمای خرید از تکنولند</h3>
                        </header>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">نحوه ثبت سفارش</a>
                            </li>
                            <li>
                                <a href="#">رویه ارسال سفارش</a>
                            </li>
                            <li>
                                <a href="#">شیوه‌های پرداخت</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="widget-menu widget card">
                        <header class="card-header">
                            <h3 class="card-title">خدمات مشتریان</h3>
                        </header>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">پاسخ به پرسش‌های متداول</a>
                            </li>
                            <li>
                                <a href="#">رویه‌های بازگرداندن کالا</a>
                            </li>
                            <li>
                                <a href="#">شرایط استفاده</a>
                            </li>
                            <li>
                                <a href="#">حریم خصوصی</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="widget-menu widget card">
                        <header class="card-header">
                            <h3 class="card-title">با تکنولند</h3>
                        </header>
                        <ul class="footer-menu">
{{--                            <li>--}}
{{--                                <a href="#">فروش در تکنولند</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#">همکاری با سازمان‌ها</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="#">فرصت‌های شغلی</a>--}}
{{--                            </li>--}}
                            <li>
                                <a href="#">تماس با تکنولند</a>
                            </li>
                            <li>
                                <a href="#">درباره تکنولند</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="newsletter">
                        <p>از تخفیف‌ها و جدیدترین‌های فروشگاه باخبر شوید:</p>
                        <form class="newsletter-form">
                            <div class="form-group">
                                <input type="email" class="form-control newsletter-email"
                                       placeholder="آدرس ایمیل خود را وارد کنید...">
                            <input type="submit" name="submit" id="newsletter-register-button" class="btn btn-primary" style="line-height: 15px;" value="ارسال">
                    </div>
                        </form>
                    </div>
                    <div class="socials">
                        <p>ما را در شبکه های اجتماعی دنبال کنید.</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-instagram"></i>اینستاگرام تکنولند</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="info">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <span>هفت روز هفته ، 24 ساعت شبانه‌روز پاسخگوی شما هستیم.</span>
                </div>
                <div class="col-12 col-lg-2"> شماره تماس : {{ setting('tel') }}</div>
                <div class="col-12 col-lg-3">آدرس ایمیل :<a href="#">{{ setting('email') }}</a></div>
                <div class="col-12 col-lg-3 text-center">
                    <a href="#" target="_blank">
                        <img src="{{ asset('user/img/bazzar.png') }}" width="159" height="48" alt=""></a>
                    <a href="#" target="_blank">
                        <img src="{{ asset('user/img/sibapp.png') }}" width="159" height="48" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <div class="description">
        <div class="container">
            <div class="row">
                <div class="site-description col-12 col-lg-7">
                    <h1 class="site-title">فروشگاه اینترنتی تکنولند، بررسی، انتخاب و خرید آنلاین</h1>
                    <p>تکنولند به عنوان یکی از قدیمی‌ترین فروشگاه های اینترنتی با بیش از یک دهه تجربه، با
                        پایبندی به سه اصل کلیدی، پرداخت در
                        محل، 7 روز ضمانت بازگشت کالا و تضمین اصل‌بودن کالا، موفق شده تا همگام با فروشگاه‌های
                        معتبر جهان، به بزرگ‌ترین فروشگاه
                        اینترنتی ایران تبدیل شود. به محض ورود به تکنولند با یک سایت پر از کالا رو به رو
                        می‌شوید! هر آنچه که نیاز دارید و به
                        ذهن شما خطور می‌کند در اینجا پیدا خواهید کرد.
                    </p>
                </div>
                <div class="symbol col-12 col-lg-5">
                    <a href="#" target="_blank"><img src="{{ asset('user/img/symbol-01.png') }}" alt=""></a>
                    <a href="#" target="_blank"><img src="{{ asset('user/img/symbol-02.png') }}" alt=""></a>
                </div>
{{--                <div class="col-12">--}}
{{--                    <div class="row">--}}
{{--                        <ul class="footer-partners default">--}}
{{--                            <li class="col-md-3 col-sm-6">--}}
{{--                                <a href=""><img src="{{ asset('user/img/footer/1.svg') }}" alt=""></a>--}}
{{--                            </li>--}}
{{--                            <li class="col-md-3 col-sm-6">--}}
{{--                                <a href=""><img src="{{ asset('user/img/footer/2.svg') }}" alt=""></a>--}}
{{--                            </li>--}}
{{--                            <li class="col-md-3 col-sm-6">--}}
{{--                                <a href=""><img src="{{ asset('user/img/footer/3.svg') }}" alt=""></a>--}}
{{--                            </li>--}}
{{--                            <li class="col-md-3 col-sm-6">--}}
{{--                                <a href=""><img src="{{ asset('user/img/footer/4.svg') }}" alt=""></a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <p>
                استفاده از مطالب فروشگاه اینترنتی تکنولند فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است.
                کلیه حقوق این سایت متعلق
                به شرکت نوآوران فن آوازه (فروشگاه آنلاین تکنولند) می‌باشد.
            </p>
        </div>
    </div>
</footer>

@section('scripts')

@endsection