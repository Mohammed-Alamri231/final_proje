 @push('js')
 <script type="text/javascript">
 $(document).ready(function() {
    $('.mall_select2').select2();
});
 </script>
     
 @endpush
 <div id="product_size_wieght" class="tab-pane fade">
      <h3>{{ trans('admin.product_size_wieght') }}</h3>
 
 <div class="size_weight">
      

 </div>
   <div class="info_data ">
     <div class="form-group col-md-4 col-lg-4  col-sm-4 col-xs-12">
     {!! Form::label('trade_id',trans('admin.trade_id')) !!}<div>
     {!! Form::select('trade_id',App\Model\TradeMark::pluck('name_'.lang(),'id'),$product->trade_id,
     ['calss'=>'form-control','placeholder'=>trans('admin.trade_id')]) !!}</div>
     </div>

      <div class="form-group col-md-4 col-lg-4  col-sm-4 col-xs-12">
     {!! Form::label('stock_id',trans('admin.stock_id')) !!}<div>
     {!! Form::select('stock_id',App\Model\Stock::pluck('stock_name','id'),$product->stock_id,
     ['calss'=>'form-control','placeholder'=>trans('admin.stock_id')]) !!}</div>
     </div>

      <div class="form-group col-md-4 col-lg-4  col-sm-4 col-xs-12">
     {!! Form::label('manu_id',trans('admin.manu_id')) !!}<div>
     {!! Form::select('manu_id',App\Model\Manufacturers::pluck('name_'.lang(),'id'),$product->manu_id,
     ['calss'=>'form-control','placeholder'=>trans('admin.manu_id')]) !!}</div>
     </div>
     <div class="col-md-4 col-lg-4 col-sm-4 ">
     {!! Form::label('mall',trans('admin.malls')) !!}<div>
     <select name="mall[]" class="form-control mall_select2" multiple="multiple" style="width:100%">
          @foreach (App\Model\Country::all() as $country)
          <optgroup label="{{ $country->{'country_name_'.lang()} }}" >
          @foreach ($country->malls()->get() as $mall)

          <option value="{{ $mall->id }}">{{ $mall->{'name_'.lang()} }}</option>
          
              
          @endforeach
          
          </optgroup>
              
          @endforeach
     </select>
     </div>
     <div class="clearfix"></div>
   </div>  
    </div>