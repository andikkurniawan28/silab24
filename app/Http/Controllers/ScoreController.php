<?php

namespace App\Http\Controllers;

use App\Models\PDE;
use App\Models\Dirt;
use App\Models\Score;
use App\Models\Posbrix;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CoreSampleSamplingController;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();
        $dirts = Dirt::all();
        $scores = Score::whereBetween("created_at", [session("time_start"), session("time_end")])->get();
        return view("score.index", compact("stations", "dirts", "scores"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(["data" => strtoupper($request->data)]);
        $data = PDE::processAntrian($request);
        $posbrix_id = Posbrix::where("spta", $data["spta"])->get()->last()->id ?? "NOT FOUND!";
        if($posbrix_id == "NOT FOUND!"){
            $posbrix_id = CoreSampleSamplingController::createNewPosbrix($request, $data);
            self::createNewScore($request, $posbrix_id);
        } else {
            Posbrix::whereId($posbrix_id)->update($data);
            if(Score::where("posbrix_id", $posbrix_id)->count("id") == 0){
                self::createNewScore($request, $posbrix_id);
            }
        }
        return redirect()->back()->with("success", "Penilaian MBS berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stations = Station::all();
        $dirts = Dirt::all();
        $score = Score::whereId($id)->get()->last();
        return view("score.edit", compact("stations", "dirts", "score"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->request->add(["value" => self::count($request)]);
        Score::whereId($id)->update($request->except(["_token", "_method"]));
        return redirect()->route("scores.index")->with("success", "Penilaian MBS berhasil dirubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Score::whereId($id)->delete();
        return redirect()->back()->with("success", "Penilaian MBS berhasil dihapus");
    }

    public static function createNewScore($request, $posbrix_id){
        Score::create([
            "user_id"       => $request->user_id,
            "posbrix_id"    => $posbrix_id,
            "cane_table"    => $request->cane_table,
            "Daduk"         => $request->Daduk,
            "Akar"          => $request->Akar,
            "Tali_pucuk"    => $request->Tali_pucuk,
            "Pucuk"         => $request->Pucuk,
            "Sogolan"       => $request->Sogolan,
            "Tebu_muda"     => $request->Tebu_muda,
            "Lelesan"       => $request->Lelesan,
            "Terbakar"      => $request->Terbakar,
            "value"         => self::count($request),
        ]);
    }

    public static function count($request){
        foreach(Dirt::all() as $dirt){
            $score[$dirt->id] = ($request->{$dirt->name} * $dirt->value) / 10;
        }
        return array_sum($score);
    }

}
