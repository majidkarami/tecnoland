@extends('admin.layout.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">سفارشات</h3>
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
                            <th class="text-center">مقدار</th>
                            <th class="text-center">وضعیت</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="text-center"><a href="{{route('orders.lists', ['id'=>$order->id])}}">{{$order->id}}</a></td>
                                <td class="text-center">{{$order->amount}}</td>
                                @if($order->status == 0)
                                    <td class="text-center"><span class="label label-danger">پرداخت نشده</span></td>
                                @else
                                    <td class="text-center"><span class="label label-success">پرداخت شده</span></td>
                                @endif
                            </tr>
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
