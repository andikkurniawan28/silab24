<?php

namespace App\Http\Controllers;

use App\Models\Rit;
use Illuminate\Http\Request;

class CariRitAnalisaKosong extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $data = self::getId();
        return $data;
    }

    public static function getId(){
        return Rit::doesntHave("ari_sampling")
            ->where("created_at", "<", "2023-09-16 06:00")
            ->orderBy("id", "asc")
            ->select(["id"])
            ->get();
    }
}
