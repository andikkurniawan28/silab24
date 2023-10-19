<?php

namespace App\Http\Controllers;

use App\Models\Factor;
use App\Models\Station;
use App\Models\CoreSample;
use Illuminate\Http\Request;
use App\Models\GelasCoreSample;

class CoreSampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();
        $core_samples = CoreSample::whereBetween("created_at", [session("time_start"), session("time_end")])->get();
        return view("core_sample.index", compact("core_samples", "stations"));
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
        $core_sample_id = GelasCoreSample::where("identificator", $request->identificator)->get()->last()->core_sample_id ?? 0;
        if($core_sample_id != 0){
            $request->request->add(["rendemen" => self::findYield($request)]);
            CoreSample::whereId($core_sample_id)->update($request->except(["_token", "_method", "identificator"]));
            GelasCoreSample::where("identificator", $request->identificator)->delete();
            return redirect()->back()->with("success", "ARI Core Sample berhasil disimpan");
        } else {
            return redirect()->back()->with("fail", "Gagal simpan, nomor gelas tidak valid!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoreSample  $core_sample
     * @return \Illuminate\Http\Response
     */
    public function show(CoreSample $core_sample)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoreSample  $core_sample
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stations = Station::all();
        $core_sample = CoreSample::whereId($id)->get()->last();
        return view("core_sample.edit", compact("stations", "core_sample"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoreSample  $core_sample
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->request->add(["ppol" => self::ppol($request)]);
        CoreSample::whereId($id)->update($request->except(["_token", "_method"]));
        return redirect()->route("core_samples.index")->with("success", "ARI Core Sample berhasil disimpan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoreSample  $core_sample
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CoreSample::whereId($id)->delete();
        return redirect()->back()->with("success", "ARI Core Sample berhasil dihapus");
    }

    public function correctPol($request){
        $faktor = Factor::where("name", "ARI")->get()->last()->value;
        return $request->ppol + ($faktor * $request->pbrix);
    }

    public function findYield($request){
        $r_minimum = 5.03;
        $r_maximum = 7.01;

        $faktor_rendemen = Factor::where("name", "Rendemen")->get()->last()->value;
        $faktor_mellase = Factor::where("name", "Mollases")->get()->last()->value;

        $yield = ($request->ppol-(0.5*($request->pbrix-$request->ppol)))*0.7;

        if($yield < $r_minimum){
            $pol_koreksi = (($r_minimum / 0.7) + (0.5 * $request->pbrix)) / (1 + 0.5);
            $request->request->add(["ppol" => $pol_koreksi]);
        }
        elseif($yield > $r_maximum){
            $pol_koreksi = (($r_maximum / 0.7) + (0.5 * $request->pbrix)) / (1 + 0.5);
            $request->request->add(["ppol" => $pol_koreksi]);
        }
        else {
            $pol_koreksi = $request->ppol;
            $request->request->add(["ppol" => $pol_koreksi]);
        }

        $yield_koreksi = ($pol_koreksi-(0.5*($request->pbrix - $pol_koreksi)))*0.7;

        return $yield_koreksi;
    }

    public static function ppol($request){
        return (($request->rendemen / 0.7) + (0.5 * $request->pbrix)) / (1 + 0.5);
    }
}
