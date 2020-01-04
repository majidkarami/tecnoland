@extends('admin.layout.master')
@section('title', __('ایجاد فیلتر محصولات'))

@section('styles')
    <link href="{{ url('admin/css/bootstrap-select.css') }}" rel="stylesheet" >
    <style>
        .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
            width:65%;
        }
        .bootstrap-select.btn-group .dropdown-toggle .caret
        {
            right: 95%;
        }
    </style>
@endsection

@section('content')
    <section class="content" id="app">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد فیلتر محصولات</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">

                        <div class="alert alert-info">
                           <span class="fa fa-check" style="margin-left: 15px;"></span><span>برای <span class="badge alert-secondary">ویرایش</span> کافیست مشخصات را ویرایش و سپس ذخیره نمایید.</span>
                            <br><br>
                            <span class="fa fa-check" style="margin-left: 15px;"></span> <span>برای <span class="badge alert-secondary">حذف</span> کافیست مشخصات نام فیلتر را حذف و سپس ذخیره نمایید.</span>
                        </div>
                        @if(isset($id))
                            <form id="myForm" method="post" action="{{url('admin/filter?id='.$id)}}">
                        @endif
                            @csrf

                            <div class="form-group">
                                <label for="cat">انتخاب سر دسته</label>
                                <select name="cat[]" id="cat_list" data-live-search="true" onchange="get_filter()" class="selectpicker form-control">
                                    @foreach($cat_list as $key=>$value)
                                        <option value="{{$key}}" @if($key == $id) selected @endif>{{$value}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('cat'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('cat') }}</span>
                                @endif
                            </div>
                            <br>

                                <div class="form-group" id="filter_box">


                                    @foreach($filter as $key=>$value)

                                        <div id="filter_div_{{ $value->id }}" style="width:100%;float:right;margin-top:10px;margin-bottom:5px" class="product_filter_div">
                                            <input value="{{ $value->name }}" type="text" name="filter_name[{{ $value->id }}]" class="form-control" style="float: right;" placeholder="نام فیلتر ...">
                                            <input value="{{ $value->ename }}" type="text" name="filter_ename[{{ $value->id }}]" class="form-control" style="float: right;" placeholder="نام لاتین فیلتر ...">
                                            <select id="filter_filed_{{ $value->id }}" name="filter_filed[{{ $value->id }}]" class="form-control" style="float:right;margin-right:10px">
                                                <option @if($value->filed==1) selected="selected" @endif value="1">فیلد radio</option>
                                                <option @if($value->filed==2) selected="selected" @endif value="2">فیلد color</option></select>

                                            @foreach($value->get_child as $key2=>$value2)
                                                <div class="child_filter" id="child_filter_{{ $value2->id }}">

                                                    @if($value->filed==1)

                                                        <input type="text" value="{{ $value2->name }}" class="color_input_name" name="filter_child[{{ $value->id }}][{{ $value2->id }}]"/><span style="padding-right: 20px">filter_<'name'>[{{ $value2->id }}]</span>

                                                    @else
                                                        <?php
                                                        $color=explode('@',$value2->name);
                                                        ?>
                                                        <input type="text" value="{{$color[0] }}" class="color_input_name" name="filter_child[{{ $value->id }}][{{ $value2->id }}]"/>
                                                        <input type="text" value="{{$color[1] }}" class="jscolor color_input_code" name="filter_color[{{ $value->id }}][{{ $value2->id }}]"/> <span style="padding-right: 20px">filter_<'name'>[{{ $value2->id }}]</span>

                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="form-group" style="margin-right:0px;margin-bottom:0px;">
                                            <span class="fa fa-plus" style="color:red;cursor:pointer;padding-top:15px" onclick="add_child_filter('filter_div_{{ $value->id }}','{{ $value->id }}','child_filter_')"></span>
                                        </div>
                                    @endforeach

                                </div>

                                @if(isset($id))

                                    <div class="form-group">
                                        <span class="fa fa-plus" style="color:#69b369;cursor:pointer;padding-top:15px" onclick="add_filter()"><span style="font-family: Vazir;padding-right: 5px;font-size: 12px"> افزودن فیلتر</span></span>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                                    </div>

                                @endif
                            </form>
                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection

@section('scripts')
    <script type="text/javascript" src="{{ url('admin/js/bootstrap-select.js') }}"></script>
    <script type="text/javascript" src="{{ url('admin/js/defaults-fa_IR.js') }}"></script>
    <script type="text/javascript" src="{{ url('/admin/js/jscolor.js') }}"></script>
<script>
 get_filter=function ()
 {
      var cat_id=document.getElementById('cat_list').value;
      window.location='<?= url('admin/filter') ?>?id='+cat_id;
 };
</script>
@endsection
