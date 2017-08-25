@extends('layouts.admin')


@section('content')



	<h1>Edit teacher</h1>

	<div class="row">

	<div class="col-sm-3">

		<img src="{{ $teacher->photo ? $teacher->photo->file : '/images/placeholder.png' }}" class="img-responsive img-rounded">

	</div>
	
	<div class="col-sm-9">



	{!! Form::model($teacher, ['method'=>'patch', 'action'=>['AdminTeachersController@update', $teacher->id], 'files'=>'true']) !!}

		<div class="form-group">
			
		{!! Form::label('name', 'Name:') !!}
		{!! Form::text('name', null, ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			
		{!! Form::label('subject_id', 'Subject:') !!}
		{!! Form::select('subject_id', [''=>'Select option'] + $subject, null, ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			
		{!! Form::label('email', 'E-mail:') !!}
		{!! Form::text('email', null, ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			
		{!! Form::label('role_id', 'Role:') !!}
		{!! Form::select('role_id', [''=>'Select option'] + $roles, null, ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			
		{!! Form::label('photo_id', 'Photo:') !!}
		{!! Form::file('photo_id', null, ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			
		{!! Form::label('is_active', 'Status:') !!}
		{!! Form::select('is_active', array(0=>'Not active', 1=>'Active'), null, ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			
		{!! Form::label('password', 'Password:') !!}
		{!! Form::password('password', ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			
		{!! Form::submit('Update teacher', ['class'=>'btn btn-primary col-sm-2']) !!}

		</div>

	{!! Form::close() !!}

	{!! Form::open(['method'=>'delete', 'action'=>['AdminTeachersController@update', $teacher->id]]) !!}

		<div class="form-group">
			
		{!! Form::submit('Delete teacher', ['class'=>'btn btn-danger col-sm-2 pull-right']) !!}

		</div>

	{!! Form::close() !!} 

	</div>

	</div>

	<div class="row">@include('includes.form-errors')</div>

@stop