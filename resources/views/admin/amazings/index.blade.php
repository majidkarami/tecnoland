@extends('admin.layout.master')
@section('title', __('لیست محصولات شگفت انگیز'))

@section('styles')
    <style>
        tbody tr td p{
            text-align: center !important;
        }
    </style>
@endsection

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">لیست محصولات شگفت انگیز</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{route('amazings.create')}}">
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
                            <th class="text-center">عنوانک</th>
                            <th class="text-center">توضیحات</th>
                            <th class="text-center">هزینه اصلی محصول</th>
                            <th class="text-center">هزینه محصول با تخفیف</th>
                            <th class="text-center">مدت زمان شگفت انگیز</th>
                            <th class="text-center">شناسه محصول</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($amazings as $amazing)
                            <tr>
                                <td class="text-center">{{$amazing->id}}</td>
                                <td class="text-center">{{$amazing->title}}</td>
                                <td class="text-center">{{$amazing->m_title}}</td>
                                <td class="text-center">{!! Illuminate\Support\Str::limit($amazing->tozihat,22,'...') !!}</td>
                                <td class="text-center">{{$amazing->price1}}</td>
                                <td class="text-center">{{$amazing->price2}}</td>
                                <td class="text-center">{{$amazing->time}}</td>
                                <td class="text-center">{{$amazing->get_product->title}}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-warning" href="{{route('amazings.edit', $amazing->id)}}">ویرایش</a>
                                    <div class="display-inline-block">
                                        <button type="submit" data-toggle="modal" data-target="#modal-default" class="btn btn-sm btn-danger">حذف</button>
                                        <form method="post" action="{{route('amazings.destroy',$amazing->id)}}">                                        @csrf
                                        @method('DELETE')
                                        <!-- modal -->
                                            <div class="modal fade" id="modal-default">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">حذف</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>آیا از حذف شگفت انگیز مورد نظر اطمینان دارید؟</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">خروج</button>
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
                        @if(sizeof($amazings)==0)
                            <tr>
                                <td colspan="8" style="color: #d9534f;text-align: center">رکوردی یافت
                                    نشد
                                </td>
                            </tr>
                        @endif
                    </table>

                    <div class="col-md-12" style="text-align: center">{{$amazings->links()}}</div>

                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection
