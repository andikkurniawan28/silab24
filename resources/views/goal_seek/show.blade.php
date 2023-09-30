<script src="/Silab-V3/public/js/adjustment.js"></script>
<form action="" method="POST">
<p>Date : {{ $date }}</p>
@csrf
<h2>Material Balance</h2>
<table width="100%" border="1">
    <tr>
        <th>Material</th>
        <th>Tonnase</th>
        <th>% Tebu</th>
    </tr>
    <tr>
        <td>Tebu</td>
        <td><div id="tonnase['tebu']">{{ $tonnase['tebu'] }}</div>
        <td></td>
    </tr>
    <tr>
        <td>Imbibisi</td>
        <td><input type="number" id="tonnase['imbibisi']" name="tonnase['imbibisi']" value="{{ $tonnase['imbibisi'] }}" onchange="processTonnase()"></td>
        <td><div id="tonnase_persen_tebu['imbibisi']">{{ $tonnase_persen_tebu['imbibisi'] }}</div>
    </tr>
    <tr>
        <td>Nira Mentah</td>
        <td><input type="number" id="tonnase['nira_mentah']" name="tonnase['nira_mentah']" value="{{ $tonnase['nira_mentah'] }}" onchange="processTonnase()"></td>
        <td><div id="tonnase_persen_tebu['nira_mentah']">{{ $tonnase_persen_tebu['nira_mentah'] }}</div>
    </tr>
    <tr>
        <td>Ampas</td>
        <td><div id="tonnase['ampas']">{{ $tonnase['ampas'] }}</div>
        <td><div id="tonnase_persen_tebu['ampas']">{{ $tonnase_persen_tebu['ampas'] }}</div>
    </tr>
</table>

<br>

<h2>Dependensi Hasil Analisa</h2>
<table width="100%" border="1"><tr>
    <th>Material</th>
    <th>%Brix</th>
    <th>%Pol</th>
    <th>%HK</th>
</tr>
<tr>
    <td>NPP</td>
    <td><input type="number" id="analysis['brix_npp']" name="brix['npp']" value="{{ $brix['npp'] }}" onchange="processNpp()"></td>
    <td><input type="number" id="analysis['pol_npp']" name="pol['npp']" value="{{ $pol['npp'] }}" onchange="processNpp()"></td>
    <td><div id="analysis['hk_npp']">{{ $hk['npp'] }}</div>
</tr>
<tr>
    <td>Nira Mentah</td>
    <td><input type="number" id="analysis['brix_nira_mentah']" name="brix['nira_mentah']" value="{{ $brix['nira_mentah'] }}" onchange="processNiraMentah()"></td>
    <td><input type="number" id="analysis['pol_nira_mentah']" name="pol['nira_mentah']" value="{{ $pol['nira_mentah'] }}" onchange="processNiraMentah()"></td>
    <td><div id="analysis['hk_nira_mentah']">{{ $hk['nira_mentah'] }}</div>
</tr>
</table>

<br>

<h2>Ton Analisa, Ton Analisa % Tebu, Analisa Tebu</h2>
<table width="100%" border="1">
<tr>
    <th>Parameter</th>
    <th>Ton Nira Mentah</th>
</tr>
<tr>
    <td>Pol</td>
    <td><div id="ton_pol['nira_mentah']">{{ $ton_pol['nira_mentah'] }}</div>
</tr>
<tr>
    <td>Brix</td>
    <td><div id="ton_brix['nira_mentah']">{{ $ton_brix['nira_mentah'] }}</div>
</tr>
</table>

</form>


