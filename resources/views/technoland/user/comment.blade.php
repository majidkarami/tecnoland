@extends('technoland.layout.master')
@section('title', __('پرسش های کاربر'))

@section('styles')
    <style>
        .pagination .page-item.active>.page-link, .pagination .page-item.active>.page-link:focus, .pagination .page-item.active>.page-link:hover {
            background-color: #00bfd6;
        }

        .pagination{
            justify-content: center!important;
        }
        .user_comment_box {
            background: #fafbfc;
            box-shadow: 0 2px 3px rgba(0,0,0,.15);
            border-radius: 2px;
            margin-bottom: 30px;
        }
        .comment_header {
            background: #f5f6f7;
            width: 100%;
            padding-top: 15px;
            padding-bottom: 5px;
        }
        .rating-container {
            float: right;
        }
        .rang_ul {
            margin-top: 30px;
            padding-right: 20px !important;
        }
        .done {
            background: #a1a6b5 !important;
        }
        .bar {
            background: #ebeced;
            height: 5px;
            width: 39px;
            border-left: 2px solid #fff;
            float: right;
            margin-top: 7px;
        }

        .rang_ul li {
            list-style: none;
            width: 100%;
            float: right;
            margin-top: 10px;
        }
        .rang_ul li span {
            float: right;
            width: 170px;
        }
        .comment_header p {
            padding-right: 20px;
            border-top-right-radius: 2px;
            border-top-left-radius: 2px;
        }
        main.profile-user-page .content-section p
        {
            line-height: 10px;
        }

    </style>
@endsection

@section('content')


    <main class="profile-user-page default">
        <div class="container">
            <div class="row">
                <div class="profile-page col-xl-9 col-lg-8 col-md-12 order-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-12">
                                <h1 class="title-tab-content">پرسش ها</h1>
                            </div>
                            <div class="content-section default">
                                <div class="row">
                                    <div class="cart-page-content col-xl-12 col-lg-12 col-md-12 order-1">
                                        <section class="page-content default">
                                            <div class="address-section">
                                                <div class="box-body">

                                                    <?php
                                                    $item_name=array();
                                                    $item_name[1]='کيفيت ساخت';
                                                    $item_name[2]='ارزش خريد به نسبت قيمت';
                                                    $item_name[3]='نوآوري';
                                                    $item_name[4]='امکانات و قابليت ها';
                                                    $item_name[5]='سهولت استفاده';
                                                    $item_name[6]='طراحي و ظاهر';
                                                    ?>

                                                    @if(sizeof($comments)>0)

                                                        @php
                                                            function score_check($comments,$n)
                                                            {
                                                                  $a=0;
                                                                  if($comments)
                                                                  {
                                                                      $e=explode('@#',$comments->value);
                                                                      foreach ($e as $key=>$value)
                                                                      {
                                                                          $k=$n.'_';
                                                                          $c=explode($k,$value);
                                                                          if(sizeof($c)==2)
                                                                          {
                                                                             $a=$c[1];
                                                                          }
                                                                      }
                                                                  }
                                                                  return $a;
                                                            }
                                                        @endphp
                                                        @foreach($comments as $key=>$value)

                                                            <div class="row user_comment_box" style="width:97%;margin:20px auto">
                                                                <div class="comment_header widget-user-header bg-aqua-active">

                                                                    <?php
                                                                    $jdf=new \App\lib\Jdf();
                                                                    $comment=$value->get_comment;
                                                                    ?>
                                                                    <div style="float: right;">
                                                                        @if(!empty($value->get_user->username))

                                                                            <p>کاریر : {{ $value->get_user->username }}</p>
                                                                            <span style="padding-right: 20px;
">
                                                                                     {{ $value->get_product->title }}
                                                                             </span>
                                                                        @else
                                                                            <p>
                                                                                <span>
                                                                                    کاربر سایت
                                                                                </span>
                                                                                <span>
                                                                                    - {{ $value->get_product->title }}
                                                                                </span>
                                                                            </p>

                                                                        @endif
                                                                        <p style="font-size:11px;margin-top: 10px;">{{ $jdf->jdate('n F y',$value->time) }}</p>
                                                                    </div>

                                                                    <div style="clear:both"></div>
                                                                </div>
                                                                <div class="col-md-6" >
                                                                    <ul class="rang_ul" >
                                                                        @foreach($item_name as $k=>$v)

                                                                            <li>
                                                                                <span>{{ $v }}</span>
                                                                                <div class="rating-container">
                                                                                    <div class="bar @if(score_check($value,$k)>=1) done @endif"></div>
                                                                                    <div class="bar @if(score_check($value,$k)>=2) done @endif"></div>
                                                                                    <div class="bar @if(score_check($value,$k)>=3) done @endif"></div>
                                                                                    <div class="bar @if(score_check($value,$k)>=4) done @endif"></div>
                                                                                    <div class="bar @if(score_check($value,$k)==5) done @endif"></div>
                                                                                </div>
                                                                            </li>

                                                                        @endforeach
                                                                    </ul>
                                                                    <div style="clear:both;padding-top: 10px;"></div>
                                                                </div>

                                                                @if($comment)

                                                                    <div class="col-md-6">
                                                                        <p style="margin-top: 10px;font-size: 14px;"> عنوان :</p>
                                                                        <p style="margin-top: 5px;font-weight: bold;font-size: 14px;">{{ $comment->subject }}</p>
                                                                        <hr>
                                                                        @if(!empty($comment->advantages))
                                                                            <p style="color:green;font-size: 14px;">نقاط قوت</p>

                                                                            <?php
                                                                            $advantages=explode('@$E@',$comment->advantages);
                                                                            ?>
                                                                            @foreach($advantages as $key=>$value)
                                                                                @if(!empty($value))
                                                                                    <p style="font-size: 14px;">
                                                                                        <span class="fa fa-arrow-up"></span>
                                                                                        <span class="icon_span">{{ $value }}</span>
                                                                                    </p>

                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                        <hr>
                                                                        @if(!empty($comment->disadvantages))
                                                                            <p style="color:red;font-size: 14px;">نقاط ضعف</p>

                                                                            <?php
                                                                            $disadvantages=explode('@$E@',$comment->disadvantages);
                                                                            ?>
                                                                            @foreach($disadvantages as $key=>$value)
                                                                                @if(!empty($value))
                                                                                    <p style="font-size: 14px;">
                                                                                        <span class="fa fa-arrow-down"></span>
                                                                                        <span class="icon_span">{{ $value }}</span>
                                                                                    </p>
                                                                                @endif
                                                                            @endforeach
                                                                        @endif
                                                                        <hr>
                                                                        <h6 class="text-bold text-info" style="padding-bottom: 5px;">توضیحات :</h6>
                                                                        <div style="text-align:justify;width:95%;">
                                                                            <p style="font-size: 14px;padding-bottom: 10px">{{ $comment->comment_text }}</p></div>

                                                                    </div>

                                                                @endif
                                                            </div>

                                                        @endforeach

                                                            <div class="col-md-12 text-xs-center" style="padding-top: 30px;">
                                                                {!! $comments->render() !!}
                                                            </div>


                                                    @else

                                                    @endif
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="profile-page-aside col-xl-3 col-lg-4 col-md-6 center-section order-1">
                    <div class="profile-box">
                        <div class="profile-box-header">
                            <div class="profile-box-avatar">
                                <img src="{{asset('user/img/svg/user.svg')}}" alt="">
                            </div>
                            <button class="profile-box-btn-edit">
                                <i class="fa fa-pencil"></i>
                            </button>

                        </div>
                        <div class="profile-box-username">{{auth()->user()->username}}</div>
                        <div class="profile-box-tabs">
                            <a class="profile-box-tab profile-box-tab-access">
                                <i class="now-ui-icons ui-1_check"></i>
                                خوش آمدید
                            </a>
                            <a href="{{route('logout')}}" class="profile-box-tab profile-box-tab--sign-out">
                                <i class="now-ui-icons media-1_button-power"></i>
                                خروج از حساب
                            </a>
                        </div>
                    </div>
                    <div class="responsive-profile-menu show-md">
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-navicon"></i>
                                حساب کاربری شما
                            </button>
                            <div class="dropdown-menu dropdown-menu-right text-right">
                                <a href="{{route('user.profile')}}" class="dropdown-item active-menu">
                                    <i class="now-ui-icons users_single-02"></i>
                                    پروفایل
                                </a>
                                <a href="{{route('user.orders')}}" class="dropdown-item">
                                    <i class="now-ui-icons shopping_basket"></i>
                                    همه سفارش ها
                                </a>
                                <a href="{{route('user.favorites')}}" class="dropdown-item">
                                    <i class="now-ui-icons files_single-copy-04"></i>
                                    لیست علاقمندی ها
                                </a>
                                <a href="{{route('user.question')}}" class="dropdown-item">
                                    <i class="now-ui-icons business_badge"></i>
                                    نظرات من
                                </a>
                                <a href="{{route('user.comment')}}" class="dropdown-item">
                                    <i class="now-ui-icons business_badge"></i>
                                    پرسش های من
                                </a>
                                <a href="{{route('user.address')}}" class="dropdown-item">
                                    <i class="now-ui-icons business_badge"></i>
                                    آدرس ها
                                </a>

                                {{--                                <a href="profile-personal-info.html" class="dropdown-item">--}}
                                {{--                                    <i class="now-ui-icons business_badge"></i>--}}
                                {{--                                    نقدهای من--}}
                                {{--                                </a>--}}
                                {{--                                <a href="profile-personal-info.html" class="dropdown-item">--}}
                                {{--                                    <i class="now-ui-icons business_badge"></i>--}}
                                {{--                                 تکنو بن--}}
                                {{--                                </a>--}}

                            </div>
                        </div>
                    </div>
                    <div class="profile-menu hidden-md">
                        <div class="profile-menu-header">حساب کاربری شما</div>
                        <ul class="profile-menu-items">
                            <li>
                                <a href="{{route('user.profile')}}" class="active">
                                    <i class="now-ui-icons users_single-02"></i>
                                    پروفایل
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.orders')}}">
                                    <i class="now-ui-icons shopping_basket"></i>
                                    همه سفارش ها
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.favorites')}}">
                                    <i class="now-ui-icons files_single-copy-04"></i>
                                    لیست علاقمندی ها
                                </a>
                            </li>

                            <li>
                                <a href="{{route('user.question')}}">
                                    <i class="now-ui-icons business_badge"></i>
                                    نظرات من
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.comment')}}">
                                    <i class="now-ui-icons business_badge"></i>
                                    پرسش های من
                                </a>
                            </li>
                            <li>
                                <a href="{{route('user.address')}}">
                                    <i class="now-ui-icons business_badge"></i>
                                    آدرس ها
                                </a>
                            </li>
                            {{--                            <li>--}}
                            {{--                                <a href="profile-favorites.html">--}}
                            {{--                                    <i class="now-ui-icons ui-2_favourite-28"></i>--}}
                            {{--                                    نقدهای من--}}
                            {{--                                </a>--}}
                            {{--                            </li>--}}

                            {{--                            <li>--}}
                            {{--                                <a href="{{route('')}}">--}}
                            {{--                                    <i class="now-ui-icons business_badge"></i>--}}
                            {{--                                    تکنو بن--}}
                            {{--                                </a>--}}
                            {{--                            </li>--}}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection