<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeAttendance;

class EmployeeAttendanceController extends Controller
{
    public function view(){
    	$allData = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id', 'desc')->get();
    	return view('admin.pages.employee.employee-attendance.view-employeeAttendance', compact('allData'));
    }

    public function add(){
    	$employees = User::where('role_id', '2')->get();
    	return view('admin.pages.employee.employee-attendance.add-employeeAttendance', compact('employees'));
    }

    public function store(Request $request){
    	EmployeeAttendance::where('date', $request->date)->delete();
    	$countemployee = count($request->employee_id);
    	for($i=0; $i<$countemployee; $i++){
    		$attend_status = 'attend_status'.$i;
    		$attend = new EmployeeAttendance;
    		$attend->employee_id = $request->employee_id[$i];
    		$attend->date = date('Y-m-d', strtotime($request->date));
    		$attend->attend_status = $request->$attend_status;
    		$attend->save();
    	}
    	return redirect()->route('employeeAttendance.view')->with('success', 'Attendence Added Success!!');
    }

    public function edit($date){
    	$data['getAttendance'] = EmployeeAttendance::where('date', $date)->get();
    	return view('admin.pages.employee.employee-attendance.edit-employeeAttendance', $data);
    }


    public function details($date){
    	$allData = EmployeeAttendance::where('date', $date)->get();
    	return view('admin.pages.employee.employee-attendance.details-employeeAttendance', compact('allData'));
    }

}
