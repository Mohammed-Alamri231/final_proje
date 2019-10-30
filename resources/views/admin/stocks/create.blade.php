@extends('admin.index')

@push('js')

<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>//&key=AIzaSyBwxuW2cdXbL38w9dcPOXfGLmi1J7AVV88

<script type="text/javascript" src='{{ url('design/adminlte/dist/js/locationpicker.jquery.js') }}'></script>
<?php
$lat = !empty(old('lat'))?old('lat') : '46.15242437752303';
$lng = !empty(old('lng'))?old('lng') : '2.753636360168457';
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
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::open(['url' => aurl('stocks'),'files'=>true]) !!}
            <input type="hidden" value="{{ $lat }}" id="lat" name="lat">
            <input type="hidden" value="{{ $lng }}" id="lng" name="lng">
            <div class="form-group">
            {!! Form::label('stock_name',trans('admin.stock_name')) !!}<div>
            {!! Form::text('stock_name',old('stock_name'),['calss'=>'form-control']) !!}</div>
            </div>

            <div class="form-group">
            {!! Form::label('company_id',trans('admin.company_id')) !!}<div>
            {!! Form::select('company_id',App\Model\Mall::pluck('name_'.session('lang'),'id'),old('company_id'),['calss'=>'form-control']) !!}</div>
            </div>

            <div class="form-group">
            {!! Form::label('stock_address',trans('admin.stock_address')) !!}<div>
            {!! Form::text('stock_address',old('stock_address'),['calss'=>'form-control']) !!}</div>
            </div>


            

            <div class="form-group">
            <div id="us1" style="width: 100%; height: 400px;"></div>
            </div>

           

            <div class="form-group">
            {!! Form::label('icon',trans('admin.stock_icon')) !!}<div>
            {!! Form::file('icon',['calss'=>'form-control']) !!}</div>
            </div>
            {!! Form::submit(trans('admin.add'),['class' =>'btn btn-primary']) !!}
            {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

  
    @endsection