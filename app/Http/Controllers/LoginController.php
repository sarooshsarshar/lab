<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

class LoginController extends Controller
{

    public function authenticate(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            // Authentication passed...
            return redirect()->intended('admin/dashboard');
        }
    }
}
