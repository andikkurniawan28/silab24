<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\ConsumableUsage;
use App\Models\Consumable;
use Illuminate\Http\Request;

class ConsumableUsageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stations           = Station::all();
        $consumables        = Consumable::all();
        $consumableusages   = ConsumableUsage::whereBetween("created_at", [session("time_start"), session("time_end")])->get();
        return view("consumableusage.index", compact("stations", "consumables", "consumableusages"));

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
        foreach(Consumable::all() as $consumable){
            if($request->has($consumable->name)){
                ${$consumable->name} = $request->{$consumable->name} * -1;
                $request->request->add(["{$consumable->name}" => ${$consumable->name}]);
            }
        }
        ConsumableUsage::create($request->all());
        return redirect()->back()->with("success", "Penggunaan Bahan berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConsumableUsage  $consumableusage
     * @return \Illuminate\Http\Response
     */
    public function show(ConsumableUsage $consumableusage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsumableUsage  $consumableusage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stations           = Station::all();
        $consumables        = Consumable::all();
        $consumableusage    = ConsumableUsage::whereId($id)->get()->last();
        return view("consumableusage.edit", compact("stations", "consumables", "consumableusage"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConsumableUsage  $consumableusage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        foreach(Consumable::all() as $consumable){
            if($request->has($consumable->name)){
                ${$consumable->name} = $request->{$consumable->name} * -1;
                $request->request->add(["{$consumable->name}" => ${$consumable->name}]);
            }
        }
        ConsumableUsage::where("id", $id)->update($request->except(["_token", "_method"]));
        return redirect()->route("consumableusages.index")->with("success", "Penggunaan Bahan berhasil dirubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsumableUsage  $consumableusage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        ConsumableUsage::whereId($id)->delete();
        return redirect()->back()->with("success", "Penggunaan Bahan berhasil dihapus");
    }
}
