<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountStudentFee;
use App\Models\AccountEmployeeSalary;
use App\Models\AccountOtherCost;
use PDF;

class ProfitController extends Controller
{
    public function view(){
    	return view('admin.pages.report.monthly-report.view-monthlyReport');
    }

    public function getProfit(Request $request){
    	$start_date = date('Y-m', strtotime($request->start_date));
    	$end_date = date('Y-m', strtotime($request->end_date));
    	$s_start_date = date('Y-m-d', strtotime($request->start_date));
    	$e_end_date = date('Y-m-d', strtotime($request->end_date));

    	$totalStudentFee = AccountStudentFee::whereBetween('date',[$start_date, $end_date])->sum('amount');
    	$totalOtherCost = AccountOtherCost::whereBetween('date', [$s_start_date, $e_end_date])->sum('amount');
    	$totalEmployeeSalary = AccountEmployeeSalary::whereBetween('date', [$start_date, $end_date])->sum('amount');
    	$expense = $totalEmployeeSalary+$totalOtherCost;
    	$profit = $totalStudentFee-$expense;

    	$html['start_date'] = date('F, Y', strtotime($s_start_date));
    	$html['end_date'] = date('F, Y', strtotime($e_end_date));

    	$html['thsource'] = '<th>Total Student Fee</th>';
    	$html['thsource'] .= '<th>Total Employee Salary</th>';
    	$html['thsource'] .= '<th>Total Other cost</th>';
    	$html['thsource'] .= '<th>Total Expense</th>';
    	$html['thsource'] .= '<th>Profit</th>';
    	$html['thsource'] .= '<th>Action</th>';

    	$html['tdsource'] = '<td>'.$totalStudentFee.'tk</td>';
    	$html['tdsource'] .= '<td>'.$totalEmployeeSalary.'tk</td>';
    	$html['tdsource'] .= '<td>'.$totalOtherCost.'tk</td>';
    	$html['tdsource'] .= '<td>'.$expense.'tk</td>';
    	$html['tdsource'] .= '<td>'.$profit.'tk</td>';
    	$html['tdsource'] .= '<td><a class="btn btn-sm btn-success" href="'.route("monthly.profit.get.pdf").'?start_date='.$s_start_date.'&end_date='.$e_end_date.'" target="_blank">Print</a></td>';

    	return response()->json(@$html, 200);
    }

    public function pdf(Request $request){
    	$data['start_date'] = date('Y-m', strtotime($request->start_date));
    	$data['end_date'] = date('Y-m', strtotime($request->end_date));
    	$data['s_start_date'] = date('Y-m-d', strtotime($request->start_date));
    	$data['e_end_date'] = date('Y-m-d', strtotime($request->end_date));
    	$pdf = PDF::loadView('admin.pdf.monthlyProfitPdf', $data);
		return $pdf->stream();
    }

}
