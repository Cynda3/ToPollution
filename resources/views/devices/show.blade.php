@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
  integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
  crossorigin="" />
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center my-3">
    <h1 class="mt-3">@lang('navMenu.dispositivo'): {{ $device->name }}</h1>
  </div>
  <div class="row justify-content-center align-items-center">
    <div class="col-6">
      <div id="mapid" style="height: 400px;"></div>
    </div>
    <div class="col-6">
      <h4 class="text-center"><b>@lang('navMenu.medidasTiempoReal')</b></h4>
        <div class="row justify-content-center">
          <div id="chart_div" style="width: 400px; height: 120px;" class="text-center">
            <h5>@lang('navMenu.cargando')</h5>
          </div>
        </div>
    </div>
  </div>
  <div class="row justify-content-center mt-5">
    <h4><b>@lang('navMenu.medidasHistoricas')</b></h4>
  </div>
  <div class="row justify-content-center">
    <div class="col-6">
      <div class="row justify-content-center">
        <h4>@lang('navMenu.partPorMillon')</h4>
      </div>
      <div id="chart_div2" style="height: 400px;" class="text-center">
        <h5>@lang('navMenu.cargando')</h5>
      </div>
    </div>
    <div class="col-6">
      <div class="row justify-content-center">
        <h4>@lang('navMenu.decibelios')</h4>
      </div>
      <div id="chart_div3" style="height: 400px;" class="text-center">
        <h5>@lang('navMenu.cargando')</h5>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
  integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
  crossorigin=""></script>

<!-- -------MAPA------ -->
<script type="text/javascript">
  var map = L.map('mapid', {
     center: [ {{ $device->latitude }}, {{ $device->longitude }} ],
     zoom: 14
    });
    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker([ {{ $device->latitude }}, {{ $device->longitude }} ]).addTo(map);

    var circle = L.circle([ {{ $device->latitude }}, {{ $device->longitude }} ], {
        color: "{{$cont}}",
        fillColor: "{{$cont}}",
        fillOpacity: 0.5,
        radius: 400
    }).addTo(map);

    var popup = L.popup();
    
    marker.bindPopup("<h4><u> {{ $device->name }} </u></h4> <b>@lang('navMenu.dueño'):</b> {{ $device->user->name }}").openPopup();

</script>
<!-- -----END MAPA---- -->

<!-- -----GRAFICOS---- -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  //Grafico1
    google.charts.load('current', {'packages':['gauge']});
    google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Unidad', 'Value'],
          ['CO2', 0],
          /*['NOX', 0],*/
          ['CO', 0],
          ['dB', 0]
        ]);

        var options = {
          width: 400, height: 120,
          redFrom: 75, redTo: 100,
          yellowFrom: 25, yellowTo: 75,
          greenFrom: 0, greenTo: 25,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        setInterval(function() {
          $.get("https://topollution.herokuapp.com/api/device/" + {{ $device->id }}, function (datos, status) {
            if (status == "success") {
              if(datos[0] == null || datos[1] == null || datos[2] == null)
                document.getElementById('chart_div').innerHTML = "<p class='alert alert-warning'>@lang('navMenu.noMediciones')</p>";
              else {
                for(i = 0; i < datos.length; i++){
                  data.setValue(i, 1, datos[i].value%100);
                  chart.draw(data, options);
                }
              }
            }
          }).fail(function () {
            document.getElementById('chart_div').innerHTML = "<p class='alert alert-danger'>@lang('navMenu.problemaConex')</p>";
          });
        }, 10000)
      }
</script>
<script>
  //Fecha
    let f = new Date();
    let dia = f.getDate();
    let mes = f.getMonth();
    let año = f.getFullYear();
    let date = año + "-" + (mes+1) + "-" + dia;
    
    //GRAFICO2
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart2);
  
    function drawChart2() {
      setInterval(function() {
        var info = [['Update', 'CO2', 'CO']]
        //https://topollution.herokuapp.com
        $.get("https://topollution.herokuapp.com/api/device/" + {{ $device->id }} + "/" + date, function (datos, status) {
              if (status == "success") {
                if(datos[0].length == 1){
                  document.getElementById('chart_div2').innerHTML = "<p class='alert alert-warning'>@lang('navMenu.noMediciones')</p>";
                } else {
                  for(i = 1; i < datos[1].length; i++){
                    let fecha1 = new Date(datos[0][i]);
                    if (fecha1.getHours()<10)
                      var hora =  "0"+fecha1.getHours();
                    else
                      var hora = fecha1.getHours();
                    if (fecha1.getMinutes()<10)
                      var min = "0"+fecha1.getMinutes();
                    else
                      var min = fecha1.getMinutes();
                    /*if (fecha1.getSeconds()<10)
                      var sec = "0"+fecha1.getSeconds();
                    else 
                      var sec = fecha1.getSeconds();*/
                    let fecha = hora+":"+min/*+":"+sec*/;
                    let datosarray=[fecha, datos[1][i], datos[2][i]]
                    info.push(datosarray);
                  }
                  var data2 = google.visualization.arrayToDataTable(
                      info
                    );
                  
                  var options2 = {
                      hAxis: {title: "@lang('navMenu.hora')",  titleTextStyle: {color: '#333'}},
                      vAxis: {minValue: 0}
                  };

                  var chart2 = new google.visualization.AreaChart(document.getElementById('chart_div2'));
                  chart2.draw(data2, options2);
                }
              }
            }).fail(function () {
              document.getElementById('chart_div2').innerHTML = "<p class='alert alert-danger'>@lang('navMenu.problemaConex')</p>";
            });
      }, 10000)
    }

    //GRAFICO3
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart3);
  
    function drawChart3() {
      setInterval(function() {
        var info = [['Update', 'dB']]
        //https://topollution.herokuapp.com
        $.get("https://topollution.herokuapp.com/api/device/" + {{ $device->id }} + "/" + date + "/decibelios", function (datos, status) {
              if (status == "success") {
                if(datos[0].length == 1){
                  document.getElementById('chart_div2').innerHTML = "<p class='alert alert-warning'>@lang('navMenu.noMediciones')</p>";
                } else {
                  for(i = 1; i < datos[1].length; i++){
                    let fecha1 = new Date(datos[0][i]);
                    if (fecha1.getHours()<10)
                      var hora =  "0"+fecha1.getHours();
                    else
                      var hora = fecha1.getHours();
                    if (fecha1.getMinutes()<10)
                      var min = "0"+fecha1.getMinutes();
                    else
                      var min = fecha1.getMinutes();
                    /*if (fecha1.getSeconds()<10)
                      var sec = "0"+fecha1.getSeconds();
                    else 
                      var sec = fecha1.getSeconds();*/
                    let fecha = hora+":"+min/*+":"+sec*/;
                    let datosarray=[fecha, datos[1][i]]
                    info.push(datosarray);
                  }
                  var data3 = google.visualization.arrayToDataTable(
                      info
                    );
                  
                  var options3 = {
                      hAxis: {title: "@lang('navMenu.hora')",  titleTextStyle: {color: '#333'}},
                      vAxis: {minValue: 0}
                  };

                  var chart3 = new google.visualization.AreaChart(document.getElementById('chart_div3'));
                  chart3.draw(data3, options3);
                }
              }
            }).fail(function () {
              document.getElementById('chart_div3').innerHTML = "<p class='alert alert-danger'>@lang('navMenu.problemaConex')</p>";
            });
      }, 10000)
    }
</script>

<!-- ---END GRAFICOS-- -->
@endsection