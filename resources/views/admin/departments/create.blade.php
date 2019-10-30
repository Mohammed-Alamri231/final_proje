@extends('admin.index')

@section('content')
@push('js')
<script type="text/javascript">
$(document).ready(function(){

  $('#jstree').jstree({
  "core" : {
    'data' : {!! load_dep(old('parent')) !!},
    "themes" : {
      "variant" : "large"
    }
  },
  "checkbox" : {
    "keep_selected_style" : false 
  },
  "plugins" : [ "wholerow" ]
});
});
$('#jstree').on('changed.jstree',function(e ,data){
  var i , j , r = [];
  for(i=0, j =data.selected.length; i<j ; i++) 
  {
    r.push(data.instance.get_node(data.selected[i]).id);
  }

  $('.parent_id').val(r.join(', '));
});

</script>
    
@endpush

  <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::open(['url' => aurl('departments'),'files'=>true]) !!}
            <div class="form-group">
            {!! Form::label('dep_name_ar',trans('admin.dep_name_ar')) !!}<div>
            {!! Form::text('dep_name_ar',old('dep_name_ar'),['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('dep_name_en',trans('admin.dep_name_en')) !!}<div>
            {!! Form::text('dep_name_en',old('dep_name_en'),['calss'=>'form-control']) !!}</div>
            </div>

            <div class="clearfix"></div>
            <div id="jstree"></div>
            <input type="hidden" name="parent" class="parent_id" value="{{ old('parent') }}">
            <div class="clearfix"></div>
            
            <div class="form-group">
            {!! Form::label('description',trans('admin.description')) !!}<div>
            {!! Form::textarea('description',old('description'),['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('keyword',trans('admin.keyword')) !!}<div>
            {!! Form::textarea('keyword',old('keyword'),['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('icon',trans('admin.icon')) !!}<div>
            {!! Form::file('icon',['calss'=>'form-control']) !!}</div>
            </div>
            {!! Form::submit(trans('admin.add'),['class' =>'btn btn-primary']) !!}
            {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

  
    @endsection