<?php

namespace App\Http\Controllers;

use App\Models\Ari;
use App\Models\Rit;
use App\Models\AriSampling;
use Illuminate\Http\Request;

class FixAriController extends Controller
{
    public function index(){
        return self::handle2();
    }

    public static function generateYield(){
        $range = [5.70, 5.71, 5.72, 5.73, 5.74, 5.75];
        $random_yield = array_rand($range);
        return $range[$random_yield];
    }

    public static function handle1(){
        $aris_id = Ari::where("created_at", ">=", "2023-05-27 06:00:00")
            ->where("created_at", "<", "2023-05-28 06:00:00")
            // ->where("yield", "<", 5.13)
            ->where("yield", ">", 8.23)
            ->select("id")
            ->get();

        $aris = Ari::where("created_at", ">=", "2023-05-27 06:00:00")
            ->where("created_at", "<", "2023-05-28 06:00:00")
            // ->where("yield", "<", 5.13)
            ->where("yield", ">", 8.23)
            ->get();

        foreach($aris as $ari){
            // $ppol_koreksi = $ari->ppol * 0.96;
            // $ppol_koreksi = self::generatePercentPol(5.13, $ari->pbrix);
            $ppol_koreksi = self::generatePercentPol(8.23, $ari->pbrix);
            $yield_koreksi = self::generateYieldByPpol($ari->pbrix, $ppol_koreksi);
            Ari::whereId($ari->id)->update([
                "ppol" => $ppol_koreksi,
                "yield" => $yield_koreksi,
            ]);
        }

        $aris_after = Ari::whereIn("id", $aris_id)->select(["id", "yield"])->get();

        return $aris_after;
    }

    public static function handle2(){
        $ari_all = self::getAriByDate("2023-06-18", "2023-06-19");
        foreach($ari_all as $ari){
            $ari->rendemen_after = self::addRendemenWith(0.09, $ari->id);
            $ari->pol_after = self::generatePercentPol($ari->rendemen_after, $ari->pbrix);
            self::updateRendemenAndPol($ari->rendemen_after, $ari->pol_after, $ari->id);
        }
        return $ari_all;
    }

    public static function getAriIdByDate($date_start, $date_end){
        return Ari::where("created_at", ">=", $date_start." 06:00:00")
            ->where("created_at", "<", $date_end." 06:00:00")
            ->select("id")
            ->get();
    }

    public static function getAriByDate($date_start, $date_end){
        return Ari::where("created_at", ">=", $date_start." 06:00:00")
            ->where("created_at", "<", $date_end." 06:00:00")
            ->get();
    }

    public static function addRendemenWith($addition, $ari_id){
        $rendemen_before = self::getRendemenFromAriId($ari_id);
        $rendemen_after = $rendemen_before + $addition;
        return $rendemen_after;
    }

    public static function getRendemenFromAriId($ari_id){
        return Ari::whereId($ari_id)->get()->last()->yield;
    }

    public static function getBrixFromAriId($ari_id){
        return Ari::whereId($ari_id)->get()->last()->pbrix;
    }

    public static function generatePercentPol($yield, $pbrix){
        return (($yield / 0.7) + (0.5 * $pbrix)) / (1 + 0.5);
    }

    public static function generateYieldByPpol($pbrix, $ppol){
	    return 0.7 * ($ppol - 0.5 * ($pbrix - $ppol));
    }

    public static function updateRendemenAndPol($rendemen, $pol, $ari_id){
        Ari::whereId($ari_id)->update([
            "ppol" => $pol,
            "yield" => $rendemen,
        ]);
    }

    public static function selectRitIdWhereBarcodeAntrian($barcode_antrian){
        return Rit::whereIn("barcode_antrian", $barcode_antrian)->select("id")->get();
    }

    public static function selectAriSamplingIdWhereRitId($rit_id){
        return AriSampling::whereIn("rit_id", $rit_id)->select("id")->get();
    }

    public static function selectAriWhereAriSamplingId($ari_sampling_id){
        return Ari::whereIn("ari_sampling_id", $ari_sampling_id)->get();
    }

    public static function varyAry($date){
        $date_next = date("Y-m-d", strtotime($date . "+1 day"));
        $ari = self::getAriByDate($date, $date_next);
        foreach($ari as $aris){
            $duplication = self::findDuplicate($aris, $date, $date_next);
            if($duplication > 0){
                $aris->where = self::whereDuplicate($aris, $date, $date_next);
            }
            $aris->duplicate = self::findDuplicate($aris, $date, $date_next);
        }
        return view("vary_ari.index", compact("ari", "date"));
    }

    public static function findDuplicate($aris, $date, $date_next){
        return Ari::where("pbrix", "=", $aris->pbrix)
            ->where("ppol", "=", $aris->ppol)
            ->where("id", "!=", $aris->id)
            ->where("created_at", ">=", $date." 06:00")
            ->where("created_at", "<", $date_next." 06:00")
            ->count();
    }

    public static function whereDuplicate($aris, $date, $date_next){
        return Ari::where("pbrix", $aris->pbrix)
            ->where("ppol", $aris->ppol)
            ->where("id", "!=", $aris->id)
            ->where("created_at", ">=", $date." 06:00")
            ->where("created_at", "<", $date_next." 06:00")
            ->get()
            ->last()
            ->id;
    }

    public static function addOnePointAri($ari_id){
        $aris = Ari::whereId($ari_id)->get()->last();
        $yield_corrected = $aris->yield + 0.051965;
        $pol_corrected = self::generatePercentPol($yield_corrected, $aris->pbrix);
        self::updateRendemenAndPol($yield_corrected, $pol_corrected, $ari_id);
    }

    public static function checkAverage($date){
        $date_next = date("Y-m-d", strtotime($date . "+1 day"));
        $ari_id = Ari::where("created_at", ">=", $date." 06:00:00")
            ->where("created_at", "<", $date_next." 06:00:00")
            ->select("ari_sampling_id")
            ->get();

        $ari["cs"] = AriSampling::whereIn("id", $ari_id)
            ->where("category", "CS")
            ->select("id")
            ->get();

        $ari["eb"] = AriSampling::whereIn("id", $ari_id)
            ->where("category", "EB|GD")
            ->select("id")
            ->get();

        $ari["ek"] = AriSampling::whereIn("id", $ari_id)
            ->where("category", "EK")
            ->select("id")
            ->get();

        $average["cs"]["pbrix"] = Ari::whereIn("ari_sampling_id", $ari["cs"])->average("pbrix");
        $average["cs"]["ppol"] = Ari::whereIn("ari_sampling_id", $ari["cs"])->average("ppol");
        $average["cs"]["yield"] = Ari::whereIn("ari_sampling_id", $ari["cs"])->average("yield");

        $average["eb"]["pbrix"] = Ari::whereIn("ari_sampling_id", $ari["eb"])->average("pbrix");
        $average["eb"]["ppol"] = Ari::whereIn("ari_sampling_id", $ari["eb"])->average("ppol");
        $average["eb"]["yield"] = Ari::whereIn("ari_sampling_id", $ari["eb"])->average("yield");

        $average["ek"]["pbrix"] = Ari::whereIn("ari_sampling_id", $ari["ek"])->average("pbrix");
        $average["ek"]["ppol"] = Ari::whereIn("ari_sampling_id", $ari["ek"])->average("ppol");
        $average["ek"]["yield"] = Ari::whereIn("ari_sampling_id", $ari["ek"])->average("yield");

        // return Ari::whereIn("ari_sampling_id", $id)->avg("pbrix");
        return $average;
    }

}
