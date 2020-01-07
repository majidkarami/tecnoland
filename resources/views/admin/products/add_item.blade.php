@extends('admin.layout.master')
@section('title', __('افزودن مشخصات فنی '))

@section('styles')
    <style>
        .item_table {width:95%;margin:auto;}
        .item_table tr td{
            padding-top: 15px;
        }
        .item_first_td {width:200px;}
    </style>
@endsection

@section('content')

    <section class="content" id="app">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">افزودن مشخصات فنی  - {{ $product->title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="text-center alert alert-info">
                            <p>برای جدا سازی فیلد <span style="color: #a94442;">textarea</span> از کاراکتر <span
                                    style="color: #a94442;">@#!</span> استفاده کنید </p>
                        </div>
                        <form id="myForm" method="post" action="{{url('admin/product/add_item')}}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <table class="item_table">

                                @foreach($items as $key=>$value)

                                    <tr>
                                        <td colspan="2" style="color:red;padding-top:30px;padding-bottom:10px">{{ $value->name }}</td>
                                    </tr>
                                    <?php
                                    $get_child_item = $value->get_child_item;
                                    ?>
                                    @foreach($get_child_item as $key2=>$value2)

                                        <tr>
                                            <td class="item_first_td">{{ $value2->name }}</td>
                                            <td>
                                                @if($value2->filed==1)

                                                    <input value="@if(array_key_exists($value2->id,$item_value)){{ $item_value[$value2->id] }}@endif"
                                                           name="item[<?= $value2->id ?>]" type="text" class="form-control">
                                                @elseif($value2->filed==2)
                                                    <select class="form-control" name="item[<?= $value2->id ?>]">
                                                        <option @if(array_key_exists($value2->id,$item_value)) @if($item_value[$value2->id]==1) selected="selected"
                                                                @endif @endif  value="1">بله
                                                        </option>
                                                        <option @if(array_key_exists($value2->id,$item_value)) @if($item_value[$value2->id]==2) selected="selected"
                                                                @endif @endif value="2">خیر
                                                        </option>
                                                    </select>
                                                @else
                                                    <textarea name="item[<?= $value2->id ?>]"
                                                              style="width:100%" rows="4" >@if(array_key_exists($value2->id,$item_value)){{ $item_value[$value2->id] }}@endif</textarea>
                                                @endif
                                            </td>
                                        </tr>

                                    @endforeach
                                @endforeach

                                <tr>
                                    <td colspan="2">
                                        <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                                    </td>
                                </tr>

                            </table>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
