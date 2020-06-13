@extends('layouts.backend.main')

@section('title', 'RetroAPPS Tech Blog | Add New Post')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Blog <small style="font-size: 15px">Add New Posts</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/blog.index') }}">Blog</a></li>
              <li class="breadcrumb-item active">Add new</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->	    <!-- Main content -->
		<section class="content">
		  <div class="container-fluid">
		    <div class="row">
		      <div class="col-md-9">
		      	{!! Form::model($post, [
		      		'method' => 'POST',
		      		'route' => 'backend.blog.store',
		      		'files' => TRUE,
		      		'id' 	=> 'post-form'
		      	])!!}

		      	@include('backend.blog.form')
		        
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
@include('backend.blog.script')
