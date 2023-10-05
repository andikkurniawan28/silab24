<?php

namespace App\Http\Controllers;

use App\Models\Ari;
use App\Models\Rit;
use App\Models\Dirt;
use App\Models\Score;
use App\Models\Sample;
use App\Models\Posbrix;
use App\Models\Station;
use App\Models\Analysis;
use App\Models\CoreSample;
use App\Models\AriSampling;
use Illuminate\Http\Request;

class ScoringController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $rendemen_npp = Analysis::where("material_id", 3)
            ->where("created_at", ">=", session("time_start"))
            ->where("created_at", "<", session("time_end"))
            ->avg("%R");

        $mbs = self::prepare(session("date"));

        for($i=0; $i<count($mbs); $i++){
            $scores[$i]["tgl_daftar"] = $mbs[$i]["tgl_daftar"];
            $scores[$i]["antrian"] = $mbs[$i]["no_antrian"];
            $scores[$i]["mbs_name"] = $mbs[$i]["mbs_name"];
            $scores[$i]["core"] = Posbrix::where("barcode_antrian", $scores[$i]["antrian"])->get()->last()->core_sample->rendemen ?? 0;
            $scores[$i]["mini"] = Posbrix::where("barcode_antrian", $scores[$i]["antrian"])->get()->last()->ari->rendemen ?? 0;
            $scores[$i]["ari"] = number_format(0.05 * $scores[$i]["core"] + 0.95 * $scores[$i]["mini"], 2);
            $scores[$i]["delta_npp"] = $scores[$i]["ari"] - $rendemen_npp;
            $scores[$i]["rp"] = number_format(self::tentukanRewardOrPunishment($scores[$i]["ari"], $rendemen_npp),2);
            $scores[$i]["rafaksi"] = self::rafaksi($scores[$i]["mbs_name"]);
            $scores[$i]["rafaksi_terkoreksi"] = $scores[$i]["rafaksi"] + $scores[$i]["rp"];
        }
        $stations = Station::all();
        $dirts = Dirt::all();
        return view("scoring.index", compact("scores", "stations", "dirts"));
    }

    public static function prepare($date){
        $url = "http://192.168.20.45:8111/getmejatebu/".$date;
        $request_url = $url;
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [ "authorization:PGKBA2023" ]);
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        return $data;
    }

    public static function prepare2($antrian){
        $url = "http://192.168.20.45:8111/antrian/info/";
        $request_url = $url;
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [ "authorization:PGKBA2023" ]);
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        return $data["spta"];
    }

    public static function tentukanRewardOrPunishment($rendemen_ari, $rendemen_npp){
        $delta = $rendemen_ari - $rendemen_npp;
        if($delta > 1.00){
            return -0.15;
        }
        elseif($delta > 0.50 && $delta <= 1.00){
            return -0.10;
        }
        elseif($delta > 0.00 && $delta <= 0.50){
            return -0.05;
        }
        elseif($delta > -0.50 && $delta <= 0.00){
            return +0.05;
        }
        elseif($delta > -1.00 && $delta <= -0.50){
            return +0.10;
        }
        elseif($delta <= -1.00){
            return +0.15;
        }
    }

    public static function rafaksi($mbs_name){
        if($mbs_name == "MBS M"): return 0; endif;
        if($mbs_name == "DDK"): return 2; endif;
        if($mbs_name == "AKR"): return 2; endif;
        if($mbs_name == "TPCK"): return 2; endif;
        if($mbs_name == "PUCUK"): return 4; endif;
        if($mbs_name == "SGL"): return 4; endif;
    }

    public static function time($date){
        $data["current"] = $date." 06:00";
        $data["yesterday"] = date("Y-m-d H:i", strtotime($data["current"] . "-24 hours"));
        return $data;
    }
}
