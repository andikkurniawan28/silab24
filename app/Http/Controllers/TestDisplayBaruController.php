<?php

namespace App\Http\Controllers;

use App\Models\Rit;
use App\Models\AriSampling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestDisplayBaruController extends Controller
{
    public function index(){
        $data = DB::table("rits")->select([
                "ari_samplings.id as id",
                "rits.updated_at as updated_at",
            ])
            // ->leftjoin("rits", "ari_samplings.rit_id", "rits.id")
            ->leftjoin("ari_samplings", "rits.id", "ari_samplings.rit_id")
            ->leftjoin("aris", "ari_samplings.id", "aris.ari_sampling_id")
            ->where("rits.barcode_antrian", "!=", NULL)
            ->where("rits.category", "!=", "CS")
            ->where("aris.yield", "=", NULL)
            ->where("ari_samplings.created_at", ">", "2023-08-29 05:00")
            ->orderBy("rits.updated_at", "asc")
            ->limit(50)
            ->get();

        return view("display_ari_sampling2.index2", compact("data"));
    }
}
