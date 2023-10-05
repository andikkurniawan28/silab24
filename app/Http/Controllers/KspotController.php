<?php

namespace App\Http\Controllers;

use App\Models\Kspot;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\KspotStoreRequest;

class KspotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();
        $kspots = Kspot::all();
        return view("kspot.index", compact("stations", "kspots"));
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
    public function store(KspotStoreRequest $request)
    {
        Kspot::create($request->all());
        DB::statement("ALTER TABLE `kactivities` ADD `$request->name` DOUBLE(8,2)");
        return redirect()->back()->with("success", "Titik Keliling berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Station  $kspot
     * @return \Illuminate\Http\Response
     */
    public function show(Station $kspot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Station  $kspot
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $kspot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Station  $kspot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Kspot::where("id", $id)->update($request->except(["_token", "_method"]));
        return redirect()->back()->with("success", "Titik Keliling berhasil dirubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Station  $kspot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Kspot::whereId($id)->delete();
        DB::statement("ALTER TABLE `kactivities` DROP COLUMN `$request->name`");
        return redirect()->back()->with("success", "Titik Keliling berhasil dihapus");
    }
}
