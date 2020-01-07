@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <table>
                <tr>
                    <th>Id</th>
                    <th>Alias</th>
                    <th>type</th>
                    <th>data</th>
                    <th>gps</th>
                </tr>
                @foreach ($sensors as $s)
                <tr>
                    <td>{{$s->id}}</td>
                    <td>{{$s->alias}}</td>
                    <td>{{$s->type}}</td>
                    <td>{{$s->data}}</td>
                    <td>{{$s->gps}}</td>
                </tr>
                @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection