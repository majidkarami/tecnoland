@extends('admin.layout.master')
@section('title', __('مدیریت گارانتی ها'))

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">مدیریت گارانتی محصول  {{ $product->title }}</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{ url('admin/services/create?product_id=').$product->id }}">
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
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th class="text-center">شناسه</th>
                            <th class="text-center">نام گارانتی</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                        @endphp

                        @foreach ($services as $key=>$value)
                            <tr>
                                <td class="text-center">{{$i}}</td>
                                <td class="text-center">{{$value->name}}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-info"
                                       href="{{ url('admin/services/'.$value->id.'?product_id='.$product->id) }}">مشاهده</a>
                                    <a class="btn btn-sm btn-warning"
                                       href="{{ url('admin/services').'/'.$value->id.'/edit?product_id='.$product->id }}">ویرایش</a>
                                    <div class="display-inline-block">

                                        <button type="submit" data-toggle="modal" data-target="#modal-default"
                                                class="btn btn-sm btn-danger">حذف
                                        </button>

                                        <form method="post" action="{{route('services.destroy',$value->id)}}">
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
                                                            <p>آیا از حذف گارانتی مورد نظر اطمینان دارید؟</p>
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

                            @php
                                $i++;
                            @endphp
                        @endforeach

                        </tbody>
                        @if(sizeof($services)==0)
                            <tr>
                                <td colspan="8" style="color: #d9534f;text-align: center">رکوردی یافت
                                    نشد
                                </td>
                            </tr>
                        @endif
                    </table>

                    <div class="col-md-12" style="text-align: center">{{ $services->appends(['product_id'=>$product->id]) }}</div>

                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection
