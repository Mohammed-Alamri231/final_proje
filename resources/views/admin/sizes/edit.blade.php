@extends('admin.index')

@section('content')

@push('js')

<!-- Trigger the modal with a button -->


<script type="text/javascript">
$(document).ready(function(){

  $('#jstree').jstree({
  "core" : {
    'data' : {!! load_dep($size->department_id) !!}, 
    "themes" : {
      "variant" : "large"
    }
  },
  "checkbox" : {
    "keep_selected_style" : true 
  },
  "plugins" : [ "wholerow" ]//checkbox
});
});

$('#jstree').on('changed.jstree',function(e ,data){
  var i , j , r = [];
  var name =[];
  for(i=0, j =data.selected.length; i<j ; i++) 
  {
    r.push(data.instance.get_node(data.selected[i]).id);
  }

  if(r.join(', ') != '')
  {
    $('.department_id').val(r.join(', '));
  }
});

</script>
    
@endpush
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::open(['url' => aurl('sizes/'.$size->id),'method'=>'put']) !!}
            <div class="form-group">
            {!! Form::label('name_ar',trans('admin.name_ar')) !!}<div>
            {!! Form::text('name_ar',$size->name_ar,['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('name_en',trans('admin.name_en')) !!}<div>
            {!! Form::text('name_en',$size->name_en,['calss'=>'form-control']) !!}</div>
            </div>

           <input type="hidden" name="department_id" class="department_id" value="{{ $size->department_id }}">
            <div id="jstree"></div>

            <div class="form-group">
            {!! Form::label('is_public',trans('admin.is_public')) !!}<div>
            {!! Form::select('is_public',['yes'=>trans('admin.yes'),'no'=>trans('admin.no')],$size->is_public,['calss'=>'form-control']) !!}</div>
            </div>

           

            {!! Form::submit(trans('admin.save'),['class' =>'btn btn-primary']) !!}
            {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

  
    @endsection