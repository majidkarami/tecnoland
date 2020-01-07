@extends('admin.layout.master')
@section('title', __('ویرایش دسته'))

@section('styles')
    <link href="{{ url('admin/css/bootstrap-select.css') }}" rel="stylesheet" >
@endsection
@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ویرایش دسته بندی {{$category->name}}</h3>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                      @if(Session::has('success'))
                        <div class="alert alert-success">
                            <div>بب</div>
                        </div>
                      @endif
                        <form method="post" action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <label for="cat_name">نام دسته</label>
                                <input type="text" name="cat_name" class="form-control" value="{{$category->cat_name}}" placeholder="عنوان دسته بندی را وارد کنید...">
                                @if($errors->has('cat_name'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('cat_name') }}</span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="cat_ename">نام لاتین دسته</label>
                                <input type="text" name="cat_ename" value="{{$category->cat_ename}}" class="form-control" placeholder="عنوان دسته بندی را وارد کنید...">
                                @if($errors->has('cat_ename'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('cat_ename') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="parent_id">دسته والد</label>
                                <select name="parent_id" id="" data-live-search="true" class="selectpicker form-control">
                                    @foreach($cat_list as $key => $value)
                                        <option value="{{$key}}" @if($key === $category->parent_id) selected @endif>{{$value}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('parent_id'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('parent_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="file" name="img" id="pic" onchange="loadFile(event)" style="display:none">
                                <label for="img">انتخاب تصویر</label>
                                @if(file_exists($category->img))
                                    <img src="{{ url($category->img) }}" alt="{{$category->cat_ename}}" title="{{$category->cat_name}}" id="output" width="150" onclick="select_file()">
                                    <p style="color:red;padding-right:120px;padding-top:10px;cursor:pointer" onclick="del_img('<?= $category->id ?>','<?= url('admin/category/del_img') ?>','<?= Session::token() ?>')">حذف تصویر</p>
                                @else
                                    <img src="{{  url('admin/images/img.jpg') }}" id="output" width="150" onclick="select_file()">
                                @endif
                                <br><br>
                                <p style="font-size: 12px;padding-right: 10px;color: #ba5757">ابعاد تصویر باید ۳۰۰ * ۳۰۰ باشد.</p>
                            </div>
                            <div class="form-group">
                                <p style="font-size: 12px;color: grey">برای تغییر عکس روی تصویر کلیک کنید</p>
                                @if($errors->has('img'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('img') }}</span>
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
    <script>
        select_file=function ()
        {
            document.getElementById('pic').click();
        };
        loadFile=function (event)
        {
            var render=new FileReader;
            render.onload=function ()
            {
                var output=document.getElementById('output');
                output.src=render.result;
            };
            render.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
