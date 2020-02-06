@extends('layouts.app')
@section('content')
<div class="container bootstrap snippet">
    
    <div class="row">

        <div class="col-lg-12 col-sm-6 col-xs-3">
            <h1>@lang('navMenu.perfil')</h1>
        </div>

    </div>
    
    <div class="row">
        <div class="col-lg-3 col-xs-3">
            <!--columna izquierda-->
            <div class="card" style="box-shadow: 5px 10px">
	            <div class="card-header py-3">
            <div class="text-start">
                <img class="img-profile" src="{{Auth::user()->avatar}}">

            </div><br>

            <ul class="list-group">
                <li class="list-group-item text-muted">@lang('navMenu.sensores'): <i class="fa fa-dashboard fa-1x"></i></li> 
                @foreach ($devices as $dev)
                <li class="list-group-item text-left"><span class="pull-left"><strong><a href="{{route('devices.show',$dev->id)}}">
                {{$dev->name}}</strong></a></span></li>
                @endforeach
            </ul>
           
                </div>
            </div>
        </div>
        <!--/col-3-->
        
            <div class="col-9">
                <div class="card" style="box-shadow: 5px 10px">
                    <div class="card-header py-3">
                <div class="row mb-2">
                    <div class="col-lg-6 col-xs-3">
                        <label for="first_name">
                            <h4>@lang('navMenu.name')</h4>
                        </label><br>
                        {{$user->name}}
                    </div>

                    <div class="col-lg-6 col-xs-3">
                        <label for="last_name">
                            <h4>@lang('navMenu.apellido')</h4>
                        </label><br>
                        {{$user->lastname}}
                    </div>
                </div>
                
                <div class="row mb-2">
                    <div class="col-lg-6 col-xs-3">
                        <label for="age">
                            <h4>@lang('navMenu.edad')</h4>
                        </label><br>
                        {{$user->age}}<br>
                    </div>

                    <div class="col-lg-6 col-xs-3">
                        <label for="email">
                            <h4>@lang('navMenu.email')</h4>
                        </label><br>
                        {{$user->email}}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-lg-6 col-xs-3">
                        <label for="country">
                            <h4>@lang('navMenu.ciudad')</h4>
                        </label><br>
                        {{$user->country}}
                    </div>

                    <div class="col-lg-6 col-xs-3">
                        <label for="biography">
                            <h4>@lang('navMenu.biography')</h4>
                        </label><br>
                        {{$user->biography}}
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-xs-3">
                    <div class="form-group">
                        <a href="{{route('users.edit', Auth::user()->id)}}"><button
                                class="btn btn-lg btn-success" type="submit">@lang('navMenu.actualizar')</button></a>
                    </div>
                    </div>

                    <div class="col-lg-6 col-xs-3">
                    <div class="form-group ">
                        <form action="{{route('users.destroy', Auth::user()->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-lg btn-danger" type="submit">@lang('navMenu.eliminar')</button>
                        </form>
                    </div>
                    </div>

                </div>
        </div>
        <!--/col-9-->
    </div>
    <!--/general row-->
            </div>
    </div>
</div>

@endsection