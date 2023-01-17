<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Resources\UnitModel;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["units"] = UnitModel::all();
        return view('unit.index', $data);
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
            'unit_name' => 'required|max:50',
        ]);
        $unit = UnitModel::create([
            'unit_name' => $request->unit_name,
        ]);
        $unit->save();
        return redirect()->route('unit.index')->with(['status' => 1, 'message' => 'Unit  Saved!']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $unit_id)
    {
        $unit = UnitModel::where(['id' => $unit_id])->firstOrFail();
        $request->validate([
            'unit_name' => 'required|max:50',
        ]);
        $units = [
            'unit_name' => $request->unit_name,
        ];
        DB::table('unit')->where('id', $unit_id)->update($units);
        return redirect()->route('unit.index')->with(['status' => 1, 'message' => 'Unit  Updated!']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(UnitModel $unit)
    {
        $unit->delete();
        return redirect()->route('unit.index')->with(['status' => 1, 'message' => 'Unit  Deleted!']);
    }
}
