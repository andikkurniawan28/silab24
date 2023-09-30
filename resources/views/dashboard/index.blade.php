@extends('layouts.app')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    @include("components.alert_block")

    <!-- Card Section -->
    <div class="row">

        @if(Auth()->user()->role_id < 9)

        @php $name = ["pagi", "sore", "malam", "harian"]; @endphp

        @for($i=0; $i<count($name); $i++)

            @include('components.card_posbrix',[
                'color'     => 'primary',
                'title'     => "Pos Brix ". ucfirst($name[$i]),
                'jumlah'    => $data["posbrix"][$name[$i]]["Jumlah"],
                'diterima'  => $data["posbrix"][$name[$i]]["Diterima"],
                'ditolak'   => $data["posbrix"][$name[$i]]["Ditolak"],
                'terbakar'  => $data["posbrix"][$name[$i]]["Terbakar"],
                'lolos'     => $data["posbrix"][$name[$i]]["Lolos"],
                'brix'      => $data["posbrix"][$name[$i]]["Brix"],
            ])

            @include('components.card_coresample',[
                'color'     => 'primary',
                'title'     => "Core Sample ". ucfirst($name[$i]),
                'data'      => $data["core_sample"][$name[$i]]["Rendemen"],
                'rit'       => $data["core_sample"][$name[$i]]["Jumlah"],
            ])

            @include('components.card_home',[
                'color'     => 'primary',
                'title'     => "Gilingan Mini ". ucfirst($name[$i]),
                'data'      => $data["ari"][$name[$i]]["Rendemen"],
                'rit'       => $data["ari"][$name[$i]]["Jumlah"],
                'min'       => $data["ari"][$name[$i]]["Min"],
                'max'       => $data["ari"][$name[$i]]["Max"],
            ])

            @include('components.card_npp', [
                'color'     => 'warning',
                'title'     => "NPP ". ucfirst($name[$i]),
                'rendemen'  => $data["npp"][$name[$i]]["Rendemen"],
                'jumlah'    => $data["npp"][$name[$i]]["Jumlah"],
                'min'       => $data["npp"][$name[$i]]["Min"],
                'max'       => $data["npp"][$name[$i]]["Max"],
            ])

        @endfor

        @endif

    </div>

    <!-- Chart Section -->
    <div class="row">

        {{-- <div class="col-lg-6 mb-4">
            <div class="row">

                @include('components.card_data',[
                    'bgcolor' => 'primary',
                    'textcolor' => 'white',
                    'title' => strtoupper("hari giling"),
                    'data' => $hari_giling,
                    'unit' => "Hari",
                ])

                @if(Auth()->user()->role_id < 9)
                @include('components.card_data',[
                    'bgcolor' => 'secondary',
                    'textcolor' => 'white',
                    'title' => strtoupper("rs input hari ini"),
                    'data' => number_format($rs_in["harian"], 2),
                    'unit' => "Ton",
                ])
                @endif

                @include('components.card_data',[
                    'bgcolor' => 'success',
                    'textcolor' => 'white',
                    'title' => strtoupper("tebu tergiling hari ini"),
                    'data' => number_format($balance["tebu"], 2),
                    'unit' => "Ton",
                ])

                @include('components.card_data',[
                    'bgcolor' => 'danger',
                    'textcolor' => 'white',
                    'title' => strtoupper("nira mentah hari ini"),
                    'data' => number_format($balance["nira_mentah"], 2),
                    'unit' => "m3",
                ])

                @include('components.card_data',[
                    'bgcolor' => 'info',
                    'textcolor' => 'white',
                    'title' => strtoupper("air imbibisi hari ini"),
                    'data' => number_format($balance["imbibisi"], 2),
                    'unit' => "m3",
                ])

                @include('components.card_data',[
                    'bgcolor' => 'warning',
                    'textcolor' => 'dark',
                    'title' => strtoupper("produksi tetes hari ini"),
                    'data' => number_format($tetes["harian"], 2),
                    'unit' => "Ton",
                ])

                @include('components.card_data',[
                    'bgcolor' => 'dark',
                    'textcolor' => 'white',
                    'title' => strtoupper("rs output hari ini"),
                    'data' => number_format($rs_out["harian"], 2),
                    'unit' => "Ton",
                ])

                @include('components.card_data',[
                    'bgcolor' => 'white',
                    'textcolor' => 'dark',
                    'title' => strtoupper("produksi shs hari ini"),
                    'data' => number_format($shs, 2),
                    'unit' => "Ton",
                ])

            </div>
        </div> --}}

        {{-- @include('components.area_chart',[
            'title' => 'RENDEMEN NPP',
            'id' => 'npp_result',
        ])

        @include('components.area_chart',[
            'title' => 'HK TETES',
            'id' => 'hk_tetes',
        ])

        @include('components.area_chart',[
            'title' => 'ICUMSA GULA PRODUK',
            'id' => 'icumsa_shs',
        ]) --}}

    </div>

    <div class="row">

        {{-- @if(Auth()->user()->role_id < 9)
        @include("components.card_timbangan", [
            "bgcolor" => "danger",
            "title" => "RS In",
            "unit" => "Ton",
            "pagi" => $rs_in["pagi"],
            "siang" => $rs_in["siang"],
            "malam" => $rs_in["malam"],
        ])
        @endif

        @include("components.card_timbangan", [
            "bgcolor" => "primary",
            "title" => "RS Out",
            "unit" => "Ton",
            "pagi" => $rs_out["pagi"],
            "siang" => $rs_out["siang"],
            "malam" => $rs_out["malam"],
        ])

        @include("components.card_timbangan", [
            "bgcolor" => "dark",
            "title" => "Tetes",
            "unit" => "Ton",
            "pagi" => $tetes["pagi"],
            "siang" => $tetes["siang"],
            "malam" => $tetes["malam"],
        ]) --}}

        {{-- <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">SILO</h6>
                </div>
                <div class="card-body">
                    <video controls="" preload="auto" id="_video"></video>
                </div>
            </div>
        </div> --}}

    </div>

</div>
<!-- /.container-fluid -->

@endsection

@section('chart_area')
{{-- <script>
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
var ctx = document.getElementById("icumsa_shs");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [
        @foreach ($tetes_result as $analysis)
            "{{ date('d-m-Y H:i', strtotime($analysis->sample->created_at)) }}",
        @endforeach
    ],
    datasets: [{
      label: "ICUMSA",
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
      data: [
        @foreach ($analysis_result as $analysis)
            {{ $analysis->value }},
        @endforeach
      ],
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
    }
  }
});
</script>

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

    // Area Chart Example
    var ctx = document.getElementById("hk_tetes");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [
            @foreach ($tetes_result as $analysis)
                "{{ date('d-m-Y H:i', strtotime($analysis->sample->created_at)) }}",
            @endforeach
        ],
        datasets: [{
          label: "HK Tetes",
          lineTension: 0.3,
          backgroundColor: "rgba(217, 30, 24, 0.05)",
          borderColor: "rgba(217, 30, 24, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(217, 30, 24, 1)",
          pointBorderColor: "rgba(217, 30, 24, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(217, 30, 24, 1)",
          pointHoverBorderColor: "rgba(217, 30, 24, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [
            @foreach ($tetes_result as $analysis)
                {{ $analysis->value }},
            @endforeach
          ],
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
        }
      }
    });
</script>

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

    // Area Chart Example
    var ctx = document.getElementById("npp_result");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [
            @foreach ($npp_result as $analysis)
                "{{ date('d-m-Y H:i', strtotime($analysis->sample->created_at)) }}",
            @endforeach
        ],
        datasets: [{
          label: "R NPP",
          lineTension: 0.3,
          backgroundColor: "rgba(217, 30, 24, 0.05)",
          borderColor: "rgb(0,128,0,1)",
          pointRadius: 3,
          pointBackgroundColor: "rgb(0,128,0,1)",
          pointBorderColor: "rgb(0,128,0,1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgb(0,128,0,1)",
          pointHoverBorderColor: "rgb(0,128,0,1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [
            @foreach ($npp_result as $analysis)
                {{ $analysis->value }},
            @endforeach
          ],
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
        }
      }
    });
</script> --}}
@endsection
