<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Consumable;
use Illuminate\Http\Request;
use App\Models\ConsumableUsage;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ConsumableStoreRequest;

class ConsumableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();
        $consumables = Consumable::all();
        foreach($consumables as $consumable){
            $saldo[$consumable->name] = ConsumableUsage::sum($consumable->name);
        }
        return view("consumable.index", compact("stations", "consumables", "saldo"));
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
    public function store(ConsumableStoreRequest $request)
    {
        Consumable::create($request->all());
        DB::statement("ALTER TABLE `consumable_usages` ADD `$request->name` DOUBLE(8,2)");
        return redirect()->back()->with("success", "Bahan-Bahan Lab berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Station  $consumable
     * @return \Illuminate\Http\Response
     */
    public function show(Consumable $consumable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Station  $consumable
     * @return \Illuminate\Http\Response
     */
    public function edit(Consumable $consumable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Station  $consumable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Consumable::where("id", $id)->update($request->except(["_token", "_method"]));
        return redirect()->back()->with("success", "Bahan-Bahan Lab berhasil dirubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Station  $consumable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Consumable::whereId($id)->delete();
        DB::statement("ALTER TABLE `consumable_usages` DROP COLUMN `$request->name`");
        return redirect()->back()->with("success", "Bahan-Bahan Lab berhasil dihapus");
    }
}
