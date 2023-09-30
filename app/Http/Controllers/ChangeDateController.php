<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangeDateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $date           = $request->date;
        $time_start     = date("{$date} 06:00");
        $time_end       = date("Y-m-d H:i", strtotime($time_start . "+1 day"));
        $time_yesterday = date("Y-m-d H:i", strtotime($time_start . "-1 day"));
        $time_pagi      = date("Y-m-d H:i", strtotime($time_start . "-1 hours"));
        $time_siang     = date("Y-m-d H:i", strtotime($time_start . "+8 hours"));
        $time_malam     = date("Y-m-d H:i", strtotime($time_siang . "+8 hours"));
        $time_tomorrow  = date("Y-m-d H:i", strtotime($time_malam . "+8 hours"));

        $request->session()->put("date", $date);
        $request->session()->put("time_start", $time_start);
        $request->session()->put("time_end", $time_end);
        $request->session()->put("time_yesterday", $time_yesterday);
        $request->session()->put("time_pagi", $time_pagi);
        $request->session()->put("time_siang", $time_siang);
        $request->session()->put("time_malam", $time_malam);
        $request->session()->put("time_tomorrow", $time_tomorrow);

        return redirect()->back();
    }
}
