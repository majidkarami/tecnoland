@extends('admin.layouts.master')

@section('title', __(' ویرایش کاربر جدید'))

@section('content')

   


<section class="content-wrapper">
       
  <div class="container-fluid">
        <div class="text-right" style="margin-top:30px;"> 
               
                </div>
      <div class="row">
           
          <div class="col-12">
               
            <div class="card">
                    
              <div class="card-header">
                <h3 class="card-title">ویرایش کاربر جدید</h3>

              </div>
              
              
                    <!-- form start -->
            <form method="POST" action="{{route('users.update',$user->id)}}" class="form-horizontal offset-md-3">
                        @csrf
                        @method('PATCH')
                      <div class="card-body">
                        <div class="form-group">
                          <label for="name" class="col-sm-6 control-label">نام و نام خانوادگی :</label>
      
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="نام و نام خانوادگی را وارد کنید ...">
                              @if($errors->has('name'))
                                  <span style="color:red;font-size:13px">{{ $errors->first('name') }}</span>
                              @endif
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="mobile" class="col-sm-2 control-label">موبایل :</label>
        
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="mobile" value="{{$user->mobile}}" placeholder="شماره موبایل را وارد کنید ...">
                                @if($errors->has('mobile'))
                                    <span style="color:red;font-size:13px">{{ $errors->first('mobile') }}</span>
                                @endif
                            </div>
                          </div>

                        {{--<div class="form-group">--}}
                                {{--<label for="roles">نقش :</label>--}}
                                {{--<div class="col-sm-8">--}}
                                {{--<select name="roles[]" class="form-control" multiple>--}}

                                  {{--@foreach ($roles as $roles)--}}

                                 {{--<option value="{{$roles->id}}" @if($user->id == $roles->id) selected @endif>{{$roles->name}}</option>--}}

                                 {{--@endforeach--}}
                                {{----}}
                                {{--</select>--}}
                              {{--</div>--}}
                            {{--</div>--}}

                            
                            <div class="form-group">
                                    <label for="type">وضعیت :</label>
                                    <div class="col-sm-8">
                                    <select name="is_active" class="form-control">
                                      <option value="0" @if($user->is_active == 0) selected @endif>غیر فعال</option>
                                      <option value="1" @if($user->is_active == 1) selected @endif>فعال</option>
                                    </select>
                                  </div>
                                </div>


                          
                       
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-info">ذخیره</button>
                       
                      </div>
                      <!-- /.card-footer -->
                    </form>
                  </div>
            </div>
            <!-- /.card -->
          
        </div>

  </div>


</section>


@endsection