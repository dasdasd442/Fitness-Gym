<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class EmployeeLogInController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:employee')->except(['logout']);;
    }


    public function showLogInForm()
    {
        return view('employee.login');
    }

    public function login(Request $request) {
        // return $request;
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // intellisense senses this an error but it's actually not
        if (Auth::guard('employee')
                ->attempt(['email' => $request->email, 'password' => $request->password])) 
        {
            return redirect(route('employee.index'));
        }

        return redirect()->back()->withInput($request->only('email'));
    }

    public function logout() {
        Auth::guard('employee')->logout();
        return redirect(route('employee.login'));
    }
}
