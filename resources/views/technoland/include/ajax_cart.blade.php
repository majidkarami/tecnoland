
    <?php

    $cart_date = \App\Cart::get();
    ?>
    @if(sizeof($cart_date)==0)
        <main class="cart default">
            <div class="container text-center">
                <div class="cart-empty">
                    <div class="cart-empty-icon">
                        <i class="now-ui-icons shopping_basket"></i>
                    </div>
                    <div class="cart-empty-title">سبد خرید شما خالیست!</div>
                    <div class="parent-btn">
                        <a href="#" class="dk-btn dk-btn-success">
                            به حساب کاربری خود وارد شوید
                            <i class="fa fa-sign-in"></i>
                        </a>
                    </div>
                    <div class="cart-empty-url">
                        <span>کاربر جدید هستید؟</span>
                        <a href="#">ثبت&zwnj;نام در {{setting('name')}}</a>
                    </div>
                </div>
            </div>
        </main>
    @else
        <!-- main -->
        <main class="cart-page default">
            <div class="container">
                <div class="row" id="product_cart">
                    <div class="cart-page-content col-xl-9 col-lg-8 col-md-12 order-1">
                        <div class="cart-page-title">
                            <h1> سبد خرید شما</h1>
                        </div>
                        <div class="table-responsive checkout-content default">
                            <table class="table" id="cart_table">
                                <tbody>
                                <tr style="text-align: center">
                                    <th>تصویر</th>
                                    <th>شرح محصول</th>
                                    <th>تعداد</th>
                                    <th>قیمت واحد</th>
                                    <th>قیمت کل</th>
                                </tr>
                                <?php
                                $total_price = 0;
                                $price = 0;
                                $sqt = 0;
                                $discount = 0;
                                $j = 1;
                                ?>
                                @foreach($cart_date as $key=>$value)
                                    <?php
                                    $product_data = array_key_exists('product_data', $value) ? $value['product_data'] : array();
                                    ?>
                                    @foreach($product_data as $key2=>$value2)
                                        <?php
                                        $s_c = explode('_', $key2);
                                        $service_id = $s_c[0];
                                        $color_id = $s_c[1];
                                        $data = \App\Cart::get_date($key, $service_id, $color_id);
                                        ?>
                                        @if($data)

                                            <tr class="checkout-item">

                                                <td style="width: 30%">
                                                    <img src="{{ $data['img'] }}" alt="{{ $data['title'] }}"
                                                         style="    max-width: 25%;">
                                                    <span onclick="del_product('{{ $key }}','{{ $s_c[0] }}','{{ $s_c[1] }}')"
                                                          class="checkout-btn-remove"></span>
                                                </td>

                                                <td style="width: 30%">
                                                    <h3 class="checkout-title">
                                                        <a href="{{ url('product').'/'.$data['code_url'].'/'.$data['title_url'] }}"> {{ $data['title'] }} </a>
                                                    </h3>
                                                    @if(!empty($data['color_name']))
                                                        <p style="color:#777">
                                                            <span>رنگ : </span>
                                                            <label style="background:#{{ $data['color_code'] }}"
                                                                   class="color_product"></label>
                                                            <span style="padding-right: 5px;">{{ $data['color_name'] }}</span>
                                                        </p>
                                                    @endif
                                                    @if(!empty($data['service_name']))
                                                        <p style="color:#777">
                                                            <span>گارانتی : </span> {{ $data['service_name'] }}</p>
                                                    @endif
                                                </td>

                                                <td>
                                                    <select id="number_product_{{ $j }}" class="select-css"
                                                            onchange="set_number_product('{{ $key }}','{{ $s_c[0] }}','{{ $s_c[1] }}','{{ $j }}')">
                                                        @for($i=1;$i<31;$i++)
                                                            <option @if($value2==$i) selected="selected"
                                                                    @endif  value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </td>

                                                <td class="cart_price">
                                                    <p>
                                                        <span class="p1">{{ number_format($data['price2']) }}</span>
                                                        <span class="p2">تومان</span>
                                                    </p>
                                                </td>

                                                <td class="cart_price">
                                                    <p>
                                                        <span class="p1">{{ number_format($data['price2']*$value2) }}</span>
                                                        <span class="p2">تومان</span>
                                                    </p>
                                                </td>

                                            </tr>
                                            <?php
                                            $total_price += $data['price1'] * $value2;
                                            $price += $data['price2'] * $value2;
                                            $discount += $data['price1'] - $data['price2'];
                                            $sqt += $value2;
                                            ?>
                                            <?php $j++; ?>
                                        @endif
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <aside class="cart-page-aside col-xl-3 col-lg-4 col-md-6 center-section order-2" id="footer_cart">
                        <div class="checkout-aside">
                            <div class="checkout-summary">
                                <div class="checkout-summary-main">
                                    <?php
                                    Session::put('total_price', $total_price);
                                    Session::put('price', $price);
                                    ?>
                                    <ul class="checkout-summary-summary">
                                        <li><span>مبلغ کل ({{$sqt}} کالا)</span><span>{{ number_format($total_price) }}  تومان </span></li>
                                        @if(!empty($discount))
                                            <li><span>تخفیف</span><span style="color: #ff6461">{{ number_format($discount) }}  تومان </span></li>
                                        @endif
                                        <li>
                                            <span>هزینه ارسال</span>
                                            <span>وابسته به آدرس<span class="wiki wiki-holder"><span
                                                            class="wiki-sign"></span>
                                                    <div class="wiki-container js-dk-wiki is-right">
                                                        <div class="wiki-arrow"></div>
                                                        <p class="wiki-text">
                                                            هزینه ارسال مرسولات می‌تواند وابسته به شهر و آدرس گیرنده
                                                            متفاوت باشد. در
                                                            صورتی که هر
                                                            یک از مرسولات حداقل ارزشی برابر با ۱۰۰هزار تومان داشته باشد،
                                                            آن مرسوله
                                                            بصورت رایگان
                                                            ارسال می‌شود.<br>
                                                            "حداقل ارزش هر مرسوله برای ارسال رایگان، می تواند متغیر
                                                            باشد."
                                                        </p>
                                                    </div>
                                                </span></span>
                                        </li>
                                    </ul>
                                    <div class="checkout-summary-devider">
                                        <div></div>
                                    </div>
                                    <div class="checkout-summary-content">
                                        <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                                        <div class="checkout-summary-price-value">
                                            <span class="checkout-summary-price-value-amount">{{ number_format($price) }}۰</span>تومان
                                        </div>
                                        <a href="{{ url('Shipping') }}" class="selenium-next-step-shipping">
                                            <div class="parent-btn">
                                                <button class="dk-btn dk-btn-info">
                                                    ادامه ثبت سفارش
                                                    <i class="now-ui-icons shopping_basket"></i>
                                                </button>
                                            </div>
                                        </a>
                                        <div>
                                            <span>
                                                کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش مراحل بعدی
                                                را تکمیل
                                                کنید.
                                            </span>
                                            <span class="wiki wiki-holder"><span class="wiki-sign"></span>
                                                <div class="wiki-container is-right">
                                                    <div class="wiki-arrow"></div>
                                                    <p class="wiki-text">
                                                        محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش
                                                        برای شما رزرو
                                                        می‌شوند. در
                                                        صورت عدم ثبت سفارش، تاپ کالا هیچگونه مسئولیتی در قبال تغییر
                                                        قیمت یا موجودی
                                                        این کالاها
                                                        ندارد.
                                                    </p>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout-feature-aside">
                                <ul>
                                    <li class="checkout-feature-aside-item checkout-feature-aside-item-guarantee">
                                        هفت روز
                                        ضمانت تعویض
                                    </li>
                                    <li class="checkout-feature-aside-item checkout-feature-aside-item-cash">
                                        پرداخت در محل با
                                        کارت بانکی
                                    </li>
                                    <li class="checkout-feature-aside-item checkout-feature-aside-item-express">
                                        تحویل اکسپرس
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </main>
        <!-- main -->
    @endif
