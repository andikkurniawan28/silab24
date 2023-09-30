<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use App\Models\Sample_test;
use App\Models\Station;
use App\Models\Activity;
use App\Models\Material;
use Illuminate\Http\Request;

class CetakBarcodeController extends Controller
{
    public function index()
    {
        $sample_id = Sample::get()->last()->id;
        $stations = Station::all();
        $materials = Material::all();
        return view('cetak_barcode.index', compact('stations', 'materials', 'sample_id'));
    }

    public function store(Request $request)
    {
        $created_at = self::generateHour();
        $request->request->add([
            'user_id' => Auth()->user()->id,
            'created_at' => $created_at,
        ]);
        Sample::insert(['material_id' => $request->material_id, 'user_id' => Auth()->user()->id, 'created_at' => $created_at]);
        // Sample_test::insert(['material_id' => $request->material_id, 'user_id' => Auth()->user()->id, 'created_at' => $created_at]);
        Activity::insert(['subject' => 'Cetak Barcode', 'action' => 'Create', 'user_id' => Auth()->user()->id]);
        $data = Sample::where('material_id', $request->material_id)->get()->last();
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
