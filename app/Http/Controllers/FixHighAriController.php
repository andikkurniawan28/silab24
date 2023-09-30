<?php

namespace App\Http\Controllers;

use App\Models\Ari;
use Illuminate\Http\Request;

class FixHighAriController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data_ari_sebelum = Ari::where("yield", "<", 5.13)
            ->where("created_at", ">=", "2023-08-27 05:00")
            ->get();

        return $data_ari_sebelum;
    }

    public static function generatePercentPol($yield, $pbrix){
        return (($yield / 0.7) + (0.5 * $pbrix)) / (1 + 0.5);
    }

    public static function generateYieldByPpol($pbrix, $ppol){
	    return 0.7 * ($ppol - 0.5 * ($pbrix - $ppol));
    }

    //	ppol_koreksi = ((5.13 / factor_rendemen)+(0.5 * brix))/(1+0.5)
    //  ppol_koreksi = ((rendemen_koreksi / factor_rendemen)+(0.5 * brix))/(1+0.5)
}
