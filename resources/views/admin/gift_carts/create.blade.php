@extends('admin.layout.master')
@section('title', __(' ایجاد کارت هدیه'))

@section('styles')
    <link href="{{ url('admin/css/bootstrap-select.css') }}" rel="stylesheet" >
    <link href="{{ url('admin/dist/js-persian-cal.css') }}" rel="stylesheet">
@endsection

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد کارت هدیه جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form action="{{route('gift_cart.store')}}" method="post">
                             @csrf
                            <br>
                            <div class="form-group">
                                <label for="user_id">شناسه کاربر</label>
                                <input type="text" name="user_id" value="{{old('user_id')}}" class="form-control" placeholder="شناسه کاربر را وارد کنید...">
                                @if($errors->has('user_id'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('user_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="value">مقدار کارت هدیه بر حسب تومان</label>
                                <input type="text" name="value" value="{{old('value')}}" class="form-control" placeholder="مقدار کارت هدیه بر حسب تومان را وارد کنید...">
                                @if($errors->has('value'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('value') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="code_time">مدت زمان کارت هدیه </label>
                                <input id="pcal4" type="text" name="code_time" value="{{old('code_time')}}" class="pdate form-control" style="text-align: unset !important;" placeholder="مدت زمان تخفیف را وارد کنید...">
                                @if($errors->has('code_time'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('code_time') }}</span>
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
    <script type="text/javascript" src="{{ url('admin/dist/js-persian-cal.min.js') }}"></script>
    <script type="text/javascript">
        var objCal4 = new AMIB.persianCalendar( 'pcal4');
    </script>
@endsection
