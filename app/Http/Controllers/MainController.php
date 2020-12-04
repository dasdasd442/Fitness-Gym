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


class MainController extends Controller
{
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
        return view('mainpage.main-page-shop', ['curpage' => "Shop"]);
    }

    public function mainpageAbout() {
        return view('mainpage.main-page-about', ['curpage' => "About Us"]);
    }

    public function mainpageSignup() {
        return view('mainpage.main-page-sign-up', ['curpage' => "Sign Up"]);
    }
}
