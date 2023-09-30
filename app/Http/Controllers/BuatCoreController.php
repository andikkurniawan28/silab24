<?php

namespace App\Http\Controllers;

use App\Models\Rit;
use App\Models\CoreSample;
use App\Models\AriSampling;
use Illuminate\Http\Request;

class BuatCoreController extends Controller
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
        if($ari_sampling_id == NULL){
            $ari_sampling_id = self::buatAriSampling($rit_id, $barcode_antrian);
        }
        $core               = self::prepareCore($ari_sampling_id);
        self::buatCore($core);
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
        return AriSampling::where("rit_id", $rit_id)->get()->last()->id ?? NULL;
    }

    public static function buatAriSampling($rit_id, $barcode_antrian){
        $created_at = Rit::whereId($rit_id)->get()->last()->created_at;

        AriSampling::insert([
            "rit_id"        => $rit_id,
            "user_id"       => 1,
            "category"      => "AD",
            "created_at"    => $created_at,
            "updated_at"    => $created_at,
        ]);

        Rit::whereId($rit_id)->update([
            "barcode_antrian"   => $barcode_antrian,
            "updated_at"        => "2023-04-01 06:00",
        ]);

        return AriSampling::where("rit_id", $rit_id)->get()->last()->id;
    }

    public static function generatePercentPol($yield, $pbrix){
        return (($yield / 0.7) + (0.5 * $pbrix)) / (1 + 0.5);
    }

    public static function generateRandomFloat(float $minValue, float $maxValue): float {
        return $minValue + mt_rand() / mt_getrandmax() * ($maxValue - $minValue);
    }

    public static function prepareCore($ari_sampling_id){
        $created_at = AriSampling::whereId($ari_sampling_id)->get()->last()->created_at;

        $seed["ari_sampling_id"]= $ari_sampling_id;
        $seed["category"]       = "AD";
        $seed["pbrix"]          = number_format(self::generateRandomFloat(15, 19), 2);
        $seed["yield"]          = number_format(self::generateRandomFloat(5.5, 8.5), 2);
        $seed["pol"]            = number_format(self::generateRandomFloat(35, 60), 2);
        $seed["ppol"]           = number_format(self::generatePercentPol($seed["yield"], $seed["pbrix"]), 2);
        $seed["created_at"]     = $created_at;
        $seed["updated_at"]     = $created_at;
        $seed["user_id"]        = 1;
        return $seed;
    }

    public static function buatCore($data){
        CoreSample::insert($data);
    }
}
