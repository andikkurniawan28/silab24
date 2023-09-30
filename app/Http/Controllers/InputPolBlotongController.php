<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use Illuminate\Http\Request;

class InputPolBlotongController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $zk = $request->{"%Zk"} * 10;
        $kadar_air = 100 - $zk;
        $request->request->add(["%ZK" => $zk, "%Air" => $kadar_air]);
        Analysis::whereId($request->id)->update($request->except(["_token", "_method"]));
        return redirect()->route("analyses.index")->with("success", "Analisa berhasil disimpan");
    }
}
