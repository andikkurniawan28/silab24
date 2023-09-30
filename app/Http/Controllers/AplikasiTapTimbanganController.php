<?php

namespace App\Http\Controllers;

use App\Models\Rit;
use App\Models\Posbrix;
use App\Models\AriSampling;
use Illuminate\Http\Request;

class AplikasiTapTimbanganController extends Controller
{
    public function index(){
        return view('aplikasi.tap_timbangan');
    }

    public function process(Request $request){
        $rfid = $request->rfid;
        $data = Rit::generateDataFromPdeApi($request->rfid);
        if(Rit::where('spta', $data['spta'])->count() > 0){
            Rit::where('spta', $data['spta'])->update([
                'rfid' => $request->rfid,
                'barcode_antrian' => $data['barcode_antrian'],
                'register' => $data['register'],
                'nopol' => $data['nopol'],
                'petani' => $data['nama_petani'],
                'kud_id' => $data['kud'],
                'pospantau_id' => $data['pospantau'],
                'wilayah_id' => $data['wilayah'],
                'category' => 'EK',
            ]);
            $rit_id = Rit::where('rfid', $request->rfid)->get()->last()->id;
            if(AriSampling::where('rit_id', $rit_id)->count() == 0){
                AriSampling::insert([
                    'rit_id' => $rit_id,
                    'user_id' => Auth()->user()->id,
                    'category' => 'EK',
                ]);
            }
            else {
                return view('aplikasi.tap_sudah_ari_ek');
            }
            return view('aplikasi.tap_sukses');
        }
        else
        {
            $posbrix_id = Posbrix::where('spta', $data['spta'])->get()->last()->id;
            Rit::insert([
                'spta' => $data['spta'],
                'rfid' => $request->rfid,
                'barcode_antrian' => $data['barcode_antrian'],
                'register' => $data['register'],
                'nopol' => $data['nopol'],
                'petani' => $data['nama_petani'],
                'kud_id' => $data['kud'],
                'pospantau_id' => $data['pospantau'],
                'wilayah_id' => $data['wilayah'],
                'posbrix_id' => $posbrix_id,
                'category' => 'EK',
            ]);
            $rit_id = Rit::where('rfid', $request->rfid)->get()->last()->id;
            if(AriSampling::where('rit_id', $rit_id)->count() == 0){
                AriSampling::insert([
                    'rit_id' => $rit_id,
                    'user_id' => Auth()->user()->id,
                    'category' => 'EK',
                ]);
            }
            else {
                return view('aplikasi.tap_sudah_ari_ek');
            }

            return view('aplikasi.tap_sukses');
        }
    }

    public function tap_sukses(){
        return view('aplikasi.tap_sukses');
    }

    public function process_alt(Request $request){

        // Simpan data ke table rits
        $data = Rit::generateDataFromPdeApi($request->rfid);
        $count_this_spta_on_rits = self::count_rits_by_spta($data['spta']);
        if($count_this_spta_on_rits == 0){
            self::make_new_rit($request, $data);
        } else {
            self::update_rit($request, $data);
        }

        // Simpan data ke table ari_samplings
        $rit_id = self::find_rit_id($data['spta']);
        $count_this_rit_on_ari_sampling = self::count_ari_sampling_by_rit($rit_id);
        if($count_this_rit_on_ari_sampling == 0){
            self::make_new_ari_sampling($rit_id);
            return view('aplikasi.tap_sukses');
        } else {
            return view('aplikasi.tap_sudah_ari_ek');
        }

    }

    public static function find_posbrix_id($spta){
        return Posbrix::where('spta', $spta)->get()->last()->id;
    }

    public static function find_rit_id($spta){
        return Rit::where('spta', $spta)->get()->last()->id;
    }

    public static function count_rits_by_spta($spta){
        return Rit::where('spta', $spta)->count();
    }

    public static function count_ari_sampling_by_rit($rit_id){
        return AriSampling::where('rit_id', $rit_id)->count();
    }

    public static function make_new_rit(Request $request, $data){
        $posbrix_id = self::find_posbrix_id($data['spta']);
        Rit::insert([
            'category' => 'EK',
            'spta' => $data['spta'],
            'rfid' => $request->rfid,
            'barcode_antrian' => $data['barcode_antrian'],
            'register' => $data['register'],
            'nopol' => $data['nopol'],
            'petani' => $data['nama_petani'],
            'kud_id' => $data['kud'],
            'pospantau_id' => $data['pospantau'],
            'wilayah_id' => $data['wilayah'],
            'posbrix_id' => $posbrix_id,
        ]);
    }

    public static function update_rit(Request $request, $data){
        Rit::where('spta', $data['spta'])->update([
            'category' => 'EK',
            'rfid' => $request->rfid,
            'barcode_antrian' => $data['barcode_antrian'],
            'register' => $data['register'],
            'nopol' => $data['nopol'],
            'petani' => $data['nama_petani'],
            'kud_id' => $data['kud'],
            'pospantau_id' => $data['pospantau'],
            'wilayah_id' => $data['wilayah'],
        ]);
    }

    public static function make_new_ari_sampling($rit_id){
        AriSampling::insert([
            'rit_id' => $rit_id,
            'user_id' => Auth()->user()->id,
            'category' => 'EK',
        ]);
    }
}
