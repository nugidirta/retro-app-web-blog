  <div class="card">
    <!-- /.card-header -->
    <div class="card-header">
      <h3 class="card-title">Add New Permission</h3>
      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </div>
    </div>
		  	

          <!-- /.card-header -->
		<div class="card-body p-1">
		<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
			{!! Form::label('name') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
			@if($errors->has('name'))
				<span class="badge badge-danger">{{ $errors->first('name') }}</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('display_name') ? 'has-error' : ''}}">
			{!! Form::label('display_name') !!}
			{!! Form::text('display_name', null, ['class'=>'form-control']) !!}
			@if($errors->has('display_name'))
				<span class="badge badge-danger">{{ $errors->first('display_name') }}</span>
			@endif
		</div>

    <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
			{!! Form::label('description') !!}
			{!! Form::text('description', null, ['class'=>'form-control']) !!}
			@if($errors->has('description'))
				<span class="badge badge-danger">{{ $errors->first('description') }}</span>
			@endif
		</div>

    <div class="form-group {{ $errors->has('permission_id') ? 'has-error' : ''}}">
      {!! Form::label('permission_id') !!}
      @if(count($permissions))
        @foreach($permissions as $row)
        <label>{{ Form::checkbox('permission_id[]', $row->id, in_array($row->id, $role_permissions) ? true : false, array('class' => 'name')) }}
          {{ $row->display_name }}</label>
        @endforeach
      @endif
      @if($errors->has('permission_id'))
        <span class="badge badge-danger">{{ $errors->first('permission_id') }}</span>
      @endif

    </div>



        <div class="pull-left">
          <button type="submit" class="btn btn-primary">{{ $role->exists ? 'Update' : 'Save'}}</button>
          <a href="{{ route('backend.roles.index') }}" class="btn btn-default">Back</a>
        </div>
    </div>



    </div>
    <!-- /.card -->
  </div>