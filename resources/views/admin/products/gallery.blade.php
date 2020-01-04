@extends('admin.layout.master')
@section('title', __('ایجاد گالری محصول '))
@section('styles')
        <link rel="stylesheet" href="{{asset('/admin/dist/css/dropzone.css')}}">
@endsection

@section('content')
    <section class="content" id="app">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد گالری برای محصول {{$product->title}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">

                        <form method="post" id="upload-file" action="{{ url('admin/product/upload?id='.$product->id) }}" class="dropzone">
                                 @csrf
                            <input name="file" type="file" multiple style="display:none" />
                        </form>

                        <br>
                        <div class="text-center alert alert-danger col-sm-6 col-md-offset-3">
                            <p>برای حذف تصویر روی تصویر کلیک کنید</p>
                        </div>

                        @if(sizeof($image)>0)
                            <div id="show_product_image">
                                <img src="{{ url($image[0]->url) }}" onclick="del_img('{{ $image[0]->id }}','{{ url('admin/product/del_product_img') }}','<?= Session::token() ?>')">
                            </div>
                        @endif


                        <div id="image_product_box">
                            @foreach($image as $key=>$value)
                                <img src="{{ url($value->url) }}" onclick="show_img('{{ url($value->url) }}','{{ $value->id }}','<?= Session::token() ?>')">
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
        <script type="text/javascript" src="{{asset('/admin/dist/js/dropzone.js')}}"></script>
<script>
    Dropzone.options.uploadFile={
        acceptedFiles:".png,.jpg,.gif,.jpeg",
        // addRemoveLinks:true,
        init:function() {

            this.options.dictRemoveFile='حذف',
                this.options.dictInvalidFileType='امکان آپلود این فایل وجود ندارد',
                this.on('success',function(file,response) {
                    if(response==1)
                    {
                        file.previewElement.classList.add('dz-success');
                    }
                    else
                    {
                        file.previewElement.classList.add('dz-error');
                        $(file.previewElement).find('.dz-error-message').text('خطا در آپلود فایل');
                    }
                });

        }
    };
    show_img=function (url,id,token)
    {
        var url2="'"+'<?= url('admin/product/del_product_img') ?>'+"'";
        var token2="'"+token+"'";
        var img='<img src='+url+' onclick="del_img('+id+','+url2+','+token2+')" />';
        $("#show_product_image").html(img);
    }
</script>
@endsection
