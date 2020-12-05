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
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Hash;
// use Barryvdh\DomPDF\PDF;

class AdminController extends Controller
{
    /* GET REQUEST */
    public function index() {

        $transactions = DB::table('transactiondetail')->select(DB::raw('*'))->get()->toArray();

        $totalMembers = DB::table('customer')->select('*')
                                    ->whereRaw('membership_start_date != NULL OR 
                                                membership_start_date != \'0000-00-00 00:00:00\' ')
                                    ->get()->toArray();

        $yearlyEarnings = DB::table('transactiondetail')->select(DB::raw('SUM(total_payment) AS earnings'))
                                            ->whereRaw('DATE(`transaction_date`) >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR)
                                            AND DATE (`transaction_date`) <= CURDATE()')
                                            ->get()->toArray();
        
        $monthlyEarnings = DB::table('transactiondetail')->select(DB::raw('SUM(total_payment) AS earnings'))
                                            ->whereRaw('YEAR(`transaction_date`) = YEAR(NOW()) AND
                                            MONTH(`transaction_date`) = MONTH(NOW())')
                                            ->get()->toArray();


        // return $monthlyEarnings;
        $dailyEarnings = DB::table('transactiondetail')->select(DB::raw('SUM(total_payment) AS earnings'))
                                            ->whereRaw('DATE(`transaction_date`) = DATE(CURDATE())')
                                            ->get()->toArray();

        $lifetimeEarnings = DB::table('transactiondetail')->select(DB::raw('SUM(total_payment) AS earnings'))->get()->toArray();


        $jan = DB::table('transactiondetail')->select(DB::raw('SUM(total_payment) AS earnings'))
                ->whereRaw('MONTH(transaction_date) = 1 AND YEAR(transaction_date) = YEAR(CURDATE())')->get()->toArray();
                    
        $feb = DB::table('transactiondetail')->select(DB::raw('SUM(total_payment) AS earnings'))
                ->whereRaw('MONTH(transaction_date) = 2 AND YEAR(transaction_date) = YEAR(CURDATE())')->get()->toArray();
        $mar = DB::table('transactiondetail')->select(DB::raw('SUM(total_payment) AS earnings'))
                 ->whereRaw('MONTH(transaction_date) = 3  AND YEAR(transaction_date) = YEAR(CURDATE())')->get()->toArray();
        $apr = DB::table('transactiondetail')->select(DB::raw('SUM(total_payment) AS earnings'))
                ->whereRaw('MONTH(transaction_date) = 4  AND YEAR(transaction_date) = YEAR(CURDATE())')->get()->toArray();
        $may = DB::table('transactiondetail')->select(DB::raw('SUM(total_payment) AS earnings'))
                ->whereRaw('MONTH(transaction_date) = 5  AND YEAR(transaction_date) = YEAR(CURDATE())')->get()->toArray();
        $jun = DB::table('transactiondetail')->select(DB::raw('SUM(total_payment) AS earnings'))
                ->whereRaw('MONTH(transaction_date) = 6  AND YEAR(transaction_date) = YEAR(CURDATE())')->get()->toArray();
        $jul = DB::table('transactiondetail')->select(DB::raw('SUM(total_payment) AS earnings'))
                ->whereRaw('MONTH(transaction_date) = 7  AND YEAR(transaction_date) = YEAR(CURDATE())')->get()->toArray();
        $aug = DB::table('transactiondetail')->select(DB::raw('SUM(total_payment) AS earnings'))
                ->whereRaw('MONTH(transaction_date) = 8  AND YEAR(transaction_date) = YEAR(CURDATE())')->get()->toArray();
        $sep = DB::table('transactiondetail')->select(DB::raw('SUM(total_payment) AS earnings'))
                ->whereRaw('MONTH(transaction_date) = 9  AND YEAR(transaction_date) = YEAR(CURDATE())')->get()->toArray();
        $oct = DB::table('transactiondetail')->select(DB::raw('SUM(total_payment) AS earnings'))
                ->whereRaw('MONTH(transaction_date) = 10  AND YEAR(transaction_date) = YEAR(CURDATE())')->get()->toArray();
        $nov = DB::table('transactiondetail')->select(DB::raw('SUM(total_payment) AS earnings'))
                ->whereRaw('MONTH(transaction_date) = 11  AND YEAR(transaction_date) = YEAR(CURDATE())')->get()->toArray();
        $dec = DB::table('transactiondetail')->select(DB::raw('SUM(total_payment) AS earnings'))
                ->whereRaw('MONTH(transaction_date) = 12  AND YEAR(transaction_date) = YEAR(CURDATE())')->get()->toArray();

        $perMonth = array($jan[0]->earnings, $feb[0]->earnings, $mar[0]->earnings, $apr[0]->earnings, $may[0]->earnings, $jun[0]->earnings, $jul[0]->earnings, $aug[0]->earnings, $sep[0]->earnings, $oct[0]->earnings, $nov[0]->earnings, $dec[0]->earnings);

        $allMonthEarnings = [];
        for ($i = 0; $i <12; $i++) {
            $allMonthEarnings[$i] = ($perMonth[$i]) ? $perMonth[$i] : 0;
        }

        $monthNamesWithEarnings = array('January' => $allMonthEarnings[0], 'February' => $allMonthEarnings[1], 'March' => $allMonthEarnings[2], 'April' => $allMonthEarnings[3], 'May' => $allMonthEarnings[4], 'June' => $allMonthEarnings[5], 'July' => $allMonthEarnings[6], 'August' => $allMonthEarnings[7], 'September' => $allMonthEarnings[8], 'October' => $allMonthEarnings[9], 'November' => 
        $allMonthEarnings[10], 'December' => $allMonthEarnings[11]);


        $transactionsToday = DB::table('transactiondetail')->select(DB::raw('COUNT(*) AS num_of_transaction'))
                                ->whereRaw('DATE(`transaction_date`) = DATE(CURDATE())')->get()->toArray();

        $walkinTransactions = DB::table('transactiondetail')
                                ->select(DB::raw('*'))
                                ->join('orders', 'orders.transaction_id', 'transactiondetail.transaction_id')
                                ->whereRaw('orders.customer_id IS NULL')->get()->toArray();

        $memberTransactions = DB::table('transactiondetail')
                                ->select(DB::raw('*'))
                                ->join('orders', 'orders.transaction_id', 'transactiondetail.transaction_id')
                                ->whereRaw('orders.customer_id IS NOT NULL')->get()->toArray();
    
        
        return view('admin.index', ['totalMembers' => $totalMembers, 
                    'transactions' => $transactions,
                    'todaysTransactions' => $transactionsToday,
                    'yearlyEarnings' => $yearlyEarnings,
                    'monthlyEarnings' => $monthlyEarnings,
                    'dailyEarnings' => $dailyEarnings,
                    'lifetimeEarnings' => $lifetimeEarnings,
                    'allMonthEarnings' => $allMonthEarnings,
                    'monthNamesWithEarnings' => $monthNamesWithEarnings,
                    'walkinTransactions' => $walkinTransactions,
                    'memberTransactions' => $memberTransactions
        ]);
    }

    public function login() {
        return view('admin.login');
    }

    public function register() {
        return view('admin.register');
    }

    public function transactionDetails() {
        $transactions = DB::table('transactiondetail')
                                ->select(DB::raw('*'))
                                ->join('employee', 'employee.employee_id', 'transactiondetail.employee_id')
                                ->get()
                                ->toArray();

        $orders = DB::table('orders')
                            ->select(DB::raw('*'))
                            ->leftJoin('customer', 'customer.customer_id', 'orders.customer_id')
                            ->leftJoin('product', 'product.product_id', 'orders.product_id')
                            ->leftJoin('services', 'services.service_id', 'orders.service_id')
                            ->get()
                            ->toArray();
    
        return view('admin.transactionDetails', ['transactions' => $transactions, 'orders' => $orders]);
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

        $expires_in = 0;
        foreach($customers as $customer) {
            if ($customer->membership_start_date == '0000-00-00 00:00:00' || $customer->membership_start_date == null ) {
                $customer->membership_start_date = '---';
                $customer->membership_end_date = '---';
            } else if ($customer->membership_start_date != '0000-00-00 00:00:00' || $customer->membership_start_date != null) {
                
                $expires_in = (strtotime($customer->membership_end_date) - strtotime(Carbon::now())) / 86400;
                if (strtotime($customer->membership_end_date) <= strtotime(Carbon::now())) {
                    DB::table('Customer')->where('customer_id', '=', $customer->customer_id)
                                        ->update(['membership_expires_in' => 0, 'customer_status' => 'Expired']);
                } else {
                    DB::table('Customer')->where('customer_id', '=', $customer->customer_id)
                                        ->update(['membership_expires_in' => $expires_in]);
                }
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


        $services = DB::table('services')
                    ->select(DB::raw('*'))
                    ->join('class', 'class.class_id', '=', 'services.service_class_id')
                    ->orderBy('services.created_at', 'asc')
                    ->get()
                    ->toArray();
        $products = Product::all();
        return view('admin.shop', ['products' => $products, 'services' => $services]);
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

    public function showNewTransactionPage() {

        $latest_transaction = DB::table('transactiondetail')
                                        ->select(DB::raw('*'))
                                        ->leftJoin('employee', 'employee.employee_id', 'transactiondetail.employee_id')
                                        ->orderByDesc('transaction_id')
                                        ->limit(1)
                                        ->get()
                                        ->toArray();
        $latest_transaction_id = $latest_transaction[0]->transaction_id;

        $current_orders = DB::table('orders')
                            ->select(DB::raw('*'))
                            ->leftJoin('product', 'product.product_id', 'orders.product_id')
                            ->leftJoin('services', 'services.service_id', 'orders.service_id')
                            ->leftJoin('customer', 'customer.customer_id', 'orders.customer_id')
                            ->where('transaction_id', '=', $latest_transaction_id)
                            ->get()
                            ->toArray();
        
        return view('admin.addTransaction', [
                        'orders' => $current_orders, 
                        'latest_transaction_id' => $latest_transaction_id,
                        'transaction' => $latest_transaction[0]
        ]);
    }

    public function pdfView() {

        $transactions = DB::table('transactiondetail')->select('*')
        ->join('orders', 'orders.transaction_id', 'transactiondetail.transaction_id')
        ->leftJoin('product', 'product.product_id', 'orders.product_id')
        ->leftJoin('services', 'services.service_id', 'orders.service_id')
        ->join('employee', 'employee.employee_id', 'transactiondetail.employee_id')
        ->whereRaw('orders.product_id IS NOT NULL OR orders.service_id IS NOT NULL')
        ->get()->toArray();

        return view('admin.pdfView', ['transactions' => $transactions]);
    }

    /* POST REQUEST */
    public function addEmployee() {
       
        $curDate = Carbon::now();
        try {
            $employee = new Employee([
                'employee_name' => request('employee_name'),
                'employee_age' => request('employee_age'),
                'employee_email' => request('employee_email'),
                'employee_password' => Hash::make('password'),
                'employee_type' => 'Clerk',
                'employee_status' => 'working',
                'date_hired' => $curDate->toDateString()
            ]);
    
            $employee->save();
            return redirect(route('admin.employees'))->with('msg', 'Added Successfully!');
        } catch (\Illuminate\Database\QueryException $ex) {
            return redirect(route('admin.employees'))->with('msg', 'Cannot Perform Action!');  
        } 
    }

    public function addCustomer() {

        try { 
            DB::table('customer')->insert([
                'customer_name' => request('customer_name'),
                'customer_age' => request('customer_age'),
                'customer_email' => request('customer_email'),
                'customer_password' => Hash::make('password'),
                'customer_status' => 'No Subscription',
                'membership_expires_in' => 0,
                ]
            );
            return redirect(route('admin.customers'))->with('msg', 'Added Successfully!');
        } catch(\Illuminate\Database\QueryException $ex) { 
            return redirect(route('admin.customers'))->with('msg', 'Cannot Perform Action!');  
        }
    }

    public function addNewLog() {

        if (!DB::table('customer')->select('customer_id')->where('customer_id', '=', request('customer_id'))->get()->toArray()) {
            return redirect(route('admin.entrylogs'))->with('msg', 'Cannot Perform Action!');
        }

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

        return redirect(route('admin.entrylogs'))->with('msg', $msg);
    }

    public function addNewClass() {

        if (!DB::table('employee')->select('employee_id')->where('employee_id', '=', request('class_instructor_id'))->get()->toArray()) {
            return redirect(route('admin.classes'))->with('msg', 'Cannot Perform Action!');
        }
        
        if (!empty(request('class_image'))) {
            $postData = request()->only('class_image');
            $file = $postData['class_image'];
    
            $rules = array(
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            );
    
            $fileArray = array('image' => $file);
            $validator = Validator::make($fileArray, $rules);
    
            if ($validator->fails()) {
                return redirect(route('admin.classes'))->with('msg', 'Cannot Perform Action!');
            } else {
                $class_image = request()->file('class_image')->store('uploads');
            }
        }

        if (empty(request('class_image'))) {
            $class_image = 'images/no-image.jpg';
        }

        $class_description = request('class_description') ? request('class_description') : ' ';

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
            'class_description' => $class_description
        ]);
        $class->save();
        $msg = 'Added Successfully!';

        
        $recentClass = DB::table('class')->select('class_id')->orderBy('created_at', 'desc')->limit(1)->get()->toArray();

        // add this class to new service as well...
        $service = new Services([
            'service_name' => request('class_name'),
            'service_class_id' => $recentClass[0]->class_id,
            'service_price' => request('class_price'),
            'service_status' => 'available',
            'service_image' => $class_image
        ]);

        $service->save();

        return redirect(route('admin.classes'))->with('msg', $msg);
    }

    public function addNewClassMember() {

        if (!DB::table('customer')->select('customer_id')->where('customer_id', '=', request('customer_id'))->get()->toArray()) {
            return redirect(route('admin.classes'))->with('msg', 'Cannot Perform Action!');
        }

        if (!DB::table('customerclass')->select('class_id')
                ->where('customer_id', '=', request('customer_id'))
                ->where('class_id', '=', request('class_id'))
                ->get()->toArray()) {
            
            $customerClass = new CustomerClass([
                'class_id' => request('class_id'),
                'customer_id' => request('customer_id')
            ]);           
            
            $class = DB::table('class')->select(DB::raw('*'))
                                    ->where('class_id', '=', request('class_id'))
                                    ->get()->toArray();

            $class_max_number = $class[0]->class_max_number;
            $new_class_cur_number = $class[0]->class_cur_number + 1;

            if ($class[0]->class_cur_number >= $class_max_number) {
                return redirect(route('admin.classes'))->with('msg', 'Cannot Perform Action!');
            }
            
            if ($new_class_cur_number == $class_max_number) {
                $customerClass->save();
                DB::table('class')->where('class_id', '=', request('class_id'))
                                    ->update(['class_cur_number' => $new_class_cur_number, 'class_status' => 'full']);
                
                DB::table('services')->where('service_class_id', '=', request('class_id'))
                                    ->update(['service_status' => 'full']);
            } else {
                $customerClass->save();
                DB::table('class')->where('class_id', '=', request('class_id'))
                                ->update(['class_cur_number' => $new_class_cur_number]);

                DB::table('services')->where('service_class_id', '=', request('class_id'))
                                ->update(['service_status' => 'full']);
            }
            
            $msg = 'Added Successfully!';
        } else {
            $msg = 'Cannot Perform Action!';
        }
        
        return redirect(route('admin.classes'))->with('msg', $msg);
    }

    public function addNewProduct() {
        
        if (!empty(request('product_image'))) {
            $postData = request()->only('product_image');
            $file = $postData['product_image'];
    
            $rules = array(
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            );
    
            $fileArray = array('image' => $file);
            $validator = Validator::make($fileArray, $rules);
    
            if ($validator->fails()) {
                return redirect(route('admin.shop'))->with('msg', 'Cannot Perform Action!');
            } else {
                $product_image = request()->file('product_image')->store('uploads');
            }
        }

        if (empty(request('product_image'))) {
            $product_image = 'images/no-image.jpg';
        }

        $product_description = request('product_description') ? request('product_description') : ' ';

        $product = new Product([
            'product_name' => request('product_name'),
            'product_price' => request('product_price'),
            'product_stock' => request('product_stock'),
            'product_status' => 'available',
            'product_description' => $product_description,
            'product_image' => $product_image
        ]);
        $product->save();
        $msg = 'Added Successfully!';
        
        return redirect(route('admin.shop'))->with('msg', $msg);
    }

    public function renewMembership() {

        DB::table('customer')->where('customer_id', '=', request('customer_id'))
                            ->update(['membership_start_date' => DB::raw('NOW()'), 
                                    'membership_end_date' => DB::raw('DATE_ADD(NOW(), INTERVAL 1 MONTH)'),
                                    'membership_expires_in' => 30,
                                    'customer_status' => request('membership_type')
                            ]);
        return redirect(route('admin.customers'))->with('msg', 'Updated Successfully!');
    }

    // ANG EMPLOYEE_ID DIRI KAY ILISANAN
    public function addNewTransaction() {

        $latest_transaction = DB::table('transactiondetail')
                                ->select(DB::raw('*'))
                                ->orderByDesc('transaction_id')
                                ->limit(1)
                                ->get()
                                ->toArray();
        $status = $latest_transaction[0]->status;
        $id = $latest_transaction[0]->transaction_id;

        // if new transaction, create one, otherwise use the last instance of transaction
        // ANG EMPLOYEE ILISANAN
        if ($status == 'completed') {
            $transactiondetail = new TransactionDetail([
                    'employee_id' => 1,
                    'transaction_date' => Carbon::now(),
                    'status' => 'pending'
            ]);
    
            $transactiondetail->save();
            $last_insert_id = $transactiondetail->transaction_id;
            // DO THIS LOGIC HERE
            // ADD AN INSTANCE TO TRANSACTIONDETAILS
            return redirect(route('add-new-transaction-page'))->with('latest_transaction_id', $last_insert_id);

        } else {
            return redirect(route('add-new-transaction-page'))->with('latest_transaction_id', $id);
        }
    }

    public function addNewOrder() {

        if (empty(request('service_id')) && empty(request('product_id'))) {
            return redirect(route('add-new-transaction-page'))->with('msg', 'Cannot Perform Action!');  
        }

        if (!empty(request('service_id')) && !empty(request('product_id'))) {
            return redirect(route('add-new-transaction-page'))->with('msg', 'Cannot Perform Action!');  
            return "di sila empty duha";
        }

        // return request('service_id');
        $transactiondetail = DB::table('transactiondetail')
                        ->select(DB::raw('*'))
                        ->where('transaction_id', '=', request('current_transaction_id'))
                        ->get()
                        ->toArray();

        $service = false;
        $product = false;
        // naay gi input nga product id
        if (!empty(request('product_id'))) {

            $productExists = DB::table('product')
            ->select(DB::raw('*'))
            ->where('product_id', '=', request('product_id'))
            ->get()
            ->toArray();
        
            if (count($productExists) <= 0) {
                return redirect(route('add-new-transaction-page'))->with('msg', 'Cannot Perform Action!');  
                return "product doesnt exists";
            }

            if ($productExists[0]->product_stock == 0) {
                // out of stock, nasayop lang ug tuplok ang employee
                return redirect(route('add-new-transaction-page'))->with('msg', 'Cannot Perform Action!');  
                return "product was out of stock";
            } else {
                // available

                // service nga membership ang gi avail
                if ($productExists[0]->product_stock == -1) {
                    $stocks_left = -1;
                } else { //ang gi avail kay product jud

                    // if less than 0, lapas ang na input so error
                    $stocks_left = $productExists[0]->product_stock - request('total_qty');
                    if ($stocks_left < 0) {
                        return redirect(route('add-new-transaction-page'))->with('msg', 'Cannot Perform Action!');  
                        return "stock went a negative value";
                    }
                }
                $service = false;
                $product = true;
            }
        }

        // naay gi avail nga service (classes)
        if (!empty(request('service_id'))) {

            $serviceExists = DB::table('services')
                                ->select(DB::raw('*'))
                                ->where('service_id', '=', request('service_id'))
                                ->get()->toArray();
            
            if (count($serviceExists) <= 0) {
                return redirect(route('add-new-transaction-page'))->with('msg', 'Cannot Perform Action!');  
                return "service doesnt exist";
            }

            if ($serviceExists[0]->service_status != 'available') {
                return redirect(route('add-new-transaction-page'))->with('msg', 'Cannot Perform Action!');  
                return "service not available";
            } else {
              // ang employee na dapat mo add sa customer ngadto sa california class tab  
              $service = true;
              $product = false;
            }
        }

        $walkin = '';
        $customerExists = false;
        if (empty(request('customer_id'))) {
            $walkin = 'Walk in';
        } else {
            // naay gi input nga customer id
            $customer = DB::table('customer')->select(DB::raw('*'))
                            ->where('customer_id', '=', request('customer_id'))->get()->toArray();
            
            // wa ni exist
            if (count($customer) <= 0) {
                return redirect(route('add-new-transaction-page'))->with('msg', 'Cannot Perform Action!');  
            } else {
                $customerExists = true;
            }
        }

        $current_order_id = 0;
        if ($customerExists) {
            
            if ($product) {
                $order = new Orders([
                    'customer_id' => request('customer_id'),
                    'product_id' => request('product_id'),
                    'transaction_id' => request('current_transaction_id'),
                    'total_qty' => request('total_qty')
                ]);
                $order->save();
            } else if ($service) {
                $order = new Orders([
                    'customer_id' => request('customer_id'),
                    'service_id' => request('service_id'),
                    'transaction_id' => request('current_transaction_id'),
                    'total_qty' => request('total_qty')
                ]);
                $order->save();
            }
            $current_order_id = $order->order_id;
        } else if ($walkin == 'Walk in') {
           
            if ($product) {
                $order = new Orders([
                    'product_id' => request('product_id'),
                    'transaction_id' => request('current_transaction_id'),
                    'total_qty' => request('total_qty'),
                ]);
                $order->save();
            } else if ($service) {
                $order = new Orders([
                    'service_id' => request('service_id'),
                    'transaction_id' => request('current_transaction_id'),
                    'total_qty' => request('total_qty'),
                ]);
                $order->save();
            }
            $current_order_id = $order->order_id;
        }

    
        $updatedOrders = DB::table('orders')->select(DB::raw('*'))
                            ->where('order_id', '=', $current_order_id)->get()->toArray();

        if ($product) {
            $order_amount = $productExists[0]->product_price * $updatedOrders[0]->total_qty;
        } else if ($service) {
            $order_amount = $serviceExists[0]->service_price * $updatedOrders[0]->total_qty;
        }




        DB::table('orders')
            ->where('order_id', '=',  $current_order_id)
            ->update(['order_amount' => $order_amount]);

        $new_order_count = $transactiondetail[0]->order_count + 1;
        $current_total_payment = $transactiondetail[0]->total_payment;
        $current_total_payment += $order_amount;
        DB::table('transactiondetail')
                        ->where('transaction_id', '=', request('current_transaction_id'))
                        ->update(['order_count' => $new_order_count, 'total_payment' => $current_total_payment]);
            

        return redirect(route('add-new-transaction-page'))->with('msg', 'Added Successfully!');
        
    }

    public function finishTransaction() {

        if (request('total_payment') <= 0) {
            return redirect(route('add-new-transaction-page'))->with('msg', 'Cannot Perform Action!');  
        }

        if (empty(request('amount_paid'))) {
            return redirect(route('add-new-transaction-page'))->with('msg', 'Cannot Perform Action!');  
            return "wa ni bayad";
        }
        if (request('amount_change') < 0) {
            return redirect(route('add-new-transaction-page'))->with('msg', 'Cannot Perform Action!');  
            return "kuwang ang bayad";
        }

        $amount_paid = request('amount_paid');
        $amount_change = request('amount_change');


        $transaction_products_from_orders = DB::table('orders')->select(DB::raw('*'))
                                                ->where('transaction_id', '=', request('transaction_id'))
                                                ->get()->toArray();
    
        foreach($transaction_products_from_orders as $products) {
            if ($products->product_id) {
                $productTB = DB::table('product')->select(DB::raw('*'))->
                                where('product_id', '=', $products->product_id)->get()->toArray();
                
                if ($productTB[0]->product_stock == -1) {
                    continue;
                } else {
                    $new_prod_stock = $productTB[0]->product_stock - $products->total_qty;

                    if ($new_prod_stock == 0) {
                        DB::table('product')->select(DB::raw('*'))->where('product_id', '=', $products->product_id)
                                            ->update(['product_stock' => $new_prod_stock, 'product_status' => 'unavailable']);
                    } else {
                        DB::table('product')->select(DB::raw('*'))->where('product_id', '=', $products->product_id)
                                        ->update(['product_stock' => $new_prod_stock]);
                    }
                }
            }
        }


        DB::table('transactiondetail')->where('transaction_id', '=', request('transaction_id'))
                ->update(['amount_paid' => $amount_paid, 'amount_change' => $amount_change, 'status' => 'completed']);
        
        
        return redirect(route('admin.transactions'))->with('showIt', 'hide');
    }

    public function generateReport() {
        

        $transactions = DB::table('transactiondetail')->select('*')
        ->join('orders', 'orders.transaction_id', 'transactiondetail.transaction_id')
        ->leftJoin('product', 'product.product_id', 'orders.product_id')
        ->leftJoin('services', 'services.service_id', 'orders.service_id')
        ->join('employee', 'employee.employee_id', 'transactiondetail.employee_id')
        ->whereRaw('orders.product_id IS NOT NULL OR orders.service_id IS NOT NULL')
        ->get()->toArray();

        $pdf = PDF::loadView('admin.pdfView', ['transactions' => $transactions]);
        return $pdf->download('sample.pdf');
    }

    /* UPDATE REQUEST */
    public function updateClass() {

        if (!empty(request('class_image'))) {
            $postData = request()->only('class_image');
            $file = $postData['class_image'];

            $rules = array(
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            );
    
            $fileArray = array('image' => $file);
            $validator = Validator::make($fileArray, $rules);
    
            if ($validator->fails()) {
                return redirect(route('admin.classes'))->with('msg', 'Cannot Perform Action!');
            } else {
                $class_image = request()->file('class_image')->store('uploads');
                DB::table('class')->where('class_id', '=', request('class_id'))
                    ->update(['class_image' => $class_image]);
                $msg = 'Updated Successfully!';
            }
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
            $num = DB::table('class')->select('class_cur_number')->where('class_id', '=', request('class_id'))->get()->toArray();
            
            if ($num[0]->class_cur_number >= $class_max_number) {
                DB::table('class')->where('class_id', '=', request('class_id'))
                ->update(['class_max_number' => $class_max_number, 'class_status' => 'full']);
            } else {
                DB::table('class')->where('class_id', '=', request('class_id'))
                    ->update(['class_max_number' => $class_max_number, 'class_status' => 'receiving']);
            }
            
            $msg = 'Updated Successfully!';
        }


        return redirect(route('admin.classes'))->with('msg', $msg);
    }

    public function updateProduct() {
        if (!empty(request('product_image'))) {
            $postData = request()->only('product_image');
            $file = $postData['product_image'];
    
            $rules = array(
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            );
    
            $fileArray = array('image' => $file);
            $validator = Validator::make($fileArray, $rules);
    
            if ($validator->fails()) {
                return redirect(route('admin.classes'))->with('msg', 'Cannot Perform Action!');
            } else {
                $product_image = request()->file('product_image')->store('uploads');
                DB::table('product')->where('product_id', '=', request('class_id'))
                    ->update(['product_image' => $product_image]);
                $msg = 'Updated Successfully!';
            }
        }

        if (!empty(request('product_name'))) {
            $product_name = request('product_name');
            DB::table('product')->where('product_id', '=', request('product_id'))
                ->update(['product_name' => $product_name]);
            $msg = 'Updated Successfully!';
        }
        
        if (!empty(request('product_price'))) {
            $product_price = request('product_price');
            DB::table('product')->where('product_id', '=', request('product_id'))
                ->update(['product_price' => $product_price]);
            $msg = 'Updated Successfully!';
        }

        if (!empty(request('product_stock')) || request('product_stock') == 0) {
            $product_stock = request('product_stock');

            if ($product_stock == 0) {
                try {
                    DB::table('product')->where('product_id', '=', request('product_id'))
                    ->update(['product_stock' => $product_stock, 'product_status' => 'unavailable']);
                } catch (\Illuminate\Database\QueryException $ex) {
                    return redirect(route('admin.classes'))->with('msg', 'Cannot Perform Action!');
                }
            } else {
               try {
                    DB::table('product')->where('product_id', '=', request('product_id'))
                    ->update(['product_stock' => $product_stock, 'product_status' => 'available']);
               } catch (\Illuminate\Database\QueryException $ex) {
                    return redirect(route('admin.classes'))->with('msg', 'Cannot Perform Action!');
               }
            }
            $msg = 'Updated Successfully!';
        }

        if (!empty(request('product_description'))) {
            $product_description = request('product_description');
            DB::table('product')->where('product_id', '=', request('product_id'))
                ->update(['product_description' => $product_description]);
            }
            
        $msg = 'Updated Successfully!';
        return redirect(route('admin.shop'))->with('msg', $msg);
    }

    /* DELETE REQUEST */
    public function removeEmployee() {

        // find the employee
        $employee = Employee::find(request('employee_id'));

        // update an employee (cannot actually delete, otherwise 
        // those tables that references this employee will throw an error)
        $employee->employee_status = 'fired';
        $employee->employee_email = '';
        $employee->save();
        
        return redirect(route('admin.employees'))->with('msg', 'Removed Successfully!');
    }

    public function removeClassMember() {

        $totalNow = intval(request('class_cur_number')) - 1;
        $customerclass_id = request('customerclass_id');
        $class_id = request('class_id');

        if (DB::table('customerclass')->where('id', '=', $customerclass_id)->delete()) {
            if (DB::table('class')->where('class_id', '=', $class_id)->update(['class_cur_number' => $totalNow])) {
                
                $currentClass = DB::table('class')->select(DB::raw('*'))
                                    ->where('class_id', '=', $class_id)
                                    ->get()
                                    ->toArray();

                $currentClass_max_number = $currentClass[0]->class_max_number;
                if ($totalNow < $currentClass_max_number) {
                    DB::table('class')->where('class_id', '=', $class_id)->update(['class_status' => 'receiving']);
                    DB::table('services')->where('service_class_id', '=', $class_id)->update(['service_status' => 'available']);
                }
                
                $msg = 'Removed Successfully!';
            } else {
                $msg = 'Cannot Perform Action!';
            }
        } else {
            $msg = 'Cannot Perform Action!';
        }
    
        return redirect(route('admin.classes'))->with('msg', $msg);
    }

    public function removeClassEntirely() {

        if (DB::table('customerclass')->where('class_id', '=', request('class_id'))->delete()) {
            if (DB::table('class')->where('class_id', '=', request('class_id'))->delete()) {
                DB::table('services')->where('service_class_id', '=', request('class_id'))->delete();
                $msg = 'Removed Successfully!';
            } else {
                $msg = 'Cannot Perform Action!';    
            }
        } else {
            if (DB::table('class')->where('class_id', '=', request('class_id'))->delete()) {
                DB::table('services')->where('service_class_id', '=', request('class_id'))->delete();
                $msg = 'Removed Successfully!';
            } else {
                $msg = 'Cannot Perform Action!';    
            }
        }

        return redirect(route('admin.classes'))->with('msg', $msg);
    }

    public function removeProduct() {
        
        $product = Product::find(request('product_id'));
        $product->product_status = 'unavailable';
        $product->product_stock = (request('product_stock') == -1) ?  -1 : 0;
        $product->save();

        
        return redirect(route('admin.shop'))->with('msg', 'Removed Successfully!');
    }

    public function removeOrder() {

        $currentOrder = DB::table('orders')->select(DB::raw('*'))
                            ->where('order_id', '=', request('order_id'))
                            ->get()->toArray();

        $order_amount = $currentOrder[0]->order_amount;


        $transactiondetail = DB::table('transactiondetail')
                                ->select(DB::raw('*'))                        
                                ->where('transaction_id', '=', request('current_transaction_id'))
                                ->get()
                                ->toArray();
        
        $current_order_count = $transactiondetail[0]->order_count - 1;
        
        $current_total_payment = $transactiondetail[0]->total_payment - $order_amount;


        if (DB::table('orders')->where('order_id', '=', request('order_id'))->delete()) {

            DB::table('transactiondetail')->where('transaction_id', '=', request('current_transaction_id'))
                                            ->update(['order_count' => $current_order_count, 
                                                        'total_payment' => $current_total_payment]);
            
            return redirect(route('add-new-transaction-page'))->with('msg', 'Removed Successfully!');

        } else {
            return redirect(route('add-new-transaction-page'))->with('msg', 'Cannot Perform Action!');
        }


        return request('order_id');
        return request('current_transaction_id');
        return "removing an order...";
    }

    public function removeTransaction() {

        $transaction_orders = DB::table('orders')->select(DB::raw('*'))
                                ->where('transaction_id', '=', request('transaction_id'))->get()->toArray();

        
        for ($i = 0; $i < count($transaction_orders); $i++) {
            DB::table('orders')->where('transaction_id', '=', request('transaction_id'))->delete();        
        }

        DB::table('transactiondetail')->where('transaction_id', '=', request('transaction_id'))->delete();

        return redirect(route('admin.transactions'));
    }
}


