 @push('js')
 <script type="text/javascript">
 $(document).on('click','add_input' , function(){
return false;
 });
 </script>
     
 @endpush
 
    <div id="other_data" class="tab-pane fade">
      <h3>{{ trans('admin.other_data') }}</h3>
      <div class="input_tag col-md-12 col-lg-12 col-sm-12">
        <div>
        <div class="col-md-6">
        {!! Form::label('input_key', trans('admin.input_key')) !!}
        {!! Form::text('input_key[]', '', ['class'=>'form-control']) !!}
        </div>
        
        <div class="col-md-6">
        {!! Form::label('input_value', trans('admin.input_value')) !!}
        {!! Form::text('input_value[]', '', ['class'=>'form-control']) !!}
        </div>
         <div class="clearfix"></div>
         <br>
        <a href="#" class="remove_input btn btn-danger"><i class="fa fa-trash"></i></a>
         </div>
        <br>
        <a href="#" class="remove_input btn btn-danger"><i class="fa fa-trash"></i></a>
      </div>
       <div class="clearfix"></div>
        <br>
        <a href="#" class="add_input btn btn-info"><i class="fa fa-plus"></i></a>
      <div class="clearfix"></div>
        <br>
    </div>