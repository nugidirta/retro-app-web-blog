@extends('layouts.backend.main')

@section('title', 'RetroAPPS Tech Blog | Delete Confirmation')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Role <small style="font-size: 15px">Delete Confirmation</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('backend.roles.index') }}">Role</a></li>
              <li class="breadcrumb-item active">Delete Confirmation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->	    <!-- Main content -->
		<section class="content">
		  <div class="container-fluid">
		    <div class="row">
		      <div class="col-md-12">
		      	{!! Form::model($role, [
		      		'method' => 'DELETE',
		      		'route' => ['backend.roles.destroy', $role->id],
		      	])!!}

		      	<p>Role to Delete : ID # {{ $role->id }} : {{ $role->name }}</p>
		      	<p>What you want to do with the posts by this role ? </p>
		      	<p><input type="radio" name="delete_option" value="delete" checked> Delete All Posts</p>
		      	{{-- <p><input type="radio" name="delete_option" value="attribute"> Attribute content to : </p> --}}
				{!! Form::select('selected_role', $roles, null) !!}
				<br><br>

				<button type="submit" class="btn btn-danger">Confirm Deletion</button>
				<a href="{{ route('backend.roles.index') }}" class="btn btn-default">Cancel</a>
		        
				{!! Form::close() !!} 
			  </div>
		    </div>
		    <!-- /.row -->
		  </div><!-- /.container-fluid -->
		</section>
<!-- /.content -->
</div>
	  <!-- /.content-wrapper -->
@endsection