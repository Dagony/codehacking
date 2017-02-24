@extends('layouts.admin')

@section('content')
	<h1>Posts</h1>

	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>User</th>
				<th>Category</th>
				<th>Photo</th>
				<th>Title</th>
				<th>Body</th>
				<th>Created</th>
				<th>Updated</th>
			</tr>
		</thead>
		<tbody>
			@foreach($posts as $post)
				<tr>
					<td>{{ $post->id }}</td>
					<td><a href="{{route('admin.posts.edit', $post->id)}}">{{ $post->user->name }}</a></td>
					<td>{{ $post->category_id ? $post->category->name : 'Uncategorized' }}</td>
					<td><img width="100" src="{{ $post->photo ? $post->photo->file : '/images/placeholder.png' }}" class="img-responsive img-rounded" /></td>
					<td>{{ $post->title }}</td>
					<td>{{ str_limit($post->body, 30)  }}</td> <td>{{ $post->created_at->diffForHumans() }}</td>
					<td>{{ $post->updated_at->diffForHumans() }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection