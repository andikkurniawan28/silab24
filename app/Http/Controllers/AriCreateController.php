<?php

namespace App\Http\Controllers;

use App\Models\Ari;
use App\Models\Posbrix;
use App\Models\Station;
use Illuminate\Http\Request;

class AriCreateController extends Controller
{
    public function index(){
        $stations = Station::all();
        return view("ari.create2", compact("stations"));
    }

    public function process(Request $request){
        $api_data = self::pde($request->rfid);
        $data["posbrix_id"] = Posbrix::where("spta", $api_data["spta"])->get()->last()->id;
        $data["user_id"] = $request->user_id;
        $data["category"] = "CS";
        Ari::insert($data);
        return redirect()->back()->with("success", "Data berhasil disimpan!");
    }

    public static function pde($rfid){

        $url = 'http://192.168.20.45:8111/rfid/info/';
        $request_url = $url . $rfid;
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [ 'authorization:PGKBA2023' ]);
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        if($response != 'Internal Server Error'){
            $data = json_decode($response, true);
        }
        else {
            $data['spta'] = NULL;
            $data['barcode_antrian'] = NULL;
            $data['register'] = NULL;
        }
        return $data;
    }
}
