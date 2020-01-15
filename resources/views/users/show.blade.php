@extends('layouts.app')
@section('content')
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
            <h1>Profile</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->


            <div class="text-start">
                <img class="img-profile" src="{{Auth::user()->avatar}}">

            </div><br>


            <ul class="list-group">
                <li class="list-group-item text-muted">Sensors Owned: <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-left"><span class="pull-left"><strong>Sensor1</strong></span> 4</li>

            </ul>


        </div>
        <!--/col-3-->


        <div class="col-sm-9">

            <div class="tab-content">
                <div class="tab-pane active" id="home">

                    <div class="row justify-content-around">
                        <div class="col-xs-6">
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name">
                                        <h4>First name</h4>
                                    </label><br>
                                    {{$user->name}}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email">
                                        <h4>Email</h4>
                                    </label><br>
                                    {{$user->email}}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="age">
                                        <h4>Age</h4>
                                    </label><br>
                                    {{$user->age}}<br>
                                </div>
                            </div>

                            <div class="form-group">
                                <a href="{{route('users.edit', Auth::user()->id)}}"><button
                                        class="btn btn-lg btn-success" type="submit">Edit</button></a>
                            </div>

                        </div>

                        <div class="col-xs-6">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="last_name">
                                        <h4>Last name</h4>
                                    </label><br>
                                    {{$user->lastname}}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email">
                                        <h4>Email</h4>
                                    </label><br>
                                    {{$user->email}}
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="country">
                                        <h4>Country</h4>
                                    </label><br>
                                    {{$user->country}}
                                </div>
                            </div>

                            <div class="form-group">
                                <form action="{{route('users.destroy', Auth::user()->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-lg btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>

                    </div>


                </div>
            </div>

        </div>
        <!--/tab-pane-->
    </div>
    <!--/tab-content-->

</div>
<!--/col-9-->
</div>
@endsection