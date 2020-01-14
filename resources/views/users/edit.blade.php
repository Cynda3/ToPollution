@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Aqui puede editar su perfil</div>
                <div class="card-body">

                    <form action="{{route('users.update', $user->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="name"> New Name:</label> <input type="text" class="form-control"
                            placeholder="{{$user->name}}" name="name" value="{{ old('name') }}"><br>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="password">New password:</label> <input type="password" class="form-control"
                            name="password" value="{{ old('password') }}"><br>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <label for="confpassword">Confirm Password:</label><input type="password" class="form-control"
                            name="password-confirm" value="{{ old('password') }}"><br>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button>Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection