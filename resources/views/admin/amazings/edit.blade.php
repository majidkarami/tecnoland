@extends('admin.layout.master')
@section('title', __('ویرایش محصولات شگفت انگیز'))

@section('content')
    <section class="content" id="app">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ویرایش محصول شگفت انگیز جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form id="myForm" method="post" action="{{route('amazings.update',$amazing->id)}}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" name="title" value="{{$amazing->title}}" class="form-control" placeholder="عنوان محصول شگفت انگیز را وارد کنید...">
                                @if($errors->has('title'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="m_title">عنوانک</label>
                                <input type="text" name="m_title" value="{{$amazing->m_title}}"  class="form-control" placeholder="عنوانک محصول شگفت انگیز را وارد کنید...">
                                @if($errors->has('m_title'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('m_title') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>توضیحات</label>
                                <textarea id="textareaDescription" type="text" name="tozihat" class="ckeditor form-control" placeholder="توضیحات محصول را وارد کنید...">{{$amazing->tozihat}} </textarea>
                                @if($errors->has('tozihat'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('tozihat') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>هزینه اصلی محصول</label>
                                <input type="number" name="price1" value="{{$amazing->price1}}" class="form-control" placeholder="هزینه اصلی محصول را وارد کنید...">
                                @if($errors->has('price1'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('price1') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>هزینه محصول با تخفیف</label>
                                <input type="number" name="price2" value="{{$amazing->price2}}" class="form-control" placeholder="هزینه محصول با تخفیف را وارد کنید...">
                                @if($errors->has('price2'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('price2') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="time">مدت زمان شگفت انگیز</label>
                                <input type="text" name="time" value="{{$amazing->time}}" class="form-control" placeholder="مدت زمان شگفت انگیز بر حسب ساعت ...">
                                @if($errors->has('time'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('time') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="product_id">شناسه محصول</label>
                                <select name="product_id" class="form-control">
                                    <option value="">انتخاب کنید</option>
                                    @foreach($products as $key => $value)
                                        <option value="{{$key}}" @if($amazing->product_id == $key) selected @endif>{{$value}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('product_id'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('product_id') }}</span>
                                @endif
                            </div>


                            <button type="submit" onclick="productGallery()" class="btn btn-success pull-left">ذخیره</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/admin/plugins/ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('textareaDescription',{
            customConfig: 'config.js',
            toolbar: 'simple',
            language: 'fa',
            removePlugins: 'cloudservices, easyimage'
        });

    </script>

@endsection
