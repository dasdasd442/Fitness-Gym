<?php

//oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
Route::get('/', [AdminController::class, 'index'])->name('admin.index');

Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');

Route::get('/classes-details', [AdminController::class, 'classesDetails'])->name('admin.classes');

Route::get('/customer-details', [AdminController::class, 'customerDetails'])->name('admin.customers');

Route::get('/employee-details', [AdminController::class, 'employeeDetails'])->name('admin.employees');

Route::get('/entrylog-details', [AdminController::class, 'entrylogDetails'])->name('admin.entrylogs');

Route::get('/new-transaction', [AdminController::class, 'newTransaction'])->name('admin.newTransaction');

Route::get('/shop-details', [AdminController::class, 'shopDetails'])->name('admin.shop');

Route::get('/login', [AdminController::class, 'login'])->name('admin.login');

Route::get('/register', [AdminController::class, 'register'])->name('admin.register');

/* DELETE ROUTES */
Route::delete('/remove-employee', [AdminController::class, 'removeEmployee'])->name('remove-employee');
Route::delete('/remove-class-member', [AdminController::class, 'removeClassMember'])->name('remove-class-member');
Route::delete('/remove-class-entirely', [AdminController::class, 'removeClassEntirely'])->name('remove-class-entirely');
Route::delete('/remove-product', [AdminController::class, 'removeProduct'])->name('remove-product');

/* POST ROUTES */
Route::post('/add-employee', [AdminController::class, 'addEmployee'])->name('add-employee');
Route::post('/add-customer', [AdminController::class, 'addCustomer'])->name('add-customer');
Route::post('/add-new-log', [AdminController::class, 'addNewLog'])->name('add-new-log');
Route::post('/add-new-class', [AdminController::class, 'addNewClass'])->name('add-new-class');
Route::post('/update-class', [AdminController::class, 'updateClass'])->name('update-class');
Route::post('/add-new-class-member', [AdminController::class, 'addNewClassMember'])->name('add-new-class-member');
Route::post('/add-new-product', [AdminController::class, 'addNewProduct'])->name('add-new-product');
Route::post('/update-product', [AdminController::class, 'updateProduct'])->name('update-product');

