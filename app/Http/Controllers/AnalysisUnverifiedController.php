<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Analysis;
use App\Models\Indicator;
use Illuminate\Http\Request;

class AnalysisUnverifiedController extends Controller
{
    public function index(){
        $stations = Station::all();
        $indicators = Indicator::all();
        $analyses = Analysis::where("is_verified", 0)->get();
        return view('analysis_unverified.index', compact('stations', 'indicators', 'analyses'));
    }

    public function process(Request $request){
        Analysis::whereIn("id", $request->id)->update([
            "is_verified" => 1,
            "user_id" => Auth()->user()->id,
        ]);
        return redirect()->back()->with("success", "Analisa berhasil diverifikasi");
    }
}
