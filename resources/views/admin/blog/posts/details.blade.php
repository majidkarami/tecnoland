@extends('admin.layout.master')

@section('title', __('افزودن جزییات پست'))

@section('styles')
        <link rel="stylesheet" href="{{asset('/admin/dist/css/dropzone.css')}}">
@endsection

@section('content')
    <section class="content" id="app">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">افزودن جزییات پست  {{$post->title}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" action="{{ route('blog.posts.create.details') }}">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <textarea type="text" id="textareaDescription" name="description" class="form-control ckeditor" placeholder="توضیحات را وارد کنید...">{{ $post->description }}</textarea>
                                @if($errors->has('description'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                            </div>
                            <br><br><br>
                        </form>

                      </div>


                        <div class="col-md-6 col-md-offset-3">
                        <form method="post" action="{{ route('blog.posts.upload',$post->id) }}" id="upload-file" class="dropzone">
                            @csrf
                            <input name="file" type="file" multiple style="display:none" />
                        </form>

                        <br>
                        <div class="text-center alert alert-danger col-sm-6 col-md-offset-3">
                            <p>برای حذف تصویر روی تصویر کلیک کنید</p>
                        </div>

                        @if(sizeof($images)>0)
                            <div id="show_post_image">
                                <img width="100%" height="200" src="{{ url($images[0]['path']) }}" onclick="del_img('{{ $images[0]['id'] }}','{{ url('admin/blog/post/del_post_img') }}','<?= Session::token() ?>')">
                            </div>
                        @endif
                        <br>
                        <div id="image_post_box">
                            @foreach($images as $key=>$value)
                                <img width="150" height="200"src="{{ url($value->path) }}" onclick="show_img('{{ url($value->path) }}','{{ $value->id }}','<?= Session::token() ?>')">
                            @endforeach
                        </div>
                        <br>
                        <div class="alert alert-info">
                            <h5  style="text-align:center;">برای بدست آوردن آدرس تصویر روی تصویر کوچک کلیک کنید.</h4>
                            <p style="text-align:center;padding-top:10px">نکته : آدرس را کپی کرده و در توضیحات بالا در قسمت تصویر قرار دهید و متن خود را قبل یا بعد از آن قرار دهید.</p>
                            <p style="text-align:center;padding-top:10px" id="img_url"></p>
                        </div>
                        <br>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
        <script type="text/javascript" src="{{asset('/admin/dist/js/dropzone.js')}}"></script>
        <script type="text/javascript" src="{{ url('/admin/plugins/ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace('textareaDescription', {
                customConfig: 'config.js',
                toolbar: 'simple',
                language: 'fa',
                removePlugins: 'cloudservices, easyimage'
            });

        </script>
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
                var url2="'"+'<?= url('admin/blog/post/del_post_img') ?>'+"'";
                var token2="'"+token+"'";
                var img='<img width="100%" height="200"src='+url+' onclick="del_img('+id+','+url2+','+token2+')" />';
                $("#img_url").html(url);
                $("#show_post_image").html(img);
            }
        </script>
@endsection
