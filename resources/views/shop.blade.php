@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center my-3"><b>@lang('navMenu.tienda')</b></h1>
    <div class="card-deck">
        <div class="card">
            <img class="card-img-top" height="450px" src="./images/LoRa.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><b>@lang('navMenu.Lora')</b></h5>
                <p class="card-text">@lang('navMenu.lora')</p>
                <button type="button" class="btn btn-success btn-block">@lang('navMenu.comprar')</button>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" height="450px" src="./images/SIM808.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><b>@lang('navMenu.Sim')</b></h5>
                <p class="card-text">@lang('navMenu.sim')</p>
                <button type="button" class="btn btn-success btn-block">@lang('navMenu.comprar')</button>
            </div>
        </div>
    </div>
    <div class="card-deck my-5">
        <div class="card">
            <img class="card-img-top" height="450px" src="./images/LoRaKit.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><b>@lang('navMenu.Lorakit')</b></h5>
                <p class="card-text">@lang('navMenu.lorakit')</p>
                <button type="button" class="btn btn-success btn-block">@lang('navMenu.comprar')</button>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" height="450px" src="./images/SIM808Kit.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><b>@lang('navMenu.Simkit')</b></h5>
                <p class="card-text">@lang('navMenu.simkit')</p>
                <button type="button" class="btn btn-success btn-block">@lang('navMenu.comprar')</button>
            </div>
        </div>
    </div>
</div>
@endsection