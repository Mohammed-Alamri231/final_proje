@extends('admin.index')
@push('js')

<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>//&key=AIzaSyBwxuW2cdXbL38w9dcPOXfGLmi1J7AVV88

<script type="text/javascript" src='{{ url('design/adminlte/dist/js/locationpicker.jquery.js') }}'></script>
<?php
$lat = !empty($shipping->lat)?$shipping->lat : '46.15242437752303';
$lng = !empty($shipping->lng)?$shipping->lng : '2.753636360168457';
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
        //radiusInput: $('#us2-radius'),
        //locationNameInput: $('#address') 
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
            {!! Form::open(['url' => aurl('shipping/'.$shipping->id),'method'=>'put','files'=>true]) !!}
            <div class="form-group">
            {!! Form::label('name_ar',trans('admin.name_ar')) !!}<div>
            {!! Form::text('name_ar',$shipping->name_ar,['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('name_en',trans('admin.name_en')) !!}<div>
            {!! Form::text('name_en',$shipping->name_en,['calss'=>'form-control']) !!}</div>
            </div>

             <div class="form-group">
            {!! Form::label('user_id',trans('admin.owner_id')) !!}<div>
            {!! Form::select('user_id',App\User::where('level','company')->pluck('name','id'),$shipping->user_id,['calss'=>'form-control']) !!}</div>
            </div>


            <div class="form-group">
            <div id="us1" style="width: 100%; height: 400px;"></div>
            </div>

            <div class="form-group">
            {!! Form::label('icon',trans('admin.ship_icon')) !!}<div>
            {!! Form::file('icon',['calss'=>'form-control']) !!}</div>

             @if (!empty($shipping->logo))
            <img src="{{ Storage::url($shipping->icon) }}" style="width:50px ; height:50px;"/> 
      @endif
            </div>

            {!! Form::submit(trans('admin.save'),['class' =>'btn btn-primary']) !!}
            {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

  
    @endsection