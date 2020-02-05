@extends('layouts.app')

@section('head')
<link href="{{ asset('css/hyperbutton.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new sensor</div>
                <div class="card-body">

                    <form action="{{route('devices.store')}}" method="post">
                        @csrf
                        <label for="id">Id</label> <input type="text" class="form-control"
                        placeholder="Id" name="id" value="{{ old('id') }}"><br>

                        <label for="name">Name</label> <input type="text" class="form-control"
                            placeholder="Name" name="name" value="{{ old('name') }}"><br>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <!-- hyper button -->   
                        <div>
                            <label>
                                <input type="radio" class="option-input radio" name="example" value="1" required/>
                              Publico
                            </label>
                            <label>
                                <input type="radio" class="option-input radio" name="example" value="0"/>
                              Privado
                            </label>
                        </div><br>
                        <button>Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection