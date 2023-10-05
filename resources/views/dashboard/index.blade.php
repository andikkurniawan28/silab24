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
                'min'       => $data["core_sample"][$name[$i]]["Min"],
                'max'       => $data["core_sample"][$name[$i]]["Max"],
            ])

            @include('components.card_ari',[
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

        <div class="col-lg-6 mb-4">
            <div class="row">

                @include('components.card_data',[
                    'bgcolor' => 'secondary',
                    'textcolor' => 'white',
                    'title' => strtoupper("rs input hari ini"),
                    'data' => $data["rs_in"]["netto"],
                    'unit' => "Ton",
                ])

                @include('components.card_data',[
                    'bgcolor' => 'warning',
                    'textcolor' => 'dark',
                    'title' => strtoupper("produksi tetes hari ini"),
                    'data' => $data["tetes"]["netto"],
                    'unit' => "Ton",
                ])

                @include('components.card_data',[
                    'bgcolor' => 'dark',
                    'textcolor' => 'white',
                    'title' => strtoupper("rs output hari ini"),
                    'data' => $data["rs_out"]["netto"],
                    'unit' => "Ton",
                ])
                @include('components.card_data',[
                    'bgcolor' => 'success',
                    'textcolor' => 'white',
                    'title' => strtoupper("tebu tergiling hari ini"),
                    'data' => $data["material_balance"]["tebu"],
                    'unit' => "Ton",
                ])

                @include('components.card_data',[
                    'bgcolor' => 'danger',
                    'textcolor' => 'white',
                    'title' => strtoupper("nira mentah hari ini"),
                    'data' => $data["material_balance"]["flow_nm"],
                    'unit' => "m3",
                ])

                @include('components.card_data',[
                    'bgcolor' => 'info',
                    'textcolor' => 'white',
                    'title' => strtoupper("air imbibisi hari ini"),
                    'data' => $data["material_balance"]["flow_imb"],
                    'unit' => "m3",
                ])

            </div>
        </div>

        @include('components.area_chart',[
            'title' => 'ICUMSA GULA PRODUK',
            'id' => 'icumsa_shs',
        ])

        @include('components.area_chart',[
            'title' => 'RENDEMEN NPP',
            'id' => 'r_npp',
        ])

        @include('components.area_chart',[
            'title' => 'HK TETES',
            'id' => 'hk_tetes',
        ])

    </div>

</div>
<!-- /.container-fluid -->

@endsection

@section('chart_area')
<script>
var ctx = document.getElementById("icumsa_shs");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [
        @for($i=0; $i<count($icumsa_shs); $i++)
            "{{ date('H:i', strtotime($icumsa_shs[$i]['created_at'])) }}",
        @endfor
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
        @foreach ($icumsa_shs as $icumsa_shs)
            {{ $icumsa_shs->IU }},
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
    var ctx = document.getElementById("r_npp");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [
            @for($i=0; $i<count($r_npp); $i++)
                "{{ date('H:i', strtotime($r_npp[$i]['created_at'])) }}",
            @endfor
        ],
        datasets: [{
          label: "Rendemen",
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
            @foreach ($r_npp as $r_npp)
                {{ $r_npp->rendemen }},
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
    var ctx = document.getElementById("hk_tetes");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: [
            @for($i=0; $i<count($hk_tetes); $i++)
                "{{ date('H:i', strtotime($hk_tetes[$i]['created_at'])) }}",
            @endfor
        ],
        datasets: [{
          label: "HK",
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
            @foreach ($hk_tetes as $hk_tetes)
                {{ $hk_tetes->HK }},
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

@endsection
