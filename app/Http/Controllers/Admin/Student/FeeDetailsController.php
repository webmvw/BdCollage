<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\Department;
use App\Models\Session;
use App\Models\FeeCategory;
use App\Models\FeeAmount;
use App\Models\DiscountStudent;

class FeeDetailsController extends Controller
{
    public function view(){
    	$data['departments'] = Department::all();
    	$data['sessions'] = Session::orderBy('id', 'desc')->get();
    	$data['feeCategories'] = FeeCategory::all();
    	return view('admin.pages.student.fee-details.view-feeDetails', $data);
    }

    public function getFeeDetails(Request $request){
    	$department_id = $request->department;
    	$session_id = $request->session;
    	$feeCategory_id = $request->feeCategory;

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

		foreach($getStudents as $key=>$value){
			$feeAmount = FeeAmount::where('fee_category_id', $feeCategory_id)->where('department_id', $department_id)->first();
			$feeCategory = FeeCategory::find($feeCategory_id);
			$html[$key]['tdsource'] = '<td>'.($key+1).'</td>';
			$html[$key]['tdsource'] .= '<td>'.$value->student->name.'</td>';
			$html[$key]['tdsource'] .= '<td>'.$value->department->name.'</td>';
			$html[$key]['tdsource'] .= '<td>'.$value->session->name.'</td>';
			$html[$key]['tdsource'] .= '<td>'.$value->student->id_no.'</td>';
			$html[$key]['tdsource'] .= '<td>'.$feeCategory->name.'</td>';
			$html[$key]['tdsource'] .= '<td>'.$feeAmount->amount.'tk</td>';
			$html[$key]['tdsource'] .= '<td>'.$value->discount->discount.'%</td>';

			$originalfee = $feeAmount->amount;
			$discount = $value->discount->discount;
			$discountablefee = $discount/100*$originalfee;
			$finalfee = (int)$originalfee - (int)$discountablefee;

			$html[$key]['tdsource'] .= '<td>'.$finalfee.'tk</td>';
		}
		return response()->json(@$html);   	
    }
}
