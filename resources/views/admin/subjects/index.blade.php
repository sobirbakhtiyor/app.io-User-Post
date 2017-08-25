@extends('layouts.admin')

@section('content')

	<h1 class="page-header">Subjects</h1>

		<div class="col-sm-6">
			{!! Form::open(['method'=>'post', 'action'=>'AdminSubjectsController@store']) !!}

		<!-- {!! csrf_field() !!} -->
		
		<div class="form-group">
			
		{!! Form::label('name', 'Subject name:') !!}
		{!! Form::text('name', null, ['class'=>'form-control']) !!}

		</div>
		
		<div class="form-group">
			
		{!! Form::label('hours', 'Hours:') !!}
		{!! Form::text('hours', null, ['class'=>'form-control']) !!}

		</div>
		
		<div class="form-group">
			
		{!! Form::label('credit', 'Credit:') !!}
		{!! Form::text('credit', null, ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			
		{!! Form::submit('Create subject', ['class'=>'btn btn-primary']) !!}

		</div>

	{!! Form::close() !!}
		</div>
		<div class="col-sm-6">
			@if($subjects)

					<table class="table">
						<thead>
							<tr>
								<th>Id</th>
								<th>subject Name</th>
								<th>Hours</th>
								<th>Credit</th>
								<th>Created</th>
								<th>Updated</th>
							</tr>
						</thead>
						<tbody>
							

								@foreach($subjects as $subject)

								<tr>
									<td>{{$subject->id}}</td>
									<td>{{$subject ? $subject->name: 'No subject yet'}}</td>
									<td>{{$subject->hours ? $subject->hours: 'No subject yet'}}</td>
									<td>{{$subject->credit ? $subject->credit: 'No subject yet'}}</td>
									<td>{{$subject->created_at ? $subject->created_at->diffForHumans() : 'N/A'}}</td>
									<td>{{$subject->updated_at ? $subject->updated_at->diffForHumans() : 'N/A'}}</td>
								</tr>

								@endforeach

							
						</tbody>
					</table>

			@endif
		</div>
@stop