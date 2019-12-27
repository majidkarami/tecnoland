@extends('admin.layout.master')
@section('title', __('ویرایش شهر '))
@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ویرایش شهر</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="POST" action="{{route('cities.update',$city->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="name">نام شهر</label>
                                <input type="text" name="name" value="{{$city->name}}" class="form-control"
                                       placeholder="نام شهر را وارد کنید ...">
                                @if($errors->has('name'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="category_parent">شهر</label>
                                <select name="province_id" class="form-control">
                                    <option value="">انتخاب کنید</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{$province->id}}" style="color:red"
                                                @if ($province->id == $city->province_id) selected @endif >
                                            {{$province->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('province_id'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('province_id') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-success pull-left">ذخیره</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection

