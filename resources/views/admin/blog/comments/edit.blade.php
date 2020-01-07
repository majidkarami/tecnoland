@extends('admin.layout.master')

@section('title', __('ویرایش نظر'))

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ویرایش نظر</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="POST" action="{{route('blog.comments.update', $comment->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="title">متن نظر</label>
                                <textarea name="description" class="form-control" rows="6" >{{ $comment->description }}</textarea>
                                @if($errors->has('title'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>وضعیت</label>
                                <div>
                                    <input type="radio" name="status" value="1" {{ ($comment->status == 1) ? 'checked' : '' }}> <span class="margin-l-10">منتشر شده</span>
                                    <input type="radio" name="status" value="0" {{ ($comment->status == 0) ? 'checked' : ''}}> <span>منتشر نشده</span>
                                    @if($errors->has('active'))
                                        <span style="color:red;font-size:13px">{{ $errors->first('active') }}</span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success pull-left">بروز رسانی</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
