<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Tactivity;
use App\Models\Material;
use App\Models\Tspot;
use Illuminate\Http\Request;

class TactivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stations   = Station::all();
        $tspots = Tspot::all();
        $tactivities   = Tactivity::whereBetween("created_at", [session("time_start"), session("time_end")])->get();
        return view("tactivity.index", compact("stations", "tspots", "tactivities"));

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
        Tactivity::create($request->all());
        return redirect()->back()->with("success", "Taksasi berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tactivity  $tactivity
     * @return \Illuminate\Http\Response
     */
    public function show(Tactivity $tactivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tactivity  $tactivity
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stations   = Station::all();
        $tspots     = Tspot::all();
        $tactivity  = Tactivity::whereId($id)->get()->last();
        return view("tactivity.edit", compact("stations", "tspots", "tactivity"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tactivity  $tactivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Tactivity::where("id", $id)->update($request->except(["_token", "_method"]));
        return redirect()->route("tactivities.index")->with("success", "Taksasi berhasil dirubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tactivity  $tactivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Tactivity::whereId($id)->delete();
        return redirect()->back()->with("success", "Taksasi berhasil dihapus");
    }
}
