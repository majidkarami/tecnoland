@extends('admin.layout.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ویرایش دسته بندی {{$category->name}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" action="/administrator/categories/{{$category->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <label for="name">نام</label>
                                <input type="text" name="name" class="form-control" value="{{$category->name}}" placeholder="عنوان دسته بندی را وارد کنید...">
                            </div>

                            <div class="form-group">
                                <label for="category_parent">دسته والد</label>
                                <select name="category_parent" id="" class="form-control">
                                    <option value="">بدون والد</option>
                                    @foreach($categories as $category_data)
                                        <option value="{{$category_data->id}}" @if($category->parent_id == $category_data->id) selected @endif>{{$category_data->name}}</option>
                                        @if(count($category_data->childrenRecursive) > 0)
                                            @include('admin.partials.category', ['categories'=>$category_data->childrenRecursive, 'level'=>1, 'selected_category'=>$category])
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="meta_title">عنوان سئو</label>
                                <input type="text" name="meta_title" class="form-control" value="{{$category->meta_title}}" placeholder="عنوان سئو را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="meta_desc">توضیحات سئو</label>
                                <textarea type="text" name="meta_desc" class="form-control" placeholder="توضیحات سئو را وارد کنید...">{{$category->meta_desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_keywords">کلمات کلیدی سئو</label>
                                <input type="text" name="meta_keywords" class="form-control" value="{{$category->meta_keywords}}" placeholder="کلمات کلیدی سئو را وارد کنید...">
                            </div>
                            <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection