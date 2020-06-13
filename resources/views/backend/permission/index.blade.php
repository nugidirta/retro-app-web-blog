@extends('layouts.backend.main')

@section('title', 'RetroAPPS Tech Blog | Permission')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Permissions <small style="font-size: 15px">Display All Permission</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/blog.index') }}">Permission</a></li>
              <li class="breadcrumb-item active">All Permissions</li>
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
	            <div class="card">
	              <!-- /.card-header -->
	              <div class="card-header">
	                <h3 class="card-title">Permissions</h3>
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
  	              	<div class="row">
  	              		{{-- <div class="col-md-6" style="padding-left: 10px; padding-right: 30px; padding-top: 10px; padding-bottom: 10px; ">
  	              			<a href="{{ route('backend.permission.create') }}" class="btn btn-info float-left">
  	              			  <span>
  	              			    <i class="fa fa-plus-circle"></i>
  	              			    <span>
  	              			      Add Permission
  	              			    </span>
  	              			  </span>
  	              			</a>
  	              		</div> --}}
						<div class="col-md-6" style="padding-left: 10px; padding-right: 30px; padding-top: 10px; padding-bottom: 10px; ">
							<div class="pull-right">
							  
							</div>
						</div>
  	              	</div>
				@include('backend.partials.message')

	            @if(!$permissions->count())
				<div class="alert alert-danger">
					<strong>No Record Found</strong>
				</div>
				@else
					@include('backend.permission.table')
				@endif
			</div>
			<div class="card-footer clearfix">
				<div class="pull-left" id="pagination">
					{{ $permissions->appends( Request::query() )->render() }}
				</div>
				<div class="pull-right">
					<?php $permissionsCount = $permissions->count();?>
					<small style="padding-right: 25px;">{{ $permissionsCount }} out of {{ $permissionsCount }} {{ str_plural('Items', $permissionsCount) }}</small>
				</div>
			</div>			                    	                	              
        </div>
        <!-- /.card -->
      </div>

    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
	  <!-- /.content-wrapper -->
@endsection

@section('script')
	<script type="text/javascript">
		$('#pagination').addClass('no-margin pagination-sm');
	</script>
@endsection
