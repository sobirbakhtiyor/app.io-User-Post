@extends('layouts.admin')

@section('scripts')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="/jpeg_camera/jpeg_camera_with_dependencies.min.js" type="text/javascript"></script>


	<script type="text/javascript"><!--

    var options = {
      shutter_ogg_url: "jpeg_camera/shutter.ogg",
      shutter_mp3_url: "jpeg_camera/shutter.mp3",
      swf_url: "jpeg_camera/jpeg_camera.swf",
    };
    var camera = new JpegCamera("#camera", options);
  
  $('#take_snapshots').click(function(){
    var snapshot = camera.capture();
    snapshot.show();
    
    snapshot.upload({api_url: "action.php"}).done(function(response) {
$('#imagelist').prepend("<tr><td><img src='"+response+"' width='100px' height='100px'></td><td>"+response+"</td></tr>");
}).fail(function(response) {
  alert("Upload failed with status " + response);
});
})

function done(){
    $('#snapshots').html("uploaded");
}

// --></script>
@stop
@section('content')

	<h1>Create user</h1>

	<input type="file" accept="image/*" capture="camera" />

	{!! Form::open(['method'=>'post', 'action'=>'AdminUsersController@store', 'files'=>'true']) !!}

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