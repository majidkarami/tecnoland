@extends('admin.layout.master')
@section('title', __(' مدیریت تخفیف ها'))

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">دسته بندی ها</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{route('gift_cart.create')}}">
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
                            <th class="text-center">کد کارت</th>
                            <th class="text-center">مبلغ هدیه</th>
                            <th class="text-center">کاربر</th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>

                        <?php $i=1; ?>
                        @foreach($gift_cart as $key=>$value)
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td class="text-center">{{ $value->code }}</td>
                                <td class="text-center">{{ $value->value }}</td>
                                <td class="text-center">{{  $value->get_user->name }}</td>
                                <td class="text-center">
                                    @if($value->status==0)
                                        <span class="badge label-success"> استفاده نشده</span>
                                    @else
                                        <span class="badge label-danger"> استفاده شده</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-warning" href="{{ route('gift_cart.edit',$value->id) }}"
                                       style="color: white;">ویرایش</a>
                                    <div style="display:inline-block">
                                        <button type="submit" data-toggle="modal" data-target="#modal-default"
                                                class="btn btn-sm btn-danger">حذف
                                        </button>
                                    </div>
                                    <form method="POST" action="{{route('gift_cart.destroy',$value->id)}}">
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
                                                        <p>آیا از حذف کد هدیه مورد نظر اطمینان دارید؟</p>
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

                                </td>
                            </tr>
                            <?php $i++; ?>
                        @endforeach

                        @if(sizeof($gift_cart)==0)
                            <tr>
                                <td colspan="8" style="color: #d9534f;text-align: center">رکوردی یافت
                                    نشد
                                </td>
                            </tr>
                        @endif

                    </table>
                    <div class="col-md-12" style="text-align: center">{{$gift_cart->links()}}</div>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection

