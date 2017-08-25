@extends('layouts.admin')


@section('content')



	<h1>Edit user</h1>

	<div class="row">

	<div class="col-sm-3">

		<img src="{{ $user->photo ? $user->photo->file : '/images/placeholder.png' }}" class="img-responsive img-rounded">

	</div>
	
	<div class="col-sm-9">



	{!! Form::model($user, ['method'=>'patch', 'action'=>['AdminUsersController@update', $user->id], 'files'=>'true']) !!}

		<div class="form-group">
			
		{!! Form::label('name', 'Name:') !!}
		{!! Form::text('name', null, ['class'=>'form-control']) !!}

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
			
		{!! Form::submit('Update user', ['class'=>'btn btn-primary col-sm-2']) !!}

		</div>

	{!! Form::close() !!}

	{!! Form::open(['method'=>'delete', 'action'=>['AdminUsersController@update', $user->id]]) !!}

		<div class="form-group">
			
		{!! Form::submit('Delete user', ['class'=>'btn btn-danger col-sm-2 pull-right']) !!}

		</div>

	{!! Form::close() !!} 

	</div>

	</div>

	<div class="row">@include('includes.form-errors')</div>

@stop