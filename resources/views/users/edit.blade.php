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
                        New Name: <input type="text" placeholder="{{$user->name}}" name="name" value="{{ old('name') }}"><br>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        New password: <input type="password" name="password" value="{{ old('password') }}"><br>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        Confirm Password:<input type="password" name="password-confirm" value="{{ old('password') }}"><br>
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
