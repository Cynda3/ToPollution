@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center my-3"><b>@lang('navMenu.tienda')</b></h1>
    <div class="card-deck">
        <div class="card">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title"><b>Dispositivo LoRa</b></h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <button type="button" class="btn btn-success btn-block">Success</button>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title"><b>Dispositivo SIM808</b></h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            <button type="button" class="btn btn-success btn-block">Comprar</button>
            </div>
        </div>
    </div>
    <div class="card-deck my-5">
        <div class="card">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title"><b>Kit de montaje LoRa</b></h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <button type="button" class="btn btn-success btn-block">Success</button>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title"><b>Kit de montaje SIM808</b></h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            <button type="button" class="btn btn-success btn-block">Success</button>
            </div>
        </div>
    </div>
</div>
@endsection