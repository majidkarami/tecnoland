@extends('admin.layout.master')
@section('title', __('ایجاد ویژگی محصولات'))

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
                <h3 class="box-title pull-right">ایجاد ویژگی محصولات</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                        <div class="alert alert-info">
                           <span class="fa fa-check" style="margin-left: 15px;"></span><span>برای <span class="badge alert-secondary">ویرایش</span> کافیست مشخصات را ویرایش و سپس ذخیره نمایید.</span>
                            <br><br>
                            <span class="fa fa-check" style="margin-left: 15px;"></span> <span>برای <span class="badge alert-secondary">حذف</span> کافیست مشخصات نام فیلتر را حذف و سپس ذخیره نمایید.</span>
                        </div>
                        @if(isset($id))
                            <form id="myForm" method="post" action="{{url('admin/item?id='.$id)}}">
                        @endif
                            @csrf

                            <div class="form-group">
                                <label for="cat">انتخاب سر دسته</label>
                                <select name="cat[]" id="cat_list" data-live-search="true" onchange="get_item()" class="selectpicker form-control">
                                    @foreach($cat_list as $key=>$value)
                                        <option value="{{$key}}" @if($key == $id) selected @endif>{{$value}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('cat'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('cat') }}</span>
                                @endif
                            </div>
                            <br>

                                <div class="form-group" id="item_box">


                                    @foreach($item as $key=>$value)

                                        <div id="item_div_{{ $value->id }}" style="width:100%;float:right;margin-top:10px;margin-bottom:5px" class="product_item_div">
                                            <input name="item_name[{{ $value->id }}]" value="{{ $value->name }}" type="text"  style="float: right;" class="form-control" placeholder="نام گروه" >

                                            @foreach($value->get_child as $key2=>$value2)

                                                <div class="child_item">
                                                    <input value="{{ $value2->name }}" type="text" name="child_item[{{ $value->id }}][{{ $value2->id }}]" style="width: 50%;float: right" class="form-control" placeholder="نام آیتم">
                                                    <select name="child_filed[{{ $value->id }}][{{ $value2->id }}]" class="form-control" style="width: 45%;display: inline-block;margin-right: 40px;">
                                                        <option @if($value2->filed==1) selected="selected" @endif  value="1">فیلد input</option>
                                                        <option @if($value2->filed==2) selected="selected" @endif value="2">فیلد select</option>
                                                        <option @if($value2->filed==3) selected="selected" @endif value="3">فیلد textarea</option>
                                                    </select>
                                                </div>

                                            @endforeach

                                        </div>
                                        <div class="form-group" style="margin-right:0px;margin-bottom:0px;">
                                            <span class="fa fa-plus" style="color:red;cursor:pointer;padding-top:15px" onclick="add_child_item('item_div_{{ $value->id }}','{{ $value->id }}')"><span style="font-family: Vazir;padding-right: 5px;font-size: 12px"> افزودن نام آیتم</span></span>
                                        </div>
                                    @endforeach

                                </div>

                                @if(isset($id))

                                    <div class="form-group">
                                        <span class="fa fa-plus" style="color:#69b369;cursor:pointer;padding-top:15px" onclick="add_item()"><span style="font-family: Vazir;padding-right: 5px;font-size: 12px"> افزودن نام گروه</span></span>
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
<script>
    get_item=function ()
    {
        var cat_id=document.getElementById('cat_list').value;
        window.location='<?= url('admin/item') ?>?id='+cat_id;
    };
</script>
@endsection
