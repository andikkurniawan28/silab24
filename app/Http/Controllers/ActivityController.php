<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
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
        $activities = Activity::latest()->paginate(1000);
        return view('activity.index', compact('stations', 'activities'));
    }
}
