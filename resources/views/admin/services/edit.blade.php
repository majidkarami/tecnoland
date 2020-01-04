@extends('admin.layout.master')
@section('title', __('ویرایش گارانتی'))

@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">ویرایش گارانتی - {{ $product->title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                <div>{{session('message')}}</div>
                            </div>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                <div>{{session('success')}}</div>
                            </div>
                        @endif
                        <form method="POST" action="{{url('admin/services/'.$service->id.'?product_id='.$product->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">نام گارانتی</label>
                                <input type="text" name="name" value="{{$service->name}}" class="form-control"
                                       placeholder="نام گارانتی را وارد کنید ...">
                                @if($errors->has('name'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary pull-left">ویرایش</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
