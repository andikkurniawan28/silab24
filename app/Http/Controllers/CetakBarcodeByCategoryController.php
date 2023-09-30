<?php

namespace App\Http\Controllers;

use App\Models\Analysis;
use App\Models\Station;
use App\Models\Material;
use Illuminate\Http\Request;

class CetakBarcodeByCategoryController extends Controller
{
    public function index($station_id)
    {
        $stations = Station::all();
        $materials = Material::where('station_id', $station_id)->get();
        return view('cetak_barcodebycategory.index', compact('stations', 'materials'));
    }

    public function store(Request $request)
    {
        $created_at = self::generateHour();
        Analysis::insert(['material_id' => $request->material_id, 'user_id' => Auth()->user()->id, 'created_at' => $created_at]);
        $data = Analysis::where('material_id', $request->material_id)->get()->last();
        return view('cetak_barcode.show', compact('data'));
    }

    public static function generateHour(){
        $minute = date('i');

        if($minute >= 0 && $minute < 10){
            $minute_adjusted = 0;
        }
        elseif($minute >= 10 && $minute < 20){
            $minute_adjusted = 10;
        }
        elseif($minute >= 20 && $minute < 30){
            $minute_adjusted = 20;
        }
        elseif($minute >= 30 && $minute < 40){
            $minute_adjusted = 30;
        }
        elseif($minute >= 40 && $minute < 50){
            $minute_adjusted = 40;
        }
        else if($minute >= 50){
            $minute_adjusted = 50;
        }

       return date('Y-m-d H:').$minute_adjusted;
    }
}
