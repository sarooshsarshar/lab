<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resources\TestModel;
use App\Resources\GroupModel;
use Illuminate\Support\Facades\DB;
use App\Resources\UnitModel;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data["test"] = DB::table('test')
            ->join('group', 'group.id', '=', 'test.group_id')
            ->leftJoin('unit', 'unit.id', '=', 'test.unit_id')
            ->select('test.id', 'group.id AS group_id', 'test.prference_range', 'test.unit_id', 'unit.unit_name', 'test.name AS test_name', 'test.price AS test_price', 'test.duration AS test_duration', 'group.name AS group_name')
            ->where('test.status', 1)
            ->get();
        $data["group"] = GroupModel::all();
        $data["units"] = UnitModel::all();
        return view('test.index', $data);
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
            'name' => 'required|max:250',
            'preference_range' => 'nullable|max:350',
            'detail' => 'nullable',
            'unit' => 'nullable',
            'group_id' => 'required',
            'price' => 'required',
            'duration' => 'required',
        ]);
        TestModel::create([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'prference_range' => $request->preference_range,
            'detail' => $request->detail,
            'unit_id' => $request->unit,
            'group_id' => $request->group_id,
        ])->save();
        return redirect()->route('test.index')->with(['status' => 1, 'message' => 'Test  Added!']);
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $test_id)
    {
        $unit = TestModel::where(['id' => $test_id])->firstOrFail();
        $request->validate([
            'name' => 'required|max:250',
            'preference_range' => 'nullable|max:350',
            'detail' => 'nullable',
            'unit' => 'nullable',
            'group_id' => 'required',
            'price' => 'required',
            'duration' => 'required',
        ]);
        $units = [
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'prference_range' => $request->preference_range,
            'detail' => $request->detail,
            'unit_id' => $request->unit,
            'group_id' => $request->group_id,
        ];
        DB::table('test')->where('id', $test_id)->update($units);
        return redirect()->route('test.index')->with(['status' => 1, 'message' => 'Test  Updated!']);
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
    public function destroy($id)
    {
        //
    }
}
