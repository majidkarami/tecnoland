@extends('admin.layout.master')
@section('title', __('ویرایش اسلایدر '))

@section('content')

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ویرایش اسلایدر </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="POST" action="{{route('sliders.update',$slider->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" name="title" value="{{$slider->title}}" class="form-control" placeholder="عنوان اسلایدر را وارد کنید...">
                                @if($errors->has('title'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="file" name="img" id="pic" onchange="loadFile(event)"
                                       style="display:none">
                                <label for="img">تصویر</label>

                                @if(file_exists($slider->url))
                                    <img src="{{ url($slider->url) }}" alt="{{$slider->img}}" title="{{$slider->img}}" id="output" width="150" onclick="select_file()">
                                @else
                                    <img src="{{  url('admin/images/img.jpg') }}" id="output" width="150" onclick="select_file()">
                                @endif
                                <br><br>
                                <p style="font-size: 12px;padding-right: 10px;color: #ba5757">ابعاد تصویر باید ۳۰۰ * ۱۴۰۰ باشد.</p>
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
