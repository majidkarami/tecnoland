<?php $c_id = 0; $check = null; ?>
@if(sizeof($colors)>0)
    <p style="padding-top: 20px;">انتخاب رنگ</p>

    @foreach($colors as $key=>$value)

        @if($service)

            @if($value->id==$service->color_id)
                <?php $c_id = $service->color_id; ?>
            @endif
            <div class="color_box" onclick="set_color('<?= $value->id ?>')">
                <label style="background:#{{ $value->color_code }}"> @if($value->id==$service->color_id) <span
                            class="tick"></span> @endif</label>
                <span>{{ $value->color_name }}</span>
            </div>
        @else
            @if($value->id==$color_id)
                <?php $c_id = $value->id; ?>
            @endif
            <div class="color_box" onclick="set_color('<?= $value->id ?>')">
                <label style="background:#{{ $value->color_code }}"> @if($value->id==$color_id) <span
                            class="tick"></span> @endif</label>
                <span>{{ $value->color_name }}</span>
            </div>

        @endif

    @endforeach
@endif

<input type="hidden" name="color_id" id="color_id" value="{{ $c_id }}">

<div style="width:100%;float: right;">
    @if(sizeof($product->get_service_name)>0)

        <p style="padding-top:20px">انتخاب گارانتی</p>
        <?php
        $c = 0;
        ?>
        @foreach($product->get_service_name as $key=>$value)

            @if($service)
                @if($value->id==$service->parent_id)

                    <div class="service_title" onclick="show_service()">
                        <span>{{ $value->service_name }}</span>
                        <a class="service_ic" id="service_ic"></a>
                    </div>
                    <input type="hidden" name="service_id" value="{{ $value->id }}" id="service_id">

                @endif
            @else
                @if($color_id==0)


                    @if($service_id==$value->id)
                        <div class="service_title" onclick="show_service()">
                            <span>{{ $value->service_name }}</span>
                            <a class="service_ic" id="service_ic"></a>
                        </div>
                        <input type="hidden" name="service_id" value="{{ $value->id }}" id="service_id">

                    @endif
                @else

                    <?php

                    if($c == 0)
                    {
                    $check = DB::table('service')->where(['parent_id' => $value->id, 'color_id' => $color_id])->orderBy('id', 'DESC')->first();
                    if($check)
                    {
                    $c = 1;
                    ?>
                    <div class="service_title" onclick="show_service()">
                        <span>{{ $value->service_name }}</span>
                        <a class="service_ic" id="service_ic"></a>
                    </div>
                    <input type="hidden" name="service_id" value="{{ $value->id }}" id="service_id">

                    <?php
                    }
                    }
                    ?>


                @endif
            @endif


        @endforeach

        <div class="service_box" id="service_box">
            @foreach($product->get_service_name as $key=>$value)
                <div onclick="set_service('<?= $value->id ?>')">
                    {{ $value->service_name }}
                </div>
            @endforeach
        </div>

    @else

        <input type="hidden" name="service_id" value="{{ $service_id }}" id="service_id">


    @endif


</div>


<div style="width:100%;float:right;margin-top: 15px;">

    <?php

    if ($service) {
        $price = $service->price;
    } else {
        $price = $check ? $check->price : $product->price;
    }

    ?>
        <div class="price-product defualt">
            <div style="width:100%;float:right;margin-top: 70px;">

                <div class="price">
                <span  style="color: green;">
                    {{ number_format($price) }}
                    <span>تومان</span>
                 </span>
                </div>
                @if(!empty($product->discounts))
                <div class="price-value">
                        <span>{{ number_format($price-$product->discounts) }}</span>
                    <span class="price-currency">تومان</span>
                </div>
                @endif

                <div class="price-discount" data-title="تخفیف" style="margin-right: 85px;">
                    <span>{{difference($price,$product->discounts,1)}}</span>
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

</div>