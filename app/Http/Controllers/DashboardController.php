<?php

namespace App\Http\Controllers;

use App\Models\Ari;
use App\Models\Sample;
use App\Models\Balance;
use App\Models\Mollase;
use App\Models\Posbrix;
use App\Models\Station;
use App\Models\Analysis;
use App\Models\Product50;
use App\Models\CoreSample;
use App\Models\Imbibition;
use App\Models\AriSampling;
use Illuminate\Http\Request;
use App\Models\Rawsugarinput;
use App\Models\Rawsugaroutput;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stations = Station::all();
        $data = self::getData();
        return view("dashboard.index", compact(
            "stations", "data",
        ));
    }

    public static function getData(){
        $name = ["pagi", "sore", "malam", "harian"];

        $timeframe = [
            [session('time_pagi'), session('time_siang')],
            [session('time_siang'), session('time_malam')],
            [session('time_malam'), session('time_malam2')],
            [session('time_start'), session('time_end')],
        ];

        $data["posbrix"]        = self::posbrix($name, $timeframe);
        $data["core_sample"]    = self::core_sample($name, $timeframe);
        $data["ari"]            = self::ari($name, $timeframe);
        $data["npp"]            = self::npp($name, $timeframe);

        return $data;
    }

    public static function posbrix($name, $timeframe){
        for($i=0; $i<count($name); $i++){
            $data[$name[$i]] = Posbrix::where("created_at", ">=", $timeframe[$i][0])
                ->where("created_at", "<", $timeframe[$i][1])
                ->select(DB::raw(
                    '
                    count(id)                                   Jumlah,
                    count(if(`is_accepted` = 0, `id`, NULL))    Ditolak,
                    count(if(`is_accepted` = 1, `id`, NULL))    Diterima,
                    count(if(`is_accepted` = 2, `id`, NULL))    Terbakar,
                    count(if(`is_accepted` = 3, `id`, NULL))    Lolos,
                    avg(`brix`)                                 Brix
                    '
            ))->first();
        }
        return $data;
    }

    public static function core_sample($name, $timeframe){
        for($i=0; $i<count($name); $i++){
            $data[$name[$i]] = CoreSample::where("created_at", ">=", $timeframe[$i][0])
                ->where("created_at", "<", $timeframe[$i][1])
                ->select(DB::raw(
                    '
                    count(id)       Jumlah,
                    avg(`yield`)    Rendemen
                    '
            ))->first();
        }
        return $data;
    }

    public static function ari($name, $timeframe){
        for($i=0; $i<count($name); $i++){
            $data[$name[$i]] = Ari::where("created_at", ">=", $timeframe[$i][0])
                ->where("created_at", "<", $timeframe[$i][1])
                ->select(DB::raw(
                    '
                    min(yield)      Min,
                    max(yield)      Max,
                    count(id)       Jumlah,
                    avg(`yield`)    Rendemen
                    '
            ))->first();
        }
        return $data;
    }

    public static function npp($name, $timeframe){
        for($i=0; $i<count($name); $i++){
            $data[$name[$i]] = Analysis::where("created_at", ">=", $timeframe[$i][0])
                ->where("created_at", "<", $timeframe[$i][1])
                ->where("material_id", 3)
                ->where("is_verified", 1)
                ->select(DB::raw(
                    '
                    min(Rendemen)       Min,
                    max(Rendemen)       Max,
                    count(id)           Jumlah,
                    avg(`Rendemen`)     Rendemen
                    '
            ))->first();
        }
        return $data;
    }
}
