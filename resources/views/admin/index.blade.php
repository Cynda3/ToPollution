
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
                  <h4 class="small font-weight-bold">Minimun noise (decibels) <span class="float-right">20</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Maximum noise (decibels) <span class="float-right">130</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="danger" style="width: 90%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Minimun CO2 (particle per milion) <span class="float-right">60</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Maximum CO2 (particle per milion) <span class="float-right">200</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Minimum CO (particle per milion) <span class="float-right">5</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="4" aria-valuemin="0" aria-valuemax="20"></div>
                  </div>
                  <h4 class="small font-weight-bold">Maximum CO (particle per milion) <span class="float-right">16</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="4" aria-valuemin="0" aria-valuemax="20"></div>
                  </div>
                </div>
              </div>


            </div>

            <!-- User registered chart -->

            <script type="text/javascript">
              
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
                    label: "Earnings",
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
                    data: [0, 5, 13, 21, 16, 24, 37, 50, 72, 103, 133, 175],
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

            </script>

            <!-- Pie chart for data recieved -->

            <script type="text/javascript">
              // Set new default font family and font color to mimic Bootstrap's default styling
              Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
              Chart.defaults.global.defaultFontColor = '#858796';

              // Pie Chart Example
              var ctx = document.getElementById("myPieChart");
              var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                  labels: ["Decibel", "CO2", "CO"],
                  datasets: [{
                    data: [55, 30, 15],
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                  }],
                },
                options: {
                  maintainAspectRatio: false,
                  tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                  },
                  legend: {
                    display: false
                  },
                  cutoutPercentage: 80,
                },
              });

            </script>
          </div>

        </div>
        <!-- /.container-fluid -->

@endsection