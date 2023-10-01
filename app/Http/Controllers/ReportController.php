<?php

namespace App\Http\Controllers;

use App\Models\Kspot;
use App\Models\Report;
use App\Models\Station;
use App\Models\Chemical;
use App\Models\Indicator;
use App\Models\Consumable;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $indicators = Indicator::all();
        $kspots = Kspot::all();
        $chemicals = Chemical::all();
        $consumables = Consumable::all();
        $data["analisaLab"] = Report::analisaLab();
        $data["keliling"] = Report::keliling();
        $data["chemical"] = Report::chemical();
        $data["consumable"] = Report::consumable();
        $data["material_balance"] = Report::material_balance();
        $data["rs_in"] = Report::rs_in();
        $data["rs_out"] = Report::rs_out();
        $data["tetes"] = Report::tetes();
        $data["posbrix"] = Report::posbrix();
        return view("report.show", compact(
            "indicators",
            "kspots",
            "chemicals",
            "consumables",
            "data"
        ));
        // return $data;
    }
}
