@extends('admin.layout.master')

@section('title', __('تنظیمات عمومی'))

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">تنظیمات عمومی</h3>
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
                                <label for="name">نام وبسایت</label>
                                <input type="text" name="name" value="{{$name}}" class="form-control"
                                       placeholder="نام وبسایت را وارد کنید ...">
                            </div>

                            <div class="form-group">
                                <label for="tel">شماره تلفن</label>
                                <input type="text" name="tel" value="{{$tel}}" class="form-control"
                                       placeholder="شماره تلفن را وارد کنید ...">
                            </div>

                            <div class="form-group">
                                <label for="mobile"> شماره موبایل </label>
                                <input type="text" name="mobile" value="{{$mobile}}" class="form-control"
                                       placeholder="شماره موبایل را وارد کنید ...">
                            </div>

                            <div class="form-group">
                                <label for="email"> ایمیل </label>
                                <input type="text" name="email" value="{{$email}}" class="form-control"
                                       placeholder=" ایمیل وبسایت را وارد کنید ...">
                            </div>

                            <div class="form-group">
                                <label for="address"> آدرس </label>
                                <input type="text" name="address" value="{{$address}}" class="form-control"
                                       placeholder=" آدرس وبسایت را وارد کنید ...">
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
