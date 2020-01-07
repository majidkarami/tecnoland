@extends('admin.layout.master')

@section('title', __('ایجاد تنظیمات جدید'))

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد تنظیمات جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="POST" action="{{route('settings.update',$setting->option_name)}}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="option_name">نام </label>
                                <input type="text" name="option_name" value="{{$setting->option_name}}" class="form-control"
                                       placeholder="نام تنظیمات را وارد کنید ...">
                                @if($errors->has('option_name'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('option_name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="option_value">مقدار </label>
                                <input type="text" name="option_value" value="{{$setting->option_value}}" class="form-control"
                                       placeholder="مقدار تنظیمات را وارد کنید ...">
                                @if($errors->has('option_value'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('option_value') }}</span>
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
