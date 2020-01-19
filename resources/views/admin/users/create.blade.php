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
                        <form method="post" action="{{route('users.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="username">نام</label>
                                <input type="text" name="username" value="{{old('username')}}" class="form-control" placeholder="نام کاربری را وارد کنید...">
                                @if($errors->has('username'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('username') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="email">ایمیل</label>
                                <input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="ایمیل را وارد کنید...">
                                    <span style="color:grey;font-size:12px">این فیلد به صورت دلخواه می باشد.</span><br>
                                @if($errors->has('email'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>پسورد</label>
                                <input type="text" name="password" class="form-control"
                                       placeholder="پسورد را وارد کنید...">
                                <span style="color:grey;font-size:12px">پسورد باید بیشتر از شش کاراکتر باشد.</span><br>
                                @if($errors->has('password'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="role">نقش</label>
                                <div>
                                    <input type="radio" name="role" value="admin" class="flat-red" checked> <span
                                        class="margin-l-10">مدیر</span>
                                    <input type="radio" name="role" class="flat-red" value="user"> <span>کاربر سایت</span>
                                </div>
                                @if($errors->has('role'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('role') }}</span>
                                @endif
                            </div>
                            <br>
                            <div class="form-group">
                                <label>وضعیت</label>
                                <div>
                                    <input type="radio" name="active" value="1" class="flat-red" checked> <span
                                        class="margin-l-10">فعال</span>
                                    <input type="radio" name="active" class="flat-red"  value="0"> <span>غیرفعال</span>
                                </div>
                                @if($errors->has('active'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('active') }}</span>
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


