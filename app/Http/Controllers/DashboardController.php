<?php

namespace App\Http\Controllers;

use session;
use App\Models\Ari;
use App\Models\Report;
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
        $stations   = Station::all();
        $data       = self::getData();
        $icumsa_shs = self::icumsa_shs();
        $r_npp      = self::r_npp();
        $hk_tetes   = self::hk_tetes();
        return view("dashboard.index", compact(
            "stations",
            "data",
            "icumsa_shs",
            "r_npp",
            "hk_tetes",
        ));
    }

    public static function getData(){
        $name = ["pagi", "sore", "malam", "harian"];

        $timeframe = [
            [session('time_pagi'), session('time_siang')],
            [session('time_siang'), session('time_malam')],
            [session('time_malam'), session('time_tomorrow')],
            [session('time_start'), session('time_end')],
        ];

        $data["posbrix"]            = self::posbrix($name, $timeframe);
        $data["core_sample"]        = self::core_sample($name, $timeframe);
        $data["ari"]                = self::ari($name, $timeframe);
        $data["npp"]                = self::npp($name, $timeframe);
        $data["rs_in"]              = Report::rs_in();
        $data["rs_out"]             = Report::rs_out();
        $data["tetes"]              = Report::tetes();
        $data["material_balance"]   = Report::material_balance();

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
                    min(rendemen)       Min,
                    max(rendemen)       Max,
                    count(id)           Jumlah,
                    avg(`rendemen`)     Rendemen
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
                    min(rendemen)       Min,
                    max(rendemen)       Max,
                    count(id)           Jumlah,
                    avg(`rendemen`)     Rendemen
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
                    min(`%R`)           Min,
                    max(`%R`)           Max,
                    count(id)           Jumlah,
                    avg(`%R`)           Rendemen
                    '
            ))->first();
        }
        return $data;
    }

    public static function icumsa_shs(){
        $data = Analysis::where("material_id", 67)
            ->whereBetween("created_at", [session("time_start"), session("time_end")])
            ->where("is_verified", 1)
            ->select(["created_at", "IU"])
            ->get();
        return $data;
    }

    public static function r_npp(){
        $data = Analysis::where("material_id", 3)
            ->whereBetween("created_at", [session("time_start"), session("time_end")])
            ->where("is_verified", 1)
            ->select(["created_at", "%R as rendemen"])
            ->get();
        return $data;
    }

    public static function hk_tetes(){
        $data = Analysis::where("material_id", 64)
            ->whereBetween("created_at", [session("time_start"), session("time_end")])
            ->where("is_verified", 1)
            ->select(["created_at", "HK"])
            ->get();
        return $data;
    }

}
