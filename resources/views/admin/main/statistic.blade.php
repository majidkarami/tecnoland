@extends('admin.layout.master')
@section('title', __('نمودار آمار بازدید'))
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="box box-info">
            <div style="padding-top: 20px">
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto;direction:ltr"></div>
            </div>
            <div class="box-body">

                <div class="table-responsive" style="padding-top: 30px">
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
