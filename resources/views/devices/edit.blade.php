@extends('layouts.app')
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
                        <label for="name"> New Name:</label> <input type="text" class="form-control"
                            placeholder="{{$device->name}}" name="name" value="{{ old('name') }}"><br>
                        @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror<br>

                        <button>Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection