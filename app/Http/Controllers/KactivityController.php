<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Kactivity;
use App\Models\Material;
use App\Models\Kspot;
use Illuminate\Http\Request;

class KactivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stations   = Station::all();
        $kspots = Kspot::all();
        $kactivities   = Kactivity::whereBetween("created_at", [session("time_start"), session("time_end")])->get();
        return view("kactivity.index", compact("stations", "kspots", "kactivities"));

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
        Kactivity::create($request->all());
        return redirect()->back()->with("success", "Keliling Proses berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kactivity  $kactivity
     * @return \Illuminate\Http\Response
     */
    public function show(Kactivity $kactivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kactivity  $kactivity
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stations   = Station::all();
        $kspots     = Kspot::all();
        $kactivity  = Kactivity::whereId($id)->get()->last();
        return view("kactivity.edit", compact("stations", "kspots", "kactivity"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kactivity  $kactivity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Kactivity::where("id", $id)->update($request->except(["_token", "_method"]));
        return redirect()->route("kactivities.index")->with("success", "Keliling Proses berhasil dirubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kactivity  $kactivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Kactivity::whereId($id)->delete();
        return redirect()->back()->with("success", "Keliling Proses berhasil dihapus");
    }
}
