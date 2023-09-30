<?php

namespace App\Http\Controllers;

use App\Models\Method;
use App\Models\Sample;
use App\Models\Station;
use App\Models\Analysis;
use App\Models\Material;
use App\Models\Report;
use Illuminate\Http\Request;

class CetakLaporanMandorController extends Controller
{
    public function index(){
        $stations = Station::all();
        return view('cetak_laporan_mandor.index', compact('stations'));
    }

    public function process(Request $request){
        $time = self::determineTimeRange($request);
        $stations = Station::all();
        $data = self::setValueForData($stations, $time);
        return view('cetak_laporan_mandor.show', compact('data', 'request'));
    }

    public static function determineTimeRange($request)
    {
        switch($request->shift)
        {
            case 0 :
                $data['current'] = $request->date.' 05:00';
                $data['tomorrow'] = date('Y-m-d H:i', strtotime($data['current'] . "+24 hours"));
            break;
            case 1 :
                $data['current'] = $request->date.' 05:00';
                $data['tomorrow'] = date('Y-m-d H:i', strtotime($data['current'] . "+8 hours"));
            break;
            case 2 :
                $data['current'] = $request->date.' 13:00';
                $data['tomorrow'] = date('Y-m-d H:i', strtotime($data['current'] . "+8 hours"));
            break;
            case 3 :
                $data['current'] = $request->date.' 21:00';
                $data['tomorrow'] = date('Y-m-d H:i', strtotime($data['current'] . "+8 hours"));
            break;
        }
        return $data;
    }

    public static function setSampleId($material_id, $time){
        return Sample::where('material_id', $material_id)
            ->where('created_at', '>=', $time['current'])
            ->where('created_at', '<', $time['tomorrow'])
            ->select('id')
            ->get();
    }

    public static function setAnalysisValue($indicator_id, $sample_id){
        $data = number_format(Analysis::where('indicator_id', $indicator_id)
            ->whereIn('sample_id', $sample_id)
            ->avg('value'),2);
        if($data != 0){
            return $data;
        } else {
            return NULL;
        }
    }

    public static function setValueForData($stations, $time){
        foreach($stations as $station){
            foreach($station->material as $material){
                $sample_id = self::setSampleId($material->id, $time);
                foreach($material->method as $method){
                    $data[$station->name][$material->name][$method->indicator->name] = self::setAnalysisValue($method->indicator->id, $sample_id);
                }
            }
        }
        return $data;
    }
}
