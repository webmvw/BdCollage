<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountStudentFee;
use App\Models\Department;
use App\Models\Session;
use App\Models\FeeCategory;
use App\Models\FeeAmount;
use App\Models\AssignStudent;

class StudentFeeController extends Controller
{
    public function view(){
    	$data['allData'] = AccountStudentFee::orderBy('id', 'desc')->get(); 
    	return view('admin.pages.account.student-fee.view-studentFee', $data);
    }

    public function add(){
    	$data['departments'] = Department::all();
    	$data['sessions'] = Session::orderBy('id', 'desc')->get();
    	$data['feeCategories'] = FeeCategory::all();
    	return view('admin.pages.account.student-fee.add-studentFee', $data);
    }

    public function getStudent(Request $request){
        $department_id = $request->department;
        $session_id = $request->session;
        $feeCategory_id = $request->feeCategory;
        $date = date('Y-m', strtotime($request->date));

        $getStudents = AssignStudent::with('student', 'department', 'session', 'discount')->where('department_id', $department_id)->where('session_id', $session_id)->get();

        $html['thsource'] = '<th>SL</th>';
        $html['thsource'] .= '<th>Name</th>';
        $html['thsource'] .= '<th>Department</th>';
        $html['thsource'] .= '<th>Session</th>';
        $html['thsource'] .= '<th>ID No</th>';
        $html['thsource'] .= '<th>Fee Category</th>';
        $html['thsource'] .= '<th>Amount</th>';
        $html['thsource'] .= '<th>Discount</th>';
        $html['thsource'] .= '<th>Pay Amount</th>';
        $html['thsource'] .= '<th>Pay Check</th>';

        foreach($getStudents as $key=>$value){
            $feeAmount = FeeAmount::where('fee_category_id', $feeCategory_id)->where('department_id', $department_id)->first();
            $studentAccountFee = AccountStudentFee::where('student_id', $value->student_id)->where('department_id', $department_id)->where('session_id', $session_id)->where('fee_category_id', $feeCategory_id)->where('date', $date)->first();
            if($studentAccountFee != null){
                $checked = 'checked';
            }else{
                $checked = '';
            }

            $feeCategory = FeeCategory::find($feeCategory_id);
            $html[$key]['tdsource'] = '<td>'.($key+1).'</td>';
            $html[$key]['tdsource'] .= '<td>'.$value->student->name.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$value->department->name.'<input type="hidden" name="department_id" value="'.$value->department->id.'"></td>';
            $html[$key]['tdsource'] .= '<td>'.$value->session->name.'<input type="hidden" name="session_id" value="'.$value->session->id.'"></td>';
            $html[$key]['tdsource'] .= '<td>'.$value->student->id_no.'</td>';
            $html[$key]['tdsource'] .= '<td>'.$feeCategory->name.'<input type="hidden" name="fee_category_id" value="'.$feeCategory->id.'"></td>';
            $html[$key]['tdsource'] .= '<td>'.$feeAmount->amount.'tk</td>';
            $html[$key]['tdsource'] .= '<td>'.$value->discount->discount.'% <input type="hidden" name="date" value="'.$date.'"></td>';

            $originalfee = $feeAmount->amount;
            $discount = $value->discount->discount;
            $discountablefee = $discount/100*$originalfee;
            $finalfee = (int)$originalfee - (int)$discountablefee;

            $html[$key]['tdsource'] .= '<td>'.$finalfee.'tk <input type="hidden" name="amount[]" value="'.$finalfee.'"></td>';
            $html[$key]['tdsource'] .= '<td><input type="hidden" name="student_id[]" value="'.$value->student_id.'"><input type="checkbox" name="checkmanage[]" value="'.$key.'" '.$checked.' style="transform:scale(1.5);margin-left:5px"></td>';
        }
        return response()->json(@$html);
    }

    public function store(Request $request){
        $date = date('Y-m', strtotime($request->date));
        AccountStudentFee::where('department_id', $request->department_id)->where('session_id', $request->session_id)->where('fee_category_id', $request->fee_category_id)->where('date', $request->date)->delete();
        $checkdata = $request->checkmanage;
        if($checkdata != null){
            for($i=0; $i<count($checkdata); $i++){
                $data = new AccountStudentFee;
                $data->department_id = $request->department_id;
                $data->session_id = $request->session_id;
                $data->fee_category_id = $request->fee_category_id;
                $data->date = date('Y-m', strtotime($request->date));
                $data->student_id = $request->student_id[$checkdata[$i]];
                $data->amount = $request->amount[$checkdata[$i]];
                $data->save();
            }
        }
        if(!empty(@$data) || empty($checkdata)){
            return redirect()->route('account.student.fee.view')->with('success', 'Well done! successfully updated.');
        }else{
            return redirect()->back()->with('error', 'Sorry! Data not saved');
        }
    }
}
