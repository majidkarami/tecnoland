@extends('admin.layout.master')
@section('title', __('ویرایش استان '))
@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ویرایش استان</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <form method="POST" action="{{route('provinces.update',$province->id)}}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="name">نام استان</label>
                                <input type="text" name="name" value="{{$province->name}}" class="form-control"
                                       placeholder="نام استان را وارد کنید ...">
                                @if($errors->has('name'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('name') }}</span>
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

