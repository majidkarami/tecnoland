@extends('admin.layout.master')


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
                        <form id="myForm" method="post" action="/administrator/coupons">
                            @csrf
                            <div class="form-group">
                                <label for="title">عنوان کد تخفیف</label>
                                <input type="text" name="title" class="form-control" placeholder="عنوان کد تخفیف را وارد کنید...">
                            </div>

                            <div class="form-group">
                                <label for="description">کد</label>
                                <input type="text" name="code" class="form-control" placeholder=" کد را وارد کنید...">
                            </div>

                            <div class="form-group">
                                <label>قیمت</label>
                                <input type="number" name="price" class="form-control" placeholder=" قیمت را وارد کنید...">
                            </div>

                            <div class="form-group">
                                <label>وضعیت</label>
                                <div>
                                    <input type="radio" name="status" value="0" checked> <span class="margin-l-10">منتشر نشده</span>
                                    <input type="radio" name="status" value="1"> <span>منتشر شده</span>
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
