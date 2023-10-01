<?php

namespace App\Models;

use App\Models\Balance;
use App\Models\Mollase;
use App\Models\Analysis;
use App\Models\Material;
use App\Models\Kactivity;
use App\Models\Rawsugarinput;
use App\Models\Rawsugaroutput;
use App\Models\Chemicalchecking;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    public static function analisaLab(){
        $data = Material::select(["id", "station_id", "name"])->get();
        for($i=0; $i<count($data); $i++){
            $data[$i]["analysis"] = Analysis::whereBetween("created_at", [session("time_start"), session("time_end")])
            ->where("material_id", $data[$i]["id"])->where("is_verified", 1)
                ->select(DB::raw('
                    count(`id`)                 `Jumlah`,
                    sum(`volume`)               `Volume`,
                    round(avg(`%Brix`),2)       `%Brix`,
                    round(avg(`%Pol`),2)        `%Pol`,
                    round(avg(`Pol`),2)         `Pol`,
                    round(avg(`HK`),2)          `HK`,
                    round(avg(`IU`),2)          `IU`,
                    round(avg(`%Air`),2)        `%Air`,
                    round(avg(`%Zk`),2)         `%Zk`,
                    round(avg(`CaO`),2)         `CaO`,
                    round(avg(`pH`),2)          `pH`,
                    round(avg(`Turbidity`),2)   `Turbidity`,
                    round(avg(`TDS`),2)         `TDS`,
                    round(avg(`Sadah`),2)       `Sadah`,
                    round(avg(`P2O5`),2)        `P2O5`,
                    round(avg(`SO2`),2)         `SO2`,
                    round(avg(`BJB`),2)         `BJB`,
                    round(avg(`TSAI`),2)        `TSAI`,
                    round(avg(`Succrose`),2)    `Succrose`,
                    round(avg(`Glucose`),2)     `Glucose`,
                    round(avg(`Fructose`),2)    `Fructose`,
                    round(avg(`Suhu`),2)        `Suhu`,
                    round(avg(`PI`),2)          `PI`,
                    round(avg(`%Sabut`),2)      `%Sabut`,
                    round(avg(`%Kapur`),2)      `%Kapur`,
                    round(avg(`Pol_Ampas`),2)   `Pol_Ampas`
                '))->first();
        }
        return $data;
    }

    public static function keliling(){
        $data = Kactivity::whereBetween("created_at", [session("time_start"), session("time_end")])
            ->select(DB::raw('
                    round(avg(`Tekanan_Pre_Evaporator_1`), 2)             `Tekanan_Pre_Evaporator_1`,
                    round(avg(`Tekanan_Pre_Evaporator_2`), 2)             `Tekanan_Pre_Evaporator_2`,
                    round(avg(`Tekanan_Evaporator_1`), 2)                 `Tekanan_Evaporator_1`,
                    round(avg(`Tekanan_Evaporator_2`), 2)                 `Tekanan_Evaporator_2`,
                    round(avg(`Tekanan_Evaporator_3`), 2)                 `Tekanan_Evaporator_3`,
                    round(avg(`Tekanan_Evaporator_4`), 2)                 `Tekanan_Evaporator_4`,
                    round(avg(`Tekanan_Evaporator_5`), 2)                 `Tekanan_Evaporator_5`,
                    round(avg(`Tekanan_Evaporator_6`), 2)                 `Tekanan_Evaporator_6`,
                    round(avg(`Tekanan_Evaporator_7`), 2)                 `Tekanan_Evaporator_7`,
                    round(avg(`Tekanan_Pan_1`), 2)                        `Tekanan_Pan_1`,
                    round(avg(`Tekanan_Pan_2`), 2)                        `Tekanan_Pan_2`,
                    round(avg(`Tekanan_Pan_3`), 2)                        `Tekanan_Pan_3`,
                    round(avg(`Tekanan_Pan_4`), 2)                        `Tekanan_Pan_4`,
                    round(avg(`Tekanan_Pan_5`), 2)                        `Tekanan_Pan_5`,
                    round(avg(`Tekanan_Pan_6`), 2)                        `Tekanan_Pan_6`,
                    round(avg(`Tekanan_Pan_7`), 2)                        `Tekanan_Pan_7`,
                    round(avg(`Tekanan_Pan_8`), 2)                        `Tekanan_Pan_8`,
                    round(avg(`Tekanan_Pan_9`), 2)                        `Tekanan_Pan_9`,
                    round(avg(`Tekanan_Pan_10`), 2)                       `Tekanan_Pan_10`,
                    round(avg(`Tekanan_Pan_11`), 2)                       `Tekanan_Pan_11`,
                    round(avg(`Tekanan_Pan_12`), 2)                       `Tekanan_Pan_12`,
                    round(avg(`Tekanan_Pan_13`), 2)                       `Tekanan_Pan_13`,
                    round(avg(`Tekanan_Pan_14`), 2)                       `Tekanan_Pan_14`,
                    round(avg(`Tekanan_Pan_15`), 2)                       `Tekanan_Pan_15`,
                    round(avg(`Tekanan_Pan_16`), 2)                       `Tekanan_Pan_16`,
                    round(avg(`Tekanan_Pan_17`), 2)                       `Tekanan_Pan_17`,
                    round(avg(`Tekanan_Pan_18`), 2)                       `Tekanan_Pan_18`,
                    round(avg(`Suhu_Pre_Evaporator_1`), 2)                `Suhu_Pre_Evaporator_1`,
                    round(avg(`Suhu_Pre_Evaporator_2`), 2)                `Suhu_Pre_Evaporator_2`,
                    round(avg(`Suhu_Evaporator_1`), 2)                    `Suhu_Evaporator_1`,
                    round(avg(`Suhu_Evaporator_2`), 2)                    `Suhu_Evaporator_2`,
                    round(avg(`Suhu_Evaporator_3`), 2)                    `Suhu_Evaporator_3`,
                    round(avg(`Suhu_Evaporator_4`), 2)                    `Suhu_Evaporator_4`,
                    round(avg(`Suhu_Evaporator_5`), 2)                    `Suhu_Evaporator_5`,
                    round(avg(`Suhu_Evaporator_6`), 2)                    `Suhu_Evaporator_6`,
                    round(avg(`Suhu_Evaporator_7`), 2)                    `Suhu_Evaporator_7`,
                    round(avg(`Suhu_Heater_1`), 2)                        `Suhu_Heater_1`,
                    round(avg(`Suhu_Heater_2`), 2)                        `Suhu_Heater_2`,
                    round(avg(`Suhu_Heater_3`), 2)                        `Suhu_Heater_3`,
                    round(avg(`Suhu_Air_Injeksi`), 2)                     `Suhu_Air_Injeksi`,
                    round(avg(`Suhu_Air_Terjun`), 2)                      `Suhu_Air_Terjun`,
                    round(avg(`Tekanan_Pompa_Hampa`), 2)                  `Tekanan_Pompa_Hampa`,
                    round(avg(`Tekanan_Uap_Baru`), 2)                     `Tekanan_Uap_Baru`,
                    round(avg(`Tekanan_Uap_Bekas`), 2)                    `Tekanan_Uap_Bekas`,
                    round(avg(`Tekanan_Uap_3Ato`), 2)                     `Tekanan_Uap_3Ato`
            '))->first();
        return $data;
    }

    public static function chemical(){
        $data = Chemicalchecking::whereBetween("created_at", [session("time_start"), session("time_end")])
            ->select(DB::raw('
                    round(avg(`Kapur`), 2)          `Kapur`,
                    round(avg(`Belerang`), 2)       `Belerang`,
                    round(avg(`Flocculant`), 2)     `Flocculant`,
                    round(avg(`NaOH`), 2)           `NaOH`,
                    round(avg(`B894`), 2)           `B894`,
                    round(avg(`B895`), 2)           `B895`,
                    round(avg(`B210`), 2)           `B210`,
                    round(avg(`Blotong`), 2)        `Blotong`
            '))->first();
        return $data;
    }

    public static function consumable(){
        $data = ConsumableUsage::whereBetween("created_at", [session("time_start"), session("time_end")])
            ->select(DB::raw('
                    round(avg(`Form_A`), 2)         `Form_A`,
                    round(avg(`Form_B`), 2)         `Form_B`
            '))->first();
        return $data;
    }

    public static function material_balance(){
        $data = Balance::leftjoin("imbibitions", "balances.created_at", "imbibitions.created_at")
            ->whereBetween("balances.created_at", [session("time_start"), session("time_end")])
            ->select(DB::raw('
                    sum(`tebu`)             `tebu`,
                    sum(`flow_nm`)          `flow_nm`,
                    sum(`flow_imb`)         `flow_imb`
            '))->first();
        return $data;
    }

    public static function rs_in(){
        $data = Rawsugarinput::whereBetween("created_at", [session("time_start"), session("time_end")])
            ->select(DB::raw('
                    sum(`netto`)    `netto`
            '))->first();
        return $data;
    }

    public static function rs_out(){
        $data = Rawsugaroutput::whereBetween("created_at", [session("time_start"), session("time_end")])
            ->select(DB::raw('
                    sum(`netto`)    `netto`
            '))->first();
        return $data;
    }

    public static function tetes(){
        $data = Mollase::whereBetween("created_at", [session("time_start"), session("time_end")])
            ->select(DB::raw('
                    sum(`netto`)    `netto`
            '))->first();
        return $data;
    }

    public static function posbrix(){
        $data = Posbrix::whereBetween("created_at", [session("time_start"), session("time_end")])
            ->select(DB::raw('
                    round(avg(`brix`), 2)                                               `brix_total`,
                    round(avg(IF(`category` = "CS", `brix`, NULL)), 2)                  `brix_core_sample`,
                    round(avg(IF(`category` = "EK", `brix`, NULL)), 2)                  `brix_magersari`,
                    round(avg(IF(`category` = "EB|GD", `brix`, NULL)), 2)               `brix_gandeng`,
                    count(`id`)                                                         `jumlah_total`,
                    count(IF(`category` = "CS", `id`, NULL))                            `jumlah_core_sample`,
                    count(IF(`category` = "EK", `id`, NULL))                            `jumlah_magersari`,
                    count(IF(`category` = "EB|GD", `id`, NULL))                         `jumlah_gandeng`,
                    count(IF(`is_accepted` = 0, `id`, NULL))                            `ditolak_total`,
                    count(IF(`category` = "CS" AND `is_accepted` = 0, `id`, NULL))      `ditolak_core_sample`,
                    count(IF(`category` = "EK" AND `is_accepted` = 0, `id`, NULL))      `ditolak_magersari`,
                    count(IF(`category` = "EB|GD" AND `is_accepted` = 0, `id`, NULL))   `ditolak_gandeng`,
                    count(IF(`is_accepted` = 1, `id`, NULL))                            `diterima_total`,
                    count(IF(`category` = "CS" AND `is_accepted` = 1, `id`, NULL))      `diterima_core_sample`,
                    count(IF(`category` = "EK" AND `is_accepted` = 1, `id`, NULL))      `diterima_magersari`,
                    count(IF(`category` = "EB|GD" AND `is_accepted` = 1, `id`, NULL))   `diterima_gandeng`,
                    count(IF(`is_accepted` = 2, `id`, NULL))                            `terbakar_total`,
                    count(IF(`category` = "CS" AND `is_accepted` = 2, `id`, NULL))      `terbakar_core_sample`,
                    count(IF(`category` = "EK" AND `is_accepted` = 2, `id`, NULL))      `terbakar_magersari`,
                    count(IF(`category` = "EB|GD" AND `is_accepted` = 2, `id`, NULL))   `terbakar_gandeng`,
                    count(IF(`is_accepted` = 3, `id`, NULL))                            `lolos_total`,
                    count(IF(`category` = "CS" AND `is_accepted` = 3, `id`, NULL))      `lolos_core_sample`,
                    count(IF(`category` = "EK" AND `is_accepted` = 3, `id`, NULL))      `lolos_magersari`,
                    count(IF(`category` = "EB|GD" AND `is_accepted` = 3, `id`, NULL))   `lolos_gandeng`
            '))->first();
        return $data;
    }

    // count(IF(`is_accepted` = 1, `id`, NULL))                    `diterima`,
    // count(IF(`is_accepted` = 0, `id`, NULL))                    `ditolak`
}
