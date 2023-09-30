<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="60;URL='{{ route('data_jaga_lembar1') }}'">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=200%, initial-scale=0.5, shrink-to-fit=no">
    <meta name="description" content="Sistem Informasi Laboratorium PG Kebon Agung Bagian Quality Control">
    <meta name="author" content="Andik Kurniawan">
    <style>

        table {
            border-collapse: collapse;
        }

        h3 {
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
<h3 align"center">Data Proses Dalam Pabrik</h3>
<p style="font-family: Arial; font-size: small;">Tanggal : {{ date('d-m-Y') }}</p>
<table width="250%">
    <tr>
        <th rowspan="4" colspan="1">Jam</th>
        <th rowspan="3" colspan="2">Tebu<br>Tergiling</th>
        <th rowspan="3" colspan="2">Air<br>Imbibisi</th>
        <th rowspan="3" colspan="3">Nira<br>Mentah</th>
        <th rowspan="2" colspan="20">Stasiun<br>Gilingan</th>
        <th rowspan="2" colspan="10">Stasiun<br>Pemurnian</th>
        <th rowspan="2" colspan="11">Stasiun<br>Penguapan</th>
        <th rowspan="2" colspan="7">Stasiun<br>DRK</th>
        <th rowspan="1" colspan="60">Stasiun<br>Masakan</th>
        <th rowspan="2" colspan="3">Timbangan<br>Proses</th>
        <th rowspan="1" colspan="3">Produk</th>
    </tr>
    <tr>
        <th rowspan="2" colspan="2">Pompa<br>Vacuum<sub>(CmHg)</sub></th>
        <th rowspan="2" colspan="18">Hampa<br>Udara<sub>(CmHg)</sub></th>
        <th rowspan="1" colspan="6">Suhu</th>
        <th rowspan="1" colspan="16">Volume(%)</th>
        <th rowspan="2" colspan="13">Volume<br>Palung<sub>(%)</sub></th>
        <th rowspan="2" colspan="2">HK<br>Einwrf</th>
        <th rowspan="2" colspan="3">Tekanan<br>Uap</th>
        <th rowspan="2" colspan="1">Tetes</th>
        <th rowspan="2" colspan="1">Gula<br>R1</th>
        <th rowspan="2" colspan="1">Gula<br>SHS</th>
    </tr>
    <tr>
        <th rowspan="1" colspan="4">Gilingan1</th>
        <th rowspan="1" colspan="4">Gilingan2</th>
        <th rowspan="1" colspan="4">Gilingan3</th>
        <th rowspan="1" colspan="4">Gilingan4</th>
        <th rowspan="1" colspan="4">Gilingan5</th>
        <th rowspan="1" colspan="4">Nira<br>Mentah</th>
        <th rowspan="1" colspan="4">Nira<br>Encer</th>
        <th rowspan="1" colspan="1">RVF<br>Timur</th>
        <th rowspan="1" colspan="1">RVF<br>Barat</th>
        <th rowspan="1" colspan="1">NK1</th>
        <th rowspan="1" colspan="1">NK2</th>
        <th rowspan="1" colspan="9">Hampa<br>Udara<sub>(CmHg)</sub></th>
        <th rowspan="1" colspan="4">Clear<br>Liquor</th>
        <th rowspan="1" colspan="1">Cake<br>Head</th>
        <th rowspan="1" colspan="1">Cake<br>Mid</th>
        <th rowspan="1" colspan="1">Cake<br>End</th>
        <th rowspan="1" colspan="3">Pemanas</th>
        <th rowspan="2" colspan="1">NE<br>STC</th>
        <th rowspan="1" colspan="2">Air</th>
        <th rowspan="2" colspan="1">Clear<br>Liquor</th>
        <th rowspan="1" colspan="3">Nira Kental</th>
        <th rowspan="1" colspan="2">R1</th>
        <th rowspan="1" colspan="2">R2</th>
        <th rowspan="1" colspan="2">Strp A</th>
        <th rowspan="1" colspan="2">Strp C</th>
        <th rowspan="1" colspan="2">Klre D</th>
        <th rowspan="1" colspan="2">Einwrf</th>
        <th rowspan="1" colspan="1">Tetes</th>
        <th rowspan="1" colspan="1">RS<br>In</th>
        <th rowspan="1" colspan="1">RS<br>Out</th>
    </tr>
    <tr>
        <th>Ton</th>
        <th>R<br>NPP<sub>(%)</sub></th>
        <th>Flow<sub>(m<sup>3</sup>)</sub></th>
        <th>%Tebu</th>
        <th>SFC</th>
        <th>Real<sub>(m<sup>3</sup>)</sub></th>
        <th>%Tebu</th>
        <th>Brix</th>
        <th>Pol</th>
        <th>HK</th>
        <th>Amp</th>
        <th>Brix</th>
        <th>Pol</th>
        <th>HK</th>
        <th>Amp</th>
        <th>Brix</th>
        <th>Pol</th>
        <th>HK</th>
        <th>Amp</th>
        <th>Brix</th>
        <th>Pol</th>
        <th>HK</th>
        <th>Amp</th>
        <th>Brix</th>
        <th>Pol</th>
        <th>HK</th>
        <th>Amp</th>
        <th>Brix</th>
        <th>Pol</th>
        <th>HK</th>
        <th>pH</th>
        <th>Brix</th>
        <th>Pol</th>
        <th>HK</th>
        <th>pH</th>
        <th>Pol</th>
        <th>Pol</th>
        <th>Brix</th>
        <th>Brix</th>
        @for($i=1; $i<=9; $i++)
        <th>{{ $i }}</th>
        @endfor
        <th>Brix</th>
        <th>Pol</th>
        <th>HK</th>
        <th>IU</th>
        <th>Pol</th>
        <th>Pol</th>
        <th>Pol</th>
        <th>Evp</th>
        <th>Msk</th>
        @for($i=1; $i<=18; $i++)
        <th>{{ $i }}</th>
        @endfor
        <th>1</th>
        <th>2</th>
        <th>3</th>
        <th>Inj</th>
        <th>Terj</th>
        <th>Sebelum</th>
        <th>Sdh A</th>
        <th>Sdh B</th>
        @for($i=1; $i<=5; $i++)
        <th>A</th>
        <th>B</th>
        @endfor
        <th>C</th>
        <th>D</th>
        @for($i=1; $i<=11; $i++)
        <th>{{ $i }}</th>
        @endfor
        <th>CVPC</th>
        <th>CVPD</th>
        <th>C</th>
        <th>D</th>
        <th>Baru</th>
        <th>Bekas</th>
        <th>3Ato</th>
        <th>Ton</th>
        <th>Ton</th>
        <th>Ton</th>
        <th>HK</th>
        <th>IU</th>
        <th>IU</th>
    </tr>
    @for($i=6; $i<=29; $i++)
    <tr>
        <td>{{ $data_jaga[$i]['jam'] }}</td>
        <td>{{ $data_jaga[$i]['ton_tebu'] }}</td>
        <td>{{ $data_jaga[$i]['r_npp'] }}</td>
        <td>{{ $data_jaga[$i]['imbibisi'] }}</td>
        <td>{{ $data_jaga[$i]['imbibisi_persen_tebu'] }}</td>
        <td>{{ $data_jaga[$i]['sfc'] }}</td>
        <td>{{ $data_jaga[$i]['nira_mentah'] }}</td>
        <td>{{ $data_jaga[$i]['nm_persen_tebu'] }}</td>
        <td>{{ $data_jaga[$i]['brix_npp'] }}</td>
        <td>{{ $data_jaga[$i]['pol_npp'] }}</td>
        <td>{{ $data_jaga[$i]['hk_npp'] }}</td>
        <td>{{ $data_jaga[$i]['pol_ag1'] }}</td>
        <td>{{ $data_jaga[$i]['brix_ng2'] }}</td>
        <td>{{ $data_jaga[$i]['pol_ng2'] }}</td>
        <td>{{ $data_jaga[$i]['hk_ng2'] }}</td>
        <td>{{ $data_jaga[$i]['pol_ag2'] }}</td>
        <td>{{ $data_jaga[$i]['brix_ng3'] }}</td>
        <td>{{ $data_jaga[$i]['pol_ng3'] }}</td>
        <td>{{ $data_jaga[$i]['hk_ng3'] }}</td>
        <td>{{ $data_jaga[$i]['pol_ag3'] }}</td>
        <td>{{ $data_jaga[$i]['brix_ng4'] }}</td>
        <td>{{ $data_jaga[$i]['pol_ng4'] }}</td>
        <td>{{ $data_jaga[$i]['hk_ng4'] }}</td>
        <td>{{ $data_jaga[$i]['pol_ag4'] }}</td>
        <td>{{ $data_jaga[$i]['brix_ng5'] }}</td>
        <td>{{ $data_jaga[$i]['pol_ng5'] }}</td>
        <td>{{ $data_jaga[$i]['hk_ng5'] }}</td>
        <td>{{ $data_jaga[$i]['pol_ag5'] }}</td>
        <td>{{ $data_jaga[$i]['brix_nira_mentah'] }}</td>
        <td>{{ $data_jaga[$i]['pol_nira_mentah'] }}</td>
        <td>{{ $data_jaga[$i]['hk_nira_mentah'] }}</td>
        <td>{{ $data_jaga[$i]['ph_nira_mentah'] }}</td>
        <td>{{ $data_jaga[$i]['brix_nira_encer'] }}</td>
        <td>{{ $data_jaga[$i]['pol_nira_encer'] }}</td>
        <td>{{ $data_jaga[$i]['hk_nira_encer'] }}</td>
        <td>{{ $data_jaga[$i]['ph_nira_encer'] }}</td>
        <td>{{ $data_jaga[$i]['pol_rvf_timur'] }}</td>
        <td>{{ $data_jaga[$i]['pol_rvf_barat'] }}</td>
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
        <td>{{ $data_jaga[$i]['brix_clear_liquor'] }}</td>
        <td>{{ $data_jaga[$i]['pol_clear_liquor'] }}</td>
        <td>{{ $data_jaga[$i]['hk_clear_liquor'] }}</td>
        <td>{{ $data_jaga[$i]['iu_clear_liquor'] }}</td>
        <td>{{ $data_jaga[$i]['cake_head'] }}</td>
        <td>{{ $data_jaga[$i]['cake_mid'] }}</td>
        <td>{{ $data_jaga[$i]['cake_end'] }}</td>
        <td></td>
        <td></td>
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
        <td>{{ $data_jaga[$i]['suhu_pemanas1'] }}</td>
        <td>{{ $data_jaga[$i]['suhu_pemanas2'] }}</td>
        <td>{{ $data_jaga[$i]['suhu_pemanas3'] }}</td>
        <td></td>
        <td>{{ $data_jaga[$i]['suhu_injeksi'] }}</td>
        <td>{{ $data_jaga[$i]['suhu_terjun'] }}</td>
        @for($j=1; $j<=29; $j++)
        <td></td>
        @endfor
        <td>{{ $data_jaga[$i]['hk_einwuurf_c'] }}</td>
        <td>{{ $data_jaga[$i]['hk_einwuurf_d'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_uap_baru'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_uap_bekas'] }}</td>
        <td>{{ $data_jaga[$i]['tekanan_uap_3ato'] }}</td>
        <td>{{ $data_jaga[$i]['timbangan_tetes'] }}</td>
        <td>{{ $data_jaga[$i]['timbangan_rs_in'] }}</td>
        <td>{{ $data_jaga[$i]['timbangan_rs_out'] }}</td>
        <td>{{ $data_jaga[$i]['hk_tetes'] }}</td>
        <td>{{ $data_jaga[$i]['iu_r1'] }}</td>
        <td>{{ $data_jaga[$i]['iu_shs'] }}</td>
    </tr>
    @endfor
</table>
</body>
