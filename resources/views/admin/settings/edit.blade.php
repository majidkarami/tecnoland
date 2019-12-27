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
                        <form method="POST" action="{{route('settings.update',$setting->name)}}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="name">نام </label>
                                <input type="text" name="name" value="{{$setting->name}}" class="form-control"
                                       placeholder="نام تنظیمات را وارد کنید ...">
                                @if($errors->has('name'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="name">مقدار </label>
                                <input type="text" name="value" value="{{$setting->value}}" class="form-control"
                                       placeholder="مقدار تنظیمات را وارد کنید ...">
                                @if($errors->has('value'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('value') }}</span>
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
