<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Analysis;
use App\Models\Material;
use App\Models\Indicator;
use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stations   = Station::all();
        $indicators = Indicator::all();
        $materials  = Material::all();
        $analyses   = Analysis::whereBetween("created_at", [session("time_start"), session("time_end")])->get();
        return view("analysis.index", compact("stations", "indicators", "materials", "analyses"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Analysis::create($request->all());
        return redirect()->back()->with("success", "Analisa berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function show(Analysis $analysis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stations   = Station::all();
        $indicators = Indicator::all();
        $materials  = Material::all();
        $analysis   = Analysis::whereId($id)->get()->last();
        return view("analysis.edit", compact("stations", "indicators", "materials", "analysis"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Analysis::where("id", $id)->update($request->except(["_token", "_method"]));
        return redirect()->route("analyses.index")->with("success", "Analisa berhasil dirubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Analysis  $analysis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Analysis::whereId($id)->delete();
        return redirect()->back()->with("success", "Analisa berhasil dihapus");
    }
}
