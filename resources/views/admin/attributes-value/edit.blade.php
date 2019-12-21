@extends('admin.layout.master')

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ویرایش مقدار ویژگی {{$attributeValue->title}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="post" action="/administrator/attributes-value/{{$attributeValue->id}}">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <div class="form-group">
                                <label for="name">عنوان</label>
                                <input type="text" name="title" class="form-control" value="{{$attributeValue->title}}" placeholder="عنوان مقدار ویژگی را وارد کنید...">
                            </div>
                            <div class="form-group">
                                <label for="attribute_group">نوع ویژگی</label>
                                <select name="attribute_group" id="" class="form-control">
                                    @foreach($attributesGroup as $attribute)
                                        <option value="{{$attribute->id}}" @if($attribute->id == $attributeValue->attributeGroup->id) selected @endif>{{$attribute->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection