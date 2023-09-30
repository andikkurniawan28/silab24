<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScoringGantiTanggalController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return redirect()->route("scoring", $request->date)->with("success", "Menampilkan data pada tanggal {$request->date}");
    }
}
