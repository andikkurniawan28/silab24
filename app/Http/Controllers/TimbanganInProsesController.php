<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;
use App\Models\Rawsugarinput;
use App\Models\Rawsugaroutput;
use App\Models\Mollase;

class TimbanganInProsesController extends Controller
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
        $timbangan = self::timbangan($timeframe);
        return view("timbangan_in_proses.index", compact("stations", "timeframe", "timbangan"));
    }

    public static function timeframe(){
        for($i=0; $i<25; $i++){
            $time[$i] = date("Y-m-d H:i", strtotime(session("time_start") . "+{$i} hours"));
        }
        return $time;
    }

    public static function timbangan($timeframe){
        for($i=0; $i<(count($timeframe)-1); $i++){

            $timbangan["rs_in"][$i] = Rawsugarinput::whereBetween("created_at", [$timeframe[$i], $timeframe[$i+1]])
                ->where("bruto", "!=", 0)
                ->where("tarra", "!=", 0)
                ->sum("netto");
            $timbangan["rs_in"]["pagi"] = Rawsugarinput::whereBetween("created_at", [$timeframe[0], $timeframe[7]])
                ->where("bruto", "!=", 0)
                ->where("tarra", "!=", 0)
                ->sum("netto");
            $timbangan["rs_in"]["sore"] = Rawsugarinput::whereBetween("created_at", [$timeframe[8], $timeframe[15]])
                ->where("bruto", "!=", 0)
                ->where("tarra", "!=", 0)
                ->sum("netto");
            $timbangan["rs_in"]["malam"] = Rawsugarinput::whereBetween("created_at", [$timeframe[16], $timeframe[23]])
                ->where("bruto", "!=", 0)
                ->where("tarra", "!=", 0)
                ->sum("netto");
            $timbangan["rs_in"]["harian"] = Rawsugarinput::whereBetween("created_at", [$timeframe[0], $timeframe[23]])
                ->where("bruto", "!=", 0)
                ->where("tarra", "!=", 0)
                ->sum("netto");


            $timbangan["rs_out"][$i] = Rawsugaroutput::whereBetween("created_at", [$timeframe[$i], $timeframe[$i+1]])
                ->where("bruto", "!=", 0)
                ->where("tarra", "!=", 0)
                ->sum("netto");
            $timbangan["rs_out"]["pagi"] = Rawsugaroutput::whereBetween("created_at", [$timeframe[0], $timeframe[7]])
                ->where("bruto", "!=", 0)
                ->where("tarra", "!=", 0)
                ->sum("netto");
            $timbangan["rs_out"]["sore"] = Rawsugaroutput::whereBetween("created_at", [$timeframe[8], $timeframe[15]])
                ->where("bruto", "!=", 0)
                ->where("tarra", "!=", 0)
                ->sum("netto");
            $timbangan["rs_out"]["malam"] = Rawsugaroutput::whereBetween("created_at", [$timeframe[16], $timeframe[23]])
                ->where("bruto", "!=", 0)
                ->where("tarra", "!=", 0)
                ->sum("netto");
            $timbangan["rs_out"]["harian"] = Rawsugaroutput::whereBetween("created_at", [$timeframe[0], $timeframe[23]])
                ->where("bruto", "!=", 0)
                ->where("tarra", "!=", 0)
                ->sum("netto");

            $timbangan["tetes"][$i] = Mollase::whereBetween("created_at", [$timeframe[$i], $timeframe[$i+1]])
                ->where("bruto", "!=", 0)
                ->where("tarra", "!=", 0)
                ->sum("netto");
            $timbangan["tetes"]["pagi"] = Mollase::whereBetween("created_at", [$timeframe[0], $timeframe[7]])
                ->where("bruto", "!=", 0)
                ->where("tarra", "!=", 0)
                ->sum("netto");
            $timbangan["tetes"]["sore"] = Mollase::whereBetween("created_at", [$timeframe[8], $timeframe[15]])
                ->where("bruto", "!=", 0)
                ->where("tarra", "!=", 0)
                ->sum("netto");
            $timbangan["tetes"]["malam"] = Mollase::whereBetween("created_at", [$timeframe[16], $timeframe[23]])
                ->where("bruto", "!=", 0)
                ->where("tarra", "!=", 0)
                ->sum("netto");
            $timbangan["tetes"]["harian"] = Mollase::whereBetween("created_at", [$timeframe[0], $timeframe[23]])
                ->where("bruto", "!=", 0)
                ->where("tarra", "!=", 0)
                ->sum("netto");
        }
        return $timbangan;
    }
}
