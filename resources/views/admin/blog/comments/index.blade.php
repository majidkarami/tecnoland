@extends('admin.layout.master')

@section('title', __('لیست نظرات'))

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">لیست نظرات</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-errors')
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <div>{{session('error')}}</div>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <div>{{session('success')}}</div>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th class="text-center">شناسه</th>
                            <th class="text-center">توضیحات</th>
                            <th class="text-center">مطلب</th>
                            <th class="text-center">تاریخ ایجاد</th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                        @foreach($comments as $comment)
                            <tr>
                                <td class="text-center">{{$i}}</td>
                                <td class="text-center">{{$comment->description}}</td>
                                <td class="text-center">{{$comment->post->title}}</td>
                                <td class="text-center">{{$comment->created_at}}</td>
                                <td class="text-center">
                                    @if($comment->status == 0)
                                        <span class="badge label-danger">منتشر نشده</span>
                                    @else
                                        <span class="badge label-success">منتشر شده</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{route('blog.comments.show', $comment->id)}}" class="btn btn-sm btn-info" style="cursor:pointer;margin-top:-15px">پاسخ</a>
                                    <div class="display-inline-block">
                                    @if($comment->status == 0)
                                        <div class="display-inline-block">
                                            <form method="POST" action="{{ route('blog.comments.actions', $comment->id)}}">
                                                @csrf
                                                 <input type="hidden" name="action" value="approved">
                                                <button type="submit" class="btn btn-sm btn-success pull-left">تایید</button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="display-inline-block">
                                            <form method="POST" action="{{ route('blog.comments.actions', $comment->id)}}">
                                                @csrf
                                                <input type="hidden" name="action" value="rejected">
                                                <button type="submit" class="btn btn-sm btn-danger pull-left">عدم تایید</button>
                                            </form>
                                        </div>
                                    @endif
                                        <div class="display-inline-block">
                                            <a class="btn btn-sm btn-danger" title="حذف" style="cursor:pointer;margin-top:-15px"
                                               onclick="del_row('<?= $comment->id ?>','<?= url('admin/blog/comments') ?>','<?= Session::token() ?>')">حذف</a>
                                        </div>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                        </tbody>
                        @if(sizeof($comments)==0)
                            <tr>
                                <td colspan="8" style="color: #d9534f;text-align: center">رکوردی یافت
                                    نشد
                                </td>
                            </tr>
                        @endif
                    </table>

                    <div class="col-md-12" style="text-align: center">{{$comments->links()}}</div>

                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection
