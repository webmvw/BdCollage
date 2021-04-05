<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeAttendance;

class MonthlySalaryController extends Controller
{
    public function view(){
    	return view('admin.pages.employee.monthly-salary.view-monthlySalary');
    }

    public function getSalaryDetails(Request $request){
    	$date = date('Y-m', strtotime($request->date));
    	$allAttendEmployee = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with('employee')->where('date', 'like', $date.'%')->get();

    	$html['monthname'] = date('F, Y', strtotime($date));

    	$html['thsource'] = '<th>SL</th>';
    	$html['thsource'] .= '<th>Name</th>';
    	$html['thsource'] .= '<th>Designation</th>';
    	$html['thsource'] .= '<th>ID No</th>';
    	$html['thsource'] .= '<th>Basic Salary</th>';
    	$html['thsource'] .= '<th>Total Absent</th>';
    	$html['thsource'] .= '<th>Pay Salary</th>';

		foreach($allAttendEmployee as $key=>$value){
			$totalattend = EmployeeAttendance::with('employee')->where('date', 'like', $date.'%')->where('employee_id', $value->employee_id)->get();
			$absentcount = count($totalattend->where('attend_status', 'Absent'));

			$html[$key]['tdsource'] = '<td>'.($key+1).'</td>';
			$html[$key]['tdsource'] .= '<td>'.$value->employee->name.'</td>';
			$html[$key]['tdsource'] .= '<td>'.$value->employee->designation->name.'</td>';
			$html[$key]['tdsource'] .= '<td>'.$value->employee->id_no.'</td>';
			$html[$key]['tdsource'] .= '<td>'.$value->employee->salary.'tk</td>';

			$basicsalary = $value->employee->salary;
			$salaryperday = (int)$basicsalary/30;
			$totalabsentsalary = (int)$salaryperday*(int)$absentcount;
			$paysalary = (int)$basicsalary-(int)$totalabsentsalary;

			$html[$key]['tdsource'] .= '<td>'.$absentcount.'</td>';
			$html[$key]['tdsource'] .= '<td>'.$paysalary.'tk</td>';
		}
		return response()->json(@$html);
    }
}
