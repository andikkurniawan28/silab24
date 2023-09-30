<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Station;
use Illuminate\Http\Request;

class MaterialBalanceController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $stations = Station::all();
        $material_balance = self::materialBalance();
        return view("material_balance.index", compact("stations", "material_balance"));
    }

    public static function materialBalance(){
        return Balance::leftjoin("imbibitions", "balances.created_at", "imbibitions.created_at")
            ->select([
                "balances.created_at as created_at",
                "balances.tebu as tebu",
                "balances.flow_nm as flow_nm",
                "balances.sfc as sfc",
                "imbibitions.flow_imb as flow_imb",
            ])
        ->where("balances.created_at", ">=", session("time_start"))
        ->where("balances.created_at", "<", session("time_end"))
        ->orderBy("balances.id", "desc")
        ->get();
    }
}
