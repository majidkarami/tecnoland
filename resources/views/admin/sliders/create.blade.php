@extends('admin.layout.master')
@section('title', __('ایجاد اسلایدر جدید'))

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد اسلایدر جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="POST" action="{{route('sliders.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" name="title" class="form-control" placeholder="عنوان اسلایدر را وارد کنید...">
                                @if($errors->has('title'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="file" name="img" id="img" onchange="loadFile(event)" style="display:none">
                                <label for="img">تصویر</label>
                                <img src="{{ url('admin/images/img.jpg') }}" id="output" width="150" onclick="select_file()">
                                <br><br>
                                <p style="font-size: 12px;padding-right: 10px;color: #ba5757">ابعاد تصویر باید ۳۰۰ * ۱۴۰۰ باشد.</p>
                            </div>

                            <div class="form-group">
                                <p style="font-size: 12px;color: grey">برای ایجاد تصویر روی تصویر کلیک کنید</p>
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
