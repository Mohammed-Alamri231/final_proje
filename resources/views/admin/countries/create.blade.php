@extends('admin.index')

@section('content')
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::open(['url' => aurl('countries'),'files'=>true]) !!}
            <div class="form-group">
            {!! Form::label('country_name_ar',trans('admin.country_name_ar')) !!}<div>
            {!! Form::text('country_name_ar',old('country_name_ar'),['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('country_name_en',trans('admin.country_name_en')) !!}<div>
            {!! Form::text('country_name_en',old('country_name_en'),['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('code',trans('admin.code')) !!}<div>
            {!! Form::text('code',old('code'),['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('mob',trans('admin.mob')) !!}<div>
            {!! Form::text('mob',old('mob'),['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('currency',trans('admin.currency')) !!}<div>
            {!! Form::text('currency',old('currency'),['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('logo',trans('admin.country_flag')) !!}<div>
            {!! Form::file('logo',['calss'=>'form-control']) !!}</div>
            </div>
            {!! Form::submit(trans('admin.add'),['class' =>'btn btn-primary']) !!}
            {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

  
    @endsection