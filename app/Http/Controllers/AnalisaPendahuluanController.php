<?php

namespace App\Http\Controllers;

use App\Models\Kud;
use App\Models\Station;
use Illuminate\Http\Request;
use App\Models\AnalisaPendahuluan;

class AnalisaPendahuluanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();
        $analisa_pendahuluan = AnalisaPendahuluan::where("created_at", ">=", session("time_start"))
            ->where("created_at", "<", session("time_end"))
            ->orderBy("id", "desc")
            ->get();
        return view("analisa_pendahuluan.index", compact("stations", "analisa_pendahuluan"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stations = Station::all();
        $kuds = Kud::all();
        return view("analisa_pendahuluan.create", compact("stations", "kuds"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AnalisaPendahuluan::create($request->all());
        $data = AnalisaPendahuluan::where("kud_id", $request->kud_id)->get()->last();
        return view("analisa_pendahuluan.barcode", compact("data"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnalisaPendahuluan  $analisaPendahuluan
     * @return \Illuminate\Http\Response
     */
    public function show(AnalisaPendahuluan $analisaPendahuluan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnalisaPendahuluan  $analisaPendahuluan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stations = Station::all();
        $analisa_pendahuluan = AnalisaPendahuluan::whereId($id)->get()->last();
        return view("analisa_pendahuluan.edit", compact("stations", "analisa_pendahuluan"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnalisaPendahuluan  $analisaPendahuluan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        AnalisaPendahuluan::whereId($id)->update($request->except([
            "_token",
            "_method",
        ]));
        return redirect()->back()->with("success", "Analisa Pendahuluan berhasil diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnalisaPendahuluan  $analisaPendahuluan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AnalisaPendahuluan::whereId($id)->delete();
        return redirect()->back()->with("success", "Analisa Pendahuluan berhasil dihapus");
    }
}
