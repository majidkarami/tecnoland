@extends('admin.layout.master')

@section('title', __('ویرایش تکنوگیم'))

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ویرایش تکنوگیم </h3>
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
                        <form method="POST" action="{{route('games.update',$game->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" name="title" value="{{$game->title}}" class="form-control" placeholder="عنوان را وارد کنید...">
                                @if($errors->has('title'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="slug">نام مستعار</label>
                                <input type="text" name="slug" value="{{$game->slug}}" class="form-control" placeholder="نام مستعار را وارد کنید...">
                                @if($errors->has('slug'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('slug') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>وضعیت</label>
                                <div>
                                    <input type="radio" name="is_active" value="0" {{ ($game->is_active == 0) ? 'checked' : '' }}> <span class="margin-l-10">عدم نمایش</span>
                                    <input type="radio" name="is_active" value="1" {{ ($game->is_active == 1) ? 'checked' : ''}}> <span>نمایش</span>
                                    @if($errors->has('is_active'))
                                        <span style="color:red;font-size:13px">{{ $errors->first('is_active') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="meta_keywords">توضیحات</label>
                                <textarea type="text" name="description" class="form-control" placeholder="توضیحات را وارد کنید..." rows="10">{{$game->description}}</textarea>
                                @if($errors->has('description'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('description') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="file" name="url" id="pic" onchange="loadFile(event)"
                                       style="display:none">
                                <label for="img">تصویر</label>

                                @if(file_exists($game->url))
                                    <img src="{{ url($game->url) }}" alt="{{$game->title}}" title="{{$game->title}}" id="output" width="150" height="100" onclick="select_file()">
                                @else
                                    <img src="{{  url('admin/images/img.jpg') }}" id="output" width="150" onclick="select_file()">
                                @endif
                                <br><br>
                                <p style="font-size: 12px;padding-right: 10px;color: #ba5757">ابعاد تصویر باید ۳۰۰ * ۱۴۰۰ باشد.</p>
                            </div>

                            <div class="form-group">
                                <p style="font-size: 12px;color: grey">برای تغییر عکس روی تصویر کلیک کنید</p>
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


