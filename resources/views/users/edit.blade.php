@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('navMenu.editprofile')</div>
                <span class="card-body">

                <div class="row justify-content-around">
                    <div class="col-4">
                    <form action="{{route('users.update', $user->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <!-- Name  -->
                        <label for="name">@lang('navMenu.newname')</label> <input type="text" class="form-control"
                            placeholder="{{$user->name}}" name="name" value="{{ old('name') }}">
                            
                        @error('name')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror<br>
                    </div>
                    <div class="col-4">
                        <!-- LastName  -->
                        <label for="lastname">@lang('navMenu.newlastname')</label> <input type="text" class="form-control"
                            placeholder="{{$user->lastname}}" name="lastname" value="{{ old('lastname') }}">
                        
                        @error('lastname')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror<br>
                    </div>
                        <div class="col-4">
                        <!-- Age  -->
                        <label for="age">@lang('navMenu.newage')</label> <input type="text" class="form-control"
                            placeholder="{{$user->age}}" name="age" value="{{ old('age') }}">
                        
                        @error('age')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror<br>
                        </div>
                    </div>


                    <div class="row justify-content-around">
                        <div class="col-8">
                        <!-- Biography  -->
                        <label for="biography">@lang('navMenu.newbiography')</label> <input type="textarea" class="form-control"
                            placeholder="{{$user->biography}}" name="biography" value="{{ old('biography') }}">
                        
                        @error('biography')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror<br>
                    </div>
                    <div class="col-4">
                        <!-- City  -->
                        <label for="country">@lang('navMenu.newcity')</label> <input type="text" class="form-control"
                            placeholder="{{$user->country}}" name="country" value="{{ old('country') }}">
                        
                        @error('city')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror<br>
                    </div>
                    </div>
                    <div class="row justify-content-between">  
                        <div class="col-6">                      
                        <!-- password  -->
                        <label for="password">@lang('navMenu.newpassword')</label> <input type="password" class="form-control"
                            name="password" value="{{ old('password') }}">

                        @error('password')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror<br>
                        </div>
                        <div class="col-6"> 
                        <!-- confirmPassword  -->
                        <label for="confpassword">@lang('navMenu.newconfpassword')</label><input type="password" class="form-control"
                            name="password_confirmation" value="{{ old('password') }}">

                        @error('password')
                        <span class="text-danger" role="alert">{{ $message }}</span>
                        @enderror<br>
                        </div>
                    </div>
                    <button class="btn btn-success btn-sm">Editar datos</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
