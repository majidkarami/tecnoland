@extends('admin.layout.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">لیست محصولات سفارش {{$order->id}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th class="text-center">تصویر محصول</th>
                            <th class="text-center">نام محصول</th>
                            <th class="text-center">کد محصول</th>
                            <th class="text-center">تعداد</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products as $product)
                            <tr>
                                <td class="text-center"><img width="25%" src="{{$product->photos[0]->path}}"> </td>
                                <td class="text-center">{{$product->title}}</td>
                                <td class="text-center">{{$product->sku}}</td>
                                <td class="text-center">{{$product->pivot->qty}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="customer-data">
                    <p style="margin-top: 20px">
                        <strongt>نام خریدار: </strongt> {{$order->user->name . ' ' . $order->user->last_name}}
                    </p>
                    <p>
                        <strongt>آدرس خریدار: </strongt> {{$order->user->addresses[0]->province->name . ' ' . $order->user->addresses[0]->city->name . ' ' . $order->user->addresses[0]->address}}
                        <strongt>کد پستی خریدار: </strongt> {{$order->user->addresses[0]->post_code}}
                    </p>
                    <p>
                        <strongt>شماره موبایل خریدار: </strongt> {{$order->user->phone}}
                    </p>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection