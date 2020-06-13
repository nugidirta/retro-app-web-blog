<table class="table table-striped">
  <tr>
    <th width="10%">Action </th>
    <th>Role Display</th>
	<th>Role Description</th>
	<th>Role</th>
  </tr>
  @foreach($roles as $role)
	<tr>
		<td>
			<a href="{{ route('backend.roles.edit', $role->id) }}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
			
			@if($role->id == config('cms.default_role_id'))
				<button onclick="return false" type="submit" class="btn btn-sm btn-danger disabled"><i class="fa fa-times"></i></button>
			@else
				<a href="{{ route('backend.roles.confirm', $role->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
			@endif

		</td>
		<td>{{ $role->display_name }}</td>
		<td>{{ $role->description }}</td>
		<td>{{ $role->name }}</td>
	</tr>
  @endforeach
</table>