@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">CO2</th>
                <th scope="col">CO</th>
                <th scope="col">O2</th>
                <th scope="col">dB</th>
                <th scope="col">Owner</th>
            </tr>
        </thead>
        @foreach ($devices as $device)
            @can('view', $device)
                <tbody>
                    <tr>
                        <td>{{$device->id}}</td>
                        <td>{{$device->name}}</td>
                        <td>{{$device->latitude}}</td>
                        <td>{{$device->longitude}}</td>
                        <td>{{$device->user->name}}</td>
                    </tr>
                </tbody>
            @endcan
        @endforeach
    </table>
</div>
@endsection