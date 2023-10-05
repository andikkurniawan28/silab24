<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Indicator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\IndicatorStoreRequest;

class IndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();
        $indicators = Indicator::all();
        return view("indicator.index", compact("stations", "indicators"));
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
    public function store(IndicatorStoreRequest $request)
    {
        Indicator::create($request->all());
        DB::statement("ALTER TABLE `analyses` ADD `$request->name` DOUBLE(8,2)");
        return redirect()->back()->with("success", "Indikator berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Station  $indicator
     * @return \Illuminate\Http\Response
     */
    public function show(Station $indicator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Station  $indicator
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $indicator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Station  $indicator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Indicator::where("id", $id)->update($request->except(["_token", "_method"]));
        return redirect()->back()->with("success", "Indikator berhasil dirubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Station  $indicator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Indicator::whereId($id)->delete();
        DB::statement("ALTER TABLE `analyses` DROP COLUMN `$request->name`");
        return redirect()->back()->with("success", "Indikator berhasil dihapus");
    }
}
