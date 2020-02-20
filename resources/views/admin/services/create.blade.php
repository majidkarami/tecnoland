@extends('admin.layout.master')
@section('title', __('ایجاد گارانتی جدید'))

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد گارانتی محصول - {{ $product->title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="POST" action="{{url('admin/services?product_id=').$product->id}}">
                            @csrf
                            <div class="form-group">
                                <label for="service_name">نام گارانتی</label>
                                <input type="text" name="service_name" value="{{old('service_name')}}" class="form-control"
                                       placeholder="نام گارانتی را وارد کنید ...">
                                @if($errors->has('service_name'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('service_name') }}</span>
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
