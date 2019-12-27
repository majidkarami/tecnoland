@extends('admin.layout.master')

@section('title', __('مشاهده کاربر'))

@section('content')

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right"> مشخصات کاربر </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <h6 class="card-title mb-2 text-bold"></h6>

                                <p class="card-text text-bold" style="color: gray;padding-right: 10px;"><span class="text-blue" style="margin-left: 100px;"> نام :</span> {{$user->name}}</p>
                                <p class="card-text text-bold" style="color: gray;padding-right: 10px;"><span class="text-blue" style="margin-left: 47px;"> نام خانوادگی :</span> {{$user->last_name}}</p>
                                <p class="card-text text-bold" style="color: gray;padding-right: 10px;"><span class="text-blue" style="margin-left: 44px;"> شماره موبایل :</span> {{$user->phone}}</p>
                                <p class="card-text text-bold" style="color: gray;padding-right: 10px;"><span class="text-blue" style="margin-left: 87px;"> ایمیل :</span> {{$user->email}}</p>
                                <p class="card-text text-bold" style="color: gray;padding-right: 10px;"><span class="text-blue" style="margin-left: 82px;"> کدملی :</span> {{$user->national_code}}</p>
                                <p class="card-text text-bold" style="color: gray;padding-right: 10px;"><span class="text-blue" style="margin-left: 63px;">  تاریخ تولد :</span> {{$user->birthday}}</p>
                                @if($user->gender == 1)
                                    <p class="card-text text-bold" style="color: gray;padding-right: 10px;"><span class="text-blue" style="margin-left: 76px;"> جنسیت :</span> مرد </p>
                                @else
                                    <p class="card-text text-bold" style="color: gray;padding-right: 10px;"><span class="text-blue" style="margin-left: 74px;"> جنسیت :</span> زن </p>
                                @endif
                                <p class="card-text text-bold" style="color: gray;padding-right: 10px;"><span class="text-blue" style="margin-left: 53px;"> شماره کارت :</span> {{$user->bank_number}}</p>

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
