<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsumableUsage;

class RestockController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        ConsumableUsage::create($request->all());
        return redirect()->back()->with("success", "Re-stock berhasil disimpan");
    }
}
