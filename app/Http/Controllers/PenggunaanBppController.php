<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Chemical;
use Illuminate\Http\Request;
use App\Models\Chemicalchecking;

class PenggunaanBppController extends Controller
{
    public function __invoke(){
        $stations   = Station::all();
        $chemicals  = Chemical::all();
        $data       = self::prepare();
        return view("penggunaan_bpp.index", compact("stations", "chemicals", "data"));
    }

    public static function prepare(){
        return Chemicalchecking::whereBetween("created_at", [session("time_start"), session("time_end")])
            ->get();
    }
}
