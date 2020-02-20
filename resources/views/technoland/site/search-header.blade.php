@extends('technoland.layout.master')
@section('title', __('جستجو'))


@section('styles')
    <link href="{{ url('user/css/ion.rangeSlider.css') }}" rel="stylesheet">
    <link href="{{ url('user/css/ion.rangeSlider.skinNice.css') }}" rel="stylesheet">
    <link href="{{ url('user/css/user.css') }}" rel="stylesheet">
@endsection

@section('content')

    <!-- main -->
    <main class="search-page default" id="filter_product_box">
        <div class="container">
            <div class="row">
                <aside class="sidebar-page col-12 col-sm-12 col-md-4 col-lg-3 order-1">
                    <div class="box">
                        <div class="box-header">دسته بندی نتایج</div>
                        <div class="box-content category-result">
                                <ul>
                                    @foreach($category as $key=>$value)
                                        <li><a href="{{ url('category').'/'.$value->cat_ename }}">{{ $value->cat_name }}</a></li>
                                    @endforeach
                                </ul>
                        </div>
                    </div>


                    <div class="box">
                        <div class="box-header">جستجو در نتایج:</div>
                        <div class="box-content">
                            <div class="ui-input ui-input--quick-search search_input_box">
                                <input type="text" id="search_input" class="ui-input-field ui-input-field--cleanable search_input" placeholder="نام محصول یا برند مورد نظر را بنویسید…">
                                <span class="fa fa-search" onclick="search_product()"></span>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-content" onclick="set_status_product()">
                            <span id="status_prodict_ic" class="filter_checkbox"></span>
                            <input id="status_product"  type="checkbox" class="search_checkbox">
                            <label for="status_product">
                                فقط کالاهای موجود
                            </label>
                        </div>
                    </div>

{{--                    <div class="box" style="direction:ltr;padding-top:20px;padding-bottom:20px;border-bottom: 1px solid #E3E3E3;">--}}
{{--                        <div class="box-content">--}}
{{--                            <div style="width:90%;margin:auto;text-align:center">--}}
{{--                                <input type="text" id="example_id" name="example_name" value="" />--}}
{{--                                <button class="btn btn-primary" onclick="set_price_search()">اعمال محدوده قیمت</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </aside>
                <div class="col-12 col-sm-12 col-md-8 col-lg-9 order-2">
                    <div class="breadcrumb-section default">
                        <ul class="breadcrumb-list">
                            <li>
                                <a href="{{ url('') }}">
                                    <span>فروشگاه اینترنتی {{setting('name')}}</span>
                                </a>
                            </li>
                            @foreach($category as $key=>$value)
                            <li><span><a href="{{ url('category').'/'.$value->cat_ename }}">{{ $value->cat_name }}</a></span></li>
                           @endforeach
                        </ul>
                    </div>
                    <div class="listing default">
                        <div class="listing-counter">
                            <span>(</span>
                            <span>نمایش از </span>
                            <span>1</span>
                            <span> - {{ sizeof($product) }}</span>
                            <span> محصول از </span>
                            <span>{{ count($product) }}</span>
                            <span>)</span>
                        </div>

                        <div class="listing-header default">
                            <ul class="listing-sort nav nav-tabs justify-content-center search_type_ul" role="tablist"
                                data-label="مرتب‌سازی بر اساس :">

                                <li id="search_type_1" class="active" onclick="set_type(1)">
                                    <a class="active" data-toggle="tab" role="tab"
                                       aria-expanded="false">جدیدترین</a>
                                </li>
                                <li id="search_type_2" onclick="set_type(2)">
                                    <a data-toggle="tab" role="tab"
                                       aria-expanded="false">پربازدیدترین</a>
                                </li>
                                <li id="search_type_3"  onclick="set_type(3)">
                                    <a data-toggle="tab"  role="tab" aria-expanded="true">پرفروش ترین</a>
                                </li>
                                <li id="search_type_4" onclick="set_type(4)">
                                    <a data-toggle="tab"  role="tab"
                                       aria-expanded="false">ارزانترین</a>
                                </li>
                                <li id="search_type_5" onclick="set_type(5)">
                                    <a data-toggle="tab"  role="tab"
                                       aria-expanded="false">گرانترین</a>
                                </li>

                            </ul>
                        </div>

                        <div class="tab-content default text-center">
                            <div class="tab-pane active" id="related" role="tabpanel" aria-expanded="true">
                                <div class="container no-padding-right">
                                    <ul class="row listing-items" id="show_product" style="width:100%;float:right;border-top:1px solid silver">
                                        @include('technoland.include.product_list2',['product'=>$product,'cat_url'=>'','Search_text'=>$Search_text])

                                    </ul>
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
    <script type="text/javascript" src="{{ url('user/js/list.min.js') }}"></script>
    <script src="{{ url('user/js/ion.rangeSlider.min.js') }}"></script>
    <?php
    $url=url('Search').'?text=';
    ?>
    <script>
        var product_status=0;
        var product_type=1;
        var Search_text='<?= $Search_text ?>';
        search_product=function ()
        {
            var text=document.getElementById('search_input').value;
            if(text.trim()!='')
            {
                var search_url='<?= $url ?>'+text;
                send_data(search_url);
            }
        };
        send_data=function (url) {
            var cat_url='<?= $url ?>'+Search_text;
            $.ajaxSetup(
                {
                    'headers':{
                        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                });
            $.ajax({
                url:url,
                type:"GET",
                data:'product_status='+product_status+'&type='+product_type+'&cat_url='+cat_url,
                success:function (data)
                {
                    $("#show_product").html(data);
                }
            });
        };

        $('.pagination a').click(function (event) {
            event.preventDefault();
            var url=$(this).attr('href');
            var url=url.split('page=');
            if(url.length==2)
            {
                var  search_url='<?= $url ?>'+Search_text;
                var ajax_url=search_url+'&page='+url[1];
                send_data(ajax_url);
            }
        });


        set_type=function (type)
        {
            product_type=type;
            $('.search_type_ul li').removeClass('active');
            $("#search_type_"+type).addClass('active');
            var search_url='<?= $url ?>'+Search_text;
            send_data(search_url);
        };

        set_status_product=function ()
        {
            var c=document.getElementById('status_product');
            if(c)
            {
                if(c.checked)
                {
                    product_status=0;
                    c.checked=false;
                    $("#status_prodict_ic").removeClass('filter_checkbox2');
                    $("#status_prodict_ic").addClass('filter_checkbox');
                }
                else
                {
                    product_status=1;
                    c.checked=true;
                    $("#status_prodict_ic").removeClass('filter_checkbox');
                    $("#status_prodict_ic").addClass('filter_checkbox2');
                }
            }
            var search_url='<?= $url ?>'+Search_text;
            send_data(search_url);
        };

    </script>
@endSection