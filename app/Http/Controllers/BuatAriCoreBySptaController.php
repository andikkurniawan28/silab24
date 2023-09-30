<?php

namespace App\Http\Controllers;

use App\Models\Ari;
use App\Models\Rit;
use App\Models\CoreSample;
use App\Models\AriSampling;
use Illuminate\Http\Request;

class BuatAriCoreBySptaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($spta, $barcode_antrian, $date)
    {
        self::updateRit($spta, $barcode_antrian, $date);
        self::buatData($barcode_antrian, $date);
        return "sukses";
    }

    public static function updateRit($spta, $barcode_antrian, $date){
        $rit_id = Rit::where("spta", $spta)->get()->last()->id;
        Rit::whereId($rit_id)->update([
            "barcode_antrian"   => $barcode_antrian,
            "updated_at"        => "{$date} 06:00",
        ]);
    }

    public static function buatData($barcode_antrian, $date){
        $rit_id = Rit::where("barcode_antrian", $barcode_antrian)->get()->last()->id;
        AriSampling::insert([
            "category"      => "AD",
            "rit_id"        => $rit_id,
            "user_id"       => 1,
            "created_at"    => "{$date} 06:00",
            "updated_at"    => "{$date} 06:00",
        ]);

        $ari_sampling_id = AriSampling::where("rit_id", $rit_id)->get()->last()->id;

        $data_ari = self::prepareAri($date, $ari_sampling_id);
        $data_core = self::prepareCore($date, $ari_sampling_id);

        Ari::insert($data_ari);
        CoreSample::insert($data_core);
    }

    public static function prepareAri($date, $ari_sampling_id){
        $seed["ari_sampling_id"]= $ari_sampling_id;
        $seed["category"]       = "AD";
        $seed["pbrix"]          = number_format(self::generateRandomFloat(18, 21), 2);
        $seed["yield"]          = number_format(self::generateRandomFloat(7.5, 9.5), 2);
        $seed["pol"]            = number_format(self::generateRandomFloat(45, 75), 2);
        $seed["ppol"]           = number_format(self::generatePercentPol($seed["yield"], $seed["pbrix"]), 2);
        $seed["created_at"]     = "{$date} 06:00";
        $seed["updated_at"]     = "{$date} 06:00";
        $seed["user_id"]        = 1;
        return $seed;
    }

    public static function prepareCore($date, $ari_sampling_id){
        $seed["ari_sampling_id"]= $ari_sampling_id;
        $seed["category"]       = "AD";
        $seed["pbrix"]          = number_format(self::generateRandomFloat(16, 19), 2);
        $seed["yield"]          = number_format(self::generateRandomFloat(6.5, 8.5), 2);
        $seed["pol"]            = number_format(self::generateRandomFloat(35, 60), 2);
        $seed["ppol"]           = number_format(self::generatePercentPol($seed["yield"], $seed["pbrix"]), 2);
        $seed["created_at"]     = "{$date} 06:00";
        $seed["updated_at"]     = "{$date} 06:00";
        $seed["user_id"]        = 1;
        return $seed;
    }

    public static function generatePercentPol($yield, $pbrix){
        return (($yield / 0.7) + (0.5 * $pbrix)) / (1 + 0.5);
    }

    public static function generateRandomFloat(float $minValue, float $maxValue): float {
        return $minValue + mt_rand() / mt_getrandmax() * ($maxValue - $minValue);
    }
}
