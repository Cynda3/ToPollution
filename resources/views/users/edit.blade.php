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
                        <!-- Name  -->
                        <label for="name"> New Name:</label> <input type="text" class="form-control"
                            placeholder="{{$user->name}}" name="name" value="{{ old('name') }}">
                        
                        @error('name')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror<br>
                        <!-- LastName  -->
                        <label for="name"> New LastName:</label> <input type="text" class="form-control"
                            placeholder="{{$user->lastname}}" name="lastname" value="{{ old('lastname') }}">
                        
                        @error('lastname')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror<br>

                        <!-- Age  -->
                        <label for="name"> New Age:</label> <input type="text" class="form-control"
                            placeholder="{{$user->age}}" name="age" value="{{ old('age') }}">
                        
                        @error('age')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror<br>

                        <!-- City  -->
                        <label for="name"> New City:</label> <input type="text" class="form-control"
                            placeholder="{{$user->city}}" name="city" value="{{ old('city') }}">
                        
                        @error('city')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror<br>

                        <!-- Biography  -->
                        <label for="name"> New Biography:</label> <input type="text" class="form-control"
                            placeholder="{{$user->biography}}" name="biography" value="{{ old('biography') }}">
                        
                        @error('biography')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror<br>
                        <!-- password  -->
                        <label for="password">New password:</label> <input type="password" class="form-control"
                            name="password" value="{{ old('password') }}">

                        @error('password')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror<br>
                        <!-- confirmPassword  -->
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
