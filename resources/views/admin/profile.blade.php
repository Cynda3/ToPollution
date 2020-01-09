
@extends('layouts.admin')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
          </div>

          <div class="row">

            <div class="col-lg-4">
	          <!-- Basic Card for admin -->
	          <div class="card shadow mb-4">
	            <div class="card-header py-3">
	              <h6 class="m-0 font-weight-bold text-primary">{{$user->name}} - {{$user->role->name}}</h6>
	            </div>
	            <div class="card-body">
	              {{$user->email}}
	            </div>
	          </div>
	    	</div>

	  	  </div>

        </div>
        <!-- /.container-fluid -->

@endsection