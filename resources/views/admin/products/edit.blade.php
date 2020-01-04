@extends('admin.layout.master')
@section('title', __('ویرایش محصول'))

@section('styles')
    <link href="{{ url('admin/css/bootstrap-select.css') }}" rel="stylesheet" >
@endsection

@section('content')
    <section class="content" id="app">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ویرایش محصول {{$product->title}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" action="{{route('products.update',$product->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="title">عنوان محصول</label>
                                <input type="text" name="title" value="{{$product->title}}" class="form-control" placeholder="عنوان محصول را وارد کنید...">
                                @if($errors->has('title'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="text">توضیحات محصول</label>
                                <textarea id="textareaDescription" type="text" name="text" class="ckeditor form-control" placeholder="توضیحات محصول را وارد کنید...">{{$product->text}}</textarea>
                                @if($errors->has('text'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('text') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="cat">دسته والد</label>
                                <select name="cat[]" id="" data-live-search="true" multiple class="selectpicker form-control">
                                    @foreach($cat_list as $key=>$value)
                                        <option value="{{$key}}" {{ (in_array($key, $product_cat)) ? 'selected' : '' }}>{{$value}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('cat'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('cat') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="code">نام لاتین محصول </label>
                                <input type="text" name="code" value="{{$product->code}}"  class="form-control" placeholder="نام لاتین محصول را وارد کنید...">
                                @if($errors->has('code'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('code') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="price">هزینه محصول</label>
                                <input type="number" name="price" value="{{$product->price}}"  class="form-control" placeholder="قیمت محصول بر حسب ریال را وارد کنید...">
                                @if($errors->has('price'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="discounts"> تخفیف</label>
                                <input type="number" name="discounts" value="{{$product->discounts}}"  class="form-control" placeholder="تخفیف محصول بر حسب ریال را وارد کنید...">
                                @if($errors->has('discounts'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('discounts') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="product_number"> تعداد محصول</label>
                                <input type="number" name="product_number" value="{{$product->product_number}}"  class="form-control" placeholder="تعداد خرید محصول بر حسب ریال را وارد کنید...">
                                @if($errors->has('product_number'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('product_number') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="bon"> تعداد بن خرید محصول </label>
                                <input type="number" name="bon" value="{{$product->bon}}" class="form-control" placeholder="تعداد بن خرید محصول را وارد کنید...">
                                @if($errors->has('bon'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('bon') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="product_status">وضعیت محصول</label>
                                <div>
                                    <input type="checkbox" name="product_status" class="flat-red" value="1" @if($product->product_status == 1) checked @endif> <span> موجود</span>
                                </div>
                                @if($errors->has('product_status'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('product_status') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="show_product">نمایش محصول</label>
                                <div>
                                    <input type="checkbox" name="show_product" class="flat-red" value="1" @if($product->show_product == 1) checked @endif> <span>نمایش داده شود</span>
                                </div>
                                @if($errors->has('show_product'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('show_product') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="special">پیشنهاد ويژه</label>
                                <div>
                                    <input type="checkbox" name="special" class="flat-red" value="1" @if($product->special == 1) checked @endif> <span>نمایش داده شود</span>
                                </div>
                                @if($errors->has('special'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('special') }}</span>
                                @endif
                            </div>
                            <br>

                            <!-- add color-->
                            <div class="form-group">
                                <label>انتخاب رنگ</label>
                            </div>
                            <div style="clear:both"></div>

                            @php
                                $get_colors=$product->get_colors;
                             @endphp

                            @if(sizeof($get_colors)>0)
                                @foreach($get_colors as $key=>$value)
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="text" value="{{ $value->color_name }}" name="color_name[{{ $value->id }}]" class="color_input_name">
                                        <input type="text" value="{{ $value->color_code }}" name="color_code[{{ $value->id }}]" class="jscolor color_input_code">
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <div class="form-group">
                                    <input type="text" name="color_name[]" class="color_input_name">
                                    <input type="text" class="jscolor color_input_code" name="color_code[]">
                                </div>
                            @endif
                            <div id="color_box"></div>

                            <div class="form-group">
                                <span class="fa fa-plus" style="color:red;cursor:pointer" onclick="add_color()"></span>
                            </div>
                            <br>

                            <!-- add tag-->
                            <div class="form-group">
                                <label>افزودن برچسب</label><br>
                                <input type="text" name="tag_list" id="tag_list" class="form-control" style="float:right;width:60%">
                                <div class="add_product_tag" onclick="add_tag()">افزودن</div>
                                <input type="hidden" name="keywords" id="keywords" value="{{ $product->keywords }}">
                            </div>

                            <div style="clear:both"></div>
                            <div id="tag_box">
                                <?php
                                $keywords=$product->keywords;
                                $e=explode(',',$keywords);
                                if(is_array($e))
                                {
                                $i=1;
                                foreach ($e as $key=>$value)
                                {
                                if(!empty($value))
                                {
                                ?>
                                <div class="tag_div" id="tag_div_{{ $i }}">
                                    <span style="color:red;padding-left: 8px;" class="fa fa-remove" onclick="remove_tag({{ $i }},'{{ $value }}')"></span>
                                    {{ $value }}
                                </div>
                                <?php
                                $i++;
                                }
                                }
                                }
                                ?>
                            </div>

                            <div style="clear:both;padding-top:30px;"></div>


                            <!-- add description-->
                            <div class="form-group">
                                <label for="description"> سئو (کلمات کلیدی)</label>
                                <textarea id="textareaDescription" type="text"  name="description" class="form-control" placeholder="توضیحات بیشتر محصول را وارد کنید...">{{$product->description}}</textarea>
                                @if($errors->has('description'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary pull-left">ویرایش
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script type="text/javascript" src="{{ url('admin/js/bootstrap-select.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/defaults-fa_IR.js') }}"></script>
    <script type="text/javascript" src="{{asset('/admin/plugins/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript" src="{{ url('/admin/js/jscolor.js') }}"></script>
    <script>

        CKEDITOR.replace('textareaDescription', {
            customConfig: 'config.js',
            toolbar: 'simple',
            language: 'fa',
            removePlugins: 'cloudservices, easyimage'
        })
        // removeImages = function (id) {
        //     var index = photos.indexOf(id)
        //     photos.splice(index, 1);
        //     document.getElementById('updated_photo_' + id).remove();
        // }
    </script>

@endsection
