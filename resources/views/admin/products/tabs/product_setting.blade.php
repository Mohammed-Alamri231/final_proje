@push('js')
<script type="text/javascript">
$('.datepicker').datepicker({
      rtl:'{{ session('lang')== 'ar'? true:false }}',
      language:'{{ session('lang') }}',
      Format:'yyyy-mm-dd',
      autoclose:false,
      todayBtn:true,
      clearBtn:true,
});

$(document).on('change','.status', function(){
      var status = $('.status option:selected').val();
      if(status == 'refused')
      {
            $('.reason').removeClass('hidden');
      }esle
      {
            $('.reason').addClass('hidden');
      }
});
</script>
@endpush
<div id="product_setting" class="tab-pane fade">
      <h3>{{ trans('admin.product_setting') }}</h3>

<div class="form-group col-md-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
{!! Form::label('price',trans('admin.price')) !!}<div>
{!! Form::text('price',$product->price,['calss'=>'form-control','placeholder'=>trans('admin.price')]) !!}</div>
</div>

<div class="form-group col-md-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
{!! Form::label('quantity',trans('admin.quantity')) !!}<div>
{!! Form::text('quantity',$product->quantity,['calss'=>'form-control','placeholder'=>trans('admin.quantity')]) !!}</div>
</div>

<div class="form-group col-md-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
{!! Form::label('start_at',trans('admin.start_at')) !!}<div>
{!! Form::date('start_at',$product->start_at,['calss'=>'form-control datepicker','autocomplete'=>'off','placeholder'=>trans('admin.start_at')]) !!}</div>
</div>

<div class="form-group col-md-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
{!! Form::label('end_at',trans('admin.end_at')) !!}<div>
{!! Form::date('end_at',$product->end_at,['calss'=>'form-control datepicker','autocomplete'=>'off','placeholder'=>trans('admin.end_at')]) !!}</div>
</div>

<div class="clearfix"></div>
<hr/>
<div class="form-group col-md-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
{!! Form::label('price_offer',trans('admin.price_offer')) !!}<div>
{!! Form::text('price_offer',$product->price_offer,['calss'=>'form-control','placeholder'=>trans('admin.price_offer')]) !!}</div>
</div>

<div class="form-group col-md-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
{!! Form::label('start_offer_at',trans('admin.start_offer_at')) !!}<div>
{!! Form::date('start_offer_at',$product->start_offer_at,['calss'=>'form-control datepicker','autocomplete'=>'off','placeholder'=>trans('admin.start_offer_at')]) !!}</div>
</div>

<div class="form-group col-md-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
{!! Form::label('end_offer_at',trans('admin.end_offer_at')) !!}<div>
{!! Form::date('end_offer_at',$product->end_offer_at,['calss'=>'form-control datepicker','autocomplete'=>'off','placeholder'=>trans('admin.end_offer_at')]) !!}</div>
</div>

<div class="clearfix"></div>
<hr/>
<div class="form-group">
{!! Form::label('status',trans('admin.status')) !!}<div>
{!! Form::select('status',['pending'=>trans('admin.pending'),'refused'=>trans('admin.refused'),'active'=>trans('admin.active')],$product->status,['calss'=>'form-control status datepicker','placeholder'=>trans('admin.status')]) !!}</div>
</div>

<div class="form-group reason {{ $product->status != 'refused' ?'hidden' :'' }}">
{!! Form::label('reason',trans('admin.refused_reason')) !!}<div>
{!! Form::textarea('reason',$product->reason,['calss'=>'form-controld reason','placeholder'=>trans('admin.refused_reason')]) !!}</div>
</div>











<div class="form-group col-md-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!! Form::label('pro_start',trans('admin.pro_start')) !!}<div>
{!! Form::date('pro_start',$product->pro_start,['calss'=>'form-control datepicker','autocomplete'=>'off','placeholder'=>trans('admin.pro_start')]) !!}</div>
</div>

<div class="form-group col-md-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
{!! Form::label('pro_end',trans('admin.pro_end')) !!}<div>
{!! Form::date('pro_end',$product->pro_end,['calss'=>'form-control datepicker','autocomplete'=>'off','placeholder'=>trans('admin.pro_end')]) !!}</div>
</div>

    </div>