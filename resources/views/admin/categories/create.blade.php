@extends('admin.layout.master')
@section('title', __('ایحاد دسته جدید'))

@section('styles')
    <link href="{{ url('admin/css/bootstrap-select.css') }}" rel="stylesheet" >
@endsection

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد دسته بندی جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="cat_name">نام دسته</label>
                                <input type="text" name="cat_name" value="{{old('cat_name')}}" class="form-control" placeholder="عنوان دسته بندی را وارد کنید...">
                                @if($errors->has('cat_name'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('cat_name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="cat_ename">نام لاتین دسته</label>
                                <input type="text" name="cat_ename" value="{{old('cat_ename')}}" class="form-control" placeholder="عنوان دسته بندی را وارد کنید...">
                                @if($errors->has('cat_ename'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('cat_ename') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="parent_id">دسته والد</label>
                                <select name="parent_id" id="" data-live-search="true" class="selectpicker form-control">
                                    @foreach($cat_list as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('parent_id'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('parent_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="form-group">
                                    <input type="file" name="img" id="pic" onchange="loadFile(event)" style="display:none">
                                    <label for="img">انتخاب تصویر</label>
                                    <img src="{{ url('/admin/images/img.jpg') }}" id="output" width="150" onclick="select_file()">
                                </div>
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
