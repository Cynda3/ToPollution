@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center my-3"><b>@lang('navMenu.tienda')</b></h1>
    <div class="card-deck">
        <div class="card">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">Dispositivo LoRa</h5>
            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">Dispositivo SIM808</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            </div>
        </div>
        <!--
        <div class="card">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            </div>
        </div>
        -->
    </div>
</div>
@endsection