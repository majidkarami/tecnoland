@extends('admin.layout.master')
@section('title', __(' ایجاد کد تخفیف'))

@section('styles')
    <link href="{{ url('admin/css/bootstrap-select.css') }}" rel="stylesheet">
@endsection

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد کد تخفیف جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form action="{{route('discounts.store')}}" method="post">
                            @csrf
                            <br>
                            <div class="form-group">
                                <label for="code">کد تخفیف </label>
                                <input type="text" name="code" value="{{old('code')}}" class="form-control"
                                       placeholder="کد تخفیف را وارد کنید...">
                                @if($errors->has('code'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('code') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="value">مقدار تخفیف بر حسب درصد</label>
                                <input type="text" name="value" value="{{old('value')}}" class="form-control"
                                       placeholder="مقدار تخفیف بر حسب درصد را وارد کنید...">
                                @if($errors->has('value'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('value') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="code_time">مدت زمان تخفیف بر حسب ساعت</label>
                                <input type="text" name="code_time" value="{{old('code_time')}}" class="form-control"
                                       placeholder="مدت زمان تخفیف بر حسب ساعت را وارد کنید...">
                                @if($errors->has('code_time'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('code_time') }}</span>
                                @endif
                            </div>

                            <?php
                            $price_list = [];
                            $price_list[0] = 'برای تمام سفارش ها';
                            $price_list[1] = 'برای سفارش های بالای 200 هزار تومان';
                            $price_list[2] = 'برای سفارش های بالای 500 هزار تومان';
                            $price_list[3] = 'برای سفارش های بالای یک میلیون تومان';
                            $price_list[4] = 'برای سفارش های بالای دو میلیون تومان';
                            $price_list[5] = 'برای سفارش های بالای سه میلیون تومان';
                            $price_list[6] = 'برای سفارش های بالای چهار میلیون تومان';
                            $price_list[7] = 'برای سفارش های بالای پنج میلیون تومان';
                            ?>
                            <div class="form-group">
                                <label for="price"> تخفیف برای</label>
                                <select name="price" id="" data-live-search="true" class="selectpicker form-control">
                                    @foreach($price_list as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('price'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('price') }}</span>
                                @endif
                            </div>


                            <div class="form-group">
                                <button type="submit" class="pull-left btn btn-success">ثبت</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection

@section('scripts')
    <script type="text/javascript" src="{{ url('admin/js/bootstrap-select.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/defaults-fa_IR.js') }}"></script>
@endsection
