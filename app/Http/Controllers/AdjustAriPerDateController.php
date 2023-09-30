<?php

namespace App\Http\Controllers;

use App\Models\Ari;
use App\Models\Station;
use Illuminate\Http\Request;

class AdjustAriPerDateController extends Controller
{
    public function index(){
        $stations = Station::all();
        return view("adjust_ari.index", compact("stations"));
    }

    public function process(Request $request){
        $ari_all = self::getAriByDate($request);
        foreach($ari_all as $ari){
            $ari->rendemen_after = self::addRendemenWith($request->addition, $ari->id);
            $ari->pol_after = self::generatePercentPol($ari->rendemen_after, $ari->pbrix);
            self::updateRendemenAndPol($ari->rendemen_after, $ari->pol_after, $ari->id);
        }
        return redirect()->back()->with("success", "Rendemen ARI has been updated!");
    }

    public static function getAriByDate($request){
        $date_start = $request->date;
        $date_end = date("Y-m-d", strtotime($date_start . "+24 hours"));
        return Ari::where("created_at", ">=", $date_start." 06:00:00")
            ->where("created_at", "<", $date_end." 06:00:00")
            ->get();
    }

    public static function getAriIdByDate($request){
        $date_start = $request->date;
        $date_end = date("Y-m-d", strtotime($date_start . "+24 hours"));
        return Ari::where("created_at", ">=", $date_start." 06:00:00")
            ->where("created_at", "<", $date_end." 06:00:00")
            ->select("id")
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

    public static function generatePercentPol($yield, $pbrix){
        return (($yield / 0.7) + (0.5 * $pbrix)) / (1 + 0.5);
    }

    public static function updateRendemenAndPol($rendemen, $pol, $ari_id){
        Ari::whereId($ari_id)->update([
            "ppol" => $pol,
            "yield" => $rendemen,
        ]);
    }
}
