
@extends('layouts.admin')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

    	  <div class="row d-flex justify-content-center mb-3">

    	  	<h2 class="text-gray-600">Message list</h1>

    	  </div>

    	  <!-- Message list -->
    	  @if(isset($messages))
    	  @foreach($messages as $message)
          <div class="row d-flex justify-content-center">

            <div class="col-lg-8">

          	<!-- Collapsable Card Example -->
             <div class="card shadow mb-4">
               <!-- Card Header - Accordion -->
               <a href="#collapseCard{{$message->id}}" class="d-block card-header py-3 collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
                 <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                 <span class="m-0 font-weight-bold text-primary">{{$message->subject}}</span>
               </a>
               <!-- Card Content - Collapse -->
               <div class="collapse" id="collapseCard{{$message->id}}">
                 <div class="card-body">
                   {{$message->message}}
                 </div>
               </div>
             </div>

         	</div>
             
          </div>
          @endforeach
          @endif
        </div>
        <!-- /.container-fluid -->

@endsection