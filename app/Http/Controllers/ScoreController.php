<?php

namespace App\Http\Controllers;

use App\Models\Ari;
use App\Models\Rit;
use App\Models\Dirt;
use App\Models\Score;
use App\Models\Factor;
use App\Models\Posbrix;
use App\Models\Station;
use App\Models\ScoringValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $scores = Score::latest()->paginate(env('TABLE_LIMIT'));
        $dirts = Dirt::all();
        $score_rit_id = Score::select('rit_id')->get();
        $rits = Rit::whereNotIn('id', $score_rit_id)->get();
        return view('score.index', compact('scores', 'rits', 'stations', 'dirts'));
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
        $request->validate([
            'rit_id' => 'required|unique:scores',
        ]);
        $score = self::generateScore($request);
        return $score;
        // $name = self::getImage($request);
        // Score::insert([
        //     'rit_id' => $request->rit_id,
        //     'user_id' => $request->user_id,
        //     'cane_table' => $request->cane_table,
        //     'value' => $score,
        //     'image1' => $name['img1'],
        //     'image2' => $name['img2'],
        // ]);
        // $score_id = Score::where('cane_table', $request->cane_table)->get()->last()->id;
        // foreach(Dirt::all() as $dirt){
        //     ScoringValue::insert([
        //         'score_id' => $score_id,
        //         'dirt_id' => $dirt->id,
        //         'value' => $request->{$dirt->id},
        //     ]);
        // }
        // return redirect()->back()->with('success', 'Data berhasil disimpan');
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
    public function edit(Score $score)
    {
        //
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
        Score::whereId($id)->update([
            'score' => $request->score,
        ]);
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image1 = Score::whereId($id)->get()->last()->image1;
        $image2 = Score::whereId($id)->get()->last()->image2;
        File::delete(public_path($image1));
        File::delete(public_path($image2));
        Score::whereId($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }

    public function getImage($request)
    {
        if(Score::count() == 0){
            $score_id = 0;
        }
        else {
            $score_id = (Score::get()->last()->id) + 1;
        }

        switch($request->cane_table){
            case 1 :
                $url = "http://admin:qc_12345@192.168.29.101/ISAPI/streaming/channels/1/picture?videocodec=jpeg";
                $url2 = "http://admin:qc_12345@192.168.29.101/ISAPI/streaming/channels/1/picture?videocodec=jpeg";
            break;
            case 2 :
                $url = "http://admin:qc_12345@192.168.29.102/ISAPI/streaming/channels/1/picture?videocodec=jpeg";
                $url2 = "http://admin:qc_12345@192.168.29.102/ISAPI/streaming/channels/1/picture?videocodec=jpeg";
            break;
            case 3 :
                $url = "http://admin:qc_12345@192.168.29.103/ISAPI/streaming/channels/1/picture?videocodec=jpeg";
                $url2 = "http://admin:qc_12345@192.168.29.103/ISAPI/streaming/channels/1/picture?videocodec=jpeg";
            break;
            case 4 :
                $url = "http://admin:qc_12345@192.168.29.104/ISAPI/streaming/channels/1/picture?videocodec=jpeg";
                $url2 = "http://admin:qc_12345@192.168.29.104/ISAPI/streaming/channels/1/picture?videocodec=jpeg";
            break;
            case 5 :
                $url = "http://admin:qc_12345@192.168.29.105/ISAPI/streaming/channels/1/picture?videocodec=jpeg";
                $url2 = "http://admin:qc_12345@192.168.29.105/ISAPI/streaming/channels/1/picture?videocodec=jpeg";
            break;
        }

        // Save Image 1
        header("Content-type: image/jpeg");
        $image = file_get_contents($url);

        // Save Image 2
        header("Content-type: image/jpeg");
        $image2 = file_get_contents($url2);

        $img1 = 'skmt/'.$score_id.'-1.jpg';
        $img2 = 'skmt/'.$score_id.'-2.jpg';

        file_put_contents($img1, $image);
        file_put_contents($img2, $image2);

        $data['img1'] = $img1;
        $data['img2'] = $img2;

        return $data;
    }

    public function generateScore($request){

        // $score_from_ari = self::rewardPunishmentAri($request);

        $daduk = $request->{1} * Dirt::whereId(1)->get()->last()->value / 10;
        $akar = $request->{2} * Dirt::whereId(2)->get()->last()->value / 10;
        $tali_pucuk = $request->{3} * Dirt::whereId(3)->get()->last()->value / 10;
        $pucuk = $request->{4}  * Dirt::whereId(4)->get()->last()->value / 10;
        $sogolan = $request->{5} * Dirt::whereId(5)->get()->last()->value / 10;
        $tebu_muda = $request->{6} * Dirt::whereId(6)->get()->last()->value / 10;
        $lelesan = $request->{7} * Dirt::whereId(7)->get()->last()->value / 10;
        $terbakar = $request->{8} * Dirt::whereId(8)->get()->last()->value / 10;
        $score = ($daduk + $akar + $tali_pucuk + $pucuk + $sogolan + $tebu_muda + $lelesan + $terbakar);

        if($score <= 1 ) $grade = "MBS Bintang";
        else if($score > 1.1 && $score <= 3.0) $grade = "MBS Plus";
        else if($score > 3.1 && $score <= 5.0) $grade = "MBS";
        else if($score > 5.1 && $score <= 20.0) $grade = "Daduk/Tali Pucuk/Akar";
        else if($score > 20.1 && $score <= 40.0) $grade = "Sogolan/Pucuk/Akar Tanah/Kocor Air";
        else if($score > 40.1 && $score <= 50.0) $grade = "Pucuk & Sogolan";
        else if($score > 50) $grade = "NGP Khusus";

        return $score;

    }

    public function rewardPunishmentAri($request){
        $ari_sampling_id = AriSampling::where('rit_id', $request->rit_id)->get()->last()->id;
        $register = Rit::whereId($request->rit_id)->get()->last()->register;

        if(Ari::where('ari_sampling_id', $ari_sampling_id)->count() > 0){

            $rendemen_proposal = /* Get Rendemen Proposal */ '';
            $rendemen_ari = Ari::where('ari_sampling_id', $ari_sampling_id)->get()->last()->yield;
            $selisih = $rendemen_ari - $rendemen_proposal;

            // Switch goes here ...

        }
        else {

            $score_from_ari = 0.0;

        }

        return $score_from_ari;
    }
}
