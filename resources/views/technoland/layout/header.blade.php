<!-- header -->
<?php
use App\lib\Mobile_Detect;$detect = new Mobile_Detect;
?>


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
                    <div id="show_error_search"></div>

                    @if(! $detect->isMobile())
                    <form action="{{ route('search.header') }}" class="search" id="search_product_form">
                        <input type="text" name="text" id="input-search" autocomplete="off"
                               placeholder="نام کالا، برند و یا دسته مورد نظر خود را جستجو کنید…">
                        @php
                            $cat=App\Category::where('parent_id',0)->get();
                        @endphp
                        <ul class="list-group search-box-list">
                            @foreach( $cat as $key=>$value)
                            <li class="list-group-item contsearch">
                                <a href="{{ url('category').'/'.$value->cat_ename }}" class="search">
                                    <i class="fa fa-clock-o"></i>
                                    {{$value->cat_name}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="localSearchSimple"></div>
                        <button type="button" onclick="search()"><img src="{{ asset('user/img/search.png') }}" alt="">
                        </button>
                    </form>
                    @endif
                </div>

            </div>
            <div class="col-md-4 col-sm-12">
                <div class="user-login dropdown">
                    @if(!Auth::check())
                        <a class="btn btn-neutral dropdown-toggle" data-toggle="dropdown"
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
                                <a href="{{ url('login') }}" class="btn btn-info">ورود به {{setting('name')}}</a>
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
                        @if(auth()->check())
                        <div class="dropdown-item">
                            <a href="{{route('user.profile')}}" class="dropdown-item-link">
                                <i class="now-ui-icons users_single-02"></i>
                                پروفایل
                            </a>
                        </div>
                        @endif
                    </ul>
                </div>


                <div class="cart dropdown">
                    <a href="{{ url('Cart') }}" class="btn dropdown-toggle" data-toggle="dropdown"
                       id="navbarDropdownMenuLink1">
                        <img src="{{ asset('user/img/shopping-cart.png') }}" alt="">
                        سبد خرید
                        <span class="count-cart">{{ \App\Cart::count() }}</span>
                    </a>
                    @if(Session::has('cart'))
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                    <?php
                    $total_price=0;
                    $price=0;
                    $j=1;
                    $cart_date=\App\Cart::get();
                    ?>
                    @foreach($cart_date as $key=>$value)

                        <?php
                        $product_data=array_key_exists('product_data',$value) ? $value['product_data'] : array();
                        ?>
                      @foreach($product_data as $key2=>$value2)
                        <?php
                        $s_c=explode('_',$key2);
                        $service_id=$s_c[0];
                        $color_id=$s_c[1];
                        $data=\App\Cart::get_date($key,$service_id,$color_id);
                        ?>
                            @if($data)
                            <div class="basket-header">
                                    <div class="basket-total">
                                        <span>مبلغ خرید :</span>
                                        @if(empty($data['price2']))
                                            <span>{{number2farsi(number_format($data['price1']))}}</span>
                                            <span> تومان</span>
                                        @else
                                            <span>{{ number_format($data['price2']) }} </span>
                                            <span> تومان</span>
                                        @endif
                                    </div>
                                    <a class="basket-link">
                                        <span>مشاهده سبد خرید</span>
                                        <div class="basket-arrow"></div>
                                    </a>
                                </div>
                                @if($data['price2'])
                                    <ul class="basket-list">
                                        <li>
                                            <a class="basket-item">
                                                <span  onclick="del_product('{{ $key }}','{{ $s_c[0] }}','{{ $s_c[1] }}')" class="basket-item-remove"></span>
                                                <div class="basket-item-content">
                                                    @if(!empty($data['img']))
                                                        <div class="basket-item-image">
                                                            <img alt="" src="{{ $data['img'] }}">
                                                        </div>
                                                    @else
                                                        <div class="basket-item-image">
                                                            <img alt="" src="{{ asset('/user/img/not-img.png') }}">
                                                        </div>
                                                    @endif
                                                    <div class="basket-item-details">
                                                        <div class="basket-item-title">{{ $data['title'] }}
                                                        </div>
                                                        <div class="basket-item-params">
                                                            <div class="basket-item-props">
                                                                <span> تعداد : {{ $value2 }}</span>
                                                                {{--                                                    <span>رنگ مشکی</span>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <a href="{{ url('Cart') }}" class="basket-submit">ورود و ثبت سفارش</a>
                                @endif
                            @endif
                    @endforeach


                    @endforeach
                    </ul>
                    @else
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                            <li>
                                <div class="basket-item-content">
                                     <p style="text-align: center;color: red;padding-top: 32px;">  سبد خرید شما خالی است.</p>
                                </div>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <nav class="main-menu">
        <div class="container">
            <ul class="list float-right">
                <i class="fa fa-list" style="font-size: 18px;color: white;"></i>
                @foreach($category as $key=>$value)
                <li class="list-item list-item-has-children mega-menu mega-menu-col-5"">
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
                                            @if($j<8)
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

                                               @if($j==sizeof($menu4)-1)
                                                  @if(sizeof($menu4)>11)
                                                    <li style="margin: -8px -3px;"><a  href="{{ url('category').'/'.$value->cat_ename.'/'.$value2->cat_ename.'/'.$value3->cat_ename }}" style="color:#16C1F3"  >مشاهده موارد بیشتر</a></li>
                                                            <br>
                                                 @endif
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
                <li class="list-item">
                    <a class="nav-link" href="{{url('blog/posts')}}">وبلاگ</a>
                </li>
                <li class="list-item">
                    <a class="nav-link" href="{{route('techno.game')}}">تکنوگیم</a>
                </li>
{{--                <li class="list-item" style="color: white;"></li>--}}
{{--                <li class="list-item amazing-item">--}}
{{--                    <a class="nav-link" href="#" target="_blank">شگفت‌انگیزها</a>--}}
{{--                </li>--}}
            </ul>
        </div>
    </nav>
</header>
<div class="overlay-search-box"></div>
<!-- header -->


