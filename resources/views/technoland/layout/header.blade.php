<!-- header -->
<header class="main-header default">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4 col-5">
                <div class="logo-area default">
                    <a href="#">
                        <img src="{{ asset('user/img/logo.png') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-8 col-7">
                <div class="search-area default">
                    <form action="{{ url('search') }}" class="search" id="search_product_form">
                        <input type="text" name="text" id="input-search"
                               placeholder="نام کالا، برند و یا دسته مورد نظر خود را جستجو کنید…">
                        <ul class="list-group search-box-list">
                            <li class="list-group-item contsearch">
                                <a href="#" class="gsearch">
                                    <i class="fa fa-clock-o"></i>
                                    گوشی موبایل
                                </a>
                            </li>
                            <li class="list-group-item contsearch">
                                <a href="#" class="gsearch">
                                    <i class="fa fa-clock-o"></i>
                                    لپ تاپ
                                </a>
                            </li>
                            <li class="list-group-item contsearch">
                                <a href="#" class="gsearch">
                                    <i class="fa fa-clock-o"></i>
                                    کفش
                                </a>
                            </li>
                            <li class="list-group-item contsearch">
                                <a href="#" class="gsearch">
                                    <i class="fa fa-clock-o"></i>
                                    مانتو
                                </a>
                            </li>
                            <li class="list-group-item contsearch">
                                <a href="#" class="gsearch">
                                    <i class="fa fa-clock-o"></i>
                                    لباس ورزشی
                                </a>
                            </li>
                        </ul>
                        <div class="localSearchSimple"></div>
                        <button type="submit" onclick="search()"><img src="{{ asset('user/img/search.png') }}" alt="">
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="user-login dropdown">
                    @if(!Auth::check())
                        <a href="#" class="btn btn-neutral dropdown-toggle" data-toggle="dropdown"
                           id="navbarDropdownMenuLink1">
                            ورود / ثبت نام
                        </a>
                    @else
                        <a href="#" class="btn btn-neutral dropdown-toggle" data-toggle="dropdown"
                           id="navbarDropdownMenuLink1">
                            {{ Auth::user()->username }}
                        </a>
                    @endif
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                        <div class="dropdown-item">
                            @if(!Auth::check())
                                <a href="{{ url('login') }}" class="btn btn-info">ورود به تکنولند</a>
                            @else
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-info">خروج</button>
                                </form>
                            @endif
                        </div>
                        @if(!Auth::check())
                            <div class="dropdown-item font-weight-bold">
                                <span>کاربر جدید هستید؟</span> <a class="register"
                                                                  href="{{ url('register') }}">ثبت‌نام</a>
                            </div>
                        @endif

                        <hr>
                        <div class="dropdown-item">
                            <a href="#" class="dropdown-item-link">
                                <i class="now-ui-icons users_single-02"></i>
                                پروفایل
                            </a>
                        </div>
                        <div class="dropdown-item">
                            <a href="#" class="dropdown-item-link">
                                <i class="now-ui-icons shopping_bag-16"></i>
                                پیگیری سفارش
                            </a>
                        </div>
                    </ul>
                </div>


                <div class="cart dropdown">
                    <a href="{{ url('Cart') }}" class="btn dropdown-toggle" data-toggle="dropdown"
                       id="navbarDropdownMenuLink1">
                        <img src="{{ asset('user/img/shopping-cart.png') }}" alt="">
                        سبد خرید
                        <span class="count-cart">{{ \App\Cart::count() }}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                        <div class="basket-header">
                            <div class="basket-total">
                                <span>مبلغ کل خرید:</span>
                                <span> ۲۳,۵۰۰</span>
                                <span> تومان</span>
                            </div>
                            <a href="#" class="basket-link">
                                <span>مشاهده سبد خرید</span>
                                <div class="basket-arrow"></div>
                            </a>
                        </div>
                        <ul class="basket-list">
                            <li>
                                <a href="#" class="basket-item">
                                    <button class="basket-item-remove"></button>
                                    <div class="basket-item-content">
                                        <div class="basket-item-image">
                                            <img alt="" src="{{ asset('user/img/cart/2324935.jpg') }}">
                                        </div>
                                        <div class="basket-item-details">
                                            <div class="basket-item-title">هندزفری بلوتوث مدل S530
                                            </div>
                                            <div class="basket-item-params">
                                                <div class="basket-item-props">
                                                    <span> ۱ عدد</span>
                                                    <span>رنگ مشکی</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <a href="#" class="basket-submit">ورود و ثبت سفارش</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <nav class="main-menu">
        <div class="container">
            <ul class="list float-right">
                @foreach($category as $key=>$value)
                <li class="list-item list-item-has-children mega-menu mega-menu-col-5">
                    <a class="nav-link" href="{{ url('category').'/'.$value['cat_ename'] }}">{{ $value['cat_name'] }}</a>
                    <ul class="sub-menu nav">
                        @foreach($value->getChild as $key2=>$value2)
                        <li class="list-item list-item-has-children">
                            <i class="now-ui-icons arrows-1_minimal-left"></i>
                            <a class="main-list-item nav-link"
                               href="{{ url('category').'/'.$value->cat_ename.'/'.$value2->cat_ename }}">
                                {{ $value2->cat_name }}</a>
                            <ul class="sub-menu nav">

                            <?php
                            $t=0;
                            $d=1;
                            ?>


                            @foreach($value2->getChild as $key3=>$value3)
                                    <?php

                                    $menu4=$value3->getChild2;
                                    ?>

                                <li class="list-item">
                                    <a class="nav-link" href="{{ url('category').'/'.$value->cat_ename.'/'.$value2->cat_ename.'/'.$value3->cat_ename }}">  {{ $value3->cat_name }}</a>
                                    <ul class="sub-menu nav">
                                        <?php
                                        $j=0;
                                        ?>
                                        @foreach($menu4 as $key4=>$value4)
                                            <?php $t++; ?>
                                            @if($j<11)
                                                <?php
                                                $url=url('/');
                                                $e=explode('_',$value4->cat_ename);
                                                if(sizeof($e)==3)
                                                {
                                                    if($e[0]=='filter')
                                                    {
                                                        $url.='/search/'.$value->cat_ename.'/'.$value2->cat_ename.'/'.$value3->cat_ename.'?'.$e[1].'[0]='.$e[2];
                                                    }
                                                    else
                                                    {
                                                        $url.='/category/'.$value->cat_ename.'/'.$value2->cat_ename.'/'.$value3->cat_ename.'/'.$value4->cat_ename;
                                                    }
                                                }
                                                else
                                                {
                                                    $url.='/category/'.$value->cat_ename.'/'.$value2->cat_ename.'/'.$value3->cat_ename.'/'.$value4->cat_ename;
                                                }
                                                ?>
                                            <li class="list-item">
                                                <a class="nav-link" href="{{ $url }}">  {{ $value4->cat_name }}</a>
                                            </li>
                                                @else

                                                    @if(sizeof($menu4)>11)

                                                        <li><a  href="{{ url('category').'/'.$value->cat_ename.'/'.$value2->cat_ename.'/'.$value3->cat_ename }}" style="color:#16C1F3"  >مشاهده موارد بیشتر</a></li>
                                                    @endif

                                                @endif

                                                <?php $j++ ?>
                                        @endforeach
                                    </ul>

                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                            @if(!empty($value2->img))
                        <img src="{{ url('upload').'/'.$value2->img  }}" alt="">
                            @endif
                    </ul>
                </li>
                @endforeach
                <li class="list-item amazing-item">
                    <a class="nav-link" href="#" target="_blank">شگفت‌انگیزها</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="overlay-search-box"></div>
<!-- header -->

@section('scripts')
    <script>
        search = function () {
            var search_text = document.getElementById('input-search').value;
            if (search_text.trim() != '') {
                if (search_text.trim().length > 2) {
                    $("#search_product_form").submit();
                }
            }
        }
    </script>
@endsection