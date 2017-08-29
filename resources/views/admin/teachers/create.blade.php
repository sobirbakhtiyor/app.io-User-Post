@extends('layouts.admin')

@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
    $('select').material_select();
  });

</script>
@stop

@section('content')

	<h1><b>Add teacher</b></h1>

	{!! Form::open(['method'=>'post', 'action'=>'AdminTeachersController@store', 'files'=>'true']) !!}

		{!! csrf_field() !!}

  		<div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="name" name="name" type="text" class="validate">
          <label for="name">First Name</label>
        </div>

  		<div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">email</i>
          <input id="email" name="email" type="text" class="validate">
          <label for="email">E-mail:</label>
        </div>
		<div class="input-field row col s12">
			<i class="material-icons prefix">account_circle</i>
		    <select name='subject_id'>
		      <option value="" disabled selected>Choose your option</option>
				@if($subjects)
					@foreach($subjects as $subject)  		
		      <option value="{{ $subject->id }}">{{$subject->name}}</option>    
					@endforeach
				@endif  
			</select>
	    	<label>Subject</label>
 		 </div>
			
		<!-- {!! Form::label('role_id', 'Role:') !!} -->
		{!! Form::hidden('role_id', '2', null, ['class'=>'form-control']) !!}

		

		
		<div class="row"><i class="material-icons prefix small">adjust</i> Status
		      <input class="with-gap" name="is_active" type="radio" id="test1" checked value="0" />
		      <label for="test1">Not active</label>
		      <input class="with-gap" name="is_active" type="radio" id="test2" value="1"/>
		      <label for="test2">Active</label>
    	</div>

		<div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="" name="password">
          <label for="password">Password</label>
        </div>
      </div>

		<div class="file-field input-field row">
	      <div class="btn">
	        <span>Photo</span>
	        <input type="file" name="photo_id">
	      </div>
	      <div class="file-path-wrapper">
	        <input class="file-path validate" type="text" name="photo_id">
	      </div>
    	</div>

		<div class="form-group">
			
		{!! Form::submit('Create user', ['class'=>'btn btn-primary']) !!}

		</div>

	{!! Form::close() !!}

	@include('includes.form-errors')

@stop

 

