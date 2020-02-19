@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin="" />
@endsection
@section('content')
<div id="mapid"  style="height: 50rem;"></div>

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
 
    
    //marker_actual = L.marker([browserLat,browserLong]).addTo(map);
    var iconPersona = L.icon({
      iconUrl: "/img/iconoPersona.png",

      iconSize:     [38, 95], // size of the icon
      iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
      popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });
    L.marker([browserLat,browserLong], {icon: iconPersona}).addTo(map)
    marker_actual.bindPopup('<b>Hola </b><br>Tu estas aqui').openPopup();
    map.setView([browserLat,browserLong], 18);  
    
    // console.log(browserLat);
    // console.log(browserLong);
}, function(err) {
    console.error(err);
});

    @foreach ($devices as $device)
        @can('view', $device)
            var marker = L.marker([ {{ $device->latitude }}, {{ $device->longitude }} ]).addTo(map);
            
            var circle = L.circle([ {{ $device->latitude }}, {{ $device->longitude }} ], {
                color: "{{$device->cont}}",
                fillColor: "{{$device->cont}}",
                fillOpacity: 0.5,
                radius: 400
            }).addTo(map);

            var popup = L.popup();

            marker.bindPopup("<h4 class='text-center'><u> {{ $device->name }} </u></h4> <b>Owner:</b> <a class='text-success' href='{{route('users.show', $device->user->id)}}'>{{ $device->user->name }} {{ $device->user->lastname }}</a><br><a class='text-success' href='{{route('devices.show', $device->id)}}'>@lang('navMenu.verDispos')</a>");
        @endcan
    @endforeach
</script>
<!-- -----END MAPA---- -->
@endsection