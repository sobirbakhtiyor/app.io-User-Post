@extends('layouts.admin')

@section('content')

	<h1 class="page-header">Create Post</h1>

	{!! Form::open(['method'=>'post', 'action'=>'AdminPostsController@store', 'files'=>'true']) !!}

		{!! csrf_field() !!}
		
		<div class="form-group">
			
		{!! Form::label('title', 'Title:') !!}
		{!! Form::text('title', null, ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			
		{!! Form::label('category', 'Category:') !!}
		{!! Form::select('category_id', $categories, null, ['class'=>'form-control', 'placeholder'=>'Select category']) !!}

		</div>

		<div class="form-group">
			
		{!! Form::label('photo_id', 'Photo:') !!}
		{!! Form::file('photo_id', null, ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			
		{!! Form::label('body', 'Text:') !!}
		{!! Form::textarea('body', null, ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			
		{!! Form::submit('Create post', ['class'=>'btn btn-primary']) !!}

		</div>

	{!! Form::close() !!}

	@include('includes.form-errors')

@stop