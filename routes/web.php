<?php

//oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MainController;

use App\Http\Controllers\AdminLogInController;
use App\Http\Controllers\EmployeeLogInController;
use App\Http\Controllers\CustomerLogInController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* ADMIN ROUTES */
/* GET ROUTES */
// Route::get('/sample', function() {
//     return view('home');
// });

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLogInController::class, 'showLogInForm'])->name('admin.login');
    Route::post('/login', [AdminLogInController::class, 'login'])->name('admin.login-submit');
    Route::get('/logout', [AdminLogInController::class, 'logout'])->name('admin.logout');


    
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::get('/classes-details', [AdminController::class, 'classesDetails'])->name('admin.classes');
    Route::get('/customer-details', [AdminController::class, 'customerDetails'])->name('admin.customers');
    Route::get('/employee-details', [AdminController::class, 'employeeDetails'])->name('admin.employees');
    Route::get('/entrylog-details', [AdminController::class, 'entrylogDetails'])->name('admin.entrylogs');
    Route::get('/transaction-details', [AdminController::class, 'transactionDetails'])->name('admin.transactions');
    Route::get('/shop-details', [AdminController::class, 'shopDetails'])->name('admin.shop');



    // Route::get('/register', [AdminController::class, 'register'])->name('admin.register');



    Route::get('/new-transaction-page', [AdminController::class, 'showNewTransactionPage'])->name('add-new-transaction-page');
    Route::get('/pdf-view-thequickbrownfoxjumpsoverthelazydogs', [AdminController::class, 'pdfView'])->name('pdf-view');
    
    /* DELETE ROUTES */
    Route::delete('/remove-employee', [AdminController::class, 'removeEmployee'])->name('remove-employee');
    Route::delete('/remove-class-member', [AdminController::class, 'removeClassMember'])->name('remove-class-member');
    Route::delete('/remove-class-entirely', [AdminController::class, 'removeClassEntirely'])->name('remove-class-entirely');
    Route::delete('/remove-product', [AdminController::class, 'removeProduct'])->name('remove-product');
    Route::delete('/remove-order', [AdminController::class, 'removeOrder'])->name('remove-order');
    Route::delete('/remove-transaction', [AdminController::class, 'removeTransaction'])->name('remove-transaction');
    
    /* POST ROUTES */
    Route::post('/add-employee', [AdminController::class, 'addEmployee'])->name('add-employee');
    Route::post('/add-customer', [AdminController::class, 'addCustomer'])->name('add-customer');
    Route::post('/add-new-log', [AdminController::class, 'addNewLog'])->name('add-new-log');
    Route::post('/add-new-class', [AdminController::class, 'addNewClass'])->name('add-new-class');
    Route::post('/update-class', [AdminController::class, 'updateClass'])->name('update-class');
    Route::post('/add-new-class-member', [AdminController::class, 'addNewClassMember'])->name('add-new-class-member');
    Route::post('/add-new-product', [AdminController::class, 'addNewProduct'])->name('add-new-product');
    Route::post('/update-product', [AdminController::class, 'updateProduct'])->name('update-product');
    Route::post('/add-new-transaction', [AdminController::class, 'addNewTransaction'])->name('add-new-transaction');
    Route::post('/add-new-order', [AdminController::class, 'addNewOrder'])->name('add-new-order');
    Route::post('/finish-transaction', [AdminController::class, 'finishTransaction'])->name('finish-transaction');
    Route::post('/generate-report', [AdminController::class, 'generateReport'])->name('generate-report');
    Route::post('/renew-membership', [AdminController::class, 'renewMembership'])->name('renew-membership');
    Route::post('/change-details', [AdminController::class, 'changeDetails'])->name('change-details');

    Route::get('/', function() { return redirect(route('admin.index')); });
});



