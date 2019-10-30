

@extends('front_end.index')

<style>

.box{
  
  overflow-x: scroll;

}


</style>
 


@section('content')


<div class="col-md-4 col-xs-6 col-md-offset-4 col-xs-offset-3">
  <form  action="{{ aurl('update_order') }}" method="put">
     {{ csrf_field() }}
         <div class="form-group">
             <input type="search" class="form-control subscribe" autocomplete="on" autofocus="on"   name="id_bill" placeholder="Search bill...">
             <input type="hidden" name="id_pharm"  value="{{admin()->user()->id_type}}" >

              {{-- <input type="hidden" name="bill_id" value=""> --}}
         </div>
    
        </form><!-- end /. form -->
</div> 
<div class="clearfix"></div>

<div class="box">
  <div class="box-header">
    {{--  <h3 class="box-title">{{ $title }}</h3>  --}}
  </div>
  <!-- /.box-header -->




<div class="container">
  <div class="box-body">
  	{!! Form::open(['id'=>'form_data','url'=>aurl('update_order/destroy/all'),'method'=>'delete']) !!}
    {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover table-bordered'],true) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->


<!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="mutlipleDelete" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
      </div>
      <div class="modal-body">

        <div class="alert alert-danger">
        	<div class="empty_record hidden">
        	<h4>{{ trans('admin.please_check_some_records') }} </h4>
        	</div>
        	<div class="not_empty_record hidden">
        	<h4>{{ trans('admin.ask_delete_itme') }} <span class="record_count"></span> ? </h4>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
      	<div class="empty_record hidden">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
      	</div>
      	<div class="not_empty_record hidden">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.no') }}</button>
        <input type="submit"  value="{{ trans('admin.yes') }}"  class="btn btn-danger del_all" />
        </div>
      </div>
    </div>
  </div>
</div>
</div>   

@push('js')
<script>
delete_all();
</script>
{!! $dataTable->scripts() !!}
@endpush

@endsection
