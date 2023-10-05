<?php

namespace App\Http\Controllers;

use App\Models\Tspot;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TspotStoreRequest;

class TspotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();
        $tspots = Tspot::all();
        return view("tspot.index", compact("stations", "tspots"));
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
    public function store(TspotStoreRequest $request)
    {
        Tspot::create($request->all());
        DB::statement("ALTER TABLE `tactivities` ADD `$request->name` DOUBLE(8,2)");
        return redirect()->back()->with("success", "Titik Taksasi berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Station  $tspot
     * @return \Illuminate\Http\Response
     */
    public function show(Station $tspot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Station  $tspot
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $tspot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Station  $tspot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Tspot::where("id", $id)->update($request->except(["_token", "_method"]));
        return redirect()->back()->with("success", "Titik Taksasi berhasil dirubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Station  $tspot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Tspot::whereId($id)->delete();
        DB::statement("ALTER TABLE `tactivities` DROP COLUMN `$request->name`");
        return redirect()->back()->with("success", "Titik Taksasi berhasil dihapus");
    }
}
