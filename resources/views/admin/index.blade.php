@extends('layouts.admin-layout')
@section('content')
    


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="mb-0 text-gray-800">Dashboard</h1>
            <form method="POST" action="{{ route('generate-report') }}">
              @csrf
              <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" title="generate report as pdf"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</button>
            </form>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Lifetime)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Php {{ number_format($lifetimeEarnings[0]->earnings, 2, '.', ',') }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Earnings (This Month)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Php {{ number_format($monthlyEarnings[0]->earnings, 2, '.', ',') }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (This year)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Php {{ number_format($yearlyEarnings[0]->earnings, 2, '.', ',') }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Daily) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Earnings (This day)</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Php {{ number_format($dailyEarnings[0]->earnings, 2, '.', ',') }}</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Transactions Today Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-dark text-uppercase mb-1"># of Transactions (This Day)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $todaysTransactions[0]->num_of_transaction }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file-invoice fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Members Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Gym Members</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($totalMembers) }}</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>

                  </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
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
                  <h6 class="m-0 font-weight-bold text-primary">Earnings This Year</h6>
                </div>
                <div class="card-body">
                  <?php $i = 0;?>
                  @foreach ($monthNamesWithEarnings as $index => $month)
                    <h4 class="small font-weight-bold"> {{ $index }}<span class="float-right">{{ number_format((($month / $yearlyEarnings[0]->earnings) * 100), 2) }}%</span></h4>
                    <div class="progress mb-4" title="Php {{ number_format($month, 2, '.', ',') }}">
                      @if ($i == 0)
                    <div class="progress-bar bg-primary" role="progressbar" style="width: {{ number_format((($month / $yearlyEarnings[0]->earnings) * 100), 2) }}%" aria-valuenow="{{ number_format((($month / $yearlyEarnings[0]->earnings) * 100), 2) }}" aria-valuemin="0" aria-valuemax="100" title="Php {{ number_format($month, 2, '.', ',') }}"></div>
                        <?php $i++; ?>
                      @elseif($i == 1)
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ number_format((($month / $yearlyEarnings[0]->earnings) * 100), 2) }}%" aria-valuenow="{{ number_format((($month / $yearlyEarnings[0]->earnings) * 100), 2) }}" aria-valuemin="0" aria-valuemax="100" title="Php {{ number_format($month, 2, '.', ',') }}"></div>
                        <?php $i++; ?>
                      @elseif($i == 2)
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ number_format((($month / $yearlyEarnings[0]->earnings) * 100), 2) }}%" aria-valuenow="{{ number_format((($month / $yearlyEarnings[0]->earnings) * 100), 2) }}" aria-valuemin="0" aria-valuemax="100" title="Php {{ number_format($month, 2, '.', ',') }}"></div>
                        <?php $i++; ?>
                      @elseif($i == 3)
                        <div class="progress-bar bg-info" role="progressbar" style="width: {{ number_format((($month / $yearlyEarnings[0]->earnings) * 100), 2) }}%" aria-valuenow="{{ number_format((($month / $yearlyEarnings[0]->earnings) * 100), 2) }}" aria-valuemin="0" aria-valuemax="100" title="Php {{ number_format($month, 2, '.', ',') }}"></div>
                        <?php $i++; ?>
                      @elseif($i == 4)
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ number_format((($month / $yearlyEarnings[0]->earnings) * 100), 2) }}%" aria-valuenow="{{ number_format((($month / $yearlyEarnings[0]->earnings) * 100), 2) }}" aria-valuemin="0" aria-valuemax="100" title="Php {{ number_format($month, 2, '.', ',') }}"></div>
                        <?php $i++; ?>
                      @else
                        <div class="progress-bar bg-dark" role="progressbar" style="width: {{ number_format((($month / $yearlyEarnings[0]->earnings) * 100), 2) }}%" aria-valuenow="{{ number_format((($month / $yearlyEarnings[0]->earnings) * 100), 2) }}" aria-valuemin="0" aria-valuemax="100"></div>
                        <?php $i = 0; ?>
                      @endif
                    </div>
                  @endforeach
                </div>
              </div>

            </div>
            
            <!-- Color System -->
            <div class="col-lg-6 mb-4">
                  <div class="card shadow mb-4">
                      <!-- Card Header - Dropdown -->
                      <div
                          class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">Transactions</h6>
                          <div class="dropdown no-arrow">
                              <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                              </a>
                          </div>
                      </div>
                      <!-- Card Body -->
                      <div class="card-body">
                          <div class="chart-pie pt-4 pb-2">
                              <canvas id="myPieChart"></canvas>
                          </div>
                          <div class="mt-4 text-center small">
                              <span class="mr-2">
                                  <i class="fas fa-circle text-primary"></i> Walk-ins
                              </span>
                              <span class="mr-2">
                                  <i class="fas fa-circle text-success"></i> Gym Members
                              </span>
                          </div>
                      </div>
              </div>

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">About California Fitness Gym</h6>
                </div>
                <div class="card-body">
                  <p>At California Fitness, we truly care about each and every client’s success. We’ll work with you to help you achieve your health and fitness goals. Personal training, nutritional plans, support, home workouts…we’ll stick with you through it all. Let’s do this…together.</p>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

<!-- Page level plugins -->
<script src="{{ asset('../vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<!-- <script src="js/demo/chart-area-demo.js"></script> -->

<script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

        <script>

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
          
          
          
          let date = new Date();
          let numofmonth = date.getMonth();
          
          let calendarMonth = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
          
          let finalMonth = [];
          for (let i = 0; i < numofmonth; i++) {
            finalMonth.push(calendarMonth[i]);
          }
          
          
          // Area Chart Example
          var ctx = document.getElementById("myAreaChart");
          var myLineChart = new Chart(ctx, {
          type: 'line',
          data: {
          labels: finalMonth,
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
          data: <?php echo json_encode($allMonthEarnings) ?>,
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
                return '$' + number_format(value);
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
              return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
            }
          }
          }
          }
          });
          
          
          
          // Pie Chart Example
          var ctx = document.getElementById("myPieChart");
          var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
              labels: ["Walk-ins", "Gym Members"],
              datasets: [{
                data: [<?php echo count($walkinTransactions); ?>, <?php echo count($memberTransactions); ?>],
                backgroundColor: ['#4e73df', '#1cc88a'],
                hoverBackgroundColor: ['#2e59d9', '#17a673'],
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

@endsection