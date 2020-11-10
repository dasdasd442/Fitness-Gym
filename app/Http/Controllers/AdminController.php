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
use App\Models\TransactionDetail;
use DateTime;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /* GET REQUEST */
    public function index() {
        return view('admin.index');
    }

    public function login() {
        return view('admin.login');
    }

    public function register() {
        return view('admin.register');
    }

    public function newTransaction() {
        return view('admin.newtransaction');
    }

    public function classesDetails() {
        $classes = DB::table('class')
                    ->select(DB::raw('*'))
                    ->join('employee', 'employee.employee_id', 'class.class_instructor_id')
                    ->get()
                    ->toArray();

        $customerclass = DB::table('customerclass')
                        ->select(DB::raw('*'))
                        ->join('customer', 'customer.customer_id', 'customerclass.customer_id')
                        ->get()
                        ->toArray();

        return view('admin.classes', ['classes' => $classes, 'customerclass' => $customerclass]);
    }

    public function customerDetails() {
        $customers = DB::table('Customer')->select(DB::raw('*'))->get()->toArray();

        foreach($customers as $customer) {
            if ($customer->membership_start_date == '0000-00-00 00:00:00' || $customer->membership_start_date == null ) {
                $customer->membership_start_date = '---';
                $customer->membership_end_date = '---';
            }
        }

        return view('admin.customers', ['customers' => $customers]);
    }

    public function employeeDetails() {
        // this gives idk what kind of date format 
        // $employee = Employee::where('employee_type', '!=', 'Admin')
        //             ->where('employee_status', '!=', 'fired')
        //             ->get()->toArray();

        $employee = DB::table('Employee')
                    ->select(DB::raw('*'))
                    ->where('employee_type','!=', 'Admin')
                    ->where('employee_status', '!=', 'fired')
                    ->get()
                    ->toArray();

        return view('admin.employees', ['employees' => $employee]);
    }

    public function shopDetails() {
        
        $products = Product::all();
        return view('admin.shop', ['products' => $products]);
    }

    public function entrylogDetails() {

        $logs = DB::table('Entrylog')
                    ->select(DB::raw('*'))
                    ->join('Customer', 'entrylog.customer_id', '=', 'customer.customer_id')
                    ->orderBy('entrylog.created_at', 'asc')
                    ->get()
                    ->toArray();

        // return $logs;

        return view('admin.entrylogs', ['logs' => $logs]);
    }

    public function settings() {
        return view('admin.settings');
    }

    /* POST */
    public function addEmployee() {
        
        $curDate = Carbon::now();
        $employee = new Employee([
            'employee_name' => request('employee_name'),
            'employee_age' => request('employee_age'),
            'employee_email' => request('employee_email'),
            'employee_password' => 'californiagym',
            'employee_type' => 'Clerk',
            'employee_status' => 'working',
            'date_hired' => $curDate->toDateString()
        ]);

        $employee->save();
        return redirect('/employee-details')->with('msg', 'Added Successfully!');
    }

    public function addCustomer() {

        DB::table('customer')->insert([
            'customer_name' => request('customer_name'),
            'customer_age' => request('customer_age'),
            'customer_email' => request('customer_email'),
            'customer_password' => 'californiacustomer',
            'customer_status' => 'No Subscription',
            'membership_expires_in' => 0,
            ]
        );

        return redirect('/customer-details')->with('msg', 'Added Successfully!');
    }

    public function addNewLog() {

        if (request('enter')) {
            $log = new EntryLog([
                'customer_id' => request('customer_id'),
                'date_entry' => Carbon::now()
            ]);
            $log->save();
            $msg = 'Added Successfully!';
        } else if (request('exit')) {
            if (Customer::findOrFail(request('customer_id'))) {
                $log = DB::table('Entrylog')
                        ->where('customer_id', '=', request('customer_id'))
                        ->whereNull('date_exit')
                        ->update(['date_exit' => Carbon::now()]);

                $msg = $log ? 'Updated Successfully!' : 'Cannot Perform Action!';
                
            } else {
                $msg = 'Cannot Perform Action!';
            }
        }

        return redirect('/entrylog-details')->with('msg', $msg);
    }

    public function addNewClass() {
        
        if (!empty(request('class_image'))) {
            $postData = request()->only('class_image');
            $file = $postData['class_image'];
    
            $rules = array(
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            );
    
            $fileArray = array('image' => $file);
            $validator = Validator::make($fileArray, $rules);
    
            if ($validator->fails()) {
                return redirect('/classes-details')->with('msg', 'Cannot Perform Action!');
            } else {
                $class_image = request()->file('class_image')->store('uploads');
            }
        }

        if (empty(request('class_image'))) {
            $class_image = 'images/no-image.jpg';
        }

        $class = new Classes([
            'class_name' => request('class_name'), 
            'class_instructor_id' => request('class_instructor_id'), 
            'class_price' => request('class_price'), 
            'class_cur_number' => 0,
            'class_max_number', request('class_max_number'),
            'class_schedule' => request('class_schedule'),
            'class_time' => request('class_time'),
            'class_status' => 'receiving',
            'class_image' => $class_image,
            'class_description' => ' '
        ]);
        $class->save();
        $msg = 'Added Successfully!';

        return redirect('/classes-details')->with('msg', $msg);
    }


    /* UPDATE REQUEST */
    public function updateClass(Request $req) {

        if (!empty(request('class_image'))) {
            $postData = request()->only('class_image');
            $file = $postData['class_image'];
    
            $rules = array(
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            );
    
            $fileArray = array('image' => $file);
            $validator = Validator::make($fileArray, $rules);
    
            if ($validator->fails()) {
                return redirect('/classes-details')->with('msg', 'Cannot Perform Action!');
            } else {
                $class_image = request()->file('class_image')->store('uploads');
                DB::table('class')->where('class_id', '=', request('class_id'))
                    ->update(['class_image' => $class_image]);
                $msg = 'Updated Successfully!';
            }
        }
        
        if (empty(request('class_image'))) {
            $class_image = 'images/no-image.jpg';
            DB::table('class')->where('class_id', '=', request('class_id'))
                    ->update(['class_image' => $class_image]);
            $msg = 'Updated Successfully!';
        }
        
        
        if (!empty(request('class_name'))) {
            $class_name = request('class_name');
            DB::table('class')->where('class_id', '=', request('class_id'))
                ->update(['class_name' => $class_name]);
            $msg = 'Updated Successfully!';
        }
        
        if (!empty(request('class_instructor_id'))) {
            $class_instructor_id = request('class_instructor_id');
            DB::table('class')->where('class_id', '=', request('class_id'))
                ->update(['class_instructor_id' => $class_instructor_id]);
            $msg = 'Updated Successfully!';
        }

        if (!empty(request('class_price'))) {
            $class_price = request('class_price');
            DB::table('class')->where('class_id', '=', request('class_id'))
                ->update(['class_price' => $class_price]);
            $msg = 'Updated Successfully!';
        }

        if (!empty(request('class_schedule'))) {
            $class_schedule = request('class_schedule');
            DB::table('class')->where('class_id', '=', request('class_id'))
                ->update(['class_schedule' => $class_schedule]);
            $msg = 'Updated Successfully!';
        }
        
        if (!empty(request('class_time'))) {
            $class_time = request('class_time');
            DB::table('class')->where('class_id', '=', request('class_id'))
                ->update(['class_time' => $class_time]);
            $msg = 'Updated Successfully!';
        }

        if (!empty(request('class_description'))) {
            $class_description = request('class_description');
            DB::table('class')->where('class_id', '=', request('class_id'))
                ->update(['class_description' => $class_description]);
            $msg = 'Updated Successfully!';
        }

        if (!empty(request('class_max_member'))) {
            $class_max_number = request('class_max_member');
            DB::table('class')->where('class_id', '=', request('class_id'))
                ->update(['class_max_number' => $class_max_number]);
            $msg = 'Updated Successfully!';
        }


        return redirect('/classes-details')->with('msg', $msg);
    }

    /* DELETE REQUEST */
    public function removeEmployee() {

        // find the employee
        $employee = Employee::find(request('employee_id'));

        // update an employee (cannot actually delete, otherwise 
        // those tables that references this employee will throw an error)
        $employee->employee_status = 'fired';
        $employee->save();
        
        return redirect('/employee-details')->with('msg', 'Removed Successfully!');
    }

    public function removeClassMember() {

        $totalNow = intval(request('class_cur_number')) - 1;
        $customerclass_id = request('customerclass_id');
        $class_id = request('class_id');

        if (DB::table('customerclass')->where('id', '=', $customerclass_id)->delete()) {
            if (DB::table('class')->where('class_id', '=', $class_id)->update(['class_cur_number' => $totalNow])) {
                $msg = 'Removed Successfully!';
            } else {
                $msg = 'Cannot Perform Action!';
            }
        } else {
            $msg = 'Cannot Perform Action!';
        }
    
        return redirect('/classes-details')->with('msg', $msg);
    }

    public function removeClassEntirely() {

        if (DB::table('customerclass')->where('class_id', '=', request('class_id'))->delete()) {
            if (DB::table('class')->where('class_id', '=', request('class_id'))->delete()) {
                $msg = 'Removed Successfully!';
            } else {
                $msg = 'Cannot Perform Action!';    
            }
        } else {
            $msg = 'Cannot Perform Action!';
        }

        return redirect('/classes-details')->with('msg', $msg);
    }
}


