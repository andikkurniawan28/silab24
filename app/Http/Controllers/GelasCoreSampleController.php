<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\CoreSample;
use Illuminate\Http\Request;
use App\Models\GelasCoreSample;
use App\Http\Requests\GelasCoreSampleRequest;

class GelasCoreSampleController extends Controller
{
    public function index(){
        $stations = Station::all();
        $gelas_core_sample = GelasCoreSample::all();
        return view("core_sample.create3", compact("stations", "gelas_core_sample"));
    }

    public function process(GelasCoreSampleRequest $request){
        $core_sample_belum_teranalisa = CoreSample::where("pbrix", NULL)
            ->where("ppol", NULL)
            ->where("pol", NULL)
            ->where("rendemen", NULL);

        if($core_sample_belum_teranalisa->count() == 0){
            return redirect()->back()->with("fail", "Belum ada Core Sample");
        } else {
            $core_sample_id = $core_sample_belum_teranalisa->doesntHave("gelas_core_sample")->get()->first()->id ?? 0;
            if($core_sample_id == 0){
                return redirect()->back()->with("fail", "Gagal simpan");
            } else {
                $request->request->add(["core_sample_id" => $core_sample_id]);
                GelasCoreSample::create($request->all());
                return redirect()->back()->with("success", "Gelas berhasil didaftarkan");
            }
        }
    }
}
