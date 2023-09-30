<?php

namespace App\Http\Controllers;

use App\Models\Rit;
use App\Models\AriSampling;
use Illuminate\Http\Request;

class ApiAriTimbanganController extends Controller
{
    public function index($rfid){
        $data = Rit::generateDataFromPdeApi($rfid);
        $count_data_from_rits_where_spta = self::countDataFromRitWhereSptaIs($data['spta']);
        if($count_data_from_rits_where_spta > 0){
            return self::updateRit($data, $rfid);
        }
        else {
            return self::createNewRit($data, $rfid);
        }
    }

    public static function updateRit($data, $rfid){
        $category = self::getCategoryFromPosbrix($data['spta']);
        Rit::where('spta', $data['spta'])->update([
            'rfid' => $rfid,
            'barcode_antrian' => $data['barcode_antrian'],
            'register' => $data['register'],
            'nopol' => $data['nopol'],
            'petani' => $data['nama_petani'],
            'kud_id' => $data['kud'],
            'pospantau_id' => $data['pospantau'],
            'wilayah_id' => $data['wilayah'],
            'category' => $category,
        ]);
        $rit_id = Rit::where('rfid', $rfid)->get()->last()->id;
        if(AriSampling::where('rit_id', $rit_id)->count() == 0){
            AriSampling::insert([
                'rit_id' => $rit_id,
                'user_id' => 1,
                'category' => $category,
            ]);
        }
        else {
            return response("Data ARI sudah ada di database", 200);
        }
        return response("Data berhasil disimpan", 200);
    }

    public static function createNewRit($data, $rfid){
        $posbrix_id = Posbrix::where('spta', $data['spta'])->get()->last()->id;
        $category = self::getCategoryFromPosbrix($data['spta']);
        Rit::insert([
            'spta' => $data['spta'],
            'rfid' => $rfid,
            'barcode_antrian' => $data['barcode_antrian'],
            'register' => $data['register'],
            'nopol' => $data['nopol'],
            'petani' => $data['nama_petani'],
            'kud_id' => $data['kud'],
            'pospantau_id' => $data['pospantau'],
            'wilayah_id' => $data['wilayah'],
            'posbrix_id' => $posbrix_id,
            'category' => $category,
        ]);
        $rit_id = Rit::where('rfid', $rfid)->get()->last()->id;
        if(AriSampling::where('rit_id', $rit_id)->count() == 0){
            AriSampling::insert([
                'rit_id' => $rit_id,
                'user_id' => 1,
                'category' => $category,
            ]);
        }
        else {
            return response("Data ARI sudah ada di database", 200);
        }
        return response("Data berhasil disimpan", 200);
    }

    public static function countDataFromRitWhereSptaIs($spta){
        return Rit::where('spta', $spta)->count();
    }

    public static function getCategoryFromPosbrix($spta){
        return Posbrix::where('spta', $spta)->get()->last()->category;
    }
}
