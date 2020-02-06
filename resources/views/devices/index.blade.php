@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center mt-3">@lang('navMenu.todosDispos')</h1>
    <table class="table table-hover table-dark rounded">
        <thead>
            <tr>
                <th scope="col">@lang('navMenu.sensorname')</th>
                <th class="text-center" scope="col">@lang('navMenu.latitud')</th>
                <th class="text-center" scope="col">@lang('navMenu.longitud')</th>
                <th class="text-center" scope="col">@lang('navMenu.co2')</th>
                <th class="text-center" scope="col">@lang('navMenu.co')</th>
                <th class="text-center" scope="col">@lang('navMenu.dB')</th>
                <th class="text-center" scope="col">@lang('navMenu.dueño')</th>
                <th class="text-center" scope="col">@lang('navMenu.view')</th>
            </tr>
        </thead>
        @foreach ($devices as $device)
        <tbody>
            <tr>
                <td>{{$device->name}}</td>
                <td class="text-center">{{$device->latitude}}</td>
                <td class="text-center">{{$device->longitude}}</td>
                @if(isset($device->data[0]))
                <td class="text-center">{{$device->data[0]->value}}</td>
                @else
                <td class="text-center"> - </td>
                @endif
                @if(isset($device->data[1]))
                <td class="text-center">{{$device->data[1]->value}}</td>
                @else
                <td class="text-center"> - </td>
                @endif
                @if(isset($device->data[3]))
                <td class="text-center">{{$device->data[3]->value}}</td>
                @else
                <td class="text-center"> - </td>
                @endif
                <td class="text-center"><a class="text-success"href="{{ route('users.show', $device->user->id) }}">{{$device->user->name}} {{$device->user->lastname}}</a></td>
                <td class="text-center">
                    <a class="text-success" href="{{route('devices.show',$device->id)}}"><button type="submit" id="show">
                        <i class="fas fa-glasses"></i></a></button>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection