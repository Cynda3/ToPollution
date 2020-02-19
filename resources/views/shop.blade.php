@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center my-3"><b>@lang('navMenu.tienda')</b></h1>
    <div class="card-deck">
        <div class="card">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><b>Dispositivo LoRa</b></h5>
                <p class="card-text">Dispositivo que funciona mediante el medio de comunicacion LoRa</p>
                <button type="button" class="btn btn-success btn-block">Comprar</button>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><b>Dispositivo SIM808</b></h5>
                <p class="card-text">Dispositivo que funciona mediante el medio de comunicacion SIM808</p>
                <button type="button" class="btn btn-success btn-block">Comprar</button>
            </div>
        </div>
    </div>
    <div class="card-deck my-5">
        <div class="card">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><b>Kit de montaje LoRa</b></h5>
                <p class="card-text">Kit de montaje para crear tu propio dispositivo con el medio de comunicacion LoRa</p>
                <button type="button" class="btn btn-success btn-block">Comprar</button>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><b>Kit de montaje SIM808</b></h5>
                <p class="card-text">Kit de montaje para crear tu propio dispositivo con el medio de comunicacion SIM808</p>
                <button type="button" class="btn btn-success btn-block">Comprar</button>
            </div>
        </div>
    </div>
</div>
@endsection