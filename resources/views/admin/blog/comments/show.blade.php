@extends('admin.layout.master')

@section('title', __('پاسخ به نظر'))

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">پاسخ به نظر {{$comment->name}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="row user_comment_box" style="width:97%;margin:20px auto">
                            <div class="comment_header widget-user-header">
                                <div style="float: right; padding:10px">
                                    <label>متن نظر</label>
                                    <p style="font-size:11px">{{$comment->description}}</p>
                                </div>
                            </div>
                        </div>
                        <form method="POST" action="{{route('blog.comments.update', $comment->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="description">پاسخ نظر</label>
                                <textarea name="description" class="form-control" rows="6" >{{ old('description') }}</textarea>
                                @if($errors->has('description'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success pull-left">ثبت پاسخ</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
