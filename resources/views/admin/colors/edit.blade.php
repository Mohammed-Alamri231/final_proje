@extends('admin.index')

@section('content')
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::open(['url' => aurl('colors/'.$color->id),'method'=>'put']) !!}
            <div class="form-group">
            {!! Form::label('name_ar',trans('admin.name_ar')) !!}<div>
            {!! Form::text('name_ar',$color->name_ar,['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('name_en',trans('admin.name_en')) !!}<div>
            {!! Form::text('name_en',$color->name_en,['calss'=>'form-control']) !!}</div>
            </div>

            <div class="form-group">
            {!! Form::label('color',trans('admin.color')) !!}<div>
            {!! Form::color('color',$color->color,['calss'=>'form-control']) !!}</div>
            </div>

           

            {!! Form::submit(trans('admin.save'),['class' =>'btn btn-primary']) !!}
            {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

  
    @endsection