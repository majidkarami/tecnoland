@extends('admin.layout.master')
@section('title', __('لیست محصولات '))
@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">لیست محصولات</h3>
                <div class="text-left">
                    <a class="btn btn-app" href="{{route('products.create')}}">
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
                        <form action="{{ route('products.index') }}" id="search_form">
                            <tr>
                                <td style="padding-top: 15px;color: #16C1F3"><span class="fa fa-search"></span></td>
                                <td style="padding-top: 15px;">جستجوی فارسی</td>
                                <td><input value="@if(array_key_exists('title',$data)){{ $data['title'] }}@endif"
                                           type="text" name="title" class="form-control search_input"
                                           style="width:100%"></td>

                            </tr>
                            <tr>
                                <td style="padding-top: 15px;color: #d9534f"><span class="fa fa-search"></span></td>
                                <td style="padding-top: 15px;">جستجوی انگلیسی</td>
                                <td><input value="@if(array_key_exists('code',$data)){{ $data['code'] }}@endif"
                                           type="text" name="code" class="form-control search_input" style="width:100%">
                                </td>

                            </tr>
                        </form>
                        <tr>
                            <th class="text-center">ردیف</th>
                            <th class="text-center">تصویر شاخص</th>
                            <th class="text-center">عنوان محصول</th>
                            <th class="text-center">تاریخ انتشار</th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">تعداد فروش</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach($products as $key=>$value)
                            <tr>
                                <td class="text-center">{{$i}}</td>
                                <td class="text-center">
                                    <?php
                                    $get_img = $value->get_img;
                                    if($get_img)
                                    {
                                    ?>
                                    {{--                      <img src="{{ url('upload').'/'.$get_img->url }}" style="width:150px">--}}
                                    <img style="width:150px"
                                         src="@if($get_img->url){{ url('upload').'/'.$get_img->url }} @else {{ url('upload').'/'.'not img.gif' }}@endif">

                                    <?php
                                    }
                                    ?>
                                </td>
                                <td class="text-center">{{ $value->title }}</td>

                                <td class="text-center">{{verta($value->created_at)->format('H:i , Y-m-d')}}</td>

                                <td class="text-center">
                                    @if($value->product_status==1)
                                        <span class="badge label-success">موجود</span>
                                    @else
                                        <span class="badge label-danger">ناموجود</span>
                                    @endif
                                </td>

                                <td class="text-center">{{ $value->order_product }}</td>

                                <td class="text-center">
                                    <a title="ویرایش محصول" style="color: #368bff"
                                       href="{{ url('admin/product').'/'.$value->id.'/edit' }}"><span
                                            class="fa fa-edit"></span></a>
                                    <a title="انتخاب فیلتر برای محصول" style="color: #368bff"
                                       href="{{ url('admin/product/add-filter').'/'.$value->id }}"><span
                                            class="fa fa-filter"></span></a>
                                    <a title="افزودن فیلتر محصولات" style="color: #495b4a;"
                                       href="{{ url('admin/filter').'?='.$value->id }}"><span
                                            class="fa fa-filter"></span></a>
                                    <a title="نقد و بررسی تخصصی" style="color: #3b3b1f"
                                       href="{{ url('admin/product/add-review').'?product_id='.$value->id }}"><span
                                            class="fa fa-vcard"></span></a>
                                    <a title="افزودن مشخصات فنی" style="color: #000044"
                                       href="{{ url('admin/product/add-item').'/'.$value->id }}"><span
                                            class="fa fa-wrench"></span></a>
                                    <a title="افزودن گارانتی " style="color: green;"
                                       href="{{ url('admin/service').'?product_id='.$value->id }}"><span
                                            class="fa fa-certificate"></span></a>
                                    <a title="افزودن عکس " style="color: #C97626;"
                                       href="{{url('admin/product/gallery?id='.$value->id)}}"><span
                                            class="fa fa-image"></span></a>
                                    <a title="افزودن آیتم محصول " style="color: silver;"
                                       href="{{url('admin/item')}}"><span class="fa fa-reorder"></span></a>
                                    <a title="حذف محصول" style="color:red;cursor:pointer"
                                       onclick="del_row('<?= $value->id ?>','<?= url('admin/product') ?>','<?= Session::token() ?>')">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                </td>

                            </tr>
                            <?php $i++; ?>
                        @endforeach
                        </tbody>
                        @if(sizeof($products)==0)
                            <tr>
                                <td colspan="8" style="color: #d9534f;text-align: center">رکوردی یافت
                                    نشد
                                </td>
                            </tr>
                        @endif
                    </table>

                    <div class="col-md-12" style="text-align: center">{{$products->links()}}</div>

                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        $('.search_input').on('keydown', function (evete) {
            if (evete.keyCode == 13) {
                $("#search_form").submit();
            }
        })
    </script>

@endsection
