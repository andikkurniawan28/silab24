<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="60;URL='{{ route('data_jaga_lembar2') }}'">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=0.5, shrink-to-fit=no"> --}}
    <meta name="description" content="Sistem Informasi Laboratorium PG Kebon Agung Bagian Quality Control">
    <meta name="author" content="Andik Kurniawan">
    <style>

        table {
            border-collapse: collapse;
        }

        h1 {
            color: #000 !important;
            font-family: Arial !important;
            align-content: center; /* Pack items around the center */
        }

        td, th {
            border: 1px solid black;
            font-size: small !important;
            color: #000 !important;
            font-family: Arial !important;
        }
    </style>
</head>
<body>
<h1 align"center">Data Proses Dalam Pabrik</h1>
<p style="font-family: Arial; font-size: small;">Tanggal : {{ date('d-m-Y') }}</p>
<table width="100%">
    <tr>
        <th rowspan="4" colspan="1">Jam</th>
        <th rowspan="2" colspan="11">Stasiun<br>Penguapan</th>
        <th rowspan="2" colspan="18">Stasiun<br>Masakan</th>
    </tr>
    <tr>
    </tr>
    <tr>
        <th rowspan="1" colspan="1">NK1</th>
        <th rowspan="1" colspan="1">NK2</th>
        <th rowspan="1" colspan="9">Hampa<br>Udara<sub>(CmHg)</sub></th>
        <th rowspan="1" colspan="18">Hampa<br>Udara<sub>(CmHg)</sub></th>
        <th rowspan="1" colspan="13">Volume<br>Palung<sub>(%)</sub></th>
    </tr>
    <tr>
        <th>Brix</th>
        <th>Brix</th>
        @for($i=1; $i<=9; $i++)
        <th>{{ $i }}</th>
        @endfor
        @for($i=1; $i<=18; $i++)
        <th>{{ $i }}</th>
        @endfor
        @for($i=1; $i<=11; $i++)
        <th>{{ $i }}</th>
        @endfor
        <th>CVPC</th>
        <th>CVPD</th>
    </tr>
    @for($i=6; $i<=29; $i++)
    <tr>
        <td>{{ $data_jaga[$i]['jam'] }}</td>
        <td>{{ $data_jaga[$i]['brix_nira_kental1'] }}</td>
        <td>{{ $data_jaga[$i]['brix_nira_kental2'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_evap1'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_evap2'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_evap3'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_evap4'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_evap5'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_evap6'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_evap7'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_evap8'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_evap9'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan1'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan2'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan3'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan4'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan5'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan6'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan7'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan8'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan9'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan10'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan11'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan12'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan13'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan14'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan15'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan16'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan17'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_pan18'] }}</td>
        @for($j=1; $j<=13; $j++)
        <td></td>
        @endfor
    </tr>
    @endfor
</table>
</body>
