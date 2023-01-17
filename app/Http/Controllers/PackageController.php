<?php

namespace App\Http\Controllers;

use App\Resources\PackageModel;
use Illuminate\Http\Request;
use App\Http\Requests\storePackageRule;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["packages"] = PackageModel::where('status', '>', 0)->get();
        return view('package.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePackageRule $request)
    {
        // Retrieve the validated input data...
        $validated = $request->validated();
        $package = PackageModel::create([
            'name' => $request->package_name,
            'slogan' => $request->package_slogan,
            'totalprice' => $request->total_price,
            'discountprice' => $request->discount_price,
            'subscribtion_type' => $request->subscribtion_type,
            'trial_days' => $request->trial_days,
            'benifit' => 'no',
            'group_id' => 0,
            'created_by' => 1
        ]);
        $package->save();
        return redirect()->route('packages.index')->with('success', 'User saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PackageModel  $packageModel
     * @return \Illuminate\Http\Response
     */
    public function show(PackageModel $packageModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PackageModel  $packageModel
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageModel $packageModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PackageModel  $packageModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackageModel $packageModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PackageModel  $packageModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageModel $packageModel)
    {
        //
    }
}
