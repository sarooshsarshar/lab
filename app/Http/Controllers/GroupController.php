<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resources\GroupModel;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["units"] = GroupModel::all();
        return view('group.index', $data);
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
        ]);
        $unit = GroupModel::create([
            'name' => $request->name,
        ]);
        $unit->save();
        return redirect()->route('group.index')->with('success', 'Group saved!');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $group_id)
    {

        GroupModel::where(['id' => $group_id])->firstOrFail();
        $request->validate([
            'name' => 'required|max:50',
        ]);
        $units = [
            'name' => $request->name,
        ];
        DB::table('group')->where('id', $group_id)->update($units);
        return redirect()->route('group.index')->with('success', 'Group Update!');
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
    public function delete(GroupModel $group)
    {
        $group->delete();
        return redirect()->route('group.index')->with('success', 'Group Deleted!');
    }
}
