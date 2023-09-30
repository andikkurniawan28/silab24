<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function process(Request $request)
    {
        $attempt = Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
            'is_active' => 1,
        ]);

        if ($attempt)
        {
            $date           = date("Y-m-d");
            $time_start     = date("Y-m-d 06:00");
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

            $request->session()->regenerate();

            return redirect()->intended();
        }
        else
        {
            return redirect('login')->with('error', 'Username / password wrong.');
        }
    }
}
