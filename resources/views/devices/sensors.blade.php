@extends('layouts.app')

@section('content')
<div class="container">

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <table class="table table-hover table-dark">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">CO (ppm)</th>
                <th scope="col">CO2 (ppm)</th>
                <th scope="col">NxOy (ppm)</th>
                <th scope="col">Ruido (dB)</th>
                <th scope="col">Localizacion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sensors as $s)
                <tr>
                    <td>{{$s->id}}</td>
                    <td>{{$s->data}}</td>
                    <td>{{$s->data}}</td>
                    <td>{{$s->data}}</td>
                    <td>{{$s->data}}</td>
                    <td>{{$s->gps}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

</div>
@endsection