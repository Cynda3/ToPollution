@extends('layouts.app')

@section('head')
<link href="{{ asset('css/hyperbutton.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update your sensor name</div>
                <div class="card-body">

                    <form action="{{route('devices.update', $device->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="id"> Device Id:</label> <input type="text" class="form-control"
                        placeholder="{{$device->id}}" name="id" value="{{ old('id') }}" readonly><br>

                        <label for="name"> New Name:</label> <input type="text" class="form-control"
                            placeholder="{{$device->name}}" name="name" value="{{ old('name') }}">
                        @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                
                        <!-- hyper mega button -->
                        <div>
                            <label>
                                <input type="radio" class="option-input radio" name="public" value="1" requred/>
                              Publico
                            </label>
                            <label>
                                <input type="radio" class="option-input radio" name="public" value="0"/>
                              Privado
                            </label>
                        </div><br>
                        <!-- End hyper mega button -->
                        <button>Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection