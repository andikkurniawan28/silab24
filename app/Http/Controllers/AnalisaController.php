<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Analysis;
use App\Models\Indicator;
use Illuminate\Http\Request;

class AnalisaController extends Controller
{
    public function index(){
        $stations = Station::all();
        $indicators = Indicator::whereIn("id", [6,17,22,23,24])->get();
        $analyses = Analysis::where("created_at", ">=", session("time_start"))
            ->where("created_at", "<", session("time_end"))
            ->orderBy("id", "desc")
            ->get();
        return view("analisa.index", compact("stations", "indicators", "analyses"));
    }

    public function process(Request $request){
        Analysis::whereId($request->id)->update($request->except(["_token", "_method"]));
        return redirect()->back()->with("success", "Data berhasil disimpan");
    }
}
