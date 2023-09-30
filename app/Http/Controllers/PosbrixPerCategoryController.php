<?php

namespace App\Http\Controllers;

use App\Models\Kawalan;
use App\Models\Station;
use App\Models\Variety;
use Illuminate\Http\Request;

class PosbrixPerCategoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($category)
    {
        $stations = Station::all();
        $kawalans = Kawalan::all();
        $varieties = Variety::all();
        return view("posbrix.create2", compact("stations", "kawalans", "varieties", "category"));
    }
}
