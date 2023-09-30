<?php

namespace App\Http\Controllers;

use App\Models\Ari;
use App\Models\Factor;
use App\Models\Station;
use Illuminate\Http\Request;

class AriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();
        $aris = Ari::whereBetween("created_at", [session("time_start"), session("time_end")])->get();
        return view("ari.index", compact("aris", "stations"));
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
        $request->request->add(["rendemen" => self::findYield($request)]);
        Ari::whereId($request->id)->update($request->except(["_token", "_method"]));
        return redirect()->back()->with("success", "ARI Gilingan Mini berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ari  $ari
     * @return \Illuminate\Http\Response
     */
    public function show(Ari $ari)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ari  $ari
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stations = Station::all();
        $ari = Ari::whereId($id)->get()->last();
        return view("ari.edit", compact("stations", "ari"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ari  $ari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->request->add(["ppol" => self::ppol($request)]);
        Ari::whereId($id)->update($request->except(["_token", "_method"]));
        return redirect()->route("aris.index")->with("success", "ARI Gilingan Mini berhasil disimpan");
    }

    public function correctPol($request){
        $faktor = Factor::where('name', 'ARI')->get()->last()->value;
        return $request->ppol + ($faktor * $request->pbrix);
    }

    public function findYield($request){
        $r_minimum = 5.13;
        $r_maximum = 8.23;

        $faktor_rendemen = Factor::where('name', 'Rendemen')->get()->last()->value;
        $faktor_mellase = Factor::where('name', 'Mollases')->get()->last()->value;

        $yield = ($request->ppol-(0.5*($request->pbrix-$request->ppol)))*0.7;

        if($yield < $r_minimum){
            $pol_koreksi = (($r_minimum / 0.7) + (0.5 * $request->pbrix)) / (1 + 0.5);
            $request->request->add(['ppol' => $pol_koreksi]);
        }
        elseif($yield > $r_maximum){
            $pol_koreksi = (($r_maximum / 0.7) + (0.5 * $request->pbrix)) / (1 + 0.5);
            $request->request->add(['ppol' => $pol_koreksi]);
        }
        else {
            $pol_koreksi = $request->ppol;
            $request->request->add(['ppol' => $pol_koreksi]);
        }

        $yield_koreksi = ($pol_koreksi-(0.5*($request->pbrix - $pol_koreksi)))*0.7;

        return $yield_koreksi;
    }

    public static function generatePercentPol($yield, $pbrix){
        return (($yield / 0.7) + (0.5 * $pbrix)) / (1 + 0.5);
    }
}
