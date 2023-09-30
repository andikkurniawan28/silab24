<?php

namespace App\Http\Controllers;

use App\Models\Kspot;
use App\Models\Station;
use App\Models\Kactivity;
use Illuminate\Http\Request;

class KelilingResultController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $stations = Station::all();
        $kspots = Kspot::all();
        $kactivities = Kactivity::where("created_at", ">=", session("time_start"))
            ->where("created_at", "<", session("time_end"))
            ->orderBy("id", "desc")
            ->get();
        return view("keliling_result.index", compact("stations", "kspots", "kactivities"));
    }
}
