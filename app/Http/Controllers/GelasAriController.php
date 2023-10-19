<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Ari;
use Illuminate\Http\Request;
use App\Models\GelasAri;
use App\Http\Requests\GelasAriRequest;

class GelasAriController extends Controller
{
    public function index(){
        $stations = Station::all();
        $gelas_ari = GelasAri::all();
        return view("ari.create3", compact("stations", "gelas_ari"));
    }

    public function process(GelasAriRequest $request){
        $ari_belum_teranalisa = Ari::where("pbrix", NULL)
            ->where("ppol", NULL)
            ->where("pol", NULL)
            ->where("rendemen", NULL);

        if($ari_belum_teranalisa->count() == 0){
            return redirect()->back()->with("fail", "Belum ada ARI");
        } else {
            $ari_id = $ari_belum_teranalisa->doesntHave("gelas_ari")->get()->first()->id ?? 0;
            if($ari_id == 0){
                return redirect()->back()->with("fail", "Gagal simpan");
            } else {
                $request->request->add(["ari_id" => $ari_id]);
                GelasAri::create($request->all());
                return redirect()->back()->with("success", "Gelas berhasil didaftarkan");
            }
        }
    }
}
