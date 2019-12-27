@extends('admin.layout.master')

@section('title', __('لیست تنظیمات'))

@section('content')

    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">لیست تنظیمات</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{route('settings.create')}}">
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
                            <th class="text-center">ردیف</th>
                            <th class="text-center">نام</th>
                            <th class="text-center"> مقدار</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        @php
                            $i = 1;
                        @endphp

                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                        @endphp

                        @foreach ($settings as $setting)
                            <tr>
                                <td class="text-center">{{$i}}</td>
                                <td class="text-center">{{$setting->name}}</td>
                                <td class="text-center">{{$setting->value}}</td>
                                <td class="text-center">

                                    <div style="display:inline-block">
                                        <form method="get"
                                              action="{{route('settings.edit',$setting->name)}}">
                                            @csrf
                                            <button style="color: white" type="submit" class="btn btn-sm btn-warning">
                                                ویرایش
                                            </button>
                                        </form>

                                    </div>
                                    {{-- <a class="btn btn-warning" href="{{route('adverts.edit',$advert->id)}}">ویرایش</a> --}}
                                    <div style="display:inline-block">
                                        <button type="submit" data-toggle="modal" data-target="#modal-default" class="btn btn-sm btn-danger">حذف</button>

                                        <form method="post" action="{{route('settings.destroy',$setting->name)}}">
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
                                                            <p>آیا از حذف تنظیمات مورد نظر اطمینان دارید؟</p>
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
                        @if(sizeof($settings)==0)
                            <tr>
                                <td colspan="8" style="color: #d9534f;text-align: center">رکوردی یافت
                                    نشد
                                </td>
                            </tr>
                        @endif
                    </table>

                    <div class="col-md-12" style="text-align: center">{{$settings->links()}}</div>

                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection
