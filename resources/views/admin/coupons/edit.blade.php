@extends('admin.layout.master')


@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ویرایش برند {{$coupon->title}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" action="/administrator/coupons/{{$coupon->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">

                            <div class="form-group">
                                <label for="name">نام</label>
                                <input type="text" name="title" class="form-control" value="{{$coupon->title}}" placeholder="عنوان کد تخفیف را وارد کنید...">
                            </div>

                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <input type="text" name="code" class="form-control" value="{{$coupon->code}}" placeholder="کد را وارد کنید...">
                            </div>

                            <div class="form-group">
                                <label>قیمت</label>
                                <input type="number" name="price" class="form-control" value="{{$coupon->price}}" placeholder=" قیمت را وارد کنید...">
                            </div>

                            <div class="form-group">
                                <label>وضعیت</label>
                                <div>
                                    <input type="radio" name="status" value="0" @if($coupon->status == 0) checked @endif> <span class="margin-l-10">منتشر نشده</span>
                                    <input type="radio" name="status" value="1" @if($coupon->status == 1) checked @endif> <span>منتشر شده</span>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
