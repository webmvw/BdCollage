<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeLeave;
use App\Models\EmployeeAssignLeave;

class EmployeeLeaveController extends Controller
{
    public function view(){
    	$employeeLeaves = EmployeeLeave::orderBy('id', 'desc')->get();
    	return view('admin.pages.employee.employee-leave.view-employeeLeave', compact('employeeLeaves'));
    }

    public function add(){
    	$employees = User::where('role_id', '2')->get();
    	return view('admin.pages.employee.employee-leave.add-employeeLeave', compact('employees'));
    }

    public function store(Request $request){
    	$employeeLeave = new EmployeeLeave;
    	$employeeLeave->employee_id = $request->employee_id;
    	$employeeLeave->cl = $request->cl;
    	$employeeLeave->ml = $request->ml;
    	$employeeLeave->lwp = $request->lwp;
    	$employeeLeave->start_date = $request->start_date;
    	$employeeLeave->end_date = $request->end_date;
    	$employeeLeave->leave_reason= $request->leave_reason;
    	$employeeLeave->save();

    	$employeeAssignLeave = EmployeeAssignLeave::where('employee_id', $request->employee_id)->first();
    	$previousCL = $employeeAssignLeave->cl;
    	$previousML = $employeeAssignLeave->ml;
    	$previousLWP = $employeeAssignLeave->lwp;
    	$employeeAssignLeave->cl = $previousCL-$request->cl;
    	$employeeAssignLeave->ml = $previousML-$request->ml;
    	$employeeAssignLeave->lwp = $previousLWP+$request->lwp;
    	$employeeAssignLeave->save();
    	return redirect()->route('employeeLeave.view')->with('success', 'Employee Leave Added Successfully!!');
    }

    public function edit($id){
        $data['employees'] = User::where('role_id', '2')->get();
        $data['getEmployee'] = EmployeeLeave::find($id);
        return view('admin.pages.employee.employee-leave.edit-employeeLeave', $data);
    }

    public function update(Request $request, $id){
        $employeeLeave = EmployeeLeave::find($id);
        $employeeLeave->employee_id = $request->employee_id;
        $employeeLeave->cl = $request->cl;
        $employeeLeave->ml = $request->ml;
        $employeeLeave->lwp = $request->lwp;
        $employeeLeave->start_date = $request->start_date;
        $employeeLeave->end_date = $request->end_date;
        $employeeLeave->leave_reason= $request->leave_reason;
        $employeeLeave->save();

        $employeeAssignLeave = EmployeeAssignLeave::where('employee_id', $request->employee_id)->first();
        $previousCL = $employeeAssignLeave->cl;
        $previousML = $employeeAssignLeave->ml;
        $previousLWP = $employeeAssignLeave->lwp;
        $employeeAssignLeave->cl = $previousCL-$request->cl;
        $employeeAssignLeave->ml = $previousML-$request->ml;
        $employeeAssignLeave->lwp = $previousLWP+$request->lwp;
        $employeeAssignLeave->save();
        return redirect()->route('employeeLeave.view')->with('success', 'Employee Leave Updated Successfully!!');
    }

}

