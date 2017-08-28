@extends('layouts.admin')

@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
    $('select').material_select();
  });

	$('select').material_select('destroy');

</script>
@stop

@section('content')

	<h1>Add teacher</h1>

	{!! Form::open(['method'=>'post', 'action'=>'AdminTeachersController@store', 'files'=>'true']) !!}

		{!! csrf_field() !!}
		
		<!-- <div class="form-group">
			
		{!! Form::label('name', 'Name:') !!}
		{!! Form::text('name', null, ['class'=>'form-control']) !!}

		</div> -->

  		<div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="name" name="name" type="text" class="validate">
          <label for="name">First Name</label>
        </div>

  		<div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">email</i>
          <input id="email" name="email" type="text" class="validate">
          <label for="email">E-mail:</label>
        </div>

		<!-- <div class="form-group">
			
		{!! Form::label('email', 'E-mail:') !!}
		{!! Form::text('email', null, ['class'=>'form-control']) !!}

		</div> -->
		<div class="input-field row col s12">
    <select>
      <option value="" disabled selected>Choose your option</option>
		@if($subjects)

			@foreach($subjects as $subject)

  		
      <option value="{{ $subject->id ? $subject->id : 'no id'}} ">{{ $subject->name ? $subject->name : 'no name' }}</option>
    

			@endforeach

		@endif  
		</select>
    <label>Materialize Select</label>
  </div>

 

		<div class="form-group">
			
		{!! Form::label('subject_id', 'Subject:') !!}
		{!! Form::select('subject_id', [''=>'Select option'] + $subject, null, ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			
		<!-- {!! Form::label('role_id', 'Role:') !!} -->
		{!! Form::hidden('role_id', '2', null, ['class'=>'form-control']) !!}

		</div>

		<!-- <div class="form-group">
			
		{!! Form::label('photo_id', 'Photo:') !!}
		{!! Form::file('photo_id', null, ['class'=>'form-control']) !!}

		</div> -->

		<div class="file-field input-field">
	      <div class="btn">
	        <span>File</span>
	        <input type="file" name="photo_id">
	      </div>
	      <div class="file-path-wrapper">
	        <input class="file-path validate" type="text" name="photo_id">
	      </div>
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

 

