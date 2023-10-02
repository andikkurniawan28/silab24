<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Chemical;
use App\Models\Chemicalchecking;
use App\Models\Station;
use App\Models\Analysis;
use App\Models\Material;
use App\Models\Rawsugarinput;
use App\Models\Rawsugaroutput;
use App\Models\Mollase;
use App\Models\Kactivity;
use App\Models\Kspot;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CetakLaporanMandorController extends Controller
{
    public function index(){
        $stations = Station::all();
        return view("cetak_laporan_mandor.index", compact("stations"));
    }

    public function process(Request $request){
        $data       = self::prepare($request);
        $balance    = self::balance($request);
        $rs_in      = self::rs_in($request);
        $rs_out     = self::rs_out($request);
        $tetes      = self::tetes($request);
        $keliling   = self::keliling($request);
        $penggunaan = self::penggunaan($request);
        $kspots     = Kspot::select(["name"])->get();
        $chemicals  = Chemical::select(["name"])->get();
        return view("cetak_laporan_mandor.show", compact(
            "request",
            "data",
            "balance",
            "rs_in",
            "rs_out",
            "tetes",
            "keliling",
            "kspots",
            "penggunaan",
            "chemicals",
        ));
    }

    public static function prepare($request){
        switch($request->shift){
            case 0 : $time_start = session("time_start"); $time_end = session("time_end"); break;
            case 1 : $time_start = session("time_pagi"); $time_end = session("time_siang"); break;
            case 2 : $time_start = session("time_siang"); $time_end = session("time_malam"); break;
            case 3 : $time_start = session("time_malam"); $time_end = session("time_tomorrow"); break;
        }

        $stations = Station::select(["id", "name"])->get();

        for($i=0; $i<count($stations); $i++){
            $stations[$i]["material"] = Material::where("materials.station_id", $stations[$i]["id"])->select(["id", "name"])->get();
            for($j=0; $j<count($stations[$i]["material"]); $j++){
                $stations[$i]["material"][$j]["analysis"] = Analysis::whereBetween("created_at", [$time_start, $time_end])
                    ->where("material_id", $stations[$i]["material"][$j]["id"])
                    ->where("is_verified", 1)
                    ->select(DB::raw('
                        count(`id`)                 `Jumlah`,
                        sum(`volume`)               `Volume`,
                        round(avg(`%Brix`),2)       `%Brix`,
                        round(avg(`%Pol`),2)        `%Pol`,
                        round(avg(`Pol`),2)         `Pol`,
                        round(avg(`HK`),2)          `HK`,
                        round(avg(`%R`),2)          `%R`,
                        round(avg(`IU`),2)          `IU`,
                        round(avg(`%Air`),2)        `%Air`,
                        round(avg(`%Zk`),2)         `%Zk`,
                        round(avg(`CaO`),2)         `CaO`,
                        round(avg(`pH`),2)          `pH`,
                        round(avg(`Turbidity`),2)   `Turbidity`,
                        round(avg(`TDS`),2)         `TDS`,
                        round(avg(`Sadah`),2)       `Sadah`,
                        round(avg(`P2O5`),2)        `P2O5`,
                        round(avg(`SO2`),2)         `SO2`,
                        round(avg(`BJB`),2)         `BJB`,
                        round(avg(`TSAI`),2)        `TSAI`,
                        round(avg(`Succrose`),2)    `Succrose`,
                        round(avg(`Glucose`),2)     `Glucose`,
                        round(avg(`Fructose`),2)    `Fructose`,
                        round(avg(`Suhu`),2)        `Suhu`,
                        round(avg(`PI`),2)          `PI`,
                        round(avg(`%Sabut`),2)      `%Sabut`,
                        round(avg(`%Kapur`),2)      `%Kapur`,
                        round(avg(`Pol_Ampas`),2)   `Pol_Ampas`
                    '))->first();
            }
        }

        return $stations;
    }

    public static function balance($request){
        switch($request->shift){
            case 0 : $time_start = session("time_start"); $time_end = session("time_end"); break;
            case 1 : $time_start = session("time_pagi"); $time_end = session("time_siang"); break;
            case 2 : $time_start = session("time_siang"); $time_end = session("time_malam"); break;
            case 3 : $time_start = session("time_malam"); $time_end = session("time_tomorrow"); break;
        }
        return Balance::leftjoin("imbibitions", "balances.created_at", "imbibitions.created_at")
            ->whereBetween("balances.created_at", [$time_start, $time_end])
            ->select(DB::raw('
                    sum(`balances`.`tebu`)        `tebu`,
                    sum(`balances`.`flow_nm`)     `flow_nm`,
                    sum(`imbibitions`.`flow_imb`) `flow_imb`
            '))->first();
    }

    public static function rs_in($request){
        switch($request->shift){
            case 0 : $time_start = session("time_start"); $time_end = session("time_end"); break;
            case 1 : $time_start = session("time_pagi"); $time_end = session("time_siang"); break;
            case 2 : $time_start = session("time_siang"); $time_end = session("time_malam"); break;
            case 3 : $time_start = session("time_malam"); $time_end = session("time_tomorrow"); break;
        }
        return Rawsugarinput::whereBetween("created_at", [$time_start, $time_end])
            ->select(DB::raw('
                    sum(`netto`) `netto`
            '))->first();
    }

    public static function rs_out($request){
        switch($request->shift){
            case 0 : $time_start = session("time_start"); $time_end = session("time_end"); break;
            case 1 : $time_start = session("time_pagi"); $time_end = session("time_siang"); break;
            case 2 : $time_start = session("time_siang"); $time_end = session("time_malam"); break;
            case 3 : $time_start = session("time_malam"); $time_end = session("time_tomorrow"); break;
        }
        return Rawsugaroutput::whereBetween("created_at", [$time_start, $time_end])
            ->select(DB::raw('
                    sum(`netto`) `netto`
            '))->first();
    }

    public static function tetes($request){
        switch($request->shift){
            case 0 : $time_start = session("time_start"); $time_end = session("time_end"); break;
            case 1 : $time_start = session("time_pagi"); $time_end = session("time_siang"); break;
            case 2 : $time_start = session("time_siang"); $time_end = session("time_malam"); break;
            case 3 : $time_start = session("time_malam"); $time_end = session("time_tomorrow"); break;
        }
        return Mollase::whereBetween("created_at", [$time_start, $time_end])
            ->select(DB::raw('
                    sum(`netto`) `netto`
            '))->first();
    }

    public static function keliling($request){
        switch($request->shift){
            case 0 : $time_start = session("time_start"); $time_end = session("time_end"); break;
            case 1 : $time_start = session("time_pagi"); $time_end = session("time_siang"); break;
            case 2 : $time_start = session("time_siang"); $time_end = session("time_malam"); break;
            case 3 : $time_start = session("time_malam"); $time_end = session("time_tomorrow"); break;
        }
        $data = Kactivity::whereBetween("created_at", [$time_start, $time_end])
            ->select(DB::raw('
                    round(avg(`Tekanan_Pre_Evaporator_1`), 2)             `Tekanan_Pre_Evaporator_1`,
                    round(avg(`Tekanan_Pre_Evaporator_2`), 2)             `Tekanan_Pre_Evaporator_2`,
                    round(avg(`Tekanan_Evaporator_1`), 2)                 `Tekanan_Evaporator_1`,
                    round(avg(`Tekanan_Evaporator_2`), 2)                 `Tekanan_Evaporator_2`,
                    round(avg(`Tekanan_Evaporator_3`), 2)                 `Tekanan_Evaporator_3`,
                    round(avg(`Tekanan_Evaporator_4`), 2)                 `Tekanan_Evaporator_4`,
                    round(avg(`Tekanan_Evaporator_5`), 2)                 `Tekanan_Evaporator_5`,
                    round(avg(`Tekanan_Evaporator_6`), 2)                 `Tekanan_Evaporator_6`,
                    round(avg(`Tekanan_Evaporator_7`), 2)                 `Tekanan_Evaporator_7`,
                    round(avg(`Tekanan_Pan_1`), 2)                        `Tekanan_Pan_1`,
                    round(avg(`Tekanan_Pan_2`), 2)                        `Tekanan_Pan_2`,
                    round(avg(`Tekanan_Pan_3`), 2)                        `Tekanan_Pan_3`,
                    round(avg(`Tekanan_Pan_4`), 2)                        `Tekanan_Pan_4`,
                    round(avg(`Tekanan_Pan_5`), 2)                        `Tekanan_Pan_5`,
                    round(avg(`Tekanan_Pan_6`), 2)                        `Tekanan_Pan_6`,
                    round(avg(`Tekanan_Pan_7`), 2)                        `Tekanan_Pan_7`,
                    round(avg(`Tekanan_Pan_8`), 2)                        `Tekanan_Pan_8`,
                    round(avg(`Tekanan_Pan_9`), 2)                        `Tekanan_Pan_9`,
                    round(avg(`Tekanan_Pan_10`), 2)                       `Tekanan_Pan_10`,
                    round(avg(`Tekanan_Pan_11`), 2)                       `Tekanan_Pan_11`,
                    round(avg(`Tekanan_Pan_12`), 2)                       `Tekanan_Pan_12`,
                    round(avg(`Tekanan_Pan_13`), 2)                       `Tekanan_Pan_13`,
                    round(avg(`Tekanan_Pan_14`), 2)                       `Tekanan_Pan_14`,
                    round(avg(`Tekanan_Pan_15`), 2)                       `Tekanan_Pan_15`,
                    round(avg(`Tekanan_Pan_16`), 2)                       `Tekanan_Pan_16`,
                    round(avg(`Tekanan_Pan_17`), 2)                       `Tekanan_Pan_17`,
                    round(avg(`Tekanan_Pan_18`), 2)                       `Tekanan_Pan_18`,
                    round(avg(`Suhu_Pre_Evaporator_1`), 2)                `Suhu_Pre_Evaporator_1`,
                    round(avg(`Suhu_Pre_Evaporator_2`), 2)                `Suhu_Pre_Evaporator_2`,
                    round(avg(`Suhu_Evaporator_1`), 2)                    `Suhu_Evaporator_1`,
                    round(avg(`Suhu_Evaporator_2`), 2)                    `Suhu_Evaporator_2`,
                    round(avg(`Suhu_Evaporator_3`), 2)                    `Suhu_Evaporator_3`,
                    round(avg(`Suhu_Evaporator_4`), 2)                    `Suhu_Evaporator_4`,
                    round(avg(`Suhu_Evaporator_5`), 2)                    `Suhu_Evaporator_5`,
                    round(avg(`Suhu_Evaporator_6`), 2)                    `Suhu_Evaporator_6`,
                    round(avg(`Suhu_Evaporator_7`), 2)                    `Suhu_Evaporator_7`,
                    round(avg(`Suhu_Heater_1`), 2)                        `Suhu_Heater_1`,
                    round(avg(`Suhu_Heater_2`), 2)                        `Suhu_Heater_2`,
                    round(avg(`Suhu_Heater_3`), 2)                        `Suhu_Heater_3`,
                    round(avg(`Suhu_Air_Injeksi`), 2)                     `Suhu_Air_Injeksi`,
                    round(avg(`Suhu_Air_Terjun`), 2)                      `Suhu_Air_Terjun`,
                    round(avg(`Tekanan_Pompa_Hampa`), 2)                  `Tekanan_Pompa_Hampa`,
                    round(avg(`Tekanan_Uap_Baru`), 2)                     `Tekanan_Uap_Baru`,
                    round(avg(`Tekanan_Uap_Bekas`), 2)                    `Tekanan_Uap_Bekas`,
                    round(avg(`Tekanan_Uap_3Ato`), 2)                     `Tekanan_Uap_3Ato`
            '))->first();
        return $data;
    }

    public static function penggunaan($request){
        switch($request->shift){
            case 0 : $time_start = session("time_start"); $time_end = session("time_end"); break;
            case 1 : $time_start = session("time_pagi"); $time_end = session("time_siang"); break;
            case 2 : $time_start = session("time_siang"); $time_end = session("time_malam"); break;
            case 3 : $time_start = session("time_malam"); $time_end = session("time_tomorrow"); break;
        }
        $data = Chemicalchecking::whereBetween("created_at", [$time_start, $time_end])
            ->select(DB::raw('
                    round(avg(`Kapur`), 2)          `Kapur`,
                    round(avg(`Belerang`), 2)       `Belerang`,
                    round(avg(`Flocculant`), 2)     `Flocculant`,
                    round(avg(`NaOH`), 2)           `NaOH`,
                    round(avg(`B894`), 2)           `B894`,
                    round(avg(`B895`), 2)           `B895`,
                    round(avg(`B210`), 2)           `B210`,
                    round(avg(`Blotong`), 2)        `Blotong`
            '))->first();
        return $data;
    }
}
