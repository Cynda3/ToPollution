@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin="" />
@endsection
@section('content')
<div id="mapid"  style="height: 50rem;"></div>

<div class="container" style="overflow-x:auto">

    <table class="table table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">@lang('navMenu.name')</th>
                <th scope="col">@lang('navMenu.latitud')</th>
                <th scope="col">@lang('navMenu.longitud')</th>
                <th scope="col">@lang('navMenu.dueño')</th>
                <th scope="col" class="d-flex justify-content-center">Información</th>
            </tr>
        </thead>
        @foreach ($devices as $device)
            @can('view', $device)
                <tbody>
                    <tr>
                        <td>{{$device->id}}</td>
                        <td>{{$device->name}}</td>
                        <td>{{$device->latitude}}</td>
                        <td>{{$device->longitude}}</td>
                        <td><a href="{{route('users.show',$device->user->id)}}">{{$device->user->name}}</td>
                        <td class="d-flex justify-content-center"><a href="{{route('devices.show',$device->id)}}">
                            <button type="submit" id="show"><i class="fas fa-glasses" style="color:black"></i></a></button>
                            </td>
                    </tr>
                </tbody>
            @endcan
        @endforeach
    </table>
</div>

    @endsection
    @section('scripts')
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/leaflet.locatecontrol/0.60.0/L.Control.Locate.min.css" />
  <script src="https://cdn.jsdelivr.net/leaflet.locatecontrol/0.60.0/L.Control.Locate.min.js" charset="utf-8"></script>
    <!-- -------MAPA------ -->
<script type="text/javascript">

 

  var map = L.map('mapid', {
     center: [ 43.31656, -1.987495 ],
     zoom: 14   
    });
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var browserLat;
  var browserLong;
  navigator.geolocation.getCurrentPosition(function(position) {
    browserLat =  position.coords.latitude;
    browserLong = position.coords.longitude;
 
    marker_actual = L.marker([browserLat,browserLong]).addTo(map);
    marker_actual.bindPopup('<b>Hola </b><br>Tu estas aqui').openPopup();
    map.setView([browserLat,browserLong], 18);  
    
    console.log(browserLat);
    console.log(browserLong);
}, function(err) {
    console.error(err);
});

    @foreach ($devices as $device)
        @can('view', $device)
            var marker = L.marker([ {{ $device->latitude }}, {{ $device->longitude }} ]).addTo(map);
    
    

            var circle = L.circle([ {{ $device->latitude }}, {{ $device->longitude }} ], {
                color: 'yellow',
                fillColor: 'yellow',
                fillOpacity: 0.5,
                radius: 400
            }).addTo(map);

            var popup = L.popup();

            marker.bindPopup("<h4><u> {{ $device->name }} </u></h4> <b>Owner:</b> {{ $device->user->name }}");
        @endcan
    @endforeach
</script>
<!-- -----END MAPA---- -->
@endsection