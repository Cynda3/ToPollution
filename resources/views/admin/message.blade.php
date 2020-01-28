
@extends('layouts.admin')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="row">
          	<div class="col-lg-1">
	          <!-- Page Heading -->
	          <div class="d-sm-flex align-items-center justify-content-around mb-4">
	            <h1 class="h3 mb-0 text-gray-800">{{$message->name}}</h1>
	          </div>
	        </div>
          </div>

          <div class="row">

            <div class="col-lg-6">
	          <!-- Basic Card for admin -->
	          <div class="card shadow mb-4">
	            <div class="card-header py-3">
	              <h6 class="m-0 font-weight-bold text-primary">{{$message->subject}}</h6>
	              <h6 class="m-0 font-weight-bold text-secondary">{{$message->email}}</h6>
	            </div>
	            <div class="card-body">
	              <h6>Message</h6>
	              <p>{{$message->message}}</p>
                  <div class="my-2"></div>
                  <a href="{{route('/deleteMessage', $message->id)}}" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>
                    <span class="text">Delete</span>
                  </a>
                  <div class="my-2"></div>
	            </div>
	          </div>
	    	</div>

	  	  </div>

        </div>
        <!-- /.container-fluid -->

@endsection