<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Chemicalchecking;
use App\Models\Chemical;
use Illuminate\Http\Request;

class ChemicalcheckingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stations           = Station::all();
        $chemicals          = Chemical::all();
        $chemicalcheckings  = Chemicalchecking::whereBetween("created_at", [session("time_start"), session("time_end")])->get();
        return view("chemicalchecking.index", compact("stations", "chemicals", "chemicalcheckings"));

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
        Chemicalchecking::create($request->all());
        return redirect()->back()->with("success", "Penggunaan BPP berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chemicalchecking  $chemicalchecking
     * @return \Illuminate\Http\Response
     */
    public function show(Chemicalchecking $chemicalchecking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chemicalchecking  $chemicalchecking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stations   = Station::all();
        $chemicals     = Chemical::all();
        $chemicalchecking  = Chemicalchecking::whereId($id)->get()->last();
        return view("chemicalchecking.edit", compact("stations", "chemicals", "chemicalchecking"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chemicalchecking  $chemicalchecking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Chemicalchecking::where("id", $id)->update($request->except(["_token", "_method"]));
        return redirect()->route("chemicalcheckings.index")->with("success", "Penggunaan BPP berhasil dirubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chemicalchecking  $chemicalchecking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Chemicalchecking::whereId($id)->delete();
        return redirect()->back()->with("success", "Penggunaan BPP berhasil dihapus");
    }
}
