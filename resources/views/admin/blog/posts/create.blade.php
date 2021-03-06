@extends('admin.layout.master')

@section('title', __('ایجاد پست جدید'))

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد پست جدید</h3>
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
                        <form method="POST" action="{{route('blog.posts.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="عنوان را وارد کنید...">
                                @if($errors->has('title'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="slug">نام مستعار</label>
                                <input type="text" name="slug" value="{{ old('slug') }}" class="form-control" placeholder="نام مستعار را وارد کنید...">
                                @if($errors->has('slug'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('slug') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="category">دسته بندی</label>
                                <select name="category" id="" class="form-control">
                                    <option value="">انتخاب کنید...</option>
                                    @foreach($categories as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('category') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>وضعیت</label>
                                <div>
                                    <input type="radio" name="active" value="0" checked> <span class="margin-l-10">منتشر نشده</span>
                                    <input type="radio" name="active" value="1"> <span>منتشر شده</span>
                                    @if($errors->has('active'))
                                        <span style="color:red;font-size:13px">{{ $errors->first('active') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="meta_description">توضیحات متا</label>
                                <textarea type="text" name="meta_description" class="form-control" placeholder="توضیحات متا را وارد کنید...">{{ old('meta_description') }}</textarea>
                                @if($errors->has('meta_description'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('meta_description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">کلمات کلیدی متا</label>
                                <textarea type="text" name="meta_keywords" class="form-control" placeholder="کلمات کلیدی متا را وارد کنید...">{{ old('meta_keywords') }}</textarea>
                                @if($errors->has('meta_keywords'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('meta_keywords') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                        </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('/admin/dist/js/dropzone.js')}}"></script>
@endsection
