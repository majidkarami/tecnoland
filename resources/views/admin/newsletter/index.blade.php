@extends('admin.layout.master')
@section('title', __('اخبار'))

@section("content")
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">اخبار</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{ route("admin.newsletter.create") }}">
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
                            <th class="text-center"> ردیف</th>
                            <th class="text-center">عنوان</th>
                            <th class="text-center"> متن</th>
                            <th class="text-center"> وضعیت</th>
                            <th class="text-center"> تاریخ ایجاد</th>
                            <th class="text-center">عملیات</th>

                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($objects as $object)
                            <tr id="{{$object->id}}">
                                <td class="text-center">{{$i}}</td>
                                <td class="text-center">{{$object->subject}}</td>
                                <td class="text-center">{!! substr( $object->content, 0, 30) !!}</td>
                                @if($object->done == 1)
                                    <td class="text-center"><span class="badge label-success"> ارسال شده </span>
                                    </td>
                                @else
                                    <td class="text-center"><span class="badge label-danger"> منتظر ارسال </span>
                                    </td>
                                @endif

                                <td class="text-center">{{ verta($object->created_at)->format('H:i , Y-m-d')}}</td>

                                <td class="text-center">
                                    <div style="display:inline-block">
                                        <button type="submit" data-toggle="modal" data-target="#modal-default" class="btn btn-sm btn-danger">حذف</button>
                                    </div>
                                    <form method="POST" action="{{route('admin.newsletter.destroy',$object->id)}}">
                                    @csrf
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
                                                        <p>آیا از حذف خبرنامه مورد نظر اطمینان دارید؟</p>
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
                                </td>

                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach

                        </tbody>
                        @if(sizeof($objects)==0)
                            <tr>
                                <td colspan="8" style="color: #d9534f;text-align: center">رکوردی یافت
                                    نشد
                                </td>
                            </tr>
                        @endif
                    </table>

                    <div class="col-md-12" style="text-align: center"> {!! $objects->render() !!}</div>

                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection




