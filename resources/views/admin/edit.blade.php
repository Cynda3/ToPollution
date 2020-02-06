
@extends('layouts.admin')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="row">

          	<div class="col-lg-6 border-bottom-primary">

	          <div class="card shadow mb-6">

	            <div class="card-header py-3">
	              <h6 class="m-0 font-weight-bold text-primary">Edit form</h6>
	            </div>
	            <div class="card-body">
		          		<!-- Edit form -->
			          	<form action="{{route('userUpdate', $user->id)}}" enctype="multipart/form-data" method="post">
			          	@csrf
			          	@method('get')
			          		<label>Avatar</label><br>
					        <input type="file" class="form-control" name="avatar" value="{{$user->avatar}}"><br>
			          		<label>Name</label><br>
					        <input type="text" class="form-control" name="name" value="{{$user->name}}"><br>
			          		<label>Last name</label><br>
					        <input type="text" class="form-control" name="lastname" value="{{$user->lastname}}"><br>
			          		<label>Biography</label><br>
					        <input type="text" class="form-control" name="biography" value="{{$user->biography}}"><br>
			          		<label>Age</label><br>
					        <input type="text" class="form-control" name="age" value="{{$user->age}}"><br>
			          		<label>Country</label><br>
					        <input type="text" class="form-control" name="country" value="{{$user->country}}"><br><br>

					        <button type="submit" class="btn btn-light">Edit profile</button>
				    	</form>
				</div>

			  </div>
			  <!-- End card -->

			</div>



          	<div class="col-lg-6 border-bottom-primary">

	          <div class="card shadow mb-6">

	            <div class="card-header py-3">
	              <h6 class="m-0 font-weight-bold text-primary">Error messagess</h6>
	            </div>

	            <div class="card-body border-left-danger">
	            	<!-- Error messagess -->
	            	<ul>
	            		@if($errors->any())
			            	@foreach($errors->all() as $error)

			            	<li>
			            		{{$error}}
			            	</li>

			            	@endforeach
		            	@endif
	            	</ul>
				</div>

			  </div>
				<!-- End card -->

			</div>


	        </div>

        </div>
        <!-- /.container-fluid -->

@endsection