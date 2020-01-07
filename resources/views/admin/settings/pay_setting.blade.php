@extends('admin.layout.master')

@section('title', __('تنظیمات پرداخت'))

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">تنظیمات پرداخت</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                <div>{{session('success')}}</div>
                            </div>
                        @endif
                        <form method="POST" action="{{route('pay_setting.store')}}">
                            @csrf

                            <div class="form-group">
                                <p style="color:red">تنظیمات اتصال به درگاه بانک ملت</p><br>
                                <label for="TerminalId">ترمینال ای دی بانک ملت</label>
                                <input type="text" name="TerminalId" value="{{$TerminalId}}" class="form-control"
                                       placeholder="ترمینال ای دی را وارد کنید ...">
                                @if($errors->has('TerminalId'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('TerminalId') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="Username">نام کاربری</label>
                                <input type="text" name="Username" value="{{$Username}}" class="form-control"
                                       placeholder="نام کاربری را وارد کنید ...">
                                @if($errors->has('Username'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('Username') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="Password"> کلمه عبور </label>
                                <input type="text" name="Password" value="{{$Password}}" class="form-control"
                                       placeholder=" کلمه عبور را وارد کنید ...">
                                @if($errors->has('Password'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('Password') }}</span>
                                @endif
                            </div>
                            <br><br>
                            <div class="form-group">
                                <p style="color:red;">تنظیمات اتصال به زرین پال</p><br>
                                <label for="MerchantID"> MerchantID </label>
                                <input type="text" name="MerchantID" value="{{$MerchantID}}" class="form-control"
                                       placeholder=" MerchantID  را وارد کنید ...">
                                @if($errors->has('MerchantID'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('MerchantID') }}</span>
                                @endif
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-success pull-left">بروز رسانی</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
