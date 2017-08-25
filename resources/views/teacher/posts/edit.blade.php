@extends('layouts.admin')

@section('content')

	<h1 class="page-header">Edit Post</h1>

	<div class="row">

		<div class="col-sm-9">

	{!! Form::model($post, ['method'=>'patch', 'action'=>['AdminPostsController@update', $post->id], 'files'=>'true']) !!}

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
			
		{!! Form::submit('Update post', ['class'=>'btn btn-primary col-sm-2']) !!}

		</div>

	{!! Form::close() !!}



	{!! Form::open(['method'=>'delete', 'action'=>['AdminPostsController@update', $post->id]]) !!}

		<div class="form-group">
			
		{!! Form::submit('Delete post', ['class'=>'btn btn-danger col-sm-2 pull-right']) !!}

		</div>

	{!! Form::close() !!} 

	</div>

	</div>

	<div class="row">@include('includes.form-errors')</div>

@stop