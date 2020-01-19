@extends('admin.layout.master')

@section('title', __('مشاهده کاربر'))

@section('content')

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right" style="line-height: 3;"> مشخصات کاربر </h3><br>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <p class="card-text text-bold" style="    margin: 10px;color: gray;padding-right: 10px;"><span class="text-blue" style="margin-left: 100px;"> نام کاربری:</span> {{$user->username}}</p>
                                <hr>
                                <p class="card-text text-bold" style="    margin: 10px;color: gray;padding-right: 10px;"><span class="text-blue" style="margin-left: 86px;"> شناسه کاربر:</span> {{$user->id}}</p>
                                <hr>
                                <p class="card-text text-bold" style="    margin: 10px;color: gray;padding-right: 10px;"><span class="text-blue" style="margin-left: 120px;"> ایمیل :</span> {{$user->email}}</p>
                                <hr>
                                @if($user->active == 1)
                                <p class="card-text text-bold" style="    margin: 10px;color: gray;padding-right: 10px;"><span class="text-blue" style="margin-left: 105px;">   وضعیت :</span> <span class="badge label-success">فعال</span> </p>
                                    <hr>
                                @else
                                <p class="card-text text-bold" style="    margin: 10px;color: gray;padding-right: 10px;"><span class="text-blue" style="margin-left: 105px;">   وضعیت :</span> <span class="badge label-danger">غیر فعال</span> </p>
                                    <hr>
                                @endif
                                <p class="card-text text-bold" style="    margin: 10px;color: gray;padding-right: 10px;"><span class="text-blue" style="margin-left: 120px;">   نقش :</span> {{$user->role}}</p>
                                <hr>
                                <p class="card-text text-bold" style="    margin: 10px;color: gray;padding-right: 10px;"><span class="text-blue" style="margin-left: 85px;">   تاریخ ایجاد :</span> {{ verta($user->created_at)->format('H:i , Y-m-d')}}</p>


                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection
