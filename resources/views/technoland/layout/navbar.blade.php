<!-- responsive-header -->
<?php
use App\lib\Mobile_Detect;$detect = new Mobile_Detect;
?>

@if($detect->isMobile())
    <nav class="navbar direction-ltr fixed-top header-responsive">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="#pablo">
                    <img src="{{asset('user/img/logo.png')}}" height="24px" alt="">
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        data-target="#navigation" aria-controls="navigation-index" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
                <div class="search-nav default">

                    <form action="{{ route('search.header.mob') }}" class="search" id="search_product_form">
                        <input type="text" name="text" id="input-search" placeholder="جستجو ...">
                        <button type="submit"><img src="{{ asset('user/img/search.png') }}" alt=""></button>
                    </form>

                    <ul>
                        @if(Auth::check())
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                </a>
                            </li>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        @else
                            <li><a href="{{route('login')}}"><i class="now-ui-icons users_single-02"></i></a></li>
                        @endif
                        <li><a href="{{ url('Cart') }}"><span style="padding: 0px 2px;line-height: 11px;float: right;"
                                                              class="badge badge-info">{{ \App\Cart::count() }}</span><i
                                        class="now-ui-icons shopping_basket"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <div class="logo-nav-res default text-center">
                    <a href="#">
                        <img src="{{asset('user/img/logo.png')}}" height="36px" alt="">
                    </a>
                </div>


                <ul class="navbar-nav default">
                    @foreach($category as $key=>$value)
                        <li class="sub-menu">
                            <a href="{{ url('category').'/'.$value['cat_ename'] }}">{{ $value['cat_name'] }}</a>
                            <ul>
                                @foreach($value->getChild as $key2=>$value2)
                                    <li class="sub-menu">
                                        <a href="{{ url('category').'/'.$value->cat_ename.'/'.$value2->cat_ename }}">{{ $value2->cat_name }}</a>
                                        <ul>
                                            @foreach($value2->getChild as $key3=>$value3)
                                                <?php

                                                $menu4 = $value3->getChild2;
                                                ?>
                                                <li class="sub-menu">
                                                    <a href="{{ url('category').'/'.$value->cat_ename.'/'.$value2->cat_ename.'/'.$value3->cat_ename }}">{{ $value3->cat_name }}</a>
                                                    <ul>
                                                        @foreach($menu4 as $key4=>$value4)
                                                            <?php
                                                            $url = url('/');
                                                            $e = explode('_', $value4->cat_ename);
                                                            if (sizeof($e) == 3) {
                                                                if ($e[0] == 'filter') {
                                                                    $url .= '/search/' . $value->cat_ename . '/' . $value2->cat_ename . '/' . $value3->cat_ename . '?' . $e[1] . '[0]=' . $e[2];
                                                                } else {
                                                                    $url .= '/category/' . $value->cat_ename . '/' . $value2->cat_ename . '/' . $value3->cat_ename . '/' . $value4->cat_ename;
                                                                }
                                                            } else {
                                                                $url .= '/category/' . $value->cat_ename . '/' . $value2->cat_ename . '/' . $value3->cat_ename . '/' . $value4->cat_ename;
                                                            }
                                                            ?>
                                                            <li>
                                                                <a href="{{ $url }}">  {{ $value4->cat_name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </nav>
@endif
<!-- responsive-header -->