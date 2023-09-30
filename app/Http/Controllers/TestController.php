<?php

namespace App\Http\Controllers;

use App\Models\Imbibition;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $imbibitions = Imbibition::latest()->paginate(1000);
        $current_hour = date("H") - 1;
        return view("tes", compact("imbibitions", "current_hour"));
    }

    public function process(Request $request){
        $data = Imbibition::countFlow($request);
        $created_at = Imbibition::generateTimestamp($request);
        $request->request->add([
            "flow_imb" => $data["flow_imb"],
            "created_at" => $created_at,
            "user_id" => Auth()->user()->id,
        ]);
        Imbibition::create($request->all());
        return $request->all();
    }
}
