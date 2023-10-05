<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Chemical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ChemicalStoreRequest;

class ChemicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();
        $chemicals = Chemical::all();
        return view("chemical.index", compact("stations", "chemicals"));
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
    public function store(ChemicalStoreRequest $request)
    {
        Chemical::create($request->all());
        DB::statement("ALTER TABLE `chemicalcheckings` ADD `$request->name` DOUBLE(8,2)");
        return redirect()->back()->with("success", "Bahan Pembantu Proses berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Station  $chemical
     * @return \Illuminate\Http\Response
     */
    public function show(Chemical $chemical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Station  $chemical
     * @return \Illuminate\Http\Response
     */
    public function edit(Chemical $chemical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Station  $chemical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Chemical::where("id", $id)->update($request->except(["_token", "_method"]));
        return redirect()->back()->with("success", "Bahan Pembantu Proses berhasil dirubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Station  $chemical
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Chemical::whereId($id)->delete();
        DB::statement("ALTER TABLE `chemicalcheckings` DROP COLUMN `$request->name`");
        return redirect()->back()->with("success", "Bahan Pembantu Proses berhasil dihapus");
    }
}
