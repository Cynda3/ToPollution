@extends('layouts.app')
@section('content')

<hr>
<div class="container bootstrap snippet">
    <div class="row">
  		<div class="col-sm-10"><h1>Tu perfil</h1></div>
    	
    </div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              

      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <h6>Upload a different photo...</h6>
        <input type="file" class="text-center center-block file-upload">
      </div></hr><br>

               
          <div class="panel panel-default">
            <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="www.topollution.herokuapp.com">topollution.com</a></div>
          </div>
          
          
          <ul class="list-group">
            <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Sensors</strong></span> 4</li>
            
          </ul> 
               
          
           
          
        </div><!--/col-3-->

       
    	<div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="/home">Home</a></li>
                
              </ul>

              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                  
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First name</h4></label><br>
                              {{Auth::user()->name}}
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last name</h4></label><br>
                            {{Auth::user()->name}}
                          </div>
                      </div>
          
                    
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="email"><h4>Email</h4></label><br>
                              {{Auth::user()->email}}
                          </div>
                      </div>

                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="role"><h4>Role</h4></label><br>
                              {{$user->role->name}}<br>
                          </div>
                      </div>

                      
                      <div class="form-group">
                           <div class="col-xs-12">
                                
                                <a href="{{route('users.edit', Auth::user()->id)}}"><button class="btn btn-lg btn-success"  type="submit">Edit</button>
                                <form action="{{route('users.destroy', Auth::user()->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                                <button class="btn btn-lg btn-danger"  type="submit">Delete</button>
                    </form>
                            </div>
                      </div>
              	
              
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div>
        @endsection