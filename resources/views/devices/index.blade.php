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
                <th scope="col">dB</th>
                <th scope="col">Owner</th>
            </tr>
        </thead>
        @foreach ($devices as $device)
        <tbody>
            <tr>
                <td>{{$device->name}}</td>
                <td>{{$device->latitude}}</td>
                <td>{{$device->longitude}}</td>
                @if(isset($device->data[0]))
                <td>{{$device->data[0]->value}}</td>
                @else
                <td> - </td>
                @endif
                @if(isset($device->data[1]))
                <td>{{$device->data[1]->value}}</td>
                @else
                <td> - </td>
                @endif
                @if(isset($device->data[3]))
                <td>{{$device->data[3]->value}}</td>
                @else
                <td> - </td>
                @endif
                <td>{{$device->user->name}}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection