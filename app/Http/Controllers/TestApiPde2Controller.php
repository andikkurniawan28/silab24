<?php

namespace App\Http\Controllers;

use App\Models\Rit;
use App\Models\Material;
use App\Models\Indicator;
use Illuminate\Http\Request;

class TestApiPde2Controller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        for($i=0; $i<1000; $i++){
            $analyses[$i]["user_id"]            = 1;
            $analyses[$i]["material_id"]        = rand(1, 50);
            $analyses[$i]["is_verified"]        = 1;
            foreach(Indicator::all() as $indicator){
                $analyses[$i][$indicator->name] = rand(1,100);
            }
        }

        return $analyses;
    }
}
