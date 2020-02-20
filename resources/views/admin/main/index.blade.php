@extends('admin.layout.master')

@section('title', __('مدیریت'))
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            داشبورد
            <small>کنترل پنل</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3> @if($order_count ?? ''>0) {{ $order_count ?? '' }} @else 0  @endif</h3>

                        <p>سفارشات جدید</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('order.index')}}" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> اطلاعات بیشتر </a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        {{-- <h3>{{ $user_count }}</h3> --}}

                        <p>کاربران ثبت شده</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('users.index')}}" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> اطلاعات بیشتر </a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3> @if($comment_count ?? ''>0) {{ $comment_count ?? '' }} @else 0  @endif<sup style="font-size: 20px"></sup></h3>

                        <p>نظرات کاربران </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('comment.index')}}" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> اطلاعات بیشتر </a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3> @if($question_count ?? ''>0) {{ $question_count ?? '' }} @else 0  @endif </h3>
                        <p>پرسش کاربران</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('question.index')}}" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> اطلاعات بیشتر </a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="content">
                <div class="box box-info">
                    <div>
                        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto;direction:ltr"></div>
                    </div>
                    <div class="box-body">

                    </div>
                </div>
            </section>
            <!-- /.Left col -->

        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
@endsection

@section('scripts')


@endsection
