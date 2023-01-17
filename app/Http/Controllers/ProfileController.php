<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["user_info"] = Auth::user();
        return view('profile', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = $request->validate([
            'first_name' => 'required|max:40',
            'last_name' => 'required|max:40',
            'password' => 'nullable|min:8|max:32',
            'email' => 'required|max:120|email:rfc,dns|unique:users,email,' . Auth::id(),
        ]);
        $info = array(
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
        );
        if (!empty($request->password)) {
            $info['password'] = Hash::make($request->password);
        }
        DB::table('users')->where('id', Auth::id())->update($info);
        return redirect()->route('profile')->with(['status' => true, 'message' => "Profile Update"]);
    }
}
