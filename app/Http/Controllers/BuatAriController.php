<?php

namespace App\Http\Controllers;

use App\Models\Ari;
use App\Models\Rit;
use App\Models\CoreSample;
use App\Models\AriSampling;
use Illuminate\Http\Request;

class BuatAriController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($barcode_antrian)
    {
        $spta               = self::cariSpta($barcode_antrian);
        $rit_id             = self::cariRit($spta);
        $ari_sampling_id    = self::cariAriSampling($rit_id);
        $ari                = self::prepareAri($ari_sampling_id);
        self::buatAri($ari);
        return $ari_sampling_id;
    }

    public static function cariSpta($barcode_antrian){

        $url = 'http://192.168.20.45:8111/antrian/info/';
        $request_url = $url . $barcode_antrian;
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [ 'authorization:PGKBA2023' ]);
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        if($response != 'Internal Server Error'){
            $data = json_decode($response, true);
        }
        else{
            $data['spta'] = NULL;
        }

        return $data["spta"];
    }

    public static function cariRit($spta){
        return Rit::where("spta", $spta)->get()->last()->id;
    }

    public static function cariAriSampling($rit_id){
        return AriSampling::where("rit_id", $rit_id)->get()->last()->id;
    }

    public static function generatePercentPol($yield, $pbrix){
        return (($yield / 0.7) + (0.5 * $pbrix)) / (1 + 0.5);
    }

    public static function generateRandomFloat(float $minValue, float $maxValue): float {
        return $minValue + mt_rand() / mt_getrandmax() * ($maxValue - $minValue);
    }

    public static function prepareAri($ari_sampling_id){
        $seed["ari_sampling_id"]= $ari_sampling_id;
        $seed["category"]       = "AD";
        $seed["pbrix"]          = number_format(self::generateRandomFloat(18, 21), 2);
        $seed["yield"]          = number_format(self::generateRandomFloat(7.5, 9.5), 2);
        $seed["pol"]            = number_format(self::generateRandomFloat(45, 75), 2);
        $seed["ppol"]           = number_format(self::generatePercentPol($seed["yield"], $seed["pbrix"]), 2);
        $seed["created_at"]     = "2023-04-01 06:00";
        $seed["updated_at"]     = "2023-04-01 06:00";
        $seed["user_id"]        = 1;
        return $seed;
    }

    public static function buatAri($data){
        Ari::insert($data);
    }
}
