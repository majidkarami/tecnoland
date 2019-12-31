@extends('admin.layout.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">دسته بندی ها</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{route('categories.create')}}">
                        <i class="fa fa-plus"></i> جدید
                    </a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
                            <th class="text-center">ردیف</th>
                            <th class="text-center">نام دسته</th>
                            <th class="text-center">نام لاتین دسته</th>
                            <th class="text-center">دسته والد</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                            <form action="{{ route('categories.index') }}" id="search_form">
                        <tr>
                            <td></td>
                            <td><input value="@if(array_key_exists('cat_name',$data)){{ $data['cat_name'] }}@endif" type="text" name="cat_name"  class="form-control search_input" style="width:100%"></td>
                            <td><input value="@if(array_key_exists('cat_ename',$data)){{ $data['cat_ename'] }}@endif" type="text" name="cat_ename" class="form-control search_input" style="width:100%"></td>
                            <td></td>
                            <td></td>
                        </tr>
                            </form>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td class="text-center">{{$category->id}}</td>
                                <td class="text-center">{{$category->cat_name}}</td>
                                <td class="text-center">{{$category->cat_ename}}</td>
                                <td class="text-center">{{ $category->getParent->cat_name }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-warning" href="{{route('categories.edit', $category->id)}}">ویرایش</a>
                                    <div class="display-inline-block">
                                        <button type="submit" data-toggle="modal" data-target="#modal-default"
                                                class="btn btn-sm btn-danger">حذف
                                        </button>

                                        <form method="post" action="{{route('categories.destroy',$category->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <!-- modal -->
                                            <div class="modal fade" id="modal-default">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">حذف</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>آیا از حذف دسته مورد نظر اطمینان دارید؟</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left"
                                                                    data-dismiss="modal">خروج
                                                            </button>
                                                            <button type="submit" class="btn btn-danger">بلی</button>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        </form>
                                    </div>
                                </td>
                            </tr>
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

@section('scripts')
    <script>
        $('.search_input').on('keydown',function (evete)
        {
            if(evete.keyCode==13)
            {
                $("#search_form").submit();
            }
        })
    </script>
@endsection
