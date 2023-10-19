<?php

namespace App\Http\Controllers;

use App\Models\PDE;
use App\Models\Posbrix;
use App\Models\Station;
use App\Models\CoreSample;
use Illuminate\Http\Request;

class CoreSampleSamplingController extends Controller
{
    public function index(){
        $stations = Station::all();
        $core_sample = CoreSample::where("pbrix", NULL)->where("ppol", NULL)->where("rendemen", NULL)->get();
        return view("core_sample.create2", compact("stations", "core_sample"));
    }

    public function process(Request $request){
        // $data = PDE::processRfid($request);
        $data = PDE::processAntrian($request);
        $posbrix_id = Posbrix::where("spta", $data["spta"])->get()->last()->id ?? "NOT FOUND!";
        if($posbrix_id == "NOT FOUND!"){
            $posbrix_id = self::createNewPosbrix($request, $data);
            self::createNewCoreSample($request, $posbrix_id);
        } else {
            Posbrix::whereId($posbrix_id)->update($data);
            if(CoreSample::where("posbrix_id", $posbrix_id)->count("id") == 0){
                self::createNewCoreSample($request, $posbrix_id);
            }
        }
        return redirect()->back()->with("success", "Sukses!");
    }

    public static function createNewPosbrix($request, $data){
        Posbrix::create([
            "user_id"           => $request->user_id,
            "spta"              => $data["spta"],
            "is_accepted"       => 3,       // Lolos
            "brix"              => 15,
            "variety_id"        => 10,      // BL
            "kawalan_id"        => 1,       // Non VMA
            "category"          => "CS",    // Core Sample
            "barcode_antrian"   => $data["barcode_antrian"],
            "register"          => $data["register"],
            "nopol"             => $data["nopol"],
            "nama_petani"       => $data["nama_petani"],
        ]);
        return Posbrix::where("spta", $data["spta"])->get()->last()->id;
    }

    public static function createNewCoreSample($request, $posbrix_id){
        CoreSample::create([
            "user_id"       => $request->user_id,
            "posbrix_id"    => $posbrix_id,
        ]);
    }
}
