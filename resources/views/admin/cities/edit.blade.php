@extends('admin.index')

@section('content')
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::open(['url' => aurl('cities/'.$city->id),'method'=>'put']) !!}
            <div class="form-group">
            {!! Form::label('city_name_ar',trans('admin.city_name_ar')) !!}<div>
            {!! Form::text('city_name_ar',$city->city_name_ar,['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('city_name_en',trans('admin.city_name_en')) !!}<div>
            {!! Form::text('city_name_en',$city->city_name_en,['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('country_id',trans('admin.country_id')) !!}<div>
            {!! Form::select('country_id',App\Model\Country::pluck('country_name_'.session('lang'),'id'),$city->country_id,['calss'=>'form-control']) !!}</div>
            </div>
            {!! Form::submit(trans('admin.save'),['class' =>'btn btn-primary']) !!}
            {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

  
    @endsection