Route::prefix('employee')->group(function () {    
    Route::get('/login', [EmployeeLogInController::class, 'showLogInForm'])->name('employee.login');
    Route::post('/login', [EmployeeLogInController::class, 'login'])->name('employee.login-submit');

    Route::get('/logout', [EmployeeLogInController::class, 'logout'])->name('employee.logout');
    Route::get('/dashboard', [EmployeeController::class, 'index'])->name('employee.index');
    Route::get('/new-transaction-page', [EmployeeController::class, 'newTransaction'])->name('employee.transaction');



    Route::post('/e-add-customer', [EmployeeController::class, 'addCustomer'])->name('e-add-customer');
    Route::post('/e-renew-membership', [EmployeeController::class, 'renewMembership'])->name('e-renew-membership');
    Route::post('/e-add-member', [EmployeeController::class, 'addNewMember'])->name('e-add-member');
    Route::post('/e-update-class', [EmployeeController::class, 'updateClass'])->name('e-update-class');
    Route::post('/e-add-class', [EmployeeController::class, 'addClass'])->name('e-add-class');
    Route::post('/e-add-product', [EmployeeController::class, 'addProduct'])->name('e-add-product');
    Route::post('/e-update-product', [EmployeeController::class, 'updateProduct'])->name('e-update-product');
    Route::post('/e-add-log', [EmployeeController::class, 'addNewLog'])->name('e-add-log');
    Route::post('/e-add-transaction', [EmployeeController::class, 'addNewTransaction'])->name('e-add-transaction');
    Route::post('/e-add-order', [EmployeeController::class, 'addNewOrder'])->name('e-add-order');
    Route::post('/e-finish-transaction', [EmployeeController::class, 'finishTransaction'])->name('e-finish-transaction');

    Route::post('/e-update-email', [EmployeeController::class, 'updateEmail'])->name('e-update-email');
    Route::post('/e-update-password', [EmployeeController::class, 'updatePassword'])->name('e-update-password');
    
    
    Route::delete('/e-remove-class-member', [EmployeeController::class, 'removeClassMember'])->name('e-remove-class-member');
    Route::delete('/e-remove-class', [EmployeeController::class, 'removeClassEntirely'])->name('e-remove-class');
    Route::delete('/e-remove-product', [EmployeeController::class, 'removeProduct'])->name('e-remove-product');
    Route::delete('/e-remove-order', [EmployeeController::class, 'removeOrder'])->name('e-remove-order');
    Route::delete('/e-remove-transaction', [EmployeeController::class, 'removeTransaction'])->name('e-remove-transaction');
    
    Route::get('/', function() { return redirect(route('employee.index')); });
});



Route::prefix('customer')->group(function () {
    Route::get('/', function() { return redirect(route('customer.index')); });
    Route::get('/dashboard', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/available-classes', [CustomerController::class, 'classes'])->name('customer.classes');
    Route::get('/shop', [CustomerController::class, 'shop'])->name('customer.shop');

    Route::post('/customer-update-email', [CustomerController::class, 'updateEmail'])->name('c-update-email');
    Route::post('/customer-update-password', [CustomerController::class, 'updatePassword'])->name('c-update-password');

    Route::get('/logout', [MainController::class, 'logout'])->name('customer.logout');
});


/***  MAINPAGE ROUTES ***/
Route::get('/', [MainController::class, 'index'])->name('mainpage-index');
Route::get('/location-and-pricing', [MainController::class, 'locationPricing'])->name('mainpage-location');
Route::get('/available-classes', [MainController::class, 'mainpageClasses'])->name('mainpage-classes');
Route::get('/shop', [MainController::class, 'mainpageShop'])->name('mainpage-shop');
Route::get('/about-california', [MainController::class, 'mainpageAbout'])->name('mainpage-about');
Route::get('/sign-up', [MainController::class, 'mainpageSignup'])->name('mainpage-sign-up');

Route::post('/customer-login', [MainController::class, 'login'])->name('customer-login');
Route::post('/signup-submit', [MainController::class, 'signupSubmit'])->name('mainpage-signup-submit');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
