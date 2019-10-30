 <div id="product_info" class="tab-pane fade in active">
      <h3>{{ trans('admin.product_info') }}</h3>

<div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
{!! Form::label('title',trans('admin.product_title')) !!}<div>
{!! Form::text('title',$product->title,['calss'=>'form-control','placeholder'=>trans('admin.product_title')]) !!}</div>
</div>

<div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12">
{!! Form::label('serial_number',trans('admin.product_serial_number')) !!}<div>
{!! Form::text('serial_number',$product->serial_number,['calss'=>'form-control','placeholder'=>trans('admin.product_serial_number')]) !!}</div>
</div>

<div class="form-group">
{!! Form::label('content',trans('admin.product_content')) !!}<div>
{!! Form::textarea('content',$product->content,['calss'=>'form-control','placeholder'=>trans('admin.product_content')]) !!}</div>
</div>

</div>