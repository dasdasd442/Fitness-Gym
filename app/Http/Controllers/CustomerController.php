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
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    // ILISANAN ANG CUSTOMER_ID ARI
    public function index() {

        $customer = DB::table('customer')->select(DB::raw('*'))->where('customer_id', '=', 1)->get()->toArray();
        $yourClasses = DB::table('customerclass')->select(DB::raw('*'))
                            ->join('customer', 'customer.customer_id', '=', 'customerclass.customer_id')
                            ->join('class', 'class.class_id', '=', 'customerclass.class_id')
                            ->join('employee', 'employee.employee_id', '=', 'class.class_instructor_id')
                            ->where('customerclass.customer_id', '=', 1)
                            ->get()->toArray();
        
        return view('customer.index', [
            'customer' => $customer[0],
            'subscribed_on' => date("F j, Y, g:i a", strtotime($customer[0]->membership_start_date)),
            'expires_on' => date("F j, Y, g:i a", strtotime($customer[0]->membership_end_date)),
            'classes' => $yourClasses
        ]);
    }
    
    public function shop() {

        $products = DB::table('product')->select(DB::raw('*'))->get()->toArray();
        return view('customer.shop', ['products' => $products]);
    }

    public function classes() {
        $available_classes = DB::table('class')->select(DB::raw('*'))
                ->join('employee', 'employee.employee_id', 'class.class_instructor_id')
                ->where('class_status', '=', 'receiving')->get()->toArray();

        return view('customer.classes',  ['classes' => $available_classes, 'curpage' => "Classes"]);
    }
}
