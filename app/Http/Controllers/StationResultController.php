<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use App\Models\Balance;
use App\Models\Station;
use App\Models\Material;
use App\Models\Indicator;
use App\Models\Product50;
use App\Models\Imbibition;
use Illuminate\Http\Request;

class StationResultController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($station_id)
    {
        $stations = Station::all();
        $title = Station::whereId($station_id)->get()->last()->name;
        $materials = Material::where("station_id", $station_id)->get();
        for($i=0; $i<count($materials); $i++){
            $materials[$i]["analysis"] = Analysis::
                whereBetween("created_at", [session("time_start"), session("time_end")])
                ->where("material_id", $materials[$i]["id"])
                ->where("is_verified", 1)
                ->orderBy("id", "desc")
                ->limit(5)
                ->get();
        }
        return view("station_result.index", compact("stations", "materials", "title", "station_id"));
    }
}
