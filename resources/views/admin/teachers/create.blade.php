@extends('layouts.admin')

@section('content')

	<h1>Add teacher</h1>

	{!! Form::open(['method'=>'post', 'action'=>'AdminTeachersController@store', 'files'=>'true']) !!}

		{!! csrf_field() !!}
		
		<div class="form-group">
			
		{!! Form::label('name', 'Name:') !!}
		{!! Form::text('name', null, ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			
		{!! Form::label('email', 'E-mail:') !!}
		{!! Form::text('email', null, ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			
		{!! Form::label('subject_id', 'Subject:') !!}
		{!! Form::select('subject_id', [''=>'Select option'] + $subject, null, ['class'=>'form-control']) !!}

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
		{!! Form::select('is_active', array(0=>'Not active', 1=>'Active'), 0, ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			
		{!! Form::label('password', 'Password:') !!}
		{!! Form::password('password', ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			
		{!! Form::submit('Create user', ['class'=>'btn btn-primary']) !!}

		</div>

	{!! Form::close() !!}

	@include('includes.form-errors')

@stop