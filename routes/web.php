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

	// setups management
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

		// for exam
		Route::get('/exam/view', [App\Http\Controllers\Admin\ExamController::class, 'view'])->name('exam.view');
		Route::get('/exam/add', [App\Http\Controllers\Admin\ExamController::class, 'add'])->name('exam.add');
		Route::post('/exam/store', [App\Http\Controllers\Admin\ExamController::class, 'store'])->name('exam.store');
		Route::get('/exam/edit/{id}', [App\Http\Controllers\Admin\ExamController::class, 'edit'])->name('exam.edit');
		Route::post('/exam/update/{id}', [App\Http\Controllers\Admin\ExamController::class, 'update'])->name('exam.update');
		Route::get('/exam/delete/{id}', [App\Http\Controllers\Admin\ExamController::class, 'delete'])->name('exam.delete');

		// for semester
		Route::get('/semester/view', [App\Http\Controllers\Admin\SemesterController::class, 'view'])->name('semester.view');
		Route::get('/semester/add', [App\Http\Controllers\Admin\SemesterController::class, 'add'])->name('semester.add');
		Route::post('/semester/store', [App\Http\Controllers\Admin\SemesterController::class, 'store'])->name('semester.store');
		Route::get('/semester/edit/{id}', [App\Http\Controllers\Admin\SemesterController::class, 'edit'])->name('semester.edit');
		Route::post('/semester/update/{id}', [App\Http\Controllers\Admin\SemesterController::class, 'update'])->name('semester.update');
		Route::get('/semester/delete/{id}', [App\Http\Controllers\Admin\SemesterController::class, 'delete'])->name('semester.delete');

		// for session
		Route::get('/session/view', [App\Http\Controllers\Admin\SessionController::class, 'view'])->name('session.view');
		Route::get('/session/add', [App\Http\Controllers\Admin\SessionController::class, 'add'])->name('session.add');
		Route::post('/session/store', [App\Http\Controllers\Admin\SessionController::class, 'store'])->name('session.store');
		Route::get('/session/edit/{id}', [App\Http\Controllers\Admin\SessionController::class, 'edit'])->name('session.edit');
		Route::post('/session/update/{id}', [App\Http\Controllers\Admin\SessionController::class, 'update'])->name('session.update');
		Route::get('/session/delete/{id}', [App\Http\Controllers\Admin\SessionController::class, 'delete'])->name('session.delete');

		// for subject
		Route::get('/subject/view', [App\Http\Controllers\Admin\SubjectController::class, 'view'])->name('subject.view');
		Route::get('/subject/add', [App\Http\Controllers\Admin\SubjectController::class, 'add'])->name('subject.add');
		Route::post('/subject/store', [App\Http\Controllers\Admin\SubjectController::class, 'store'])->name('subject.store');
		Route::get('/subject/edit/{id}', [App\Http\Controllers\Admin\SubjectController::class, 'edit'])->name('subject.edit');
		Route::post('/subject/update/{id}', [App\Http\Controllers\Admin\SubjectController::class, 'update'])->name('subject.update');
		Route::get('/subject/delete/{id}', [App\Http\Controllers\Admin\SubjectController::class, 'delete'])->name('subject.delete');

		// for designation
		Route::get('/designation/view', [App\Http\Controllers\Admin\DesignationController::class, 'view'])->name('designation.view');
		Route::get('/designation/add', [App\Http\Controllers\Admin\DesignationController::class, 'add'])->name('designation.add');
		Route::post('/designation/store', [App\Http\Controllers\Admin\DesignationController::class, 'store'])->name('designation.store');
		Route::get('/designation/edit/{id}', [App\Http\Controllers\Admin\DesignationController::class, 'edit'])->name('designation.edit');
		Route::post('/designation/update/{id}', [App\Http\Controllers\Admin\DesignationController::class, 'update'])->name('designation.update');
		Route::get('/designation/delete/{id}', [App\Http\Controllers\Admin\DesignationController::class, 'delete'])->name('designation.delete');
	});


	// student management
	Route::group(['prefix' => 'students'], function(){
		// for student registration
		Route::get('/registration/view', [App\Http\Controllers\Admin\Student\StudentRegistrationController::class, 'view'])->name('student.registration.view');
		Route::get('/registration/add', [App\Http\Controllers\Admin\Student\StudentRegistrationController::class, 'add'])->name('student.registration.add');
		Route::post('/registration/store', [App\Http\Controllers\Admin\Student\StudentRegistrationController::class, 'store'])->name('student.registration.store');
		Route::get('/registration/edit/{id}', [App\Http\Controllers\Admin\Student\StudentRegistrationController::class, 'edit'])->name('student.registration.edit');
		Route::post('/registration/update/{id}', [App\Http\Controllers\Admin\Student\StudentRegistrationController::class, 'update'])->name('student.registration.update');
		Route::get('/registration/delete/{id}', [App\Http\Controllers\Admin\Student\StudentRegistrationController::class, 'delete'])->name('student.registration.delete');
	});	

});









/*
|--------------------------------------------------------------------------
|  Routes for teacher
|--------------------------------------------------------------------------
|
| this routes access for only user
|
*/
Route::group(['middleware' => ['teacher', 'auth']], function(){
	Route::get('teacher/dashboard', [App\Http\Controllers\Teacher\TeacherController::class, 'index'])->name('teacher.dashboard');
});







/*
|--------------------------------------------------------------------------
|  Routes for student
|--------------------------------------------------------------------------
|
| this routes access for only user
|
*/
Route::group(['middleware' => ['student', 'auth']], function(){
	Route::get('student/dashboard', [App\Http\Controllers\Student\StudentController::class, 'index'])->name('student.dashboard');
});