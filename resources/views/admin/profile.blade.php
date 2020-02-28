@extends('layouts.admin')
@section('messages')
{{$nMessages}}
@endsection
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-4">
			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-around mb-4">
				<img class="img-fluid mb-0" src="{{$user->avatar}}">
				<h1 class="h3 mb-0 text-gray-800">{{$user->name}} {{$user->lastname}}</h1>
			</div>
		</div>
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
	<div class="row">
		<div class="col-lg-6">
			<div class="my-2"></div>
			<a href="{{route('userEdit', $user->id)}}" class="btn btn-light btn-icon-split">
				<span class="icon text-gray-600">
					<i class="fas fa-arrow-right"></i>
				</span>
				<span class="text">Edit profile</span>
			</a>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

@endsection