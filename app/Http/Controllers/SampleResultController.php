<?php

namespace App\Http\Controllers;

use App\Models\Method;
use App\Models\Analysis;
use App\Models\Station;
use App\Models\Material;
use Illuminate\Http\Request;

class SampleResultController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($material_id)
    {
        $stations = Station::all();
        $material = Material::whereId($material_id)->get()->last()->name;
        $samples = Analysis::where('material_id', $material_id)
            ->whereBetween("created_at", [session("time_start"), session("time_end")])
            ->where("material_id", $material_id)
            ->where("is_verified", 1)
            ->orderBy("id", "desc")
            ->limit(5)
            ->get();
        $methods = Method::where('material_id', $material_id)->get();
        return view('sample_result.index', compact('material', 'samples', 'methods', 'stations', 'material_id'));
    }
}
