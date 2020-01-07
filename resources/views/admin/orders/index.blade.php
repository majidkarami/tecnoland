@extends('admin.layout.master')
@section('title', __('سفارشات'))

@section('styles')
    <link href="{{ url('admin/dist/js-persian-cal.css') }}" rel="stylesheet">
@endsection

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">سفارشات</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <div style="width: 49%;padding-right: 14px;">
                        <form class="order_search" method="get">
                            <div class="form-group">
                                <label>شماره سفارش : </label>
                                <input type="text"
                                       value="@if(array_key_exists('order_id',$search_data)){{ $search_data['order_id'] }}@endif"
                                       name="order_id" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="pcal4">شروع از تاریخ : </label>
                                <input value="@if(array_key_exists('first_date',$search_data)){{ $search_data['first_date'] }}@endif"
                                       type="text" name="first_date" id="pcal4" class="pdate form-control">
                            </div>

                            <div class="form-group">
                                <label for="pcal5">تا تاریخ</label>
                                <input value="@if(array_key_exists('end_date',$search_data)){{ $search_data['end_date'] }}@endif"
                                       type="text" name="end_date" id="pcal5" class="pdate form-control">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">جست و جو</button>
                            </div>
                        </form>
                    </div>

                    <table class="table no-margin">

                        <thead>
                        <tr>
                            <th class="text-center">ردیف</th>
                            <th class="text-center">شماره سفارش</th>
                            <th class="text-center">نام کاربری</th>
                            <th class="text-center">زمان خرید</th>
                            <th class="text-center">مبلغ سفارش</th>
                            <th class="text-center">وضعیت پرداخت</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; $Jdf = new \App\lib\Jdf(); ?>
                        @foreach($orders as $key=>$value)
                            <tr>
                                <td class="text-center" style="padding-top: 15px;">{{ $i }}</td>
                                <td class="text-center" style="padding-top: 15px;">{{ number2farsi($value->order_id) }}</td>
                                <td class="text-center" style="padding-top: 15px;">{{ $value->get_user->name }}</td>
                                <td class="text-center" style="padding-top: 15px;"> {{ $Jdf->tr_num($Jdf->jdate('H:i:s',$value->time)) }} {{ $Jdf->tr_num($Jdf->jdate('Y-m-d',$value->time)) }}</td>
                                <td class="text-center" style="padding-top: 15px;">{{ number2farsi(number_format($value->price)) }} تومان</td>
                                <td class="text-center" style="padding-top: 15px;">
                                    @if($value->pay_status==1)
                                        <span class="badge label-success">پرداخت شده</span>
                                    @else
                                        <span class="badge label-danger">در انتظار پرداخت</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-warning" href="{{ url('admin/order').'/'.$value->id }}">ویرایش</a>
                                    <a class="btn btn-sm btn-danger" onclick="del_row('<?= $value->id ?>','<?= url('admin/order') ?>','<?= Session::token() ?>')">حذف</a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        @endforeach
                        </tbody>
                        @if(sizeof($orders)==0)
                            <tr>
                                <td colspan="8" style="color: #d9534f;text-align: center">رکوردی یافت
                                    نشد
                                </td>
                            </tr>
                        @endif
                    </table>

                    <div class="col-md-12" style="text-align: center">{{$orders->links()}}</div>

                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{ url('admin/js/defaults-fa_IR.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/dist/js-persian-cal.min.js') }}"></script>
    <script type="text/javascript">
        var objCal4 = new AMIB.persianCalendar( 'pcal4');
        var objCal5 = new AMIB.persianCalendar( 'pcal5');
    </script>
@endsection