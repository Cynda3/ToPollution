@extends('layouts.admin')
@section('messages')
{{$nMessages}}
@endsection
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-around mb-4">
				<h1 class="h3 mb-0 text-gray-800">Message from {{$message->name}}</h1>
			</div>
		</div>
	</div>

	<div class="row justify-content-center">

		<div class="col-lg-8">
			<!-- Basic Card for admin -->
			<div class="card shadow mb-4">
				<div class="card-body">
					<h6 class="mb-1 font-weight-bold text-primary">Subject: </h6>{{$message->subject}}
					<h6 class="mt-2 mb-1 font-weight-bold text-primary">Email: </h6>{{$message->email}}
					<h6 class="mt-2 mb-1 font-weight-bold text-primary">Message:</b></h6>
					<p>{{$message->message}}</p>
				</div>
				<div class="card-footer">
					<div class="row justify-content-end">
						<a href="{{route('/deleteMessage', $message->id)}}" class="btn btn-danger btn-icon-split mr-3">
							<span class="icon text-white-50">
								<i class="fas fa-trash"></i>
							</span>
							<span class="text">Delete</span>
						</a>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>
<!-- /.container-fluid -->

@endsection