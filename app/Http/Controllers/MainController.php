<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Classes;
use App\Models\Customer;
use App\Models\CustomerClass;
use App\Models\Employee;
use App\Models\Entrylog;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Services;
use App\Models\TransactionDetail;
use DateTime;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    public function login(Request $request) {
        // return $request;
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // intellisense senses this an error but it's actually not
        if (Auth::guard('customer')
                ->attempt(['email' => $request->email, 'password' => $request->password])) 
        {
            return redirect(route('customer.index'));
        }

        return redirect()->back()->withInput($request->only('email'));
    }

    public function logout() {
        if (Auth::check()) {
            Auth::guard('customer')->logout();
        }
        return redirect(route('mainpage-index'));
    }

    public function signupSubmit(Request $request) {
        
        try {
            DB::table('customer')->insert([
                'customer_name' => $request->customer_name,
                'customer_age' => $request->customer_age,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'customer_status' => 'No Subscription',
                'membership_expires_in' => 0,
                ]
            );
            return redirect(route('mainpage-index'))->with('msg', 'Added Successfully!');
        } catch(\Illuminate\Database\QueryException $ex) { 
            return redirect()->back()
            ->with(['error' => 'Email is already taken.', 'customer_name' => $request->customer_name, 'customer_age' => $request->customer_age]);
            // dd($ex);
        }

    }
    
    
    // GET REQUESTS
    public function index() {
        $available_classes = DB::table('class')->select(DB::raw('*'))
                                ->where('class_status', '=', 'receiving')->get()->toArray();
        return view('mainpage.index-layout', ['classes' => $available_classes, 'curpage' => "Home"]);
    }

    public function locationPricing() {
        return view('mainpage.main-page-location-layout', ['curpage' => "Location and Pricing"]);
    }

    public function mainpageClasses() {
        $available_classes = DB::table('class')->select(DB::raw('*'))
                                ->join('employee', 'employee.employee_id', 'class.class_instructor_id')
                                ->where('class_status', '=', 'receiving')->get()->toArray();
        
        return view('mainpage.main-page-classes', ['classes' => $available_classes, 'curpage' => "Classes"]);
    }

    public function mainpageShop() {
        

        $products = DB::table('product')->select(DB::raw('*'))->get()->toArray();

        // return $products;
        
        return view('mainpage.main-page-shop', ['curpage' => "Shop", 'products' => $products]);
    }

    public function mainpageAbout() {
        return view('mainpage.main-page-about', ['curpage' => "About Us"]);
    }

    public function mainpageSignup() {
        return view('mainpage.main-page-sign-up', ['curpage' => "Sign Up"]);
    }
}
