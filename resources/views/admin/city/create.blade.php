@extends('admin.layout.master')
@section('title', __('ایجاد شهر جدید'))
@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ایجاد شهر جدید</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="POST" action="{{route('cities.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">نام شهر</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control"
                                       placeholder="نام شهر را وارد کنید ...">
                                @if($errors->has('name'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="province_id">استان</label>
                                <select name="province_id" class="form-control">
                                    <option value="">انتخاب کنید</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{$province->id}}" style="color:red">
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


