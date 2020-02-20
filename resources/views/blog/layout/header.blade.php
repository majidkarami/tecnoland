<header class="nav">

    <div class="nav__holder nav--sticky">
        <div class="container relative">
            <div class="flex-parent">

                <!-- Side Menu Button -->
                <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open side menu">
                    <span class="nav-icon-toggle__box">
                        <span class="nav-icon-toggle__inner"></span>
                    </span>
                </button>

                <!-- Logo -->
                <a href="{{route('user.blog.posts.index')}}" class="logo">
                    <img class="logo__img" src="img/logo_default.png" alt="logo">
                </a>

                <!-- Nav-wrap -->
                <nav class="flex-child nav__wrap d-none d-lg-block">
                    <ul class="nav__menu">

                        <li class="active">
                            <a href="{{route('user.blog.posts.index')}}">صفحه اصلی</a>
                        </li>

                        {{-- <li class="nav__dropdown">
                            <a href="#">تکنولوژی</a>
                            <ul class="nav__dropdown-menu nav__megamenu">
                                <li>
                                    <div class="nav__megamenu-wrap">
                                        <div class="row">

                                            <div class="col nav__megamenu-item">
                                                <article class="entry">
                                                    <div class="entry__img-holder">
                                                        <a href="single-post.html">
                                                            <img src="img/content/thumb/post-1.jpg" alt="" class="entry__img">
                                                        </a>
                                                        <a href="categories.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet">تکنولوژی</a>
                                                    </div>

                                                    <div class="entry__body">
                                                        <h2 class="entry__title">
                                                            <a href="single-post.html">چرا لانچرهای اندروید دیگر محبوبیت گذشته را ندارند؟</a>
                                                        </h2>
                                                    </div>
                                                </article>
                                            </div>

                                            <div class="col nav__megamenu-item">
                                                <article class="entry">
                                                    <div class="entry__img-holder">
                                                        <a href="single-post.html">
                                                            <img src="img/content/thumb/post-2.jpg" alt="" class="entry__img">
                                                        </a>
                                                        <a href="categories.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--purple">تکنولوژی</a>
                                                    </div>

                                                    <div class="entry__body">
                                                        <h2 class="entry__title">
                                                            <a href="single-post.html">نمایشگر وان پلاس ۷ قرار است ما را شگفت‌زده کند!</a>
                                                        </h2>
                                                    </div>
                                                </article>
                                            </div>

                                            <div class="col nav__megamenu-item">
                                                <article class="entry">
                                                    <div class="entry__img-holder">
                                                        <a href="single-post.html">
                                                            <img src="img/content/thumb/post-3.jpg" alt="" class="entry__img">
                                                        </a>
                                                        <a href="categories.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--blue">تکنولوژی</a>
                                                    </div>

                                                    <div class="entry__body">
                                                        <h2 class="entry__title">
                                                            <a href="single-post.html">با دو هزار یورو، می‌توان چه محصولاتی دیگری به جای گلکسی فولد خرید؟</a>
                                                        </h2>
                                                    </div>
                                                </article>
                                            </div>

                                            <div class="col nav__megamenu-item">
                                                <article class="entry">
                                                    <div class="entry__img-holder">
                                                        <a href="single-post.html">
                                                            <img src="img/content/thumb/post-4.jpg" alt="" class="entry__img">
                                                        </a>
                                                        <a href="categories.html" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--green">تکنولوژی</a>
                                                    </div>

                                                    <div class="entry__body">
                                                        <h2 class="entry__title">
                                                            <a href="single-post.html">۶ ویژگی برتر رابط کاربری One UI سامسونگ</a>
                                                        </h2>
                                                    </div>
                                                </article>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul> <!-- end megamenu -->
                        </li>

                        <li class="nav__dropdown">
                            <a href="#">صفحات</a>
                            <ul class="nav__dropdown-menu">
                                <li><a href="about.html">درباره ما</a></li>
                                <li><a href="contact.html">تماس با ما</a></li>
                                <li><a href="search-results.html">نتایج جستجو</a></li>
                                <li><a href="categories.html">دسته بندی مطالب</a></li>
                                <li><a href="single-post.html">نمایش مطلب</a></li>
                                <li><a href="404.html">404</a></li>
                            </ul>
                        </li> --}}


                    </ul> <!-- end menu -->
                </nav> <!-- end nav-wrap -->

                <!-- Nav Right -->
                <div class="nav__right">

                    <!-- Search -->
                    <div class="nav__right-item nav__search">
                        <a href="#" class="nav__search-trigger" id="nav__search-trigger">
                            <i class="ui-search nav__search-trigger-icon"></i>
                        </a>
                        <div class="nav__search-box" id="nav__search-box">
                            <form class="nav__search-form">
                                <input type="text" placeholder="جستجو مقالات" class="nav__search-input">
                                <button type="submit" class="search-button btn btn-lg btn-color btn-button">
                                    <i class="ui-search nav__search-icon"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                </div> <!-- end nav right -->

            </div> <!-- end flex-parent -->
        </div> <!-- end container -->

    </div>
</header> <!-- end navigation -->
