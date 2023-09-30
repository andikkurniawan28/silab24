<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDE extends Model
{
    use HasFactory;

    public static function processAntrian($request){
        $url = 'http://192.168.20.45:8111/antrian/info/';
        $request_url = $url.$request->data;
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
            $data['barcode_antrian'] = NULL;
            $data['register'] = NULL;
            $data['nopol'] = NULL;
            $data['nama_petani'] = NULL;
        }
        return $data;
    }

    public static function processRfid($request){
        $url = 'http://192.168.20.45:8111/rfid/info/';
        $request_url = $url.$request->data;
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
            $data['barcode_antrian'] = NULL;
            $data['register'] = NULL;
            $data['nopol'] = NULL;
            $data['nama_petani'] = NULL;
        }
        return $data;
    }
}
