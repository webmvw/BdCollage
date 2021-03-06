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

		// for employee assign leave
		Route::get('/employee/assignLeave/view', [App\Http\Controllers\Admin\EmployeeAssignLeaveController::class, 'view'])->name('employee.assign.leave.view');
		Route::get('/employee/assignLeave/add', [App\Http\Controllers\Admin\EmployeeAssignLeaveController::class, 'add'])->name('employee.assign.leave.add');
		Route::post('/employee/assignLeave/store', [App\Http\Controllers\Admin\EmployeeAssignLeaveController::class, 'store'])->name('employee.assign.leave.store');
		Route::get('/employee/assignLeave/delete/{id}', [App\Http\Controllers\Admin\EmployeeAssignLeaveController::class, 'delete'])->name('employee.assign.leave.delete');

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
		Route::get('/search/studentList', [App\Http\Controllers\Admin\Student\StudentRegistrationController::class, 'search'])->name('student.registration.search');
		Route::get('/student/details/{id}', [App\Http\Controllers\Admin\Student\StudentRegistrationController::class, 'details'])->name('student.registration.details');

		// for student roll generate
		Route::get('/roll/generate/view', [App\Http\Controllers\Admin\Student\StudentRollController::class, 'view'])->name('roll.generate.view');
		Route::get('/get/register/student', [App\Http\Controllers\Admin\Student\StudentRollController::class, 'getStudents'])->name('get.register.students');
		Route::post('get/student/roll/store', [App\Http\Controllers\Admin\Student\StudentRollController::class, 'store'])->name('student.roll.store');

		// for student fee details
		Route::get('/fee/details/view', [App\Http\Controllers\Admin\Student\FeeDetailsController::class, 'view'])->name('fee.details.view');
		Route::get('/get/fee/details', [App\Http\Controllers\Admin\Student\FeeDetailsController::class, 'getFeeDetails'])->name('get.fee.details');


	});

	// employee management
	Route::group(['prefix' => 'employee'], function(){
		// for employee registration
		Route::get('/registration/view', [App\Http\Controllers\Admin\Employee\EmployeeRegistrationController::class, 'view'])->name('employee.registration.view');
		Route::get('/registration/add', [App\Http\Controllers\Admin\Employee\EmployeeRegistrationController::class, 'add'])->name('employee.registration.add');
		Route::post('/registration/store', [App\Http\Controllers\Admin\Employee\EmployeeRegistrationController::class, 'store'])->name('employee.registration.store');
		Route::get('/registration/edit/{id}', [App\Http\Controllers\Admin\Employee\EmployeeRegistrationController::class, 'edit'])->name('employee.registration.edit');
		Route::post('/registration/update/{id}', [App\Http\Controllers\Admin\Employee\EmployeeRegistrationController::class, 'update'])->name('employee.registration.update');
		Route::get('/registration/delete/{id}', [App\Http\Controllers\Admin\Employee\EmployeeRegistrationController::class, 'delete'])->name('employee.registration.delete');

		// for employee salary
		Route::get('/salary/view', [App\Http\Controllers\Admin\Employee\EmployeeSalaryController::class, 'view'])->name('employee.salary.view');
		Route::get('/salary/edit/{id}', [App\Http\Controllers\Admin\Employee\EmployeeSalaryController::class, 'edit'])->name('employee.salary.edit');
		Route::post('/salary/update/{id}', [App\Http\Controllers\Admin\Employee\EmployeeSalaryController::class, 'update'])->name('employee.salary.update');
		Route::get('/salary/details/{id}', [App\Http\Controllers\Admin\Employee\EmployeeSalaryController::class, 'details'])->name('employee.salary.details');


		// for employee leave
		Route::get('/employeeLeave/view', [App\Http\Controllers\Admin\Employee\EmployeeLeaveController::class, 'view'])->name('employeeLeave.view');
		Route::get('/employeeLeave/add', [App\Http\Controllers\Admin\Employee\EmployeeLeaveController::class, 'add'])->name('employeeLeave.add');
		Route::post('/employeeLeave/store', [App\Http\Controllers\Admin\Employee\EmployeeLeaveController::class, 'store'])->name('employeeLeave.store');
		Route::get('/employeeLeave/edit/{id}', [App\Http\Controllers\Admin\Employee\EmployeeLeaveController::class, 'edit'])->name('employeeLeave.edit');
		Route::post('/employeeLeave/update/{id}', [App\Http\Controllers\Admin\Employee\EmployeeLeaveController::class, 'update'])->name('employeeLeave.update');
		Route::get('/employeeLeave/delete/{id}', [App\Http\Controllers\Admin\Employee\EmployeeLeaveController::class, 'delete'])->name('employeeLeave.delete');

		// for employee attendance
		Route::get('/attendance/view', [App\Http\Controllers\Admin\Employee\EmployeeAttendanceController::class, 'view'])->name('employeeAttendance.view');
		Route::get('/attendance/add', [App\Http\Controllers\Admin\Employee\EmployeeAttendanceController::class, 'add'])->name('employeeAttendance.add');
		Route::post('/attendance/store', [App\Http\Controllers\Admin\Employee\EmployeeAttendanceController::class, 'store'])->name('employeeAttendance.store');
		Route::get('/attendance/edit/{date}', [App\Http\Controllers\Admin\Employee\EmployeeAttendanceController::class, 'edit'])->name('employeeAttendance.edit');
		Route::get('/attendance/details/{date}', [App\Http\Controllers\Admin\Employee\EmployeeAttendanceController::class, 'details'])->name('employeeAttendance.details');

		// for employee monthly selary
		Route::get('/monthly/salary/view', [App\Http\Controllers\Admin\Employee\MonthlySalaryController::class, 'view'])->name('employee.monthly.salary.view');
		Route::get('/monthly/salary/details', [App\Http\Controllers\Admin\Employee\MonthlySalaryController::class, 'getSalaryDetails'])->name('employee.monthly.salary.details');
	});	

	// marks management
	Route::group(['prefix' => 'marks'], function(){
		// for marks entry
		Route::get('/student/marks/entry/view', [App\Http\Controllers\Admin\Marks\MarksController::class, 'view'])->name('student.marks.entry.view');
		Route::post('/student/marks/entry/store', [App\Http\Controllers\Admin\Marks\MarksController::class, 'store'])->name('student.marks.entry.store');
		Route::get('/get/all/subject', [App\Http\Controllers\Admin\Marks\MarksController::class, 'gelAllSubject'])->name('get.all.subject');
		Route::get('get/student/formarkentry', [App\Http\Controllers\Admin\Marks\MarksController::class, 'getStudent'])->name('get.students.formarksentry');
		Route::get('/edit/view', [App\Http\Controllers\Admin\Marks\MarksController::class, 'edit'])->name('student.marks.entry.edit');
		Route::get('/get/student/editmarks', [App\Http\Controllers\Admin\Marks\MarksController::class, 'getEditMarks'])->name('get.students.editmarks');
		Route::post('/get/student/marks/update', [App\Http\Controllers\Admin\Marks\MarksController::class, 'update'])->name('student.marks.entry.update');

		// for grade point
		Route::get('/gradePoint/view', [App\Http\Controllers\Admin\Marks\GradePointController::class, 'view'])->name('gradePoint.view');
		Route::get('/gradePoint/add', [App\Http\Controllers\Admin\Marks\GradePointController::class, 'add'])->name('gradePoint.add');
		Route::post('/gradePoint/store', [App\Http\Controllers\Admin\Marks\GradePointController::class, 'store'])->name('gradePoint.store');
		Route::get('/gradePoint/edit/{id}', [App\Http\Controllers\Admin\Marks\GradePointController::class, 'edit'])->name('gradePoint.edit');
		Route::post('/gradePoint/update/{id}', [App\Http\Controllers\Admin\Marks\GradePointController::class, 'update'])->name('gradePoint.update');
		Route::get('/gradePoint/delete/{id}', [App\Http\Controllers\Admin\Marks\GradePointController::class, 'delete'])->name('gradePoint.delete');

	});	

	// accounts management
	Route::group(['prefix' => 'account'], function(){
		// for student fee
		Route::get('/student/fee/view', [App\Http\Controllers\Admin\Account\StudentFeeController::class, 'view'])->name('account.student.fee.view');
		Route::get('/student/fee/add', [App\Http\Controllers\Admin\Account\StudentFeeController::class, 'add'])->name('account.student.fee.add');
		Route::post('/student/fee/store', [App\Http\Controllers\Admin\Account\StudentFeeController::class, 'store'])->name('account.student.fee.store');
		Route::get('/fee/get/student', [App\Http\Controllers\Admin\Account\StudentFeeController::class, 'getStudent'])->name('account.fee.get.student');

		// for employee salary
		Route::get('/employee/salary/view', [App\Http\Controllers\Admin\Account\EmployeeSalaryController::class, 'view'])->name('account.employee.salary.view');
		Route::get('/employee/salary/add', [App\Http\Controllers\Admin\Account\EmployeeSalaryController::class, 'add'])->name('account.employee.salary.add');
		Route::post('/employee/salary/store', [App\Http\Controllers\Admin\Account\EmployeeSalaryController::class, 'store'])->name('account.employee.salary.store');
		Route::get('/salary/get/employee', [App\Http\Controllers\Admin\Account\EmployeeSalaryController::class, 'getEmployeeSalary'])->name('account.salary.get.employee');

		// for others cost
		Route::get('/others/cost/view', [App\Http\Controllers\Admin\Account\OtherCostController::class, 'view'])->name('account.other.cost.view');
		Route::get('/others/cost/add', [App\Http\Controllers\Admin\Account\OtherCostController::class, 'add'])->name('account.other.cost.add');
		Route::post('/others/cost/store', [App\Http\Controllers\Admin\Account\OtherCostController::class, 'store'])->name('account.other.cost.store');
		Route::get('/others/cost/edit/{id}', [App\Http\Controllers\Admin\Account\OtherCostController::class, 'edit'])->name('account.other.cost.edit');
		Route::post('/others/cost/update/{id}', [App\Http\Controllers\Admin\Account\OtherCostController::class, 'update'])->name('account.other.cost.update');
	});

	// reports management
	Route::group(['prefix' => 'reports'], function(){
		// for monthly/yearly profit
		Route::get('/profit/monthly/view', [App\Http\Controllers\Admin\Report\ProfitController::class, 'view'])->name('monthly.profit.view');
		Route::get('/get/monthly/profit', [App\Http\Controllers\Admin\Report\ProfitController::class, 'getProfit'])->name('monthly.profit.get');
		Route::get('/get/monthly/profit/pdf', [App\Http\Controllers\Admin\Report\ProfitController::class, 'pdf'])->name('monthly.profit.get.pdf');

		// for marksheet 
		Route::get('/marksheet/view', [App\Http\Controllers\Admin\Report\MarksheetController::class, 'view'])->name('report.marksheet.view');
		Route::post('/marksheet/get/report', [App\Http\Controllers\Admin\Report\MarksheetController::class, 'getReport'])->name('report.marksheet.get');

		// for employee attendance
		Route::get('/attendance/view', [App\Http\Controllers\Admin\Report\EmployeeAttendanceController::class, 'view'])->name('report.employee.attendance.view');
		Route::post('/attendance/get/report', [App\Http\Controllers\Admin\Report\EmployeeAttendanceController::class, 'getReport'])->name('report.employee.attendance.get');

		// for student resultsheet
		Route::get('/resultsheet/view', [App\Http\Controllers\Admin\Report\StudentResultsheetController::class, 'view'])->name('student.resultsheet.view');
		Route::post('/resultsheet/get/report', [App\Http\Controllers\Admin\Report\StudentResultsheetController::class, 'getReport'])->name('student.resultsheet.get');

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