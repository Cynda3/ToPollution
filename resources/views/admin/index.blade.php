
@extends('layouts.admin')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($users)}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Devices</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($devices)}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Contact messages</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($messages)}}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Users registered</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Most dangerous pollution</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Decibel
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> CO2
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> O2
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">



              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Pollution levels registered</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Minimun noise (decibels) <span class="float-right" id="minDbs">30</span></h4>
                  <div class="progress mb-4">
                    <div id="minBarDbs" class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="30" aria-valuemin="25" aria-valuemax="110"></div>
                  </div>
                  <h4 class="small font-weight-bold">Maximum noise (decibels) <span class="float-right" id="maxDbs">130</span></h4>
                  <div class="progress mb-4">
                    <div id="maxBarDbs" class="progress-bar bg-danger" role="danger" style="width: 90%" aria-valuenow="40" aria-valuemin="25" aria-valuemax="110"></div>
                  </div>
                  <h4 class="small font-weight-bold">Minimun CO2 (particle per milion) <span class="float-right" id="minCO2">60</span></h4>
                  <div class="progress mb-4">
                    <div id="minBarCO2" class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="600" aria-valuemin="400" aria-valuemax="2000"></div>
                  </div>
                  <h4 class="small font-weight-bold">Maximum CO2 (particle per milion) <span class="float-right" id="maxCO2">200</span></h4>
                  <div class="progress mb-4">
                    <div id="maxBarCO2" class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="800" aria-valuemin="400" aria-valuemax="2000"></div>
                  </div>
                  <h4 class="small font-weight-bold">Minimum CO (particle per milion) <span class="float-right" id="minCO">5</span></h4>
                  <div class="progress mb-4">
                    <div id="minBarCO" class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="4" aria-valuemin="1" aria-valuemax="10"></div>
                  </div>
                  <h4 class="small font-weight-bold">Maximum CO (particle per milion) <span class="float-right" id="maxCO">16</span></h4>
                  <div class="progress">
                    <div id="maxBarCO" class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="4" aria-valuemin="1" aria-valuemax="10"></div>
                  </div>
                </div>
              </div>


            </div>

            <!-- User registered chart -->

            <script type="text/javascript">


              function progressBar(max, value){

                return (value*100)/max;

              }
              
              function refreshData(){


                let request = new XMLHttpRequest();
                request.open('GET', 'http://topollution.herokuapp.com/api/dataValues', true);
                request.onload = function(){

                  let data = JSON.parse(this.response);

                  if (request.status >= 200 && request.status < 400) {

                    // Set new data min and max values. Update progress width too.
                    $('#minDbs').text(data.dataValues.dbs.min.value);
                    $('#minBarDbs').width(progressBar(110, data.dataValues.dbs.min.value)+"%");
                    $('#maxDbs').text(data.dataValues.dbs.max.value);
                    $('#maxBarDbs').width(progressBar(110, data.dataValues.dbs.max.value)+"%");
                    $('#minCO2').text(data.dataValues.co2.min.value);
                    $('#minBarCO2').width(progressBar(110, data.dataValues.co2.min.value)+"%");
                    $('#maxCO2').text(data.dataValues.co2.max.value);
                    $('#maxBarCO2').width(progressBar(110, data.dataValues.co2.max.value)+"%");
                    $('#minCO').text(data.dataValues.co.min.value);
                    $('#minBarCO').width(progressBar(110, data.dataValues.co.min.value)+"%");
                    $('#maxCO').text(data.dataValues.co.max.value);
                    $('#maxBarCO').width(progressBar(110, data.dataValues.co.max.value)+"%");



                    // User registered chart

                    // Set new default font family and font color to mimic Bootstrap's default styling
                    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                    Chart.defaults.global.defaultFontColor = '#858796';

                    function number_format(number, decimals, dec_point, thousands_sep) {
                      // *     example: number_format(1234.56, 2, ',', ' ');
                      // *     return: '1 234,56'
                      number = (number + '').replace(',', '').replace(' ', '');
                      var n = !isFinite(+number) ? 0 : +number,
                        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                        s = '',
                        toFixedFix = function(n, prec) {
                          var k = Math.pow(10, prec);
                          return '' + Math.round(n * k) / k;
                        };
                      // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                      s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                      if (s[0].length > 3) {
                        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                      }
                      if ((s[1] || '').length < prec) {
                        s[1] = s[1] || '';
                        s[1] += new Array(prec - s[1].length + 1).join('0');
                      }
                      return s.join(dec);
                    }

                    // Area Chart Example
                    var ctx = document.getElementById("myAreaChart");
                    var myLineChart = new Chart(ctx, {
                      type: 'line',
                      data: {
                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                        datasets: [{
                          label: "Users",
                          lineTension: 0.3,
                          backgroundColor: "rgba(78, 115, 223, 0.05)",
                          borderColor: "rgba(78, 115, 223, 1)",
                          pointRadius: 3,
                          pointBackgroundColor: "rgba(78, 115, 223, 1)",
                          pointBorderColor: "rgba(78, 115, 223, 1)",
                          pointHoverRadius: 3,
                          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                          pointHitRadius: 10,
                          pointBorderWidth: 2,
                          data: [data.usersPerMonth['01'], data.usersPerMonth['02'], data.usersPerMonth['03'], data.usersPerMonth['04'], data.usersPerMonth['05'], data.usersPerMonth['06'], data.usersPerMonth['07'], data.usersPerMonth['08'], data.usersPerMonth['09'], data.usersPerMonth['10'], data.usersPerMonth['11'], data.usersPerMonth['12']],
                        }],
                      },
                      options: {
                        maintainAspectRatio: false,
                        layout: {
                          padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                          }
                        },
                        scales: {
                          xAxes: [{
                            time: {
                              unit: 'date'
                            },
                            gridLines: {
                              display: false,
                              drawBorder: false
                            },
                            ticks: {
                              maxTicksLimit: 7
                            }
                          }],
                          yAxes: [{
                            ticks: {
                              maxTicksLimit: 5,
                              padding: 10,
                              // Include a dollar sign in the ticks
                              callback: function(value, index, values) {
                                return number_format(value);
                              }
                            },
                            gridLines: {
                              color: "rgb(234, 236, 244)",
                              zeroLineColor: "rgb(234, 236, 244)",
                              drawBorder: false,
                              borderDash: [2],
                              zeroLineBorderDash: [2]
                            }
                          }],
                        },
                        legend: {
                          display: false
                        },
                        tooltips: {
                          backgroundColor: "rgb(255,255,255)",
                          bodyFontColor: "#858796",
                          titleMarginBottom: 10,
                          titleFontColor: '#6e707e',
                          titleFontSize: 14,
                          borderColor: '#dddfeb',
                          borderWidth: 1,
                          xPadding: 15,
                          yPadding: 15,
                          displayColors: false,
                          intersect: false,
                          mode: 'index',
                          caretPadding: 10,
                          callbacks: {
                            label: function(tooltipItem, chart) {
                              var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                              return datasetLabel + number_format(tooltipItem.yLabel);
                            }
                          }
                        }
                      }
                    });

                  }
                }

                request.send();

              }

              setInterval(refreshData, 5000);


              function refreshUsers(){

                let request = new XMLHttpRequest();
                request.open('GET', 'http://127.0.0.1:8000/api/user', true);
                request.onload = function(){

                  console.log(request);
                  let data = JSON.parse(this.response);


                  if (request.status >= 200 && request.status < 400) {
                    
                  }
                }
              }

              setInterval(refreshUsers, 4000);

            </script>

          </div>

        </div>
        <!-- /.container-fluid -->

@endsection