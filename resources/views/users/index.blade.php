@extends('layouts.app')
@section('content')
<div class="container table-responsive">
    <a href="{{route('devices.create')}}"><button type="button" class="btn btn-primary btn-lg btn-block">@lang('navMenu.deviceadd')
            </button></a>
    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">@lang('navMenu.numserie')</th>
                <th scope="col">@lang('navMenu.sensorname')</th>
                <th scope="col">@lang('navMenu.latitud')</th>
                <th scope="col">@lang('navMenu.longitud')</th>
                <th scope="col">@lang('navMenu.co2')</th>
                <th scope="col">@lang('navMenu.co')</th>
                <th scope="col">@lang('navMenu.dB')</th>
                <th scope="col">@lang('navMenu.actions')</th>
            </tr>
        </thead>
        @foreach ($devices as $d)
        <tbody>
            <tr>
                <td>{{$d->id}}</td>
                <td>{{$d->name}}</td>
                <td>{{$d->latitude}}</td>
                <td>{{$d->longitude}}</td>
                @if(isset($d->data[0]))
                <td>{{$d->data[0]->value}}</td>
                @else
                <td> - </td>
                @endif
                @if(isset($d->data[1]))
                <td>{{$d->data[1]->value}}</td>
                @else
                <td> - </td>
                @endif
                @if(isset($d->data[3]))
                <td>{{$d->data[3]->value}}</td>
                @else
                <td> - </td>
                @endif
                <td>
                    <a href="{{route('devices.show',$d->id)}}"><button type="submit" id="show">
                        <i class="fas fa-glasses"></i></a></button>
                    <a href="{{route('devices.edit',$d->id)}}"><button type="submit" id="update">
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