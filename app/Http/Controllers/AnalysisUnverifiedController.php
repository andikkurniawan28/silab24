<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Analysis;
use App\Models\Indicator;
use Illuminate\Http\Request;

class AnalysisUnverifiedController extends Controller
{
    public function process(Request $request){
        Analysis::whereIn("id", $request->id)->update([
            "is_verified" => 1,
            "user_id" => Auth()->user()->id,
        ]);
        return redirect()->route("analyses.index")->with("success", "Analisa berhasil diverifikasi");
    }
}
