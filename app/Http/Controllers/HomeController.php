<?php

namespace App\Http\Controllers;

use App\Models\Ari;
use App\Models\Sample;
use App\Models\Balance;
use App\Models\Mollase;
use App\Models\Posbrix;
use App\Models\Station;
use App\Models\Analysis;
use App\Models\Product50;
use App\Models\CoreSample;
use App\Models\Imbibition;
use Illuminate\Http\Request;
use App\Models\Rawsugarinput;
use App\Models\Rawsugaroutput;

class HomeController extends Controller
{
    public function __invoke()
    {
        $stations = Station::all();
        return view("home.index", compact("stations"));
    }
}
