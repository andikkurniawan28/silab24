<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use Illuminate\Http\Request;

class InputAnalisaUmumController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Analysis::whereId($request->id)->update($request->except(["_token", "_method"]));
        return redirect()->route("analyses.index")->with("success", "Analisa berhasil disimpan");
    }
}
