<?php

namespace App\Http\Controllers;

use App\Models\Ari;
use App\Models\Rit;
use App\Models\AriSampling;
use Illuminate\Http\Request;

class MumetController2 extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $rit = Rit::where("barcode_antrian", NULL)->orderBy("id", "asc")->limit(300)->select(["id", "spta"])->get();
        for($i=0; $i < count($rit); $i++){
            $rit[$i]["barcode_antrian"] = self::getAntrian($rit[$i]["spta"]);
            $rit[$i]["updated_at"]      = "2023-04-01 06:00:00";
            Rit::whereId($rit[$i]["id"])->update([
                "barcode_antrian" => $rit[$i]["barcode_antrian"],
                "updated_at" => $rit[$i]["updated_at"],
            ]);
        }
        return $rit;
    }

    public static function getAntrian($spta){
        $url = 'http://192.168.20.45:8111/spta/info/';
        $request_url = $url . $spta;
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [ 'authorization:PGKBA2023' ]);
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        return $data["barcode_antrian"];
    }
}
