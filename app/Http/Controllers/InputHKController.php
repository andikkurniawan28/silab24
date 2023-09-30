<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use Illuminate\Http\Request;

class InputHKController extends Controller
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
        $request->request->add(["HK" => $hk]);
        Analysis::whereId($request->id)->update($request->except(["_token", "_method"]));
        return redirect()->route("analyses.index")->with("success", "Analisa berhasil disimpan");
    }

    public static function hitungHK($request){
        return $request->{"%Pol"} / $request->{"%Brix"} * 100;
    }
}
