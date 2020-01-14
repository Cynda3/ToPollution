@extends('layouts.app')
@section('content')
<div class="container">

    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">Owner</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$device->id}}</td>
                <td>{{$device->name}}</td>
                <td>{{$device->latitude}}</td>
                <td>{{$device->longitude}}</td>
                <td>{{$device->user->name}}</td>
            </tr>
        </tbody>
    </table>

</div>
@endsection