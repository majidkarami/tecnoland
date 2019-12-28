@extends('admin.layout.master')

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
                        <h3>150</h3>

                        <p>سفارشات جدید</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> اطلاعات بیشتر </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>

                        <p>افزایش امتیاز</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> اطلاعات بیشتر </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>44</h3>

                        <p>کاربران ثبت شده</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> اطلاعات بیشتر </a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>65</h3>

                        <p>بازدید های جدید</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-left"></i> اطلاعات بیشتر </a>
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

                        <div class="table-responsive">
                            <table class="table">


                        <?php
                        $Jdf = new \App\lib\Jdf();
                        $aa = $Jdf->tr_num($Jdf->jdate('d'));
                        $a = ltrim($aa, '0');
                        ?>
                        <tr>
                            <td style="padding-right: 200px">آمار بازدید امروز فروشگاه</td>

                            <td class="text-blue" style="padding-left: 130px">{{ $total_view[$a] }}</td>
                        </tr>

                        <tr>
                            <td style="padding-right: 200px">آمار بازدید یک ماه فروشگاه</td>
                            <td class="text-blue" style="padding-left: 130px">{{ $month_year }}</td>
                        </tr>

                        <tr>
                            <td style="padding-right: 200px">آمار بازدید یک سال فروشگاه</td>
                            <td class="text-blue" style="padding-left: 130px">{{ $view_year }}</td>
                        </tr>

                        <tr>
                            <td style="padding-right: 200px">آمار بازدید کل فروشگاه</td>
                            <td class="text-blue" style="padding-left: 130px">{{ $total }}</td>
                        </tr>

                    </table>

                    </div>
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


    <?php

    $v = '';
    $v_t = '';
    $date = '';

    foreach ($total_view as $key => $value) {
        $v_t .= $value . ',';
    }
    foreach ($view as $key => $value) {
        $v .= $value . ',';
    }
    foreach ($date_list as $key => $value) {
        $date .= "'$value',";
    }
    ?>
    <script type="text/javascript" src="{{ url('admin/js/highcharts.js') }}"></script>
    <script>
        Highcharts.chart('container', {
            chart: {
                type: 'line',
                style: {
                    fontFamily: 'Vazir'
                }
            },
            title: {
                text: 'نمودار آمار بازید این ماه فروشگاه'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [<?= $date ?>]
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            legend: {
                verticalAlign: 'top',
                y: 30
            },
            tooltip: {},
            series: [{
                name: 'تعداد کل بازدید',
                data: [<?= $v_t ?>],
                color: 'red'
            }, {
                name: 'بازدید یکتا',
                data: [<?= $v ?>],
                marker: {
                    symbol: 'circle'
                }
            }]
        });
    </script>

@endsection
