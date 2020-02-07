@extends('layouts.app')

@section('head')
<link href="{{ asset('css/hyperbutton.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('navMenu.devupdatename')</div>
                <div class="card-body">

                    <form action="{{route('devices.update', $device->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="id">@lang('navMenu.devid')</label> <input type="text" class="form-control"
                        placeholder="{{$device->id}}" name="id" value="{{ old('id') }}" readonly><br>

                        <label for="name">@lang('navMenu.deveditname')</label> <input type="text" class="form-control"
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
                                @lang('navMenu.deveditpublic')
                            </label>
                            <label>
                                <input type="radio" class="option-input radio" name="public" value="0"/>
                                @lang('navMenu.deveditprivate')
                            </label>
                        </div><br>
                        <!-- End hyper mega button -->
                        <button>@lang('navMenu.deveditsend')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection