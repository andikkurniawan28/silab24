<?php

namespace App\Http\Controllers;

use App\Models\Factor;
use App\Models\Analysis;
use Illuminate\Http\Request;

class InputPolAmpasController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $kadar_air = 100 - $request->{"%Zk"};
        $pol_ampas = self::hitungPolAmpas($request, $kadar_air);
        $request->request->add(["Pol_Ampas" => $pol_ampas, "%Air" => $kadar_air]);
        Analysis::whereId($request->id)->update($request->except(["_token", "_method"]));
        return redirect()->route("analyses.index")->with("success", "Analisa berhasil disimpan");
    }

    public static function hitungPolAmpas($request, $kadar_air){
        $factor = Factor::where('name', 'Pol Ampas')->get()->last()->value;
        $pol = Analysis::where('id', $request->id)->get()->last()->Pol;
        $pol_ampas = (($pol/2) * 0.0286 * ((10000 + $kadar_air)/100)*2.5) + $factor;
        return $pol_ampas;
    }
}
