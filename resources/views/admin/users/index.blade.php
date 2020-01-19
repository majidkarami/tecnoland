@extends('admin.layout.master')

@section('title', __('لیست کاربران'))

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">کاربران</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{route('users.create')}}">
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
                            <th class="text-center"> ردیف</th>
                            <th class="text-center"> شناسه کاربر</th>
                            <th class="text-center"> نام کاربری</th>
                            <th class="text-center"> وضعیت</th>
                            <th class="text-center"> نقش</th>
                            <th class="text-center"> تاریخ ایجاد</th>
                            <th class="text-center">عملیات</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{$i}}</td>
                                <td class="text-center">{{$user->id}}</td>
                                <td class="text-center">{{$user->username}}</td>
                                @if($user->active == 0)
                                    <td class="text-center"><span class="badge label-danger">غیرفعال</span>
                                    </td>
                                @else
                                    <td class="text-center"><span class="badge label-success">فعال</span>
                                    </td>
                                @endif

                                <td class="text-center">{{$user->role}}</td>
                                <td class="text-center">{{ verta($user->created_at)->format('H:i , Y-m-d')}}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-info" href="{{route('users.show',$user->id)}}" style="color: white;">مشاهده</a>
                                    <a class="btn btn-sm btn-warning" href="{{route('users.edit',$user->id)}}" style="color: white;">ویرایش</a>
                                    <div style="display:inline-block">
                                        <button type="submit" data-toggle="modal" data-target="#modal-default" class="btn btn-sm btn-danger">حذف</button>
                                    </div>
                                    <form method="POST" action="{{route('users.destroy',$user->id)}}">
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
                                                            <p>آیا از حذف کاربر مورد نظر اطمینان دارید؟</p>
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
                                </td>

                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach

                        </tbody>
                        @if(sizeof($users)==0)
                            <tr>
                                <td colspan="8" style="color: #d9534f;text-align: center">رکوردی یافت
                                    نشد
                                </td>
                            </tr>
                        @endif
                    </table>

                    <div class="col-md-12" style="text-align: center">{{$users->links()}}</div>

                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection
