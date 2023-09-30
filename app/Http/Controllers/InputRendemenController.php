<?php

namespace App\Http\Controllers;

use App\Models\Factor;
use App\Models\Analysis;
use Illuminate\Http\Request;

class InputRendemenController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $hk = self::hitungHK($request);
        $rendemen = self::hitungRendemen($request);
        $request->request->add(["%R" => $rendemen, "HK" => $hk]);
        Analysis::whereId($request->id)->update($request->except(["_token", "_method"]));
        return redirect()->route("analyses.index")->with("success", "Analisa berhasil disimpan");
    }

    public static function hitungHK($request){
        return $request->{"%Pol"} / $request->{"%Brix"} * 100;
    }

    public static function hitungRendemen($request){
        $faktor_rendemen = Factor::where('name', 'Rendemen')->get()->last()->value;
        $faktor_mellase = Factor::where('name', 'Mollases')->get()->last()->value;
        return ($request->{"%Pol"}- ( $faktor_mellase * ($request->{"%Brix"} - $request->{"%Pol"}) ) * $faktor_rendemen);
    }
}
