
@extends('layouts.admin')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          	<img class="img-profile" src="{{Auth::user()->avatar}}">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{$user->name}} {{$user->lastname}}</h1>
          </div>

          <div class="row">

            <div class="col-lg-6">
	          <!-- Basic Card for admin -->
	          <div class="card shadow mb-4">
	            <div class="card-header py-3">
	              <h6 class="m-0 font-weight-bold text-primary">{{$user->role->name}} - {{$user->email}}</h6>
	            </div>
	            <div class="card-body">
	              <h6>Biography</h6>
	              <p>{{$user->biography}}</p>
	            </div>
	          </div>
	    	</div>

	  	  </div>

        </div>
        <!-- /.container-fluid -->

@endsection