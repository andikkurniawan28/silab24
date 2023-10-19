<?php

namespace App\Http\Controllers;

use App\Models\Rit;
use App\Models\Kawalan;
use App\Models\Posbrix;
use App\Models\Station;
use App\Models\Variety;
use App\Models\CoreSample;
use Illuminate\Http\Request;
use App\Http\Requests\PosbrixStoreRequest;

class PosbrixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();
        $kawalans = Kawalan::all();
        $varieties = Variety::all();
        $posbrixes = Posbrix::whereBetween("created_at", [session("time_start"), session("time_end")])->get();
        return view("posbrix.index", compact("posbrixes", "stations", "varieties", "kawalans"));
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
    public function store(PosbrixStoreRequest $request)
    {
        Posbrix::create($request->all());
        // self::createCore($request);
        return redirect()->back()->with("success", "Posbrix berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posbrix  $posbrix
     * @return \Illuminate\Http\Response
     */
    public function show(Posbrix $posbrix)
    {
        return view("posbrix.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posbrix  $posbrix
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stations = Station::all();
        $kawalans = Kawalan::all();
        $varieties = Variety::all();
        $posbrix = Posbrix::whereId($id)->get()->last();
        return view("posbrix.edit", compact("stations", "kawalans", "varieties", "posbrix"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posbrix  $posbrix
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Posbrix::whereId($id)->update($request->except(["_token", "_method"]));
        return redirect()->route("posbrixes.index")->with("success", "Posbrix berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posbrix  $posbrix
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Posbrix::whereId($id)->delete();
        return redirect()->back()->with("success", "Posbrix berhasil dihapus");
    }

    public function createCore($request){
        if($request->category == "CS"){
            $posbrix_id = Posbrix::where("spta", $request->spta)->get()->last()->id;
            CoreSample::create([
                "posbrix_id" => $posbrix_id,
                "user_id" => $request->user_id,
            ]);
        }
    }
}
