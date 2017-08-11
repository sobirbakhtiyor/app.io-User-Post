@extends('layouts.admin')

@section('content')

	<h1 class="page-header">Posts</h1>

	<table class="table">
	<thead>
		<tr>
			<th>Id</th>
			<th>Photo</th>
			<th>Author</th>
			<th>Category</th>
			<th>Title</th>
			<th>Body</th>
			<th>Created</th>
			<th>Updated</th>
		</tr>
	</thead>
	<tbody>
		@if($posts)

			@foreach($posts as $post)

			<tr>
				<td>{{$post->id}}</td>
				<td><img height="50" src="{{$post->photo ? $post->photo->file : '/images/placeholder.png'}}"></td>
				<td>{{$post->user ? $post->user->name : $post->user_id}}</td>
				<td>{{$post->category ? $post->category->name : 'Uncotegorized'}}</td>
				<td>{{$post->title}}</td>
				<td>{{$post->body}}</td>
				<td>{{$post->created_at->diffForHumans()}}</td>
				<td>{{$post->updated_at->diffForHumans()}}</td>
			</tr>

			@endforeach

		@endif
	</tbody>
</table>

@stop