@extends('admin.index')

@push('js')

<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyD9aVn0_b0nYJIbOFvzKlhP9kkCsaWPmFE'></script>//&key=AIzaSyBwxuW2cdXbL38w9dcPOXfGLmi1J7AVV88

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
        }
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
            {!! Form::open(['url' => aurl('manufacturers'),'files'=>true]) !!}
            <input type="hidden" value="{{ $lat }}" id="lat" name="lat">
            <input type="hidden" value="{{ $lng }}" id="lng" name="lng">
            <div class="form-group">
            {!! Form::label('name_ar',trans('admin.name_ar')) !!}<div>
            {!! Form::text('name_ar',old('name_ar'),['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('name_en',trans('admin.name_en')) !!}<div>
            {!! Form::text('name_en',old('name_en'),['calss'=>'form-control']) !!}</div>
            </div>

            <div class="form-group">
            {!! Form::label('contact_name',trans('admin.contact_name')) !!}<div>
            {!! Form::text('contact_name',old('contact_name'),['calss'=>'form-control']) !!}</div>
            </div>

            <div class="form-group">
            {!! Form::label('email',trans('admin.email')) !!}<div>
            {!! Form::email('email',old('email'),['calss'=>'form-control']) !!}</div>
            </div>

            <div class="form-group">
            {!! Form::label('mobile',trans('admin.mobile')) !!}<div>
            {!! Form::text('mobile',old('mobile'),['calss'=>'form-control']) !!}</div>
            </div>

            <div class="form-group">
            {!! Form::label('address',trans('admin.address')) !!}<div>
            {!! Form::text('address',old('address'),['calss'=>'form-control address']) !!}</div>
            </div>

            <div class="form-group">
            <div id="us1" style="width: 100%; height: 400px;"></div>
            </div>

            <div class="form-group">
            {!! Form::label('facebook',trans('admin.facebook')) !!}<div>
            {!! Form::text('facebook',old('facebook'),['calss'=>'form-control']) !!}</div>
            </div>

            <div class="form-group">
            {!! Form::label('twitter',trans('admin.twitter')) !!}<div>
            {!! Form::text('twitter',old('twitter'),['calss'=>'form-control']) !!}</div>
            </div>

            <div class="form-group">
            {!! Form::label('icon',trans('admin.manufacturers_icon')) !!}<div>
            {!! Form::file('icon',['calss'=>'form-control']) !!}</div>
            </div>
            {!! Form::submit(trans('admin.add'),['class' =>'btn btn-primary']) !!}
            {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

  
    @endsection