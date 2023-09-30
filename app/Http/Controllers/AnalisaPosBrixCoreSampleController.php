<?php

namespace App\Http\Controllers;

use App\Models\Kawalan;
use App\Models\Variety;
use Illuminate\Http\Request;

class AnalisaPosBrixCoreSampleController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $spta, $category)
    {
        $varieties = Variety::all();
        $kawalans = Kawalan::all();
        return view('aplikasi.posbrix_core_sample', compact('spta', 'category', 'varieties', 'kawalans'));
    }
}
