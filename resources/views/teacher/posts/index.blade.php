@extends('layouts.admin')

@section('content')

	
		@if(Session::has('updated_post'))
			
			<div class="alert alert-success">
			
				<p>{{session('updated_post')}}</p>

			</div>

		@endif
	
		@if(Session::has('deleted_post'))
			
			<div class="alert alert-danger">
			
				<p>{{session('deleted_post')}}</p>

			</div>

		@endif

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
				<td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
				<td>{{str_limit($post->body, 20)}}</td>
				<td>{{$post->created_at->diffForHumans()}}</td>
				<td>{{$post->updated_at->diffForHumans()}}</td>
			</tr>

			@endforeach

		@endif
	</tbody>
</table>

@stop