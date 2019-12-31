@extends('admin.layout.master')
@section('title', __('مدیریت گارانتی محصول'))

@section('styles')
    <style>
        .picker{
            /*left: 348px !important;*/
        }
    </style>
@endsection
@section('content')
    <section class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title pull-right">مدیریت گارانتی  {{ $service->name }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-xs-10">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                <div>{{session('success')}}</div>
                            </div>
                        @endif
                        <div class="form-group">
                            <label  for="pcal4">انتخاب تاریخ </label>
                            <div class="form-group">
                                <input type="text" id="pcal4" class="pdate form-control">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div id="show"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
@section('scripts')
    <?php
    $url=url('admin/services/get_price?product_id=').$product->id;
    ?>
<script type="text/javascript">
    var objCal4 = new AMIB.persianCalendar( 'pcal4', {
            onchange: function( pdate ){
                if( pdate ) {
                   var date=pdate.join( '-' );
                   var product_id='{{ $product->id }}';
                   var service_id='{{ $service->id }}';
                    $.ajaxSetup(
                        {
                            'headers':{
                                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                            }
                        });

                   $.ajax({
                       url:'{{ $url }}',
                       type:'POST',
                       data:'date='+date+'&product_id='+product_id+'&service_id='+service_id,
                       success:function (data) {
                          $("#show").html(data);
                       }
                   });

                } else {
                    alert( 'تاریخ واردشده نادرست است' );
                }
            }
        }
    );
</script>
@endsection
