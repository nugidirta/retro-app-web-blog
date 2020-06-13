<table class="table table-striped">
  <tr>
    {{-- <th width="10%">Action </th> --}}
    <th>Name</th>
	<th>Display Name</th>
	<th>Description</th>
  </tr>
  @foreach($permissions  as $permission)
	<tr>
		{{-- <td> --}}
			{{-- <a href="{{ route('backend.permission.edit', $permission->id) }}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a> --}}
			
			{{-- @if($permission->id == config('cms.default_role_id'))
				<button onclick="return false" type="submit" class="btn btn-sm btn-danger disabled"><i class="fa fa-times"></i></button>
			@else --}}
				{{-- <a href="{{ route('backend.permission.show', $permission->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a> --}}
			{{-- @endif --}}

		{{-- </td> --}}
		<td>{{ $permission->name  }}</td>
		<td>{{ $permission->display_name }}</td>
		<td>{{ $permission->description }}</td>
	</tr>
  @endforeach
</table>