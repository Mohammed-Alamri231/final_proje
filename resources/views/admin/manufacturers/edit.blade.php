@extends('admin.index')
@push('js')

<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>//&key=AIzaSyBwxuW2cdXbL38w9dcPOXfGLmi1J7AVV88

<script type="text/javascript" src='{{ url('design/adminlte/dist/js/locationpicker.jquery.js') }}'></script>
<?php
$lat = !empty($manufact->lat)?$manufact->lat : '46.15242437752303';
$lng = !empty($manufact->lng)?$manufact->lng : '2.753636360168457';
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
            {!! Form::open(['url' => aurl('manufacturers/'.$manufact->id),'method'=>'put','files'=>true]) !!}
            <div class="form-group">
            {!! Form::label('name_ar',trans('admin.name_ar')) !!}<div>
            {!! Form::text('name_ar',$manufact->name_ar,['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('name_en',trans('admin.name_en')) !!}<div>
            {!! Form::text('name_en',$manufact->name_en,['calss'=>'form-control']) !!}</div>
            </div>

            <div class="form-group">
            {!! Form::label('contact_name',trans('admin.contact_name')) !!}<div>
            {!! Form::text('contact_name',$manufact->contact_name,['calss'=>'form-control']) !!}</div>
            </div>

            <div class="form-group">
            {!! Form::label('email',trans('admin.email')) !!}<div>
            {!! Form::email('email',$manufact->email,['calss'=>'form-control']) !!}</div>
            </div>

            <div class="form-group">
            {!! Form::label('mobile',trans('admin.mobile')) !!}<div>
            {!! Form::text('mobile',$manufact->mobile,['calss'=>'form-control']) !!}</div>
            </div>

            <div class="form-group">
            {!! Form::label('address',trans('admin.address')) !!}<div>
            {!! Form::text('address',$manufact->address,['calss'=>'form-control address']) !!}</div>
            </div>

            <div class="form-group">
            <div id="us1" style="width: 100%; height: 400px;"></div>
            </div>

            <div class="form-group">
            {!! Form::label('facebook',trans('admin.facebook')) !!}<div>
            {!! Form::text('facebook',$manufact->facebook,['calss'=>'form-control']) !!}</div>
            </div>

            <div class="form-group">
            {!! Form::label('twitter',trans('admin.twitter')) !!}<div>
            {!! Form::text('twitter',old('twitter'),['calss'=>'form-control']) !!}</div>
            </div>

            <div class="form-group">
            {!! Form::label('icon',trans('admin.trade_icon')) !!}<div>
            {!! Form::file('icon',['calss'=>'form-control']) !!}</div>

             @if (!empty($manufact->logo))
      <img src="{{ Storage::url($manufact->icon) }}" style="width:50px ; height:50px;"/> 
      @endif
            </div>

            {!! Form::submit(trans('admin.save'),['class' =>'btn btn-primary']) !!}
            {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

  
    @endsection