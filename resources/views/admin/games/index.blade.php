@extends('admin.layout.master')
@section('title', __('لیست تکنوگیم'))

@section('styles')
    <style>
        tbody tr td p{
            text-align: center !important;
        }
    </style>
@endsection

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">لیست تکنوگیم</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{route('games.create')}}">
                        <i class="fa fa-plus"></i> جدید
                    </a>
                </div>
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
                            <th class="text-center">تصویر</th>
                            <th class="text-center">عنوان</th>
                            <th class="text-center">توضیحات</th>
                            <th class="text-center">وضعیت نمایش</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i =0;
                        ?>
                        @foreach($games as $game)
                            <tr>
                                <td class="text-center" style="padding-top: 45px">{{number2farsi($i)}}</td>
                                <td class="text-center"><img width="90" height="100" src="{{url($game->url)}}" alt="{{$game->title}}"></td>
                                <td class="text-center" style="padding-top: 45px">{{$game->title}}</td>
                                <td class="text-center" style="padding-top: 45px">{!! Illuminate\Support\Str::limit($game->description,22,'...') !!}</td>
                                <td class="text-center" style="padding-top: 45px;">
                                    @if($game->is_active==1)
                                        <span class="badge label-success"> نمایش</span>
                                    @else
                                        <span class="badge label-danger">عدم نمایش</span>
                                    @endif
                                </td>

                                <td class="text-center" style="padding-top: 45px">
                                    <div class="display-inline-block">
                                    <form method="post" action="{{route('games.active', $game->id)}}}">
                                        @csrf
                                        @method('PATCH')
                                        @if($game->is_active==0)
                                        <a class="btn btn-sm btn-info" href="{{route('games.active', $game->id)}}"> نمایش</a>
                                        @else
                                        <a class="btn btn-sm btn-info" href="{{route('games.active', $game->id)}}"> عدم نمایش</a>
                                        @endif
                                     </form>
                                    </div>
                                    <a class="btn btn-sm btn-warning" href="{{route('games.edit', $game->id)}}">ویرایش</a>
                                    <div class="display-inline-block">
                                        <button type="submit" data-toggle="modal" data-target="#modal-default" class="btn btn-sm btn-danger">حذف</button>
                                        <form method="post" action="{{route('games.destroy',$game->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <!-- modal -->
                                            <div class="modal fade" id="modal-default">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">حذف</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>آیا از حذف تکنوگیم مورد نظر اطمینان دارید؟</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">خروج</button>
                                                            <button type="submit" class="btn btn-danger">بلی</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        </form>
                                    </div>

                                </td>
                            </tr>
                            <?php
                            $i++;
                            ?>
                        @endforeach
                        </tbody>
                        @if(sizeof($games)==0)
                            <tr>
                                <td colspan="8" style="color: #d9534f;text-align: center">رکوردی یافت
                                    نشد
                                </td>
                            </tr>
                        @endif
                    </table>

                    <div class="col-md-12" style="text-align: center">{{$games->links()}}</div>

                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection
