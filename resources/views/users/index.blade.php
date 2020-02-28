@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="text-center mt-3">@lang('navMenu.misDispos')</h1>
    <a href="{{route('devices.create')}}"><button type="button"
            class="btn btn-success btn-lg btn-block">@lang('navMenu.deviceadd')
        </button></a>
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">@lang('navMenu.numserie')</th>
                <th scope="col" class="text-center">@lang('navMenu.sensorname')</th>
                <th scope="col" class="text-center">@lang('navMenu.latitud')</th>
                <th scope="col" class="text-center">@lang('navMenu.longitud')</th>
                <th scope="col" class="text-center">@lang('navMenu.co2')</th>
                <th scope="col" class="text-center">@lang('navMenu.co')</th>
                <th scope="col" class="text-center">@lang('navMenu.dB')</th>
                <th scope="col" class="text-center">@lang('navMenu.public')</th>
                <th scope="col" class="text-center">@lang('navMenu.actions')</th>
            </tr>
        </thead>
        @foreach ($devices as $d)
        <tbody>
            <tr>
                <td>{{$d->id}}</td>
                <td class="text-center">{{$d->name}}</td>
                <td class="text-center">{{$d->latitude}}</td>
                <td class="text-center">{{$d->longitude}}</td>
                @if(isset($d->data[0]))
                <td class="text-center">{{$d->data[0]->value}}</td>
                @else
                <td class="text-center"> - </td>
                @endif
                @if(isset($d->data[1]))
                <td class="text-center">{{$d->data[1]->value}}</td>
                @else
                <td class="text-center"> - </td>
                @endif
                @if(isset($d->data[3]))
                <td class="text-center">{{$d->data[3]->value}}</td>
                @else
                <td class="text-center"> - </td>
                @endif
                @if($d->public == 1)
                <td class="text-center">@lang('navMenu.publico')</td>
                @else
                <td class="text-center">@lang('navMenu.privado')</td>
                @endif
                <td class="text-center">
                    <a class="text-success" href="{{route('devices.show',$d->id)}}"><button type="submit" id="show">
                            <i class="fas fa-glasses"></i></a></button>
                    <a class="text-success" href="{{route('historical',$d->id)}}"><button type="submit" id="update">
                            <i class="fas fa-chart-bar"></i></a></button>
                    <a class="text-success" href="{{route('devices.edit',$d->id)}}"><button type="submit" id="update">
                            <i class="fas fa-pencil-alt"></i></a></button>
                    <form style='display:inline;' action="{{route('devices.destroy',$d->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="delete"><i class="far fa-trash-alt"></i></button>
                    </form>

                    <!--public/private-->
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection