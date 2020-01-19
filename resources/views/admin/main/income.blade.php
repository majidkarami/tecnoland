@extends('admin.layout.master')
@section('title', __('نمودار میزان درآمد'))
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="box box-info">
            <div style="padding-top: 20px">
                <div id="container" style="min-width: 310px; height: 500px; margin: 0 auto;direction:ltr"></div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@endsection

@section('scripts')

    <?php

    $price = '';
    $date = '';
    $count = '';

    foreach ($total_price as $key => $value) {
        $price .= $value . ',';
    }
    foreach ($order_count as $key => $value) {
        $count .= $value . ',';
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
                text: 'نمودار میزان درآمد این ماه فروشگاه'
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
            tooltip: {
                formatter: function () {
                    if (this.series.name == 'میزان درآمد') {
                        return this.x + '<br>' + this.series.name + ' : ' + this.y + ' تومان';
                    } else {
                        return this.x + '<br>' + this.series.name + ' : ' + this.y + ' بار';

                    }
                }
            },
            series: [{
                name: 'میزان درآمد',
                data: [<?= $price ?>],
                color: 'red'
            }, {
                name: 'تعداد تراکنش',
                data: [<?= $count ?>],
                marker: {
                    symbol: 'circle'
                }
            }]
        });
    </script>
@endsection


