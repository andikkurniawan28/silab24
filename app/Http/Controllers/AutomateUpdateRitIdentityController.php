<?php

namespace App\Http\Controllers;

use App\Models\Rit;
use Illuminate\Http\Request;

class AutomateUpdateRitIdentityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $spta = Rit::where('barcode_antrian', NULL)->select('spta')->orderBy('id', 'desc')->get();
        $barcode_antrian = self::get_barcode_antrian_from_spta($spta);
        return self::update_rit($barcode_antrian);
    }

    public static function get_barcode_antrian_from_spta($spta){
        $barcode_antrian = $spta;
        return $barcode_antrian;
    }

    public static function update_rit($barcode_antrian){
        $url = 'http://192.168.20.45:8111/antrian/info/';
        $request_url = $url.$barcode_antrian;
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [ 'authorization:PGKBA2023' ]);
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);
        Rit::where('barcode_antrian', $barcode_antrian)->update([
            'register' => $data['register'],
            'nopol' => $data['nopol'],
            'petani' => $data['nama_petani'],
            'rfid' => $data['rfid'],
            'kud_id' => Rit::findKud($data['register']),
            'pospantau_id' => Rit::findPospantau($data['register']),
            'wilayah_id' => Rit::findWilayah($data['register']),
        ]);
        return $data;
    }




}
