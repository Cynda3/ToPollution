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
                <th scope="col">Actions</th>
            </tr>
        </thead>
        @foreach ($devices as $d)
        <tbody>
            <tr>
                <td>{{$d->id}}</td>
                <td>{{$d->name}}</td>
                <td>{{$d->latitude}}</td>
                <td>{{$d->longitude}}</td>
                <td>{{$d->user->name}}</td>

                    <td>
                    
                    <a href="{{route('devices.edit',$d->id)}}"><i class="fas fa-pencil-alt"></i></a>
                    <form action="{{route('devices.destroy',$d->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="delete"><i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                    </td>
                    
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection