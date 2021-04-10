<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeAttendance;
use PDF;

class EmployeeAttendanceController extends Controller
{
    public function view(){
    	$allData = User::with('designation')->where('role_id', '2')->get();
    	return view('admin.pages.report.employee-attendance.view-employeeAttendance', compact('allData'));
    }

    public function getReport(Request $request){
    	$teacher_id = $request->teacher;
    	$date = date('Y-m', strtotime($request->date));
    	$data['get_employee_attendance'] = EmployeeAttendance::with('employee')->where('employee_id', $teacher_id)->where('date', 'like', $date.'%')->get();
    	$data['present'] = EmployeeAttendance::with('employee')->where('employee_id', $teacher_id)->where('date', 'like', $date.'%')->where('attend_status', 'Present')->get()->count();
    	$data['leave'] = EmployeeAttendance::with('employee')->where('employee_id', $teacher_id)->where('date', 'like', $date.'%')->where('attend_status', 'Leave')->get()->count();
    	$data['absent'] = EmployeeAttendance::with('employee')->where('employee_id', $teacher_id)->where('date', 'like', $date.'%')->where('attend_status', 'Absent')->get()->count();
    	$pdf = PDF::loadView('admin.pdf.employeeAttendanceReportPdf', $data);
		return $pdf->stream();
    }
}
