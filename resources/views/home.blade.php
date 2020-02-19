@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin="" />
@endsection
@section('content')
<div id="mapid" style="height: 50rem;"></div>

@endsection
@section('scripts')
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/leaflet.locatecontrol/0.60.0/L.Control.Locate.min.css" />
<script src="https://cdn.jsdelivr.net/leaflet.locatecontrol/0.60.0/L.Control.Locate.min.js" charset="utf-8"></script>
<!-- Load Esri Leaflet from CDN -->
<script src="https://unpkg.com/esri-leaflet@2.3.2/dist/esri-leaflet.js" integrity="sha512-6LVib9wGnqVKIClCduEwsCub7iauLXpwrd5njR2J507m3A2a4HXJDLMiSZzjcksag3UluIfuW1KzuWVI5n/cuQ==" crossorigin=""></script>
<!-- Load Esri Leaflet Geocoder from CDN -->
<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.css" integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g==" crossorigin="">
<script src="https://unpkg.com/esri-leaflet-geocoder@2.3.2/dist/esri-leaflet-geocoder.js" integrity="sha512-8twnXcrOGP3WfMvjB0jS5pNigFuIWj4ALwWEgxhZ+mxvjF5/FBPVd5uAxqT8dd2kUmTVK9+yQJ4CmTmSg/sXAQ==" crossorigin=""></script>
<!-- -------MAPA------ -->
<script type="text/javascript">
  var map = L.map('mapid', {
     center: [ 43.31656, -1.987495 ],
     zoom: 14   
    });
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
  }).addTo(map);
  var searchControl = L.esri.Geocoding.geosearch().addTo(map);
  
  var browserLat;
  var browserLong;
  navigator.geolocation.getCurrentPosition(function(position) {
    browserLat =  position.coords.latitude;
    browserLong = position.coords.longitude;
 
    
    //marker_actual = L.marker([browserLat,browserLong]).addTo(map);
    var iconPersona = L.icon({
      iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-gold.png',
      shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
      iconSize: [25, 41],
      iconAnchor: [12, 41],
      popupAnchor: [1, -34],
      shadowSize: [41, 41]
    });
    var persona = L.marker([browserLat,browserLong], {icon: iconPersona}).addTo(map)
    persona.bindPopup('<b>Hola </b><br>Tu estas aqui').openPopup();
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