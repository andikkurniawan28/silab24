<?php

namespace App\Http\Controllers;

use App\Models\Ari;
use App\Models\Rit;
use App\Models\AriSampling;
use Illuminate\Http\Request;

class MumetController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = Rit::where("barcode_antrian", NULL)->orderBy("id", "desc")->limit(100)->get();
        return $data;
    }
}
