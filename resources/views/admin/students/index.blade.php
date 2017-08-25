@extends('layouts.admin')


@section('content')

	
		@if(Session::has('deleted_student'))
			
			<div class="alert alert-danger">
			
				<p>{{session('deleted_student')}}</p>

			</div>

		@endif

	

	

		@if(Session::has('updated_student'))

			<div class="alert alert-success">

				<p>{{session('updated_student')}}</p>

			</div>

		@endif

	

<h1>Students</h1>
<table class="table">
	<thead>
		<tr>
			<th>Id</th>
			<th>Photo</th>
			<th>Name</th>
			<th>Subject</th>
			<th>E-mail</th>
			<th>Role</th>
			<th>Status</th>
			<th>Created</th>
			<th>Updated</th>
		</tr>
	</thead>
	<tbody>
		@if($students)

			@foreach($students as $student)
					<tr>
						<td>{{$student->id}}</td>
						<td><img height="50" src="{{$student->photo ? $student->photo->file : '/images/placeholder.png'}}"></td>
						<td><a href="{{ route('admin.students.edit', $student->id) }}">{{$student->name}}</a></td>
						<td>{{$student->subject_id}}</td>
						<td>{{$student->email}}</td>
						<td>{{$student->role ? $student->role->name : 'no role yet'}}</td>
						<td>{{$student->is_active == 1 ? 'Active' : 'No active'}}</td>
						<td>{{$student->created_at->diffForHumans()}}</td>
						<td>{{$student->updated_at->diffForHumans()}}</td>
					</tr>
			@endforeach

		@endif
	</tbody>
</table>

@stop