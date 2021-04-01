<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeSalaryLog;
use DB;

class EmployeeSalaryController extends Controller
{
    public function view(){
    	$data['allEmployee'] = User::orderBy('id', 'desc')->where('role_id', '2')->get();
    	return view('admin.pages.employee.employee-salary.view-salary', $data);
    }

    public function edit($id){
    	$employee = User::find($id);
    	return view('admin.pages.employee.employee-salary.edit-salary', compact('employee'));
    }

    public function update(Request $request, $id){
    	DB::transaction(function() use($request, $id){
    		$increment_amount = $request->encrement_amount;
    		$effected_date = $request->effected_date;

    		$employee = User::find($id);
    		$previous_salary = $employee->salary;
    		$present_salary = $previous_salary+$increment_amount;

    		$employee->salary = $present_salary;
    		$employee->save();

    		$employeeSelaryLog = new EmployeeSalaryLog;
    		$employeeSelaryLog->employee_id = $employee->id;
    		$employeeSelaryLog->previous_salary = $previous_salary;
    		$employeeSelaryLog->present_salary = $present_salary;
    		$employeeSelaryLog->increment_salary = $increment_amount;
    		$employeeSelaryLog->effected_date = date('Y-m-d', strtotime($effected_date));
    		$employeeSelaryLog->save();
    	});
    	return redirect()->route('employee.salary.view')->with('success', 'Encrement Salary Added');
    }

    public function details($id){
    	$getEmployee = User::find($id);
    	$employeeSelaryLogs = EmployeeSalaryLog::where('employee_id', $id)->get();
    	return view('admin.pages.employee.employee-salary.details-salary', compact('employeeSelaryLogs', 'getEmployee'));
    }


}
