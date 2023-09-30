<?php

namespace App\Http\Controllers;

use App\Models\Rit;
use App\Models\Posbrix;
use App\Models\Station;
use Illuminate\Http\Request;

class FindResultByIdentityController extends Controller
{
    public function index()
    {
        $stations = Station::all();
        return view('find_result_by_identity.index', compact('stations'));
    }

    public function process(Request $request){
        switch($request->type){
            case 'spta' :
                $posbrix_id = Rit::where('spta', $request->id)->select('posbrix_id')->get();
                break;

            case 'barcode_antrian' :
                $posbrix_id = Rit::where('barcode_antrian', $request->id)->select('posbrix_id')->get();
                break;

                case 'nopol' :
                    $posbrix_id = Rit::where('nopol', $request->id)->select('posbrix_id')->get();
                    break;
        }
        $data = Posbrix::whereIn('id', $posbrix_id)->get();
        return view('find_result_by_identity.show', compact('data'));
    }
}
