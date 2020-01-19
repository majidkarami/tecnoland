@extends('admin.layout.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">لیست دسته بندی پست ها</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{route('blog.categories.create')}}">
                        <i class="fa fa-plus"></i> جدید
                    </a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @include('admin.partials.form-errors')
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        <div>{{session('error')}}</div>
                    </div>
                @endif
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <div>{{session('success')}}</div>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th class="text-center">شناسه</th>
                            <th class="text-center">عنوان</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                        @foreach($categories as $category)
                            <tr>
                                <td class="text-center">{{$i}}</td>
                                <td class="text-center">{{$category->title}}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-warning" href="{{route('blog.categories.edit', $category->id)}}">ویرایش</a>
                                    <div class="display-inline-block">
                                        <a class="btn btn-sm btn-danger" title="حذف" style="cursor:pointer"
                                           onclick="del_row('<?= $category->id ?>','<?= url('admin/blog/categories') ?>','<?= Session::token() ?>')">حذف</a>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                        </tbody>
                        @if(sizeof($categories)==0)
                            <tr>
                                <td colspan="8" style="color: #d9534f;text-align: center">رکوردی یافت
                                    نشد
                                </td>
                            </tr>
                        @endif
                    </table>

                    <div class="col-md-12" style="text-align: center">{{$categories->links()}}</div>

                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection
