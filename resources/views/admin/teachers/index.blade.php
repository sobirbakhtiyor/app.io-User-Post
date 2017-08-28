<!-- @extends('layouts.admin')


@section('content')

	
		@if(Session::has('deleted_teacher'))
			
			<div class="alert alert-danger">
			
				<p>{{session('deleted_teacher')}}</p>

			</div>

		@endif

	

	

		@if(Session::has('updated_teacher'))

			<div class="alert alert-success">

				<p>{{session('updated_teacher')}}</p>

			</div>

		@endif

	

<h1>Teachers</h1>
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
		@if($teachers)

			@foreach($teachers as $teacher)
					<tr>
						<td>{{$teacher->id}}</td>
						<td><img height="50" src="{{$teacher->photo ? $teacher->photo->file : '/images/placeholder.png'}}"></td>
						<td><a href="{{ route('admin.teachers.edit', $teacher->id) }}">{{$teacher->name}}</a></td>
						<td>{{$teacher->subject ? $teacher->subject->name : 'no subject yet'}}</td>
						<td>{{$teacher->email}}</td>
						<td>{{$teacher->role ? $teacher->role->name : 'no role yet'}}</td>
						<td>{{$teacher->is_active == 1 ? 'Active' : 'No active'}}</td>
						<td>{{$teacher->created_at->diffForHumans()}}</td>
						<td>{{$teacher->updated_at->diffForHumans()}}</td>
					</tr>
			@endforeach

		@endif
	</tbody>
</table>



<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
  <thead>
    <tr>
		<th class="mdl-data-table__cell--non-numeric">Id</th>
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
		@if($teachers)

			@foreach($teachers as $teacher)
			    <tr>
					<td class="mdl-data-table__cell--non-numeric">{{$teacher->id}}</td>
					<td><img height="50" src="{{$teacher->photo ? $teacher->photo->file : '/images/placeholder.png'}}"></td>
					<td><a href="{{ route('admin.teachers.edit', $teacher->id) }}">{{$teacher->name}}</a></td>
					<td>{{$teacher->subject ? $teacher->subject->name : 'no subject yet'}}</td>
					<td>{{$teacher->email}}</td>
					<td>{{$teacher->role ? $teacher->role->name : 'no role yet'}}</td>
					<td>{{$teacher->is_active == 1 ? 'Active' : 'No active'}}</td>
					<td>{{$teacher->created_at->diffForHumans()}}</td>
					<td>{{$teacher->updated_at->diffForHumans()}}</td>      
			    </tr>
			@endforeach

		@endif
  </tbody>
</table>

@stop -->