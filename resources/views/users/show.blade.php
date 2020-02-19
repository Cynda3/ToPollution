@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row mt-3">
        <div class="col-lg-12 col-sm-6 col-xs-3">
            <h1>@lang('navMenu.perfil')</h1>

        </div>

    </div>

    <div class="row">
        <div class="col-lg-3 col-xs-3 mb-5">
            <!--columna izquierda-->
            <div class="card" style="box-shadow: 5px 10px">
                <div class="card-header py-3">
                    <div class="text-center">
                        <img class="img-profile rounded-circle border border-dark" height="200px" width="200px"
                            src="{{$user->avatar}}">
                    </div><br>
                    <ul class="list-group">
                        <li class="list-group-item text-muted">@lang('navMenu.sensores'):</li>
                        @if (empty($devices))
                        <li class="list-group-item text-left">
                            <span class="pull-left">
                                <strong>No tiene dispositivos publicos</strong>
                            </span>
                        </li>
                        @else
                        @foreach ($devices as $dev)
                        <li class="list-group-item text-left">
                            <span class="pull-left">
                                <strong>
                                    <a class="text-success" href="{{route('devices.show',$dev->id)}}">
                                        {{$dev->name}}
                                    </a>
                                </strong>
                            </span>
                        </li>
                        @endforeach
                        @endif
                    </ul>

                </div>
            </div>
        </div>
        <!--/col-3-->

        <div class="col-9 mb-5">
            <div class="card" style="box-shadow: 5px 10px">
                <div class="card-header py-3">
                    <div class="row my-4">
                        <div class="col-lg-6 col-xs-3 ml-5">
                            <label for="first_name">
                                <h4><b>@lang('navMenu.name')</b></h4>
                            </label><br>
                            {{$user->name}}
                        </div>

                        <div class="col-lg-5 col-xs-3">
                            <label for="last_name">
                                <h4><b>@lang('navMenu.apellido')</b></h4>
                            </label><br>
                            {{$user->lastname}}
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-lg-6 col-xs-3 ml-5">
                            <label for="age">
                                <h4><b>@lang('navMenu.edad')</b></h4>
                            </label><br>
                            {{$user->age}}<br>

                        </div>

                        <div class="col-lg-5 col-xs-3">
                            <label for="email">
                                <h4><b>@lang('navMenu.email')</b></h4>
                            </label><br>
                            {{$user->email}}
                        </div>
                    </div>

                    <div class="row my-4">
                        <div class="col-lg-6 col-xs-3 ml-5">
                            <label for="country">
                                <h4><b>@lang('navMenu.city')</b></h4>
                            </label><br>
                            {{$user->country}}
                        </div>

                        <div class="col-lg-5 col-xs-3">
                            <label for="biography">
                                <h4><b>@lang('navMenu.biography')</b></h4>
                            </label><br>
                            {{$user->biography}}
                        </div>
                    </div>
                    @if(Auth::user()->id == $user->id)
                    <div class="row my-3">
                        <div class="col-lg-6 col-xs-3 ml-5">
                            <div class="form-group">
                                <a href="{{route('users.edit', Auth::user()->id)}}"><button
                                        class="btn btn-lg btn-success"
                                        type="submit">@lang('navMenu.actualizar')</button></a>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xs-3">
                            <div class="form-group ">
                                <form action="{{route('users.destroy', Auth::user()->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-lg btn-danger"
                                        type="submit">@lang('navMenu.eliminar')</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <!--/col-9-->
            </div>
            <!--/general row-->
        </div>
    </div>
</div>

@endsection