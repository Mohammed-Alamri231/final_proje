{{--  @extends('admin.index')  --}}
@extends('front_end.index')
@push('js')

<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>//&key=AIzaSyBwxuW2cdXbL38w9dcPOXfGLmi1J7AVV88

<script type="text/javascript" src='{{ url('design/adminlte/dist/js/locationpicker.jquery.js') }}'></script>
<?php
$lat = !empty($stock->lat)?$stock->lat : '46.15242437752303';
$lng = !empty($stock->lng)?$stock->lng : '2.753636360168457';
?>
 <script>
        $('#us1').locationpicker({
        location: {
        latitude: {{ $lat }},
        longitude: {{ $lng }}, 
         },
         radius: 300,
        markerIcon: '{{ url('design/adminlte/dist/img/map-marker-2-xl.png') }}',
        inputBinding: {
        latitudeInput: $('#lat'),
        longitudeInput: $('#lng'),
        radiusInput: $('#us2-radius'),
        locationNameInput: $('#address') 
        },
        enableAutocomplete : true
                    });
                </script>
@endpush

@section('content')
  <div class="box container">
            <div class="box-header">
              <h3 class="box-title">{{ $title }}</h3>
            </div>

      
            <!-- /.box-header -->
            <div class="box-body">
        
            <form  method="any" action="{{ aurl('update_order_update')}}/{{ $stock->id_billpru}}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="modal-body col-sm-6">
                
                <input type="hidden" name="id_pharm" id="email" value="{{admin()->user()->id_type}}" readonly placeholder="you@example.com">
               <div class="form-group ">
                   <label>{{ trans('admin.id_product ') }}</label>
                   <input type="text" name="id_product" placeholder="{{ trans('admin.id_product') }}" readonly class="form-control" value="{{ $stock->id_product }}" >
                 </div>
                 <div class="form-group ">
                   <label>{{ trans('admin.id_comp') }}</label>
                   <input type="text" name="id_comp" placeholder="{{ trans('admin.id_comp') }}" readonly class="form-control" value="{{ $stock->id_comp }}" >
                 </div>
                 <div class="form-group ">
                   <label>{{ trans('admin.id') }}</label>
                   <input type="text" name="id" placeholder="{{ trans('admin.id') }}" readonly class="form-control" value="{{ $stock->id }}" >
                 </div>
                 <div class="form-group ">       
                   <label>{{ trans('admin.name_pro') }}</label>
                   <input type="text" name="name_pro" placeholder="{{ trans('admin.name_pro') }}" readonly class="form-control" value="{{ $stock->name_pro }}">
                 </div>
                
                 <div class="form-group ">       
                   <label>{{ trans('admin.price ') }}</label>
                   <input type="text" name="price" placeholder="{{ trans('admin.price ') }}" readonly class="form-control" value="{{ $stock->price }}" >
                 </div>
                 <div class="form-group ">
                   <label>{{ trans('admin.quantity') }}</label>
                   <input type="text" name="quantity" placeholder="{{ trans('admin.quantity') }}" class="form-control" value="{{ $stock->quantity }}">
                 </div>
               
                 <div class="form-group col-md-offset-6 " style="margin:1px">
                    <button type="submit" class="btn btn-primary col-md-6" >{{ trans('admin.update') }} </button>
                    </div>
                    
                   </form>
                   {{--  /*****************///////////********************** --}}
                 
                   <form  method="any" action="{{ aurl('resend_emails')}}" enctype="multipart/form-data">
                     {{ csrf_field() }}
     
                     <input type="hidden" name="id_bill"  value="{{ $stock->id_billpru}}" >
                     
                     <input type="hidden" name="id_pharm"  value="{{admin()->user()->id_type}}" >
                     <div class="form-group col-md-offset-6" style="margin:1px">
                     <button type="submit" class="btn btn-primary col-md-6" >{{ trans('admin.resend_updating_billls') }} </button>
                     </div>
                   </form>
   
                   <form  method="any" action="{{ aurl('back_to')}}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <input type="hidden" name="id_bill"  value="{{ $stock->id_billpru}}" >
                     
                     <input type="hidden" name="id_pharm"  value="{{admin()->user()->id_type}}" >
                     
                     <div class="form-group col-md-offset-6 " style="margin:1px">
                     <button type="submit" class="btn btn-primary col-md-6" >{{ trans('admin.back') }} </button>
                     </div>
                   </form> 
   
                   {{--  /*****************///////////********************** --}}
                   {!! Form::open(['url' => aurl('update_order/'.$stock->id_billpru),'method'=>'delete','files'=>true]) !!}
                  
                  
                   <div class="form-group col-md-offset-6 " style="margin:1px">
                      {!! Form::submit(trans('admin.delete'),['class' =>'btn btn-danger col-md-6']) !!}
   
                    </div>
                    <div class="form-group  col-md-4 col-lg-4 col-sm-4 col-xs-12">
                  </div>
                  {!! Form::hidden('id_product',$stock->id_product,['calss'=>'form-control']) !!}</div>

                  {{-- <input type="hidden" name="id_bill"  value="{{ $stock->id_billpru}}" > --}}
                  {!! Form::hidden('id_bill',$stock->id_billpru,['calss'=>'form-control']) !!}</div>

                  {!! Form::hidden('id_comp',$stock->id_comp,['calss'=>'form-control']) !!}</div>
                  {!! Form::hidden('id',$stock->id,['calss'=>'form-control']) !!}</div>
                  {!! Form::hidden('name_pro',$stock->name_pro,['calss'=>'form-control']) !!}</div>
                  {!! Form::hidden('price',$stock->price,['calss'=>'form-control']) !!}</div>
                  <input type="hidden" name="id_pharm"  value="{{admin()->user()->id_type}}">
                  {!! Form::hidden('quantity',$stock->quantity,['calss'=>'form-control']) !!}</div>
        
            {!! Form::close() !!}

           
                </div> 
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

  
    @endsection