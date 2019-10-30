@extends('admin.index')

@section('content')
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $title }}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            {!! Form::open(['url' => aurl('users/'.$user->id),'method'=>'put']) !!}
            <div class="form-group">
            {!! Form::label('name',trans('admin.name')) !!}<div>
            {!! Form::text('name',$user->name,['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('email',trans('admin.email')) !!}<div>
            {!! Form::email('email',$user->email,['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('password',trans('admin.password')) !!}<div>
            {!! Form::password('password',['calss'=>'form-control']) !!}</div>
            </div>
            <div class="form-group">
            {!! Form::label('level',trans('admin.password')) !!}<div>
            {!! Form::Select('level',['user'=>trans('admin.user'),
            'vendor'=>trans('admin.vendor'),
            'company'=>trans('admin.company')],$user->level,['calss'=>'form-control','placeholder'=>'.........']) !!}</div>
            </div>
            {!! Form::submit(trans('admin.save'),['class' =>'btn btn-primary']) !!}
            {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

  
    @endsection