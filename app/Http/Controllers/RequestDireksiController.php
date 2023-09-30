<?php

namespace App\Http\Controllers;

use App\Models\CoreSample;
use App\Models\AriSampling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestDireksiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($table)
    {
        $data = self::getId($table);
        for($i = 0; $i < count($data); $i++){
            $seed = self::prepare();
            if($table == "ari") self::seeding("aris", $data[$i]["id"], $seed);
            else self::seeding("core_samples", $data[$i]["id"], $seed);
        }
        return $data;
    }

    public static function getId($table){
        return AriSampling::doesntHave($table)
            ->where("created_at", "<", "2023-09-20 06:00")
            ->where("created_at", ">=", "2023-09-19 06:00")
            ->orderBy("id", "desc")->select(["id"])
            ->get();
    }

    public static function prepare(){
        $seed["pbrix"]  = number_format(self::generateRandomFloat(18, 19), 2);
        $seed["yield"]  = number_format(self::generateRandomFloat(4.5, 7.5), 2);
        $seed["pol"]    = number_format(self::generateRandomFloat(45, 75), 2);
        $seed["ppol"]   = number_format(self::generatePercentPol($seed["yield"], $seed["pbrix"]), 2);
        return $seed;
    }

    public static function seeding($table, $data, $seed){
        DB::table($table)->insert([
            'user_id'           => 1,
            'category'          => "AD",
            'ari_sampling_id'   => $data,
            'pbrix'             => $seed["pbrix"],
            'ppol'              => $seed["ppol"],
            'pol'               => $seed["pol"],
            'yield'             => $seed["yield"],
            'created_at'        => "2023-09-19 06:00",
            'updated_at'        => "2023-09-19 06:00",
        ]);
    }

    public static function generatePercentPol($yield, $pbrix){
        return (($yield / 0.7) + (0.5 * $pbrix)) / (1 + 0.5);
    }

    public static function generateRandomFloat(float $minValue, float $maxValue): float {
        return $minValue + mt_rand() / mt_getrandmax() * ($maxValue - $minValue);
    }

}
