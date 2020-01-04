@extends('admin.layout.master')
@section('title', __('ایجاد محصول جدید'))

@section('styles')
<link href="{{ url('admin/css/bootstrap-select.css') }}" rel="stylesheet" >
@endsection

@section('content')
    <section class="content" id="app">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد محصول جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form id="myForm" method="post" action="{{route('products.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="title">عنوان محصول</label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="عنوان محصول را وارد کنید...">
                                @if($errors->has('title'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="text">توضیحات محصول</label>
                                <textarea id="textareaDescription" type="text" name="text" class="ckeditor form-control" placeholder="توضیحات محصول را وارد کنید...">{{old('text')}}</textarea>
                                @if($errors->has('text'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('text') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="cat">دسته والد</label>
                                <select name="cat[]" id="" data-live-search="true" multiple class="selectpicker form-control">
                                    @foreach($cat_list as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('cat'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('cat') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="code">نام لاتین محصول </label>
                                <input type="text" name="code" value="{{old('code')}}"  class="form-control" placeholder="نام لاتین محصول را وارد کنید...">
                                @if($errors->has('code'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('code') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="price">هزینه محصول</label>
                                <input type="number" name="price" value="{{old('price')}}"  class="form-control" placeholder="قیمت محصول بر حسب ریال را وارد کنید...">
                                @if($errors->has('price'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="discounts"> تخفیف</label>
                                <input type="number" name="discounts" value="{{old('discounts')}}"  class="form-control" placeholder="تخفیف محصول بر حسب ریال را وارد کنید...">
                                @if($errors->has('discounts'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('discounts') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="product_number"> تعداد محصول</label>
                                <input type="number" name="product_number" value="{{old('product_number')}}"  class="form-control" placeholder="تعداد خرید محصول بر حسب ریال را وارد کنید...">
                                @if($errors->has('product_number'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('product_number') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="bon"> تعداد بن خرید محصول </label>
                                <input type="number" name="bon" value="{{old('bon')}}" class="form-control" placeholder="تعداد بن خرید محصول را وارد کنید...">
                                @if($errors->has('bon'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('bon') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="product_status">وضعیت محصول</label>
                                <div>
                                    <input type="checkbox" name="product_status" class="flat-red" value="1"> <span> موجود</span>
                                </div>
                                @if($errors->has('product_status'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('product_status') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="show_product">نمایش محصول</label>
                                <div>
                                    <input type="checkbox" name="show_product" class="flat-red" value="1"> <span>نمایش داده شود</span>
                                </div>
                                @if($errors->has('show_product'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('show_product') }}</span>
                                @endif
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="special">پیشنهاد ويژه</label>
                                <div>
                                    <input type="checkbox" name="special" class="flat-red" value="1"> <span>نمایش داده شود</span>
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
                            <div class="form-group">
                                <input type="text" name="color_name[]" class="color_input_name">
                                <input type="text" class="jscolor color_input_code" name="color_code[]">
                            </div>

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
                                <input type="hidden" name="keywords" id="keywords">
                            </div>

                            <div style="clear:both"></div>
                            <div id="tag_box">

                            </div>

                            <div style="clear:both;padding-top:30px;"></div>


                            <!-- add description-->
                            <div class="form-group">
                                <label for="description"> سئو (کلمات کلیدی)</label>
                                <textarea id="textareaDescription" type="text" name="description" class="form-control" placeholder="توضیحات بیشتر محصول را وارد کنید...">{{old('description')}}</textarea>
                                @if($errors->has('description'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('description') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-success pull-left">ذخیره</button>
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

        CKEDITOR.replace('textareaDescription',{
          customConfig: 'config.js',
          toolbar: 'simple',
          language: 'fa',
          removePlugins: 'cloudservices, easyimage'
        });


    </script>

@endsection
