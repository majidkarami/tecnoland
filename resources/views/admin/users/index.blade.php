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
                            <th class="text-center"> نام</th>
                            <th class="text-center"> موبایل</th>
                            <th class="text-center"> وضعیت</th>
                            <th class="text-center"> تاریخ ایجاد</th>
                            <th class="text-center">عملیات</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{$user->id}}</td>
                                <td class="text-center">{{$user->name}}</td>
                                <td class="text-center">{{$user->phone}}</td>
                                @if($user->is_active == 0)
                                    <td class="text-center"><span class="badge badge-danger">غیرفعال</span>
                                    </td>
                                @else
                                    <td class="text-center"><span class="badge badge-success">فعال</span>
                                    </td>
                                @endif
                                <td class="text-center">{{ verta($user->ts)->format('H:i , Y-m-d')}}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-warning" href="{{route('users.edit',$user->id)}}" style="color: white;">ویرایش</a>
                                    <div style="display:inline-block">
                                        <button type="submit" onclick="del_row('{{route('users.destroy',$user->id)}}','{{Session::token()}}')" class="btn btn-sm btn-danger">حذف</button>
                                    </div>
                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                    <div class="col-md-12" style="text-align: center">{{$users->links()}}</div>

                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection
