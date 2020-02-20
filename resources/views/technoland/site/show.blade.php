@extends('technoland.layout.master')
@section('title', __('توضیحات محصول'))

@section('styles')

    <link rel="stylesheet" type="text/css" href="{{ url('user/css/flipclock.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('user/css/user.css') }}">

@endsection
@section('content')
    <!-- main -->
    <main class="single-product default">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <nav>
                        <ul class="breadcrumb">
                            <li>
                                <a href="{{ url('') }}"><span>فروشگاه اینترنتی تکنولند</span></a>
                            </li>
                            @foreach ($product->get_cats as $a)
                            @php
                            $pro_cat = App\Category::orderBy('id', 'ASC')->findOrFail($a->cat_id);
                            @endphp
                                <li>
                                   <a href="{{ url('category').'/'.$pro_cat->cat_ename }}"><span>{{ $pro_cat->cat_name }}</span></a>
                                </li>
                            @endforeach

                        </ul>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <article class="product" style="border: 1px solid #05e4ff;">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">

{{--                                    @if(!empty($pro_amazing))--}}
{{--                                        <div class="product-gallery default">--}}
{{--                                            <img class="amazing-title"--}}
{{--                                                 src="{{ asset('user/img/shegeft.png') }}"--}}
{{--                                                 alt="" width="190" height="25">--}}

{{--                                            <div class="clock" style="float: left;margin: -5px 0px -10px 10px;"--}}
{{--                                                 id="amazing_clock_{{$product->id}}">--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <hr style="margin-top: 2.3rem;">--}}
{{--                                    @endif--}}

                                <div class="product-gallery default">

                                    <?php
                                    $images = $product->get_images;
                                    ?>
                                    @if(!empty($images[0]->url))
                                        <img class="zoom-img" id="img-product-zoom" src="{{ url($images[0]->url )}}"
                                             data-zoom-image="{{ url($images[0]->url )}}" width="411"/>
                                    @else
                                        <img class="zoom-img" id="img-product-zoom"
                                             src="{{ asset('/user/img/not-img.png') }}"
                                             data-zoom-image="{{ asset('/user/img/not-img.png') }}" width="411"/>
                                    @endif
                                    <div id="gallery_01f" style="width:500px;float:left;">
                                        <ul class="gallery-items owl-carousel owl-theme" id="gallery-slider">
                                            @foreach($images as $key=>$value)
                                                @if(!empty($value->url))
                                                    <li class="item">
                                                        <a href="#"
                                                           class="elevatezoom-gallery {{ $loop->first ? 'active' : '' }}"
                                                           data-update=""
                                                           data-image="{{ url($value->url) }}"
                                                           data-zoom-image="{{ url($value->url) }}">
                                                            <img src="{{ url($value->url) }}" width="100"/></a>
                                                    </li>
                                                @else
                                                    <li class="item">
                                                        <a href="#"
                                                           class="elevatezoom-gallery {{ $loop->first ? 'active' : '' }}"
                                                           data-update=""
                                                           data-image="{{ asset('/user/img/not-img.png') }}"
                                                           data-zoom-image="{{ asset('/user/img/not-img.png') }}">
                                                            <img src="{{ asset('/user/img/not-img.png') }}"
                                                                 width="100"/></a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <ul class="gallery-options" style="top: 52px;">
                                    @if(Auth::check())
                                        <li>
                                            @if($bookmark)
                                                <button id="bookmark_info" class="add-favorites favorites" onclick="dislike('<?= $product->id ?>')"><i class="fa fa-heart"></i></button>
                                                <span id="tooltip-option" class="tooltip-option">حذف از علاقمندی</span>
                                            @else
                                                <button id="bookmark_info" class="add-favorites" onclick="like('<?= $product->id?>')"><i class="fa fa-heart"></i></button>
                                                <span id="tooltip-option" class="tooltip-option">افزودن به علاقمندی</span>
                                            @endif
                                        </li>
                                    @endif

{{--                                    <li>--}}
{{--                                        <button data-toggle="modal" data-target="#myModal"><i--}}
{{--                                                    class="fa fa-share-alt"></i></button>--}}
{{--                                        <span class="tooltip-option">اشتراک گذاری</span>--}}
{{--                                    </li>--}}
                                </ul>
                                <!-- Modal Core -->
                                <div class="modal-share modal fade" id="myModal" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">اشتراک گذاری</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-share">
                                                    <div class="form-share-title">اشتراک گذاری در شبکه های اجتماعی
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <ul class="btn-group-share">
                                                                <li><a href="#" class="btn-share btn-share-twitter"
                                                                       target="_blank"><i
                                                                                class="fa fa-twitter"></i></a></li>
                                                                <li><a href="#" class="btn-share btn-share-facebook"
                                                                       target="_blank"><i
                                                                                class="fa fa-facebook"></i></a></li>
                                                                <li><a href="#"
                                                                       class="btn-share btn-share-google-plus"
                                                                       target="_blank"><i
                                                                                class="fa fa-google-plus"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="form-share-title">ارسال به ایمیل</div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="ui-input ui-input-send-to-email">
                                                                <input class="ui-input-field" type="email"
                                                                       placeholder="آدرس ایمیل را وارد نمایید.">
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <button class="btn-primary">ارسال</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <form class="form-share-url default">
                                                    <div class="form-share-url-title">آدرس صفحه</div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label class="ui-url">
                                                                <input class="ui-url-field"
                                                                       value="https://www.digikala.com">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Core -->
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="product-title default">
                                    <h1>
                                        {{ $product->title }}
                                        <span>{{ $product->code }}</span></h1>
                                </div>
                                <div class="product-directory default">
                                    <ul>
                                        <li>
                                            <span>برند</span> :
                                            <span class="product-brand-title">متفرقه</span>
                                        </li>
                                        <li>
                                            <span>دسته‌بندی</span> :
                                        @foreach ($product->get_cats as $a)
                                            @php
                                                $pro_cat = App\Category::orderBy('id', 'ASC')->findOrFail($a->cat_id);
                                            @endphp
                                            @if( $loop->last)
                                                <a href="{{ url('category').'/'.$pro_cat->cat_ename }}" class="btn-link-border">
                                                   {{$pro_cat->cat_name}}
                                                </a>
                                                @endif
                                        @endforeach

                                        </li>
                                    </ul>
                                </div>
                                <div class="product-variants default">
                                    @if($product->product_status==1)

                                        <form method="post" action="{{ url('Cart') }}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <?php
                                            $colors=$product->get_colors;
                                            $color_id=0;
                                            ?>

                                            <div id="product_info">
                                                <?php
                                                $color_id=0;
                                                $service_id=0;
                                                ?>
                                                @if(sizeof($colors)>0)
                                                    <p style="padding-top: 20px;">انتخاب رنگ</p>
                                                    @foreach($colors as $key=>$value)
                                                        @if($key==0)
                                                            <?php $color_id=$value->id ?>
                                                        @endif
                                                        <div class="color_box" onclick="set_color('<?= $value->id ?>')">
                                                            <label style="background:#{{ $value->color_code }}"> @if($key==0) <span class="tick"></span> @endif</label>
                                                            <span>{{ $value->color_name }}</span>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <input type="hidden" name="color_id" id="color_id" value="{{ $color_id }}">

                                                <div style="width:100%;float: right;">

                                                    @if(sizeof($product->get_service_name)>0)

                                                        <p style="padding-top:20px">انتخاب گارانتی</p>

                                                        <?php
                                                        $c=0;
                                                        ?>
                                                        @foreach($product->get_service_name as $key=>$value)

                                                            @if($color_id==0)

                                                                @if($key==0)
                                                                    <div class="service_title" onclick="show_service()">
                                                                        <span>{{ $value->service_name }}</span>
                                                                        <a class="service_ic" id="service_ic"></a>
                                                                    </div>
                                                                    <?php
                                                                    $service_id=$value->id;
                                                                    ?>
                                                                @endif
                                                            @else

                                                                <?php

                                                                if($c==0)
                                                                {
                                                                $check=DB::table('service')->where(['parent_id'=>$value->id,'color_id'=>$color_id])->first();
                                                                if($check)
                                                                {
                                                                $c=1;
                                                                ?>
                                                                <div class="service_title" onclick="show_service()">
                                                                    <span>{{ $value->service_name }}</span>
                                                                    <a class="service_ic" id="service_ic"></a>
                                                                </div>
                                                                <?php
                                                                $service_id=$value->id;
                                                                ?>
                                                                <?php
                                                                }
                                                                }
                                                                ?>
                                                            @endif

                                                        @endforeach

                                                        <div class="service_box" id="service_box">
                                                            @foreach($product->get_service_name as $key=>$value)
                                                                <div onclick="set_service('<?= $value->id ?>')">
                                                                    {{ $value->service_name }}
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                    @endif
                                                    <input type="hidden" name="service_id" value="{{ $service_id }}" id="service_id">


                                                </div>

{{--                                                @if(!empty($pro_amazing) and $pro_amazing->timestamp < time())--}}
{{--                                                        <div class="price-product defualt">--}}
{{--                                                            <div style="width:100%;float:right;margin-top: 70px;">--}}
{{--                                                                <del><span>--}}
{{--                                                                    @if(!empty($pro_amazing->price1))--}}
{{--                                                                            {{ number_format($pro_amazing->price1) }}--}}
{{--                                                                        @endif--}}
{{--                                                            <span>تومان</span></span></del>--}}
{{--                                                                <div class="price-value">--}}
{{--                                                                    <span>{{ number_format($pro_amazing->price2) }} </span>--}}
{{--                                                                    <span class="price-currency">تومان</span>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="price-discount" data-title="تخفیف" style="margin-right: 85px;">--}}
{{--                                                                    <span>{{difference($pro_amazing->price1,$pro_amazing->price2,1)}}</span>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}

{{--                                                            <div class="product-add default" style="margin-top: 50px">--}}
{{--                                                                <div class="parent-btn">--}}
{{--                                                                    <button type="submit" class="dk-btn dk-btn-info" style="font-size: 14px;padding: 18px 66px;">--}}
{{--                                                                        افزودن به سبد خرید--}}
{{--                                                                        <i class="now-ui-icons shopping_cart-simple"></i>--}}
{{--                                                                    </button>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                @else--}}
                                                        <div class="price-product defualt">
                                                            <div style="width:100%;float:right;margin-top: 70px;">
                                                                <div class="price">
                                                                    <span style="color: green;">
                                                                        {{ number_format($product->price) }}
                                                                        <span>تومان</span>
                                                                     </span>
                                                                </div>
                                                                @if(!empty($product->discounts))
                                                                    <div class="price-value">با تخفیف
                                                                        <span>{{ number_format($product->price-$product->discounts) }}</span>
                                                                        <span class="price-currency">تومان</span>
                                                                    </div>
                                                                @endif
                                                                <div class="price-discount" data-title="تخفیف" style="margin-right: 85px;">
                                                                    <span>{{difference($product->price,$product->discounts,1)}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="product-add default" style="margin-top: 50px">
                                                                <div class="parent-btn">
                                                                    <button type="submit" class="dk-btn dk-btn-info" style="font-size: 14px;padding: 18px 66px;">
                                                                        افزودن به سبد خرید
                                                                        <i class="now-ui-icons shopping_cart-simple"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
{{--                                                @endif--}}
                                            </div>
                                        </form>
                                    @endif

                                </div>

                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-12 center-breakpoint">
                                <?php
                                $avg = collect($score_data['score'])->avg();
                                $avg = substr($avg, 0, 4);
                                $width = $avg * 20;
                                ?>
                                <div class="product-guaranteed default">
                                    بیش از {{ $score_data['total'] }} نفر از خریداران این محصول را پیشنهاد داده‌اند
                                </div>
                                <div class="product-params default">
                                    <ul data-title="ویژگی‌های محصول">
                                        <?php $count = 0; ?>
                                        @foreach ($product->get_items as $key=>$value)
                                            <?php if($count == 8) break; ?>
                                            <li>
                                                @php
                                                 $item_name = App\Item::get_name($value->item_id);
                                                @endphp
                                                @if( empty( $item_name) )
                                                    <span></span>
                                                    <span></span>
                                                @else
                                                    <span>{{ $item_name }} : </span>
                                                    <span>{{ $value->value }} </span>
                                                @endif

                                            </li>
                                                <?php $count++; ?>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row banner-ads">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="widget widget-banner card">
                                <a href="#" target="_blank">
                                    <img class="img-fluid" src="{{asset('user/img/banner/banner-11.jpg')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-12">
                    <div class="widget widget-product card widget-suggestion">
                        <header class="card-header">
                            <h3 class="card-title">
                                <span>محصولات مرتبط</span>
                            </h3>
{{--                            <a href="#" class="view-all">مشاهده همه</a>--}}
                        </header>
                        <div class="product-carousel owl-carousel owl-theme">
                            @foreach($products_linked as $key)
                                @php
                                    $value = App\Product::findOrFail($key);
                                @endphp
                                <div class="item">
                                    @if(!empty($value->get_img->url))
                                        <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                            <img src="{{ url($value->get_img->url) }}"
                                                 class="img-fluid" alt="{{$value->title}}">
                                        </a>
                                    @else
                                        <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                            <img src="{{ asset('/user/img/not-img.png') }}"
                                                 class="img-fluid" alt="{{$value->title}}">
                                        </a>
                                    @endif
                                    <h2 class="post-title">
                                        <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                                            @if(strlen($value->title)>50)
                                                {{ mb_substr($value->title,0,33).' ... ' }}
                                            @else
                                                {{ $value->title }}
                                            @endif
                                        </a>
                                    </h2>
                                    <div class="price">
                                        <div class="text-center" @if(!empty($value->discounts) && !empty($value->price)) style="background: #F5F6F7;border-radius: 5px" @endif>
                                            <del>
                                                    <span>
                                                        @if(!empty($value->discounts) && !empty($value->price))
                                                            {{ number_format($value->price) }}
                                                            <span>تومان</span>
                                                        @endif
                                                    </span>
                                            </del>
                                        </div>
                                        <div class="text-center">
                                            <ins>
                                                    <span>
                                                           @if(!empty($value->discounts) && !empty($value->price))
                                                            {{ number_format($value->price-$value->discounts) }}
                                                            <span>تومان</span>
                                                        @elseif(!empty($value->price))
                                                            {{ number_format($value->price) }}
                                                            <span>تومان</span>
                                                        @endif

                                                    </span>
                                            </ins>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="container">
                    <div class="col-12 default no-padding">
                        <div class="product-tabs default">
                            <div class="box-tabs default">
                                <ul class="nav" role="tablist" id="myTabs">
                                    <li class="box-tabs-tab">
                                        <a  id="tab_review" class="active" data-toggle="tab" href="#review" role="tab"
                                           aria-expanded="true">
                                            <i class="now-ui-icons education_glasses"></i> نقد و بررسی
                                        </a>
                                    </li>
                                    <li class="box-tabs-tab">
                                        <a  id="tab_item" data-toggle="tab" href="#item" role="tab" aria-expanded="false">
                                            <i class="now-ui-icons design_bullet-list-67"></i> مشخصات
                                        </a>
                                    </li>
                                    <li class="box-tabs-tab">
                                        <a id="tab_comment" data-toggle="tab" href="#comment" role="tab" aria-expanded="false">
                                            <i class="now-ui-icons ui-2_chat-round"></i> نظرات کاربران
                                        </a>
                                    </li>
                                    <li class="box-tabs-tab">
                                        <a id="tab_question" data-toggle="tab" href="#question" role="tab" aria-expanded="false">
                                            <i class="now-ui-icons travel_info"></i> پرسش و پاسخ
                                        </a>
                                    </li>
                                </ul>
                                <div class="card-body default">
                                    <!-- Tab panes -->
                                    <div class="tab-content">

                                        <div class="tab-pane fade show active" id="review" role="tabpanel"
                                             aria-expanded="true">
                                            <article>
                                                <h2 class="param-title" style="margin-top: 20px;color: #00bfd6">
                                                    نقد و بررسی تخصصی تکنولند
                                                    <span style="font-size: 14px;margin-top: 30px;">{{$product->title}}</span>
                                                </h2>
                                                        @if($review)

                                                            <?php

                                                            $review_tozihat=$review->review_tozihat;
                                                            $f=strpos($review_tozihat,'start_review');
                                                            $t=substr($review_tozihat,0,$f);
                                                            echo strip_tags($t,'<img><p>');
                                                            $t2=substr($review_tozihat,$f,strlen($review_tozihat));
                                                            $text=explode('start_review',$t2);
                                                            foreach ($text as $key=>$value)
                                                            {
                                                                if(!empty($value))
                                                                {
                                                                    $d="<div class='review_title' onclick='show_review($key)' id='review_title_$key'>";
                                                                    $d2="</div><div class='review_div' id='review_div_$key'>";
                                                                    $v=str_replace('start_item',$d,$value);

                                                                    $v=str_replace('end_item',$d2,$v).'<div style="clear: both;"></div></div>';

                                                                    echo strip_tags($v,'<img><p><div>');
                                                                }
                                                            }
                                                            ?>
                                                        @else
                                                            <p style="color:red;padding-top:30px;padding-bottom:30px;text-align:center">نقد و بررسی تخصصی برای این محصول ثبت نشد</p>
                                                        @endif

                                            </article>
                                        </div>

                                        <div class="tab-pane fade params" id="item" role="tabpanel"
                                             aria-expanded="false">
                                            <article>
                                                <h2 class="param-title" style="margin-top: 20px;color: #00bfd6">
                                                    مشخصات فنی
                                                    <span style="font-size: 14px;margin-top: 30px;">{{$product->title}}</span>
                                                </h2>
                                                @include('technoland.include.product_item',['product'=>$product,'item_value'=>$item_value,'items'=>$items])
                                            </article>
                                        </div>

                                        <div class="tab-pane fade" id="comment" role="tabpanel"
                                             aria-expanded="false">
                                            <article>
                                                <h2 class="comments-headline">امتیاز کاربران به :
                                                    <span>
                                                            <span>
                                                               {{$product->title}}
                                                            </span>
                                                            <span> |</span>
                                                            <span>۴</span>
                                                            <span> / ۵</span>
                                                            <span>(۱۵ نفر)
                                                            </span>
                                                        </span>
                                                </h2>
                                                <div class="row" style="margin-top:30px;margin-bottom:20px">

                                                    <div class="col-md-7" >
                                                        <ul class="rang_ul" >
                                                            <?php

                                                            $item_name=array();
                                                            $item_name[1]='کيفيت ساخت';
                                                            $item_name[2]='ارزش خريد به نسبت قيمت';
                                                            $item_name[3]='نوآوري';
                                                            $item_name[4]='امکانات و قابليت ها';
                                                            $item_name[5]='سهولت استفاده';
                                                            $item_name[6]='طراحي و ظاهر';


                                                            function get_width($value,$n)
                                                            {
                                                                if($value>=$n)
                                                                {
                                                                    return 100;
                                                                }
                                                                else
                                                                {
                                                                    $c=$n-$value;
                                                                    if($c<1)
                                                                    {
                                                                        return $c*100;
                                                                    }
                                                                    else
                                                                    {
                                                                        return 0;
                                                                    }
                                                                }
                                                            }
                                                            ?>

                                                            @foreach($item_name as $key=>$value)
                                                                    <li>
                                                                    <span>{{ $value }}</span>
                                                                    <div class="rating-container">
                                                                        <div class="bar2">
                                                                            <div style="width:{{ get_width($score_data['score'][$key],1) }}%" class="holder2"></div>
                                                                            @if($score_data['score'][$key]<1)
                                                                                <div class="number_score rating" data-rate-digit="{{ substr($score_data['score'][$key],0,3) }}"></div>
                                                                            @endif
                                                                        </div>

                                                                        <div class="bar2"><div style="width:{{ get_width($score_data['score'][$key],2) }}%" class="holder2"></div>
                                                                            @if($score_data['score'][$key]>1 && $score_data['score'][$key]<2)
                                                                                <div class="number_score rating" data-rate-digit="{{ substr($score_data['score'][$key],0,3) }}"></div>
                                                                            @endif
                                                                        </div>

                                                                        <div class="bar2"><div style="width:{{ get_width($score_data['score'][$key],3) }}%" class="holder2"></div>
                                                                            @if($score_data['score'][$key]>=2 && $score_data['score'][$key]<3)
                                                                                <div class="number_score rating" data-rate-digit="{{ substr($score_data['score'][$key],0,3) }}"></div>
                                                                            @endif

                                                                        </div>

                                                                        <div class="bar2"><div style="width:{{ get_width($score_data['score'][$key],4) }}%" class="holder2"></div>
                                                                            @if($score_data['score'][$key]>=3 && $score_data['score'][$key]<4)
                                                                                <div class="number_score rating" data-rate-digit="{{ substr($score_data['score'][$key],0,3)  }}"></div>
                                                                            @endif
                                                                        </div>

                                                                        <div class="bar2"><div style="width:{{ get_width($score_data['score'][$key],5) }}%" class="holder2"></div>
                                                                            @if($score_data['score'][$key]>=4 && $score_data['score'][$key]<=5)
                                                                                <div class="number_score rating" data-rate-digit="{{ substr($score_data['score'][$key],0,3) }}"></div>
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                    <div class="col-md-5">

                                                        <p> شما هم می توانید در مورد این کالا نظر بدهید.</p>

                                                        @if(Auth::check())
                                                            <div class="parent-btn">
                                                                <a href="{{ url('AddComment/Com').'-'.$product->id }}" class="dk-btn dk-btn-info">
                                                                    افزودن نظر جدید
                                                                    <i class="now-ui-icons ui-2_chat-round"></i>
                                                                </a>
                                                            </div>
                                                        @else
                                                            <p>
                                                                برای ثبت نظرات، نقد و بررسی شما لازم است ابتدا وارد حساب کاربری خود شوید. اگر این محصول را قبلا از تکنولند خریده باشید، نظر شما به عنوان مالک محصول ثبت خواهد شد.
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="loading_box" id="loading_comment" style="padding-top:50px;padding-bottom: 40px;">
                                                    <div class="loading"></div>
                                                    <span style="color: #d64b4a">در حال دریافت اطلاعات</span>
                                                </div>

                                                <div id="comment_box"></div>
                                            </article>
                                        </div>

                                        <div class="tab-pane fade form-comment" id="question" role="tabpanel" aria-expanded="false">
                                            <article>
                                                <h2 class="param-title" style="margin-top: 20px;color: #00bfd6;">
                                                    افزودن نظر
{{--                                                    <span>نظر خود را در مورد محصول مطرح نمایید</span>--}}
                                                </h2>

                                                <div id="loading_question" class="loading_box" style="padding-top:50px;padding-bottom: 40px;">
                                                    <div class="loading"></div>
                                                    <span>در حال دریافت اطلاعات</span>
                                                </div>

                                                <div id="question_box"></div>
                                                @if($errors->has('question'))
                                                    <?php
                                                    Session::flash('error_question',$errors->first('question'));
                                                    ?>
                                                @endif
                                            </article>
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
    <!-- main -->

@endsection

@section('scripts')
    {{--    <script src="{{asset('user/js/plugins/3deye.min.js')}}" type="text/javascript"></script>--}}
    <?php
    $url = url('site/ajax_set_service');
    $url2 = url('site/ajax_get_tab_data');
    $url3 = url('site/add/bookmark');
    $url4 = url('site/delete/bookmark');
    ?>
    <script>
        $('#myTabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
            var product_id = '<?= $product->id ?>';
            var id = this.id.replace('tab_', '');
            var check_data = document.getElementById('data_' + id);

            if (id == "question" || id == "comment") {


                if (!check_data) {
                    $("#loading_" + id).show();
                    $.ajaxSetup(
                        {
                            'headers': {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                    $.ajax({
                        url: '{{ $url2 }}',
                        type: 'POST',
                        data: 'tab_id=' + id + '&product_id=' + product_id,
                        success: function (data) {
                            $("#loading_" + id).hide();
                            $("#" + id + "_box").html(data);
                        }
                    });
                }

            }
        });
        set_service = function (service_id) {
            $("#service_box").slideUp();
            var product_id = '<?= $product->id ?>';
            var color_id = document.getElementById('color_id').value;
            $.ajaxSetup(
                {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.ajax({
                url: '{{ $url }}',
                type: 'POST',
                data: 'service_id=' + service_id + '&product_id=' + product_id + '&color_id=' + color_id,
                success: function (data) {
                    $("#loading_box").hide();
                    $("#product_info").html(data);
                }
            });
        };
        set_color = function (color_id) {

            var product_id = '<?= $product->id ?>';
            var service_id = document.getElementById('service_id').value;
            $.ajaxSetup(
                {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.ajax({
                url: '{{ $url }}',
                type: 'POST',
                data: 'service_id=' + service_id + '&product_id=' + product_id + '&color_id=' + color_id,
                success: function (data) {
                    $("#product_info").html(data);
                }
            });
        };
    </script>

    <script type="text/javascript" src="{{ url('user/js/flipclock.min.js') }}"></script>
    <script>
        var amazing_time = new Array;
        var i = 0;
        <?php
            foreach ($amazing as $key=>$value)
            {
            $time = ($value->timestamp - time() > 0) ? $value->timestamp - time() : 0;
            ?>
            amazing_time[i] ={{$time}};
        i++;
        <?php
        }
        ?>

    </script>
    <script>
        for (var j = 0; j < 2; j++) {
            var clock;
            clock = $('#amazing_clock_' + j).FlipClock({

                clockFace: 'HourlyCounter',
                autoStart: false,
                id: 'c_' + j,
                callbacks: {
                    stop: function () {
                        var a = this.id.replace('c_', '');
                        $('#amazing_clock_' + a).hide();
                        $('#amazing_img_' + a).show();
                    }
                }
            });
            clock.setTime(amazing_time[j]);
            clock.setCountdown(true);
            clock.start();
        }
    </script>

    <script>
        like = function (product_id) {

            $.ajaxSetup(
                {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.ajax({
                url: '{{ $url3 }}',
                type: 'POST',
                data: 'product_id=' + product_id,
                success: function (data) {
                    $("#bookmark_info").addClass('favorites');
                    $("#tooltip-option").text('حذف از علاقمندی');
                }
            });
        };

        dislike = function (product_id) {
            $.ajaxSetup(
                {
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.ajax({
                url: '{{ $url4 }}',
                type: 'POST',
                data: 'product_id=' + product_id,
                success: function (data) {
                    $("#bookmark_info").removeClass('favorites');
                    $("#tooltip-option").text('افزودن به علاقمندی');
                }
            });
        };
    </script>

@endsection