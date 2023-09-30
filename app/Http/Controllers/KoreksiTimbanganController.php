<?php

namespace App\Http\Controllers;

use App\Models\Mollase;
use Illuminate\Http\Request;
use App\Models\Rawsugarinput;
use App\Models\Rawsugaroutput;

class KoreksiTimbanganController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($type, $date, $requested_value)
    {
        $min_time = date('Y-m-d 5:00', strtotime($date));
        $max_time = date('Y-m-d H:i', strtotime($min_time . "+24 hours"));
        $created_at = date('Y-m-d 6:00', strtotime($date));

        switch($type){
            case 'rs_in' :
                $actual_value = Rawsugarinput::where('created_at', '>=', $min_time)
                    ->where('created_at', '<', $max_time)
                    ->sum('netto');
                $yield = $requested_value - $actual_value;
                Rawsugarinput::insert(['netto' => $yield, 'bruto' => 0, 'tarra' => 0, 'created_at' => $created_at]);
            break;

            case 'rs_out' :
                $actual_value = Rawsugaroutput::where('created_at', '>=', $min_time)
                    ->where('created_at', '<', $max_time)
                    ->sum('netto');
                $yield = $requested_value - $actual_value;
                Rawsugaroutput::insert(['netto' => $yield, 'bruto' => 0, 'tarra' => 0, 'created_at' => $created_at]);
            break;

            case 'tetes' :
                $actual_value = Mollase::where('created_at', '>=', $min_time)
                    ->where('created_at', '<', $max_time)
                    ->sum('netto');
                $yield = $requested_value - $actual_value;
                Mollase::insert(['netto' => $yield, 'bruto' => 0, 'tarra' => 0, 'created_at' => $created_at]);
            break;
        }

        return $yield;
    }
}
