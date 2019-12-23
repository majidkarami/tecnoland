@extends('admin.layout.master')

@section('title', __('ایجاد کاربر جدید'))

@section('content')

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد کاربر جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form id="myForm" method="post" action="{{route('users.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">نام</label>
                                <input type="text" name="name" class="form-control" placeholder="نام را وارد کنید...">
                                @if($errors->has('name'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="last_name">نام خانوادگی</label>
                                <input type="text" name="last_name" class="form-control"
                                       placeholder="نام خانوادگی را وارد کنید...">
                                @if($errors->has('last_name'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="national_code">کد ملی</label>
                                <input type="number" name="national_code" class="form-control"
                                       placeholder="کد ملی را وارد کنید...">
                                @if($errors->has('national_code'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('national_code') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="phone">شماره موبایل</label>
                                <input type="number" name="phone" class="form-control"
                                       placeholder=" به عنوان مثال 09170000000">
                                @if($errors->has('phone'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="birthday">تایخ تولد </label>
                                <input type="text" name="birthday" class="form-control" placeholder="1389/01/01">
                                @if($errors->has('birthday'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('birthday') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>جنسیت</label>
                                <div>
                                    <input type="radio" name="gender" value="1" checked> <span
                                        class="margin-l-10">مرد</span>
                                    <input type="radio" name="gender" value="0"> <span>زن</span>
                                </div>
                                @if($errors->has('gender'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('gender') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>شماره کارت بانکی</label>
                                <input type="number" name="bank_number" class="form-control"
                                       placeholder="شماره کارت بانکی را وارد کنید...">
                                @if($errors->has('bank_number'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('bank_number') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>ایمیل</label>
                                <input type="text" name="email" class="form-control"
                                       placeholder="ایمیل را وارد کنید...">
                                @if($errors->has('email'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>پسورد</label>
                                <input type="text" name="password" class="form-control"
                                       placeholder="پسورد را وارد کنید...">
                                @if($errors->has('password'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
