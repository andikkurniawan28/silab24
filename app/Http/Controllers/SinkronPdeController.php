<?php

namespace App\Http\Controllers;

use App\Models\Kud;
use App\Models\Posbrix;
use App\Models\Wilayah;
use App\Models\Pospantau;
use Illuminate\Http\Request;

class SinkronPdeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $posbrix = Posbrix::where("barcode_antrian", NULL)->limit(100)->get();

        foreach($posbrix as $posbrix){
            $barcode_antrian = self::getAntrian($posbrix->spta) ?? "Not found!";
            if($barcode_antrian != "Not found!"){
                $data = self::getData($barcode_antrian);
                Posbrix::whereId($posbrix->id)->update($data);
            }
        }

        return view("sinkron_pde.index");
    }

    public static function getAntrian($spta){
        $url = 'http://192.168.20.45:8111/spta/info/'.$spta;
        $request_url = $url;
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [ 'authorization:PGKBA2023' ]);
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        return $data["barcode_antrian"];
    }

    public static function getData($barcode_antrian){
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
            $data['kud_id'] = self::findKud($data['register']);
            $data['pospantau_id'] = self::findPospantau($data['register']);
            $data['wilayah_id'] = self::findWilayah($data['register']);
        }
        else {
            $data['spta'] = NULL;
            $data['barcode_antrian'] = NULL;
            $data['register'] = NULL;
            $data['nopol'] = NULL;
            $data['nama_petani'] = NULL;
            $data['kud_id'] = NULL;
            $data['pospantau_id'] = NULL;
            $data['wilayah_id'] = NULL;
        }
        return $data;
    }

    public static function findKud($register){
        $kud = substr($register, 0, 1);
        if(Kud::where('code', $kud)->count() > 0){
            return Kud::where('code', $kud)->get()->last()->id;
        } else {
            return NULL;
        }
    }

    public static function findPospantau($register){
        $pospantau = substr($register, 1, 1);
        if(Pospantau::where('code', $pospantau)->count() > 0){
            return Pospantau::where('code', $pospantau)->get()->last()->id;
        } else {
            return NULL;
        }
    }

    public static function findWilayah($register){
        $wilayah = substr($register, 2, 1);
        if(Wilayah::where('code', $wilayah)->count() > 0){
            return Wilayah::where('code', $wilayah)->get()->last()->id;
        } else {
            return NULL;
        }
    }
}
