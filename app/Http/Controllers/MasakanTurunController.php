<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Analysis;
use App\Models\Material;
use Illuminate\Http\Request;

class MasakanTurunController extends Controller
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
        $timeframe = self::timeframe();
        $masakan_turun = self::masakanTurun($timeframe);
        return view("masakan_turun.index", compact("stations", "timeframe", "masakan_turun"));
    }

    public static function timeframe(){
        for($i=0; $i<25; $i++){
            $time[$i] = date("Y-m-d H:i", strtotime(session("time_start") . "+{$i} hours"));
        }
        return $time;
    }

    public static function masakanTurun($timeframe){
        $material = Material::where("name", "like", "Masakan%")->get()->toArray();
        for($x=0; $x < count($material); $x++){
            for($i=0; $i < (count($timeframe)-1); $i++){
                $material[$x]["volume"][$i] =
                Analysis::whereBetween("created_at", [$timeframe[$i], $timeframe[$i+1]])
                    ->where("material_id", $material[$x]["id"])
                    ->where("volume", "!=", 0)
                    ->sum("volume");
            }
            $material[$x]["volume"]["pagi"] = Analysis::whereBetween("created_at", [$timeframe[0], $timeframe[7]])
                ->where("material_id", $material[$x]["id"])
                ->where("volume", "!=", 0)
                ->sum("volume");
            $material[$x]["volume"]["sore"] = Analysis::whereBetween("created_at", [$timeframe[8], $timeframe[15]])
                ->where("material_id", $material[$x]["id"])
                ->where("volume", "!=", 0)
                ->sum("volume");
            $material[$x]["volume"]["malam"] = Analysis::whereBetween("created_at", [$timeframe[16], $timeframe[23]])
                ->where("material_id", $material[$x]["id"])
                ->where("volume", "!=", 0)
                ->sum("volume");
            $material[$x]["volume"]["harian"] = Analysis::whereBetween("created_at", [$timeframe[0], $timeframe[23]])
                ->where("material_id", $material[$x]["id"])
                ->where("volume", "!=", 0)
                ->sum("volume");
        }
        return $material;
    }
}
