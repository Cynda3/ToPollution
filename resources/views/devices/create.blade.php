@extends('layouts.app')

@section('head')
<link href="{{ asset('css/hyperbutton.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('navMenu.createnewsens')</div>
                <div class="card-body">

                    <form action="{{route('devices.store')}}" method="post">
                        @csrf
                        <label for="id">@lang('navMenu.sensid')</label> 
                        <input type="number" class="form-control"
                        placeholder="id" name="id" value="{{ old('id') }}"><br>

                        <label for="name">@lang('navMenu.sensname')</label> 
                        <input type="text" class="form-control"
                            placeholder="Name" name="name" value="{{ old('name') }}"><br>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <!-- hyper button -->   
                        <div>
                            <label>
                                <input type="radio" class="option-input radio" name="public" value="1" required/>
                                @lang('navMenu.senspublico')
                            </label>
                            <label>
                                <input type="radio" class="option-input radio" name="public" value="0"/>
                                @lang('navMenu.sensprivate')
                            </label>
                        </div><br>
                        <button class="btn btn-success">@lang('navMenu.sensenviar')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection