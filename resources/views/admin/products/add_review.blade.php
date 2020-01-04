@extends('admin.layout.master')
@section('title', __('افزودن نقد و بررسی تخصصی'))

@section('styles')
    <link rel="stylesheet" href="{{asset('/admin/dist/css/dropzone.css')}}">
@endsection


@section('content')

    <section class="content" id="app">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">نقد و بررسی تخصصی - {{ $product->title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <form id="myForm" method="post" action="{{url('admin/product/add_review')}}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="form-group">
                                <?php

                                $tozihat = $review ? $review->review_tozihat : null;
                                ?>
                                <div class="form-group">
                                    <label for="review_tozihat">توضیحات محصول</label>
                                    <textarea id="textareaDescription" type="text" name="review_tozihat"
                                              class="ckeditor form-control"
                                              placeholder="توضیحات محصول را وارد کنید...">{{$tozihat}}</textarea>
                                    @if($errors->has('review_tozihat'))
                                        <span
                                            style="color:red;font-size:13px">{{ $errors->first('review_tozihat') }}</span>
                                    @endif
                                </div>

                            </div>

                            <div class="alert" style="background-color: grey">
                                <h5>برای نقد و بررسی متخصصین باید طبق الگوی زیر عمل کنید</h5>
                                <p>۱- شرح مختصری از کالا</p>
                                <p style="color: #933a39;">۲- start_review</p>
                                <p style="color: #933a39;">۳- start_item</p>
                                <p>۴- نام بخش را بنویسید مانند (طراحی و ساخت)</p>
                                <p style="color: #933a39;">۵- end_item</p>
                                <p>۶- تصویر</p>
                                <p>نکته اول : ( آدرس تصویر را از پایین صفحه با کلیک روی تصویر انتخاب کنید و <span
                                        style="color: #933a39;">فایل تصویر</span> را از نوار ابزار بالا انتخاب کنید
                                    وآدرس تصویر را در <span style="color: #933a39;">url</span> , <span
                                        style="color: #933a39;">عرض را 100%</span> و <span style="color: #933a39"> ارتفاع به اندازه لازم</span>
                                    و <span style="color: #933a39;">چینش</span> را چپ و یا راست , نسبت به تصویر مورد
                                    نیاز خود انتخاب کنید )</p>
                                <p>نکته دوم : ( اگر خواستید صفحه را به چند قسمت تقسیم کنید از نوار ابزار تگ <span style="color:#933a39;">div ایجاد یک محل را انتخاب و در قسمت کلاس​های شیوه​ نامه کلاس مربوط </span> <span style="color: #933a39;">class="col-md-1" تا class="col-md-12"</span>
                                    را انتخاب کنید )</p>
                                <p>نکته سوم : برای تغییر رنگ میتوانید بعد از انتخاب تگ div مقدار <span
                                        style="color: #933a39;">review_item_div</span> را در class مربوطه قرار دهید</p>
                                <p>۷- شرح مختصری از کالا</p>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                            </div>

                        </form>

                        <div style="padding-top: 50px;">
                            <div class="box-header with-border">
                                <h3 class="box-title pull-right">افزودن تصاویر لازم برای نقد و بررسی</h3>
                            </div>
                            <br>
                            <form method="post" id="upload-file"
                                  action="{{ url('admin/product/upload?id='.$product->id) }}" class="dropzone">
                                @csrf
                                <input type="hidden" name="type" value="review">
                                <input name="file" type="file" multiple style="display:none"/>
                            </form>

                            <br>
                            <div class="text-center alert alert-info" style="background-color: #33a2bd !important">
                                <p>برای حذف تصویر روی تصویر کلیک کنید</p>
                            </div>
                            @if(sizeof($image)>0)

                                <div id="show_product_image">
                                    <img src="{{ url($image[0]->url) }}"
                                         onclick="del_img('{{ $image[0]->id }}','{{ url('admin/product/del_product_img') }}','<?= Session::token() ?>')">
                                </div>
                                <p style="text-align:center;padding-top:10px" id="img_url"></p>

                            @endif
                            <br>
                            <div class="text-center alert alert-info" style="background-color: #33a2bd !important">
                                <p>برای پیدا کردن آدرس تصویر روی تصویر مربوطه کلیک کنید</p>
                            </div>
                            <br>

                            @foreach($image as $key=>$value)

                                <div class="img_review_box">
                                    <img src="{{ url($value->url) }}"
                                         onclick="show_img('{{ url($value->url) }}','{{ $value->id }}','<?= Session::token() ?>')">
                                </div>

                            @endforeach

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{ url('/admin/plugins/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{asset('/admin/dist/js/dropzone.js')}}"></script>
    <script>
        CKEDITOR.replace('textareaDescription', {
            customConfig: 'config.js',
            toolbar: 'simple',
            language: 'fa',
            removePlugins: 'cloudservices, easyimage'
        });
        Dropzone.options.uploadFile = {

            acceptedFiles: ".png,.jpg,.gif,.jpeg",
            addRemoveLinks: true,
            init: function () {

                this.options.dictRemoveFile = 'حذف',
                    this.options.dictInvalidFileType = 'امکان آپلود این فایل وجود ندارد',
                    this.on('success', function (file, response) {
                        if (response == 1) {
                            file.previewElement.classList.add('dz-success');
                        } else {
                            file.previewElement.classList.add('dz-error');
                            $(file.previewElement).find('.dz-error-message').text('خطا در آپلود فایل');
                        }
                    });

            }
        };
        show_img = function (url, id, token) {
            var url2 = "'" + '<?= url('admin/product/del_review_img') ?>' + "'";
            var token2 = "'" + token + "'";
            var img = '<img src=' + url + ' onclick="del_img(' + id + ',' + url2 + ',' + token2 + ')" />';
            $("#img_url").html(url);
            $("#show_product_image").html(img);
        }
    </script>
@endsection
