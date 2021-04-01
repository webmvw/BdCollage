<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\EmployeeAssignLeave;
use App\Models\User;

class EmployeeAssignLeaveController extends Controller
{
    public function view(){
    	$allEmployeeAssignLeaves = EmployeeAssignLeave::orderBy('id', 'desc')->get();
    	return view('admin.pages.assignLeave.view-assignLeave', compact('allEmployeeAssignLeaves'));
    }


    public function add(){
    	$employees = User::where('role_id', '2')->orderBy('id', 'desc')->get();
    	return view('admin.pages.assignLeave.add-assignLeave', compact('employees'));
    }


    public function store(Request $request){

    	$request->validate([
            'employee_id' => 'required|unique:employee_assign_leaves',
        ]);

    	$employeeAssignLeave = new EmployeeAssignLeave;
    	$employeeAssignLeave->employee_id = $request->employee_id;
    	$employeeAssignLeave->cl = $request->cl;
    	$employeeAssignLeave->ml = $request->ml;
    	$employeeAssignLeave->save();
    	return redirect()->route('employee.assign.leave.view')->with('success', 'Employee Leave Assigned!!');
    }


    public function delete($id){
    	$getEmployeeAssignLeave = EmployeeAssignLeave::find($id);
    	$getEmployeeAssignLeave->delete();
    	return redirect()->route('employee.assign.leave.view')->with('success', 'Delete Employee Assign Leave.');
    }


}
