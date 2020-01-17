@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Aqui puede editar su perfil</div>
                <span class="card-body">

                    <form action="{{route('users.update', $user->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="name"> New Name:</label> <input type="text" class="form-control"
                            placeholder="{{$user->name}}" name="name" value="{{ old('name') }}">
                        
                        @error('name')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror<br>

                        <label for="password">New password:</label> <input type="password" class="form-control"
                            name="password" value="{{ old('password') }}">

                        @error('password')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror<br>

                        <label for="confpassword">Confirm Password:</label><input type="password" class="form-control"
                            name="password-confirm" value="{{ old('password') }}"><br>

                        @error('password')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror<br>

                        <button>Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection