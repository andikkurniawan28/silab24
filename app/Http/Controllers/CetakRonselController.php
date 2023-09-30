<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Analysis;
use App\Models\Material;
use Illuminate\Http\Request;

class CetakRonselController extends Controller
{
    public function index()
    {
        $stations = Station::all();
        $materials = Material::where("station_id", 6)->where("name", "like", "Masakan %")->get();
        return view("cetak_ronsel.index", compact("stations", "materials"));
    }

    public function store(Request $request)
    {
        Analysis::create($request->all());
        $data = Analysis::where("material_id", $request->material_id)->get()->last();
        return view("cetak_ronsel.show", compact("data"));
    }

}
