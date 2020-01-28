@extends('layouts.app')
@section('content')
<div class="container" style="overflow-x:auto">
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">@lang('navMenu.name')</th>
                <th scope="col">@lang('navMenu.latitud')</th>
                <th scope="col">@lang('navMenu.longitud')</th>
                <th scope="col">@lang('navMenu.dueño')</th>
                <th scope="col" class="d-flex justify-content-center">Información</th>
            </tr>
        </thead>
        @foreach ($devices as $d)
        <tbody>
            <tr>
                <td>{{$d->id}}</td>
                <td>{{$d->name}}</td>
                <td>{{$d->latitude}}</td>
                <td>{{$d->longitude}}</td>
                <td><a href="{{route('users.show',$d->user->id)}}">{{$d->user->name}}</td>
                <td class="d-flex justify-content-center"><a href="{{route('devices.show',$d->id)}}">
                    <button type="submit" id="show"><i class="fas fa-glasses" style="color:black"></i></a></button>
                    </td>
            </tr>
        </tbody>

        @endforeach
    </table>
</div>
@endsection