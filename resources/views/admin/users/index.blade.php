@extends('layouts.admin')


@section('content')

	@if(Session::has('deleted_user'))
		<p class="bg-danger">{{ Session('deleted_user') }}</p>
	@endif

	<h1>Users</h1>

	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Photo</th>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Active</th>
				<th>Created</th>
				<th>Updated</th>
			</tr>
		</thead>
		<tbody>
			@if ($users)
				@foreach($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td><img width="100" src="{{ $user->photo? $user->photo->file : '/images/placeholder.png' }}" class="img-responsive img-rounded" /></td>
						<td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a></td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->role->name }}</td>
						<td>{{ $user->is_active == 1 ? 'Active' : 'Inactive' }}</td>
						<td>{{ $user->created_at->diffForHumans() }}</td>
						<td>{{ $user->updated_at->diffForHumans() }}</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
@endsection