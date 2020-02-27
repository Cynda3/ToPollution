@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @lang('navMenu.editprofile')
                </div>
                <div class="card-body">
                    <form action="{{route('users.update', $user->id)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row justify-content-around">
                            <div class="col-4">
                                <!-- Name  -->
                                <label for="name">@lang('navMenu.name')</label> <input type="text" class="form-control"
                                    value="{{$user->name}}" name="name">
                                @error('name')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror<br>
                            </div>
                            <div class="col-4">
                                <!-- LastName  -->
                                <label for="lastname">@lang('navMenu.lastname')</label> <input type="text"
                                    class="form-control" value="{{$user->lastname}}" name="lastname">
                                @error('lastname')
                                <span class=" text-danger" role="alert">{{ $message }}
                                </span>
                                @enderror<br>
                            </div>
                            <div class="col-4">
                                <!-- Age  -->
                                <label for="age">@lang('navMenu.age')</label> <input type="text" class="form-control"
                                    value="{{$user->age}}" name="age">
                                @error('age')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror<br>
                            </div>
                        </div>
                        <div class="row justify-content-around">
                            <div class="col-8">
                                <!-- Biography  -->
                                <label for="biography">@lang('navMenu.biography')</label> <input type="textarea"
                                    class="form-control" value="{{$user->biography}}" name="biography">
                                @error('biography')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror<br>
                            </div>
                            <div class="col-4">
                                <!-- City  -->
                                <label for="country">@lang('navMenu.city')</label> <input type="text"
                                    class="form-control" value="{{$user->country}}" name="country">
                                @error('city')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror<br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label>Avatar</label><br>
                                <input type="file" class="form-control" name="avatar">
                                @error('avatar')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror<br>
                            </div>
                        </div>
                        <div class="row justify-content-between">
                            <div class="col-6">
                                <!-- password  -->
                                <label for="password">@lang('navMenu.password')</label>
                                <input type="password" class="form-control" name="password">
                                @error('password')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror
                                <br>
                            </div>
                            <div class="col-6">
                                <!-- confirmPassword  -->
                                <label for="confpassword">@lang('navMenu.confpassword')</label><input type="password"
                                    class="form-control" name="password_confirmation">
                                @error('password')
                                <span class="text-danger" role="alert">{{ $message }}</span>
                                @enderror<br>
                            </div>
                        </div>
                        <button class="btn btn-success btn-sm">@lang('navMenu.editDatos')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection