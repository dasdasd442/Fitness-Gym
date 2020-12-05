<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLogInController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:admin')->except(['logout']);;
    }

    public function showLogInForm() {
        return view('admin.login');
    }

    public function login(Request $request) {
        // return $request;
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // intellisense senses this an error but it's actually not
        if (Auth::guard('admin')
                ->attempt(['email' => $request->email, 'password' => $request->password])) 
        {
            return redirect(route('admin.index'));
        }

        return redirect()->back()->withInput($request->only('email'));
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }
}
