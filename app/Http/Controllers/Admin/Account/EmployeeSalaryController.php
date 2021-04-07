<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountEmployeeSalary;
use App\Models\User;
use App\Models\EmployeeAttendance;

class EmployeeSalaryController extends Controller
{
    public function view(){
    	$allData = AccountEmployeeSalary::orderBy('id', 'desc')->get();
    	return view('admin.pages.account.employee-salary.view-employeeSalary', compact('allData'));
    }

    public function add(){
    	return view('admin.pages.account.employee-salary.add-employeeSalary');
    }

    public function getEmployeeSalary(Request $request){
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
    	$html['thsource'] .= '<th>Check Pay</th>';

		foreach($allAttendEmployee as $key=>$value){
			$totalattend = EmployeeAttendance::with('employee')->where('date', 'like', $date.'%')->where('employee_id', $value->employee_id)->get();
			$absentcount = count($totalattend->where('attend_status', 'Absent'));
			$accountEmployeeSalary = AccountEmployeeSalary::where('employee_id', $value->employee_id)->where('date', $date)->first();
            if($accountEmployeeSalary != null){
                $checked = 'checked';
            }else{
                $checked = '';
            }

			$html[$key]['tdsource'] = '<td>'.($key+1).'</td>';
			$html[$key]['tdsource'] .= '<td>'.$value->employee->name.'</td>';
			$html[$key]['tdsource'] .= '<td>'.$value->employee->designation->name.'</td>';
			$html[$key]['tdsource'] .= '<td>'.$value->employee->id_no.'</td>';
			$html[$key]['tdsource'] .= '<td>'.$value->employee->salary.'tk</td>';

			$basicsalary = $value->employee->salary;
			$salaryperday = (int)$basicsalary/30;
			$totalabsentsalary = (int)$salaryperday*(int)$absentcount;
			$paysalary = (int)$basicsalary-(int)$totalabsentsalary;

			$html[$key]['tdsource'] .= '<td>'.$absentcount.'<input type="hidden" name="date" value="'.$date.'"></td>';
			$html[$key]['tdsource'] .= '<td>'.$paysalary.'tk <input type="hidden" name="amount[]" value="'.$paysalary.'"></td>';
            $html[$key]['tdsource'] .= '<td><input type="hidden" name="employee_id[]" value="'.$value->employee_id.'"><input type="checkbox" name="checkmanage[]" value="'.$key.'" '.$checked.' style="transform:scale(1.5);margin-left:5px"></td>';
		}
		return response()->json(@$html);
    }

    public function store(Request $request){
    	$date = date('Y-m', strtotime($request->date));
        AccountEmployeeSalary::where('date', $request->date)->delete();
        $checkdata = $request->checkmanage;
        if($checkdata != null){
            for($i=0; $i<count($checkdata); $i++){
                $data = new AccountEmployeeSalary;
                $data->date = date('Y-m', strtotime($request->date));
                $data->employee_id = $request->employee_id[$checkdata[$i]];
                $data->amount = $request->amount[$checkdata[$i]];
                $data->save();
            }
        }
        if(!empty(@$data) || empty($checkdata)){
            return redirect()->route('account.employee.salary.view')->with('success', 'Well done! successfully updated.');
        }else{
            return redirect()->back()->with('error', 'Sorry! Data not saved');
        }
    }
}
