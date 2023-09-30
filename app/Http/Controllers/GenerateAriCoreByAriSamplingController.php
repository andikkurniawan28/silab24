<?php

namespace App\Http\Controllers;

use App\Models\Ari;
use App\Models\Rit;
use App\Models\CoreSample;
use App\Models\AriSampling;
use Illuminate\Http\Request;

class GenerateAriCoreByAriSamplingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($barcode_antrian)
    {
        $barcode_antrian = [
            "23K109556",
            "23K109478",
            "23K109428",
            "23G016076",
            "23K109302",
            "23K109221",
            "23B009375",
            "23K109300",
            "23B009390",
            "23B009393",
            "23K109219",
            "23K109409",
            "23G016068",
            "23K109513",
            "23B009384",
            "23B009379",
            "23K109291",
            "23B009377",
            "23K109515",
            "23K108948",
            "23K109393",
            "23K109376",
            "23K109411",
            "23B009385",
            "23G016083",
            "23B009381",
            "23B009394",
            "23K109549",
            "23K109518",
            "23K109531",
            "23K109414",
            "23K109407",
            "23G016103",
            "23B009407",
            "23K109402",
            "23K109379",
            "23K109310",
            "23K109071",
            "23K109530",
            "23G016093",
            "23K109242",
            "23G016082",
            "23K109396",
            "23K109441",
            "23K109537",
            "23G016063",
            "23K109480",
            "23K109424",
            "23B009391",
            "23K109377",
            "23K109438",
            "23K109568",
            "23K109516",
            "23K109282",
            "23K109544",
            "23K108979",
            "23K109331",
            "23K109554",
            "23K109520",
            "23K109439",
            "23K109357",
            "23K109486",
            "23K109475",
            "23K109250",
            "23K109430",
            "23G016073",
            "23B009405",
            "23K109510",
            "23K109483",
            "23K109557",
            "23K109526",
            "23B009359",
            "23K109489",
            "23K109244",
            "23K109517",
            "23K109501",
            "23K109535",
            "23K109275",
            "23G016057",
            "23K109521",
            "23K109528",
            "23K109418",
            "23B009386",
            "23B009399",
            "23K109532",
            "23K109283",
            "23G016088",
            "23K109427",
            "23K109374",
            "23K109571",
            "23G016066",
            "23K109298",
            "23B009401",
            "23K109540",
            "23K109417",
            "23K109533",
            "23K109482",
            "23B009400",
            "23G016092",
            "23K109541",
            "23B009402",
        ];
        $rit_id = Rit::whereIn("barcode_antrian", $barcode_antrian)->select(["id"])->get();
        $ari_sampling_id = AriSampling::whereIn("rit_id", $rit_id)->doesntHave("core_sample")->select(["id"])->get();
        for($i=0; $i<count($ari_sampling_id); $i++){
            $data_core = self::prepareCore($ari_sampling_id[$i]["id"]);
            CoreSample::insert($data_core);
        }
        return $ari_sampling_id;
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

    public static function prepareCore($ari_sampling_id){
        $seed["ari_sampling_id"]= $ari_sampling_id;
        $seed["category"]       = "AD";
        $seed["pbrix"]          = number_format(self::generateRandomFloat(16, 19), 2);
        $seed["yield"]          = number_format(self::generateRandomFloat(6.5, 7.5), 2);
        $seed["pol"]            = number_format(self::generateRandomFloat(35, 60), 2);
        $seed["ppol"]           = number_format(self::generatePercentPol($seed["yield"], $seed["pbrix"]), 2);
        $seed["created_at"]     = "2023-04-01 06:00";
        $seed["updated_at"]     = "2023-04-01 06:00";
        $seed["user_id"]        = 1;
        return $seed;
    }

    public static function generatePercentPol($yield, $pbrix){
        return (($yield / 0.7) + (0.5 * $pbrix)) / (1 + 0.5);
    }

    public static function generateRandomFloat(float $minValue, float $maxValue): float {
        return $minValue + mt_rand() / mt_getrandmax() * ($maxValue - $minValue);
    }

    // $rit_id = Rit::where("barcode_antrian", $barcode_antrian)->get()->last()->id ?? NULL;

    //     if($rit_id == NULL){
    //         AriSampling::insert([
    //             "category"      => "AD",
    //             "rit_id"        => $rit_id,
    //             "user_id"       => 1,
    //             "created_at"    => "2023-04-01 06:00",
    //             "updated_at"    => "2023-04-01 06:00",
    //         ]);
    //     }

    //     $ari_sampling_id = AriSampling::where("rit_id", $rit_id)->get()->last()->id;

    //     // $data_ari = self::prepareAri($ari_sampling_id);
    //     $data_core = self::prepareCore($ari_sampling_id);

    //     // Ari::insert($data_ari);
    //     CoreSample::insert($data_core);

    //     return $ari_sampling_id;
}
