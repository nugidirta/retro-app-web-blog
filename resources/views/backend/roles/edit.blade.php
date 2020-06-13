@extends('layouts.backend.main')

@section('title', 'RetroAPPS Tech Blog | Edit New Role')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Blog <small style="font-size: 15px">Edit Role</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/blog.index') }}">Blog</a></li>
              <li class="breadcrumb-item active">Edit Role</li>
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
		      		'method' => 'PUT',
		      		'route' => ['backend.roles.update', $role->id],
		      		'id' 	=> 'role-form'
		      	])!!}

		      	@include('backend.roles.form')
		        
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