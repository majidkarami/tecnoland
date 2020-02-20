@extends('admin.layout.master')

@section('title', __('ایجاد تکنوگیم'))

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد تکنوگیم جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                <div>{{session('success')}}</div>
                            </div>
                        @endif
                        <form method="POST" action="{{route('games.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="عنوان را وارد کنید...">
                                @if($errors->has('title'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="slug">نام مستعار</label>
                                <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" placeholder="نام مستعار را وارد کنید...">
                                @if($errors->has('slug'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('slug') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>وضعیت</label>
                                <div>
                                    <input type="radio" name="is_active" value="0" checked> <span class="margin-l-10">عدم نمایش</span>
                                    <input type="radio" name="is_active" value="1"> <span>نمایش</span>
                                    @if($errors->has('is_active'))
                                        <span style="color:red;font-size:13px">{{ $errors->first('is_active') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="meta_keywords">توضیحات</label>
                                <textarea type="text" name="description" class="form-control" placeholder="توضیحات را وارد کنید..." rows="10">{{ old('description') }}</textarea>
                                @if($errors->has('description'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('description') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="file" name="url" id="img" onchange="loadFile(event)" style="display:none">
                                <label for="url">تصویر</label>
                                <img src="{{ url('admin/images/img.jpg') }}" id="output" width="150" onclick="select_file()">
                                <br><br>
                                <p style="font-size: 12px;padding-right: 10px;color: #ba5757">ابعاد تصویر باید ۶۰۰ * ۶۰۰ باشد.</p>
                            </div>
                            <div class="form-group">
                                <p style="font-size: 12px;color: grey">برای ایجاد تصویر روی تصویر کلیک کنید</p>
                                @if($errors->has('url'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('url') }}</span>
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
    <script>
        select_file=function ()
        {
            document.getElementById('img').click();
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


