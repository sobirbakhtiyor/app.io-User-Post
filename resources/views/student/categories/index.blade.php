@extends('layouts.admin')

@section('content')

	<h1 class="page-header">Categories</h1>

		<div class="col-sm-6">
			{!! Form::open(['method'=>'post', 'action'=>'AdminCategoriesController@store']) !!}

		<!-- {!! csrf_field() !!} -->
		
		<div class="form-group">
			
		{!! Form::label('name', 'Category name:') !!}
		{!! Form::text('name', null, ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			
		{!! Form::submit('Create category', ['class'=>'btn btn-primary']) !!}

		</div>

	{!! Form::close() !!}
		</div>
		<div class="col-sm-6">
			@if($categories)

					<table class="table">
						<thead>
							<tr>
								<th>Id</th>
								<th>Category Name</th>
								<th>Created</th>
								<th>Updated</th>
							</tr>
						</thead>
						<tbody>
							

								@foreach($categories as $category)

								<tr>
									<td>{{$category->id}}</td>
									<td>{{$category ? $category->name: 'No category yet'}}</td>
									<td>{{$category->created_at ? $category->created_at->diffForHumans() : 'N/A'}}</td>
									<td>{{$category->updated_at ? $category->updated_at->diffForHumans() : 'N/A'}}</td>
								</tr>

								@endforeach

							
						</tbody>
					</table>

			@endif
		</div>
@stop