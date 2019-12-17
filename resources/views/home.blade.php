@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    Name: {{$user->name}}<br>
                    Email: {{$user->email}}<br>
                    Rol: {{$user->rol}}<br>
                    You are logged in!
                    Wanna edit your profile?<br>
                    <a href="{{route('users.edit', $user->id)}}">Edit</a>
                    Try deleting your profile!<br>
                    <form action="{{route('users.destroy', $user->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection