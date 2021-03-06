@extends('admin.layout.master')

@section('title', __('ایجاد دسته بندی پست جدید'))

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد دسته بندی پست جدید</h3>
                {{--<div class="text-left">--}}
                    {{--<a class="btn btn-app" href="{{route('categories.create')}}">--}}
                        {{--<i class="fa fa-plus"></i> جدید--}}
                    {{--</a>--}}
                {{--</div>--}}
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" action="{{route('blog.categories.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" name="title" value="{{ old('title')}}" class="form-control" placeholder="عنوان را وارد کنید...">
                                @if($errors->has('title'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="slug">نام مستعار</label>
                                <input type="text" name="slug" value="{{ old('slug')}}" class="form-control" placeholder="نام مستعار را وارد کنید...">
                                @if($errors->has('slug'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('slug') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="meta_description">توضیحات متا</label>
                                <textarea type="text" name="meta_description" value="{{ old('meta_description')}}" class="form-control" placeholder="توضیحات را وارد کنید..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">کلمات کلیدی متا</label>
                                <input type="text" name="meta_keywords" value="{{ old('meta_keywords')}}" class="form-control" placeholder="کلمات کلیدی را وارد کنید...">
                            </div>
                            <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
