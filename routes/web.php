<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();



/*
|--------------------------------------------------------------------------
|  Routes for admin
|--------------------------------------------------------------------------
|
| this routes access for only admin
|
*/
Route::group(['middleware' => ['admin', 'auth']], function(){
	// for admin dashbaord 
	Route::get('admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');

	// setups
	Route::group(['prefix' => 'setups'], function(){
		// department
		Route::get('/department/view', [App\Http\Controllers\Admin\DepartmentController::class, 'view'])->name('department.view');
		Route::get('/department/add', [App\Http\Controllers\Admin\DepartmentController::class, 'add'])->name('department.add');
		Route::post('/department/store', [App\Http\Controllers\Admin\DepartmentController::class, 'store'])->name('department.store');
		Route::get('/department/edit/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'edit'])->name('department.edit');
		Route::post('/department/update/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'update'])->name('department.update');
		Route::get('/department/delete/{id}', [App\Http\Controllers\Admin\DepartmentController::class, 'delete'])->name('department.delete');

		// fee category
		Route::get('/feeCategory/view', [App\Http\Controllers\Admin\FeeCategoryController::class, 'view'])->name('feeCategory.view');
		Route::get('/feeCategory/add', [App\Http\Controllers\Admin\FeeCategoryController::class, 'add'])->name('feeCategory.add');
		Route::post('/feeCategory/store', [App\Http\Controllers\Admin\FeeCategoryController::class, 'store'])->name('feeCategory.store');
		Route::get('/feeCategory/edit/{id}', [App\Http\Controllers\Admin\FeeCategoryController::class, 'edit'])->name('feeCategory.edit');
		Route::post('/feeCategory/update/{id}', [App\Http\Controllers\Admin\FeeCategoryController::class, 'update'])->name('feeCategory.update');
		Route::get('/feeCategory/delete/{id}', [App\Http\Controllers\Admin\FeeCategoryController::class, 'delete'])->name('feeCategory.delete');

		// fee amount
		Route::get('/feeAmount/view', [App\Http\Controllers\Admin\FeeAmountController::class, 'view'])->name('feeAmount.view');
		Route::get('/feeAmount/add', [App\Http\Controllers\Admin\FeeAmountController::class, 'add'])->name('feeAmount.add');
		Route::post('/feeAmount/store', [App\Http\Controllers\Admin\FeeAmountController::class, 'store'])->name('feeAmount.store');
		Route::get('/feeAmount/edit/{fee_category_id}', [App\Http\Controllers\Admin\FeeAmountController::class, 'edit'])->name('feeAmount.edit');
		Route::post('/feeAmount/update/{fee_category_id}', [App\Http\Controllers\Admin\FeeAmountController::class, 'update'])->name('feeAmount.update');
		Route::get('/feeAmount/details/{fee_category_id}', [App\Http\Controllers\Admin\FeeAmountController::class, 'details'])->name('feeAmount.details');
		Route::get('/feeAmount/delete/{id}', [App\Http\Controllers\Admin\FeeAmountController::class, 'delete'])->name('feeAmount.delete');

	});

});









/*
|--------------------------------------------------------------------------
|  Routes for user
|--------------------------------------------------------------------------
|
| this routes access for only user
|
*/
Route::group(['middleware' => ['user', 'auth']], function(){
	Route::get('user/dashboard', [App\Http\Controllers\User\UserController::class, 'index'])->name('user.dashboard');
});
