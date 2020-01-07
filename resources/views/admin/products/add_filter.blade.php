@extends('admin.layout.master')
@section('title', __('افزودن فیلتر محصول'))

@section('styles')
    <style>
        .item_table {width:75%;}
        .item_table tr td{
            padding-top: 20px;
        }
        .item_first_td {width:200px;}
    </style>
@endsection
@section('content')
    <section class="content" id="app">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">افزودن فیلتر محصول  - {{ $product->title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <form id="myForm" method="post" action="{{url('admin/product/add_filter')}}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <table class="item_table">

                                <?php
                                function get_active($filter_value,$key1,$key2)
                                {
                                    $k=$key1.'_'.$key2;
                                    if(array_key_exists($k,$filter_value))
                                    {
                                        return true;
                                    }
                                    else
                                    {
                                        return false;
                                    }
                                }
                                ?>
                                @foreach($filters as $key=>$value)

                                    <tr>
                                        <td colspan="2" style="color:red;padding-top:30px;padding-bottom:10px">{{ $value->name }}</td>
                                    </tr>
                                    <?php
                                    $get_child_filter=$value->get_child;
                                    ?>
                                    @foreach($get_child_filter as $key2=>$value2)
                                        <tr style="  float: left;">
                                            <td class="item_first_td">

                                                @if($value->filed==1)

                                                    <input type="radio" class="flat-red"  @if(get_active($filter_value,$value->id,$value2->id)) checked="checked" @endif  name="filter[<?= $value->id ?>]" value="<?= $value2->id ?>">
                                                    {{ $value2->name }}
                                                @else

                                                    <?php
                                                    $name=$value2->name;
                                                    $e=explode('@',$name)
                                                    ?>
                                                    @if(sizeof($e)==2)
                                                        <input type="checkbox" class="flat-red" @if(get_active($filter_value,$value->id,$value2->id)) checked="checked" @endif name="filters[<?= $value->id ?>][<?= $value2->id ?>]" value="<?= $value2->id ?>">
                                                        {{ $e[0] }}
                                                    @endif

                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach

                                <tr>
                                    <td colspan="2" style="padding-top: 65px;">
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
