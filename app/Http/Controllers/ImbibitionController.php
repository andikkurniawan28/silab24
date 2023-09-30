<?php

namespace App\Http\Controllers;

use App\Models\Imbibition;
use App\Models\Station;
use Illuminate\Http\Request;

class ImbibitionController extends Controller
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
        $imbibitions = Imbibition::whereBetween("created_at", [session("time_start"), session("time_end")])->get();
        return view("imbibition.index", compact("timeframe", "stations", "imbibitions"));
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
        $data = Imbibition::countFlow($request);
        $request->request->add([
            "flow_imb" => $data["flow_imb"],
        ]);
        Imbibition::create($request->all());
        return redirect()->back()->with("success", "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imbibition  $imbibition
     * @return \Illuminate\Http\Response
     */
    public function show(Imbibition $imbibition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imbibition  $imbibition
     * @return \Illuminate\Http\Response
     */
    public function edit(Imbibition $imbibition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imbibition  $imbibition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Imbibition::whereId($id)->update($request->except(["_token", "_method"]));
        return redirect()->back()->with("success", "Data berhasil diedit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imbibition  $imbibition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Imbibition::whereId($id)->delete();
        return redirect()->back()->with("success", "Data berhasil dihapus");
    }
}
