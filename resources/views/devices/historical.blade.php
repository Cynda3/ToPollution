@extends('layouts.app')

@section('head')

@endsection

@section('content')
<div class="container">
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
    <div id="columnchart_material2" style="width: 800px; height: 500px;"></div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'CO2'],
          ['Enero', "{{$meses['01']['CO2']}}"],
          ['Febrero', "{{$meses['02']['CO2']}}"],
          ['Marzo', "{{$meses['03']['CO2']}}"],
          ['Abril', "{{$meses['04']['CO2']}}"],
          ['Mayo', "{{$meses['05']['CO2']}}"],
          ['Junio', "{{$meses['06']['CO2']}}"],
          ['Julio', "{{$meses['07']['CO2']}}"],
          ['Agosto', "{{$meses['08']['CO2']}}"],
          ['Septiembre', "{{$meses['09']['CO2']}}"],
          ['Octubre', "{{$meses['10']['CO2']}}"],
          ['Noviembre', "{{$meses['11']['CO2']}}"],
          ['Diciembre', "{{$meses['12']['CO2']}}"]
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

</script>
<!-- ---END GRAFICOS-- -->
@endsection