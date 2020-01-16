@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new sensor</div>
                <div class="card-body">

                    <form action="{{route('devices.store')}}" method="post">
                        @csrf
                        <label for="name">Name:</label> <input type="text" class="form-control"
                            placeholder="Nombre" name="name" value="{{ old('name') }}"><br>
                        @error('name')
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