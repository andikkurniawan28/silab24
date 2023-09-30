<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Station;
use App\Models\Activity;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        for($i = 0; $i < 25; $i++){
            $timeframe[$i] = date("Y-m-d H:i", strtotime(session("time_pagi") . "+{$i} hours"));
        }
        $stations = Station::all();
        $balances = Balance::whereBetween("created_at", [session("time_start"), session("time_end")])->get();
        return view("balance.index", compact("timeframe", "stations", "balances"));
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
        $data = Balance::countRawJuice($request);
        $request->request->add([
            "flow_nm" => $data["flow_nm"],
            "nm_persen_tebu" => $data["nm_persen_tebu"],
        ]);
        Balance::create($request->all());
        return redirect()->back()->with("success", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function show(Balance $balance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function edit(Balance $balance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Balance::whereId($id)->update([
            "tebu" => $request->tebu,
            "totalizer" => $request->totalizer,
            "flow_nm" => $request->flow_nm,
            "nm_persen_tebu" => $request->nm_persen_tebu,
        ]);
        return redirect()->back()->with("success", "Data berhasil diedit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Balance::whereId($id)->delete();
        return redirect()->back()->with("success", "Data berhasil dihapus");
    }
}
