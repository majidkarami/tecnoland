@extends('technoland.layout.master')

@section('styles')
<link href="{{ url('user/css/rangeslider.css') }}" rel="stylesheet">
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
                                <a href="#"><span>فروشگاه اینترنتی تاپ کالا</span></a>
                            </li>
                            <li>
                                <a href="#"><span>کالای دیجیتال</span></a>
                            </li>
                            <li>
                                <a href="#"><span>موبایل</span></a>
                            </li>
                            <li>
                                <a href="#"><span>گوشی موبایل</span></a>
                            </li>
                            <li>
                                <span>گوشی موبایل اپل مدل iPhone X ظرفیت 256 گیگابایت</span>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <article class="product">
                        @php
                            function get_item_value($score,$n)
                            {
                                $a=3;
                                if($score)
                                {
                                  $e=explode('@#',$score->value);
                                  foreach ($e as $key=>$value)
                                  {
                                    $k=$n.'_';
                                    $c=explode($k,$value);
                                    if(is_array($c))
                                    {
                                       if(sizeof($c)==2)
                                       {
                                          $a=$c[1];
                                       }
                                    }
                                  }
                                }
                                return $a;
                            }
                        @endphp
                        <div class="row mb-5">
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 section-product-gallery">
                                <div class="product-gallery default text-center">
                                    <a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}"><img src="{{ url($product->get_img->url )}}" width="411" title="{{ $product->title }}" /></a>
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12">
                                <div class="product-title default">
                                    <h1>
                                        <a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}">{{ $product->title }}</a>
                                        <span><a href="{{ url('product').'/'.$product->code_url.'/'.$product->title_url }}">{{ $product->code }}</a></span>
                                    </h1>
                                </div>
                                <div class="comments-product-attributes px-3">
                                    <div class="row">
                                        <div class="col-sm-6 col-12 mb-3">
                                            @if(Session::has('success'))
                                                <div class="alert alert-success" style="margin-top: 10px">
                                                    <div>{{session('success')}}</div>
                                                </div>
                                            @endif
                                            <form action="{{ route('user.add.score') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <p style="padding-top:24px;padding-bottom:20px">امتیاز شما به این محصول</p>
                                                <div class="input-range">
                                                    <p>کيفيت ساخت</p>
                                                    <input type="range" min="0" max="5" step="1" name="range[1]" data-rangeslider value="<?= get_item_value($score,1) ?>"  id="range_1" />
                                                    <p id="output_range_1"></p>
                                                </div>

                                                <div class="input-range">
                                                    <p>ارزش خريد به نسبت قيمت</p>
                                                    <input type="range" min="0" max="5" step="1" name="range[2]" data-rangeslider value="<?= get_item_value($score,2)  ?>"  id="range_2" />
                                                    <p id="output_range_2"></p>
                                                </div>

                                                <div class="input-range">
                                                    <p>نوآوري</p>
                                                    <input type="range" min="0" max="5" step="1" name="range[3]" data-rangeslider value="<?= get_item_value($score,3)  ?>"  id="range_3" />
                                                    <p id="output_range_3"></p>
                                                </div>

                                                <div class="input-range">
                                                    <p>امکانات و قابليت ها</p>
                                                    <input type="range" min="0" max="5" step="1" name="range[4]" data-rangeslider value="<?= get_item_value($score,4) ?>"  id="range_4" />
                                                    <p id="output_range_4"></p>
                                                </div>

                                                <div class="input-range">
                                                    <p>سهولت استفاده</p>
                                                    <input type="range" min="0" max="5" step="1" name="range[5]" data-rangeslider value="<?= get_item_value($score,5)  ?>"  id="range_5" />
                                                    <p id="output_range_5"></p>
                                                </div>

                                                <div class="input-range">
                                                    <p>طراحي و ظاهر</p>
                                                    <input type="range" min="0" max="5" step="1" name="range[6]" data-rangeslider value="<?= get_item_value($score,6)  ?>"  id="range_6" />
                                                    <p id="output_range_6"></p>
                                                </div>


                                                @if(!$score)
                                                <div class="parent-btn">
                                                    <button type="submit" class="dk-btn dk-btn-info" style="font-size: 14px;padding: 18px 66px;">
                                                        ثبت امتیاز
                                                        <i class="now-ui-icons ui-1_simple-add"></i>
                                                    </button>
                                                </div>
                                                @endif

                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <hr style="border-top: 1px solid #05e4ff;margin-bottom: 3rem;">

                        @if($comment)

                            <?php
                            function score_check($score,$n)
                            {
                                $a=0;
                                if($score)
                                {
                                    $e=explode('@#',$score->value);
                                    foreach ($e as $key=>$value)
                                    {
                                        $k=$n.'_';
                                        $c=explode($k,$value);
                                        if(is_array($c))
                                        {
                                            if(sizeof($c)==2)
                                            {
                                                $a=$c[1];
                                            }
                                        }
                                    }
                                }
                                return $a;
                            }
                            ?>
                            <div class="row user_comment_box">

                                <div class="comment_header">

                                    <?php
                                    $jdf=new \App\lib\Jdf();
                                    ?>
                                    @if(!empty($score->get_user->name))

                                        <p>{{ $score->get_user->name }}</p>
                                    @else
                                        <p>کاربر سایت</p>

                                    @endif
                                    <p style="font-size:11px">{{ $jdf->jdate('n F y',$score->time) }}</p>
                                </div>
                                <div class="col-md-6">
                                    <ul class="rang_ul">
                                        <li>
                                            <span>ارزش خريد به نسبت قيمت</span>
                                            <div class="rating-container">
                                                <div class="bar @if(score_check($score,1)>=1) done @endif"></div>
                                                <div class="bar @if(score_check($score,1)>=2) done @endif"></div>
                                                <div class="bar @if(score_check($score,1)>=3) done @endif"></div>
                                                <div class="bar @if(score_check($score,1)>=4) done @endif"></div>
                                                <div class="bar @if(score_check($score,1)==5) done @endif"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <span>کيفيت ساخت</span>
                                            <div class="rating-container">
                                                <div class="bar @if(score_check($score,2)>=1) done @endif"></div>
                                                <div class="bar @if(score_check($score,2)>=2) done @endif"></div>
                                                <div class="bar @if(score_check($score,2)>=3) done @endif"></div>
                                                <div class="bar @if(score_check($score,2)>=4) done @endif"></div>
                                                <div class="bar @if(score_check($score,2)==5) done @endif"></div>
                                            </div>
                                        </li>


                                        <li>
                                            <span>امکانات و قابليت ها</span>
                                            <div class="rating-container">
                                                <div class="bar @if(score_check($score,3)>=1) done @endif"></div>
                                                <div class="bar @if(score_check($score,3)>=2) done @endif"></div>
                                                <div class="bar @if(score_check($score,3)>=3) done @endif"></div>
                                                <div class="bar @if(score_check($score,3)>=4) done @endif"></div>
                                                <div class="bar @if(score_check($score,3)==5) done @endif"></div>
                                            </div>
                                        </li>


                                        <li>
                                            <span>سهولت استفاده</span>
                                            <div class="rating-container">
                                                <div class="bar @if(score_check($score,4)>=1) done @endif"></div>
                                                <div class="bar @if(score_check($score,4)>=2) done @endif"></div>
                                                <div class="bar @if(score_check($score,4)>=3) done @endif"></div>
                                                <div class="bar @if(score_check($score,4)>=4) done @endif"></div>
                                                <div class="bar @if(score_check($score,4)==5) done @endif"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <span>طراحي و ظاهر</span>
                                            <div class="rating-container">
                                                <div class="bar @if(score_check($score,5)>=1) done @endif"></div>
                                                <div class="bar @if(score_check($score,5)>=2) done @endif"></div>
                                                <div class="bar @if(score_check($score,5)>=3) done @endif"></div>
                                                <div class="bar @if(score_check($score,5)>=4) done @endif"></div>
                                                <div class="bar @if(score_check($score,5)==5) done @endif"></div>
                                            </div>
                                        </li>

                                        <li>
                                            <span>نوآوري</span>
                                            <div class="rating-container">
                                                <div class="bar @if(score_check($score,6)>=1) done @endif"></div>
                                                <div class="bar @if(score_check($score,6)>=2) done @endif"></div>
                                                <div class="bar @if(score_check($score,6)>=3) done @endif"></div>
                                                <div class="bar @if(score_check($score,6)>=4) done @endif"></div>
                                                <div class="bar @if(score_check($score,6)==5) done @endif"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6 comments-add-col--content">
                                    <div class="form-account-title" style="letter-spacing:unset;margin: 20px 20px;">
                                        <span>عنوان : </span>
                                        <br>
                                         <p>{{ $comment->subject }}</p>
                                        <br>
                                    </div>
                                    <hr>
                                    @if(!empty($comment->advantages))
                                        <div class="col-md-6 col-sm-12 tag-input-st tag-input-weak" style="margin-top: 18px;">
                                            <div class="form-account-title">نقاط قوت
                                                <span class="cl-circle-title cl-primary"></span>
                                            </div>


                                        <?php
                                        $advantages=explode('@$E@',$comment->advantages);
                                        ?>
                                        @foreach($advantages as $key=>$value)
                                            @if(!empty($value))
                                                <p>
                                                    <span class="icon icon-arrow-top" style="top: -1px;"></span>
                                                    <span class="icon_span" style="top: -1px;">{{ $value }}</span>
                                                </p>
                                            @endif
                                        @endforeach
                                        </div>
                                        <hr>
                                    @endif

                                    @if(!empty($comment->disadvantages))
                                        <div class="col-md-6 col-sm-12 tag-input-st tag-input-weak" style="margin-top: 18px;">
                                            <div class="form-account-title">نقاط ضعف
                                                <span class="cl-circle-title cl-red"></span>
                                            </div>


                                        <?php
                                        $disadvantages=explode('@$E@',$comment->disadvantages);
                                        ?>
                                        @foreach($disadvantages as $key=>$value)
                                            @if(!empty($value))
                                                <p>
                                                    <span class="icon icon-arrow-down" style="top: -1px;"></span>
                                                    <span class="icon_span" style="top: -1px;">{{ $value }}</span>
                                                </p>
                                            @endif
                                        @endforeach
                                        </div>
                                        <hr>
                                    @endif
                                    <div class="form-account-title" style="letter-spacing:unset;margin: 15px 20px 60px;">
                                        <span>متن : </span>
                                        <br>
                                        <p>{{ $comment->comment_text }}</p>
                                    </div>

                                </div>

                            </div>

                        @else

                            <div class="row content_box comments-add-col--content" @if(!$score) style="background:#fff;opacity:0.5;cursor: not-allowed;" @endif>
                                <div class="col-md-6 col-sm-12"  id="comment_box">
                                    <form action="{{ route('user.add.comment') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="row">
                                            <div class="col-12">
                                                <div class="form-account-title">عنوان نظر شما (اجباری)</div>
                                                <div class="form-account-row">
                                                    <input  @if(!$score) disabled="disabled" @endif  name="subject" class="input-field text-right" type="text" placeholder="عنوان نظر خود را بنویسید">
                                                    @if($errors->has('subject'))
                                                        <span style="color:red;font-size:13px">{{ $errors->first('subject') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 tag-input-st">

                                                <div class="form-account-title">نقاط قوت
                                                    <span class="cl-circle-title cl-primary"></span>
                                                </div>
                                                <div class="form-account-row ps-relative">

                                                    <input @if(!$score) disabled="disabled" @endif  type="text"  class="form-control addui-Tags-input  advantages" name="advantages[]">
                                                    <div class="icon-form-add" @if($score)  onclick="add_advantages()" @endif>+</div>
                                                    <div class="icon-form-remove" @if($score)  onclick="remover_advantages()" @endif></div>
                                                </div>

                                                <div id="advantages_box" class="form-account-row ps-relative">

                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12 tag-input-st tag-input-weak">
                                                <div class="form-account-title">نقاط ضعف
                                                    <span class="cl-circle-title cl-red"></span>
                                                </div>
                                                <div class="form-account-row ps-relative">
                                                    <input @if(!$score) disabled="disabled" @endif type="text"  class="form-control addui-Tags-input disadvantages" name="disadvantages[]">
                                                    <div class="icon-form-add"   @if($score) onclick="add_disadvantages()" @endif >+</div>
                                                    <div class="icon-form-remove" @if($score) onclick="remover_disadvantages()" @endif></div>
                                                </div>

                                                <div id="disadvantages_box" class="form-account-row ps-relative">

                                                </div>
                                            </div>
                                            <div class="col-12" id="comment_text_box">
                                                <div class="form-account-title">متن نظر شما (اجباری)</div>
                                                <div class="form-account-row">
                                                    <textarea class="input-field text-right" @if(!$score) disabled="disabled" @endif name="comment_text" rows="5" placeholder="متن خود را بنویسید"></textarea>
                                                    @if($errors->has('comment_text'))
                                                        <span style="color:red;font-size:13px">{{ $errors->first('comment_text') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            @if($score)
                                                <div class="col-12 px-0">
                                                    <button type="submit" class="btn btn-primary btn-no-icon">
                                                        ثبت نظر
                                                    </button>
                                                    <p>با “ثبت نظر” موافقت خود را با <a href="#" class="btn-link-spoiler" target="_blank">قوانین
                                                            انتشار محتوا</a> در {{setting('name')}}&zwnj; اعلام می&zwnj;کنم.</p>
                                                </div>
                                            @else
                                                <div style="padding-top:40px;clear:both"></div>
                                            @endif

                                    </div>
                                    </form>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <h3 style="font-size: 18px;color: #05e4ff">دیگران را با نوشتن نظرات خود، برای انتخاب این محصول راهنمایی کنید.</h3>
                                    <div>
                                        <p>لطفا پیش از ارسال نظر، خلاصه قوانین زیر را مطالعه کنید:</p>
                                        <p>فارسی بنویسید و از کیبورد فارسی استفاده کنید. بهتر است از فضای خالی (Space)
                                            بیش&zwnj;از&zwnj;حدِ معمول، شکلک یا ایموجی استفاده نکنید و از کشیدن حروف یا کلمات با
                                            صفحه&zwnj;کلید بپرهیزید.</p>
                                        <p>نظرات خود را براساس تجربه و استفاده&zwnj;ی عملی و با دقت به نکات فنی ارسال کنید؛
                                            بدون
                                            تعصب به محصول خاص، مزایا و معایب را بازگو کنید و بهتر است از ارسال نظرات
                                            چندکلمه&zwnj;&zwnj;ای خودداری کنید.</p>
                                        <p>بهتر است در نظرات خود از تمرکز روی عناصر متغیر مثل قیمت، پرهیز کنید.</p>
                                        <p>به کاربران و سایر اشخاص احترام بگذارید. پیام&zwnj;هایی که شامل محتوای توهین&zwnj;آمیز و
                                            کلمات نامناسب باشند، حذف می&zwnj;شوند.</p>
                                        <p>از ارسال لینک&zwnj;های سایت&zwnj;های دیگر و ارایه&zwnj;ی اطلاعات شخصی خودتان مثل شماره تماس،
                                            ایمیل و آی&zwnj;دی شبکه&zwnj;های اجتماعی پرهیز کنید.</p>
                                        <p>با توجه به ساختار بخش نظرات، از پرسیدن سوال یا درخواست راهنمایی در این بخش
                                            خودداری کرده و سوالات خود را در بخش «پرسش و پاسخ» مطرح کنید.</p>
                                        <p>هرگونه نقد و نظر در خصوص سایت {{setting('name')}}&zwnj;، خدمات و درخواست کالا را با ایمیل
                                            <a href="{{setting('email')}}">
                                               {{setting('email')}}
                                            </a>
                                            یا با شماره&zwnj;ی

                                            <a href="tel: {{number2farsi(setting('tel'))}}">
                                                {{number2farsi(setting('tel'))}}
                                            </a>
                                            در میان بگذارید و از نوشتن آن&zwnj;ها در بخش نظرات خودداری کنید.</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                            <br>
                            <br>
                            <br>
                    </article>
                </div>
            </div>
        </div>
    </main>
    <!-- main -->

@endsection

@section('scripts')
<script type="text/javascript" src="{{ url('user/js/rangeslider.js') }}"></script>
<script>
    var textContent = ('textContent' in document) ? 'textContent' : 'innerText';
    function valueOutput(element)
    {
        var value = element.value;
        $("#output_"+element.id).html(element.value);
        $("#"+element.id).value=element.value;
    };
    $('[data-rangeslider]').rangeslider({


        polyfill: false,


        onInit: function()
        {
           valueOutput(this.$element[0]);
        },
        onSlideEnd: function(position, value) {
            valueOutput(this.$element[0]);
        }


    });
    add_advantages=function ()
    {
        var n=document.getElementsByClassName('advantages').length+1;
        var id='advantages_'+n;
        var div='<div class="form-group" id="'+id+'">' +
            '<input type="text" style="margin-top:20px;"  class="addui-Tags-input form-control advantages" name="advantages[]">' +
            '<div class="icon-form-add2" onclick="add_advantages()"></div>' +
            '<div class="icon-form-remove2" onclick="remover_advantages('+n+')">-</div>' +
            '</div>';
       $("#advantages_box").append(div);
    };
    remover_advantages=function (id)
    {
       $("#advantages_"+id).remove();
    };
    add_disadvantages=function ()
    {
        var n=document.getElementsByClassName('disadvantages').length+1;
        var id='disadvantages_'+n;
        var div='<div class="form-group" id="'+id+'">' +
            '<input type="text" style="margin-top:20px;"  class="form-control addui-Tags-input disadvantages" name="disadvantages[]">' +
            '<div class="icon-form-add2" onclick="add_disadvantages()"></div>' +
            '<div class="icon-form-remove2" onclick="remover_disadvantages('+n+')">-</div>' +
            '</div>';
        $("#disadvantages_box").append(div);
    };
    remover_disadvantages=function (id)
    {
        $("#disadvantages_"+id).remove();
    }
</script>
@endsection