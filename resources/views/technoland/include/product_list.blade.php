<?php

function get_score($data)
{
    $s=0;
    foreach ($data as $k=>$v)
    {

        $a=explode('@#',$v->value);
        foreach ($a as $key=>$value)
        {
            if(!empty($value))
            {
                $b=explode('_',$value);
                if(is_array($b))
                {
                    if(sizeof($b)==2)
                    {
                        $s+=$b[1];
                    }
                }

            }
        }
    }
    if($s>0)
    {
        $n=sizeof($data)*5;
        $s=$s/$n;
        $s=substr($s,0,3);
    }
    return $s;
}

?>

<div style="width:100%;text-align: center;margin: 10px 10px">
    {!!  str_replace('ajax/set_filter_product',$cat_url,$product->links()) !!}
</div>

@foreach($product as $key=>$value)
    <?php

    $score=get_score($value->get_score);
    ?>

    <li class="col-xl-3 col-lg-4 col-md-6 col-12 no-padding search_product_box">

        @if($value->product_status==1)
            <div class="label-check" style="background-color: #00bfd6;">
            موجود
            </div>
        @else
            <div class="label-check">
            نا موجود
            </div>
        @endif

    <div class="product-box">
        <div class="product-seller-details-item-grid">
            <div class="product_item_compare" onclick="add_compare_product('<?= $value->id ?>','{{ $value->title }}','{{ $value->get_img->url }}')">
                <span class="checkbox2" id="compare_{{ $value->id  }}"></span>
                <span style="padding:5px">مقایسه</span>
            </div>
            <span class="product-seller-details-badge-container"></span>
        </div>


        @if(!empty($value->get_img->url))
            <a class="product-box-img" href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                <img src="{{ url($value->get_img->url) }}" alt="{{ $value->title }}" title="{{ $value->title }}">
            </a>
        @else
            <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}">
                <img src="{{ asset('/user/img/not-img.png') }}" title="{{ $value->title }}"
                     class="img-fluid" alt="{{$value->title}}">
            </a>
        @endif

        <div class="c-product-box__variants">
            @foreach($value->get_colors as $key2=>$value2)
                <label style="margin-bottom: 5px;width:10px;height:10px;background:#{{ $value2->color_code }};border-radius:100%;@if($value2->color_code=='FFFFFF') border:1px solid silver @endif"></label>
            @endforeach
        </div>
        <p style="font-size:12px">
            <label class="product_score">
                <span class="fa fa-star"></span>
                <span>{{ $score }}</span>
            </label>

            <label>
                <span>از </span>
                <span>{{ sizeof($value->get_score) }}</span>
                <span>رای </span>
            </label>
        </p>
        <div class="product-box-content">
            <div class="product-box-content-row">
                <div class="product-box-title">
                    <a href="{{ url('product').'/'.$value->code_url.'/'.$value->title_url }}" title="{{ $value->title }}">
                        @if(strlen($value->title)>35)
                            {{ mb_substr($value->title,0,28).' ... ' }}
                        @else
                            {{ $value->title }}
                        @endif
                    </a>
                </div>
            </div>
            <div class="c-product-box__row c-product-box__row--price">
                <div class="c-price">
                    <div class="c-price__value c-price__value--plp">
                        <del>
                            @if(!empty($value->discounts))
                                {{ number_format($value->discounts) }}<span class="price-currency">تومان</span>
                            @endif
                        </del>
                        <div class="c-price__discount-oval"><span>
                                    {{difference($value->price,$value->discounts,1)}}
                                         </span>
                        </div>
                        <div class="c-price__value-wrapper">
                            @if($value->product_status==1)
                                @if(!empty($value->price))
                                    {{ number_format($value->price) }}<span class="price-currency">تومان</span>
                                @else
                                    <span style="color: grey;font-size: 14px">نا موجود</span>
                                @endif
                            @else
                                <span style="color: grey;font-size: 14px">نا موجود</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</li>
@endforeach
@if(sizeof($product)==0)
    <div style="clear:both;padding-top: 30px;"></div>
    <div style="background-color: #F7F8FA;border: 1px dashed #ff6461;text-align:center;width:97%;margin:30px auto;padding-top:14px;padding-bottom:8px">
        <p style="color: #00bfd6">محصولی برای نمایش یافت نشد</p>
    </div>
    <br>

@endif

<script>
    <?php
    $url=url('ajax/set_filter_product');
    ?>
$('.pagination a').click(function (event) {
        event.preventDefault();
        var url=$(this).attr('href');
        var url=url.split('page=');
        if(url.length==2)
        {
            var ajax_url='<?= $url ?>?page='+url[1];
            send_data(ajax_url);
        }
    });
    $('.search_product_box').hover(function () {

            $('.product_item_compare',this).show();
        },
        function () {
            $('.product_item_compare',this).hide();
        });
</script>