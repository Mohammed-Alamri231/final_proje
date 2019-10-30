@extends('admin.index')

@section('content')
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::open(['url' => aurl('countries/'.$country->id),'method'=>'put','files'=>true]) !!}
            <div class="form-group">
            {!! Form::label('country_name_ar',trans('admin.country_name_ar')) !!}<div>
            {!! Form::text('country_name_ar',$country->country_name_ar,['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('country_name_en',trans('admin.country_name_en')) !!}<div>
            {!! Form::text('country_name_en',$country->country_name_en,['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('code',trans('admin.code')) !!}<div>
            {!! Form::text('code',$country->code,['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('mob',trans('admin.mob')) !!}<div>
            {!! Form::text('mob',$country->mob,['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('currency',trans('admin.currency')) !!}<div>
            {!! Form::text('currency',$country->currency,['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('logo',trans('admin.country_flag')) !!}<div>
            {!! Form::file('logo',['calss'=>'form-control']) !!}</div>

             @if (!empty($country->logo))
      <img src="{{ Storage::url($country->logo) }}" style="width:50px ; height:50px;"/> 
      @endif
            </div>

            {!! Form::submit(trans('admin.save'),['class' =>'btn btn-primary']) !!}
            {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

  
    @endsection