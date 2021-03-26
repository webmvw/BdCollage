<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\FeeAmount;
use App\Models\FeeCategory;
use App\Models\Department;

class FeeAmountController extends Controller
{
    public function view(){
        $allFeeCategory = FeeAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
    	return view('admin.pages.feeAmount.view-feeAmount', compact('allFeeCategory'));
    }

    public function add(){
        $data['departments'] = Department::all();
        $data['feeCategory'] = FeeCategory::all();
    	return view('admin.pages.feeAmount.add-feeAmount', $data);
    }

    public function store(Request $request){
        $countDepartment = count($request->department);
        if(!is_null($countDepartment)){
            for ($i=0; $i < $countDepartment; $i++) { 
                $feeAmount = new FeeAmount;
                $feeAmount->fee_category_id = $request->feeCategory;
                $feeAmount->department_id = $request->department[$i];
                $feeAmount->amount = $request->amount[$i];
                $feeAmount->save();
            }
        }
    	return redirect()->route('feeAmount.view')->with("success", "Fee Amount Added Successfully!!");
    }


    public function edit($fee_category_id){
    	$data['allData'] = FeeAmount::where('fee_category_id', $fee_category_id)->orderBy('department_id', 'asc')->get();
        $data['departments'] = Department::all();
        $data['feeCategory'] = FeeCategory::all();
    	return view('admin.pages.feeAmount.edit-feeAmount', $data);
    }

    public function update(Request $request, $fee_category_id){
       
        if($request->department == null){
            return redirect()->back()->with('error', 'Sorry! you do not select any department!');
        }else{
            FeeAmount::where('fee_category_id', $fee_category_id)->delete();
            $countDepartment = count($request->department);
            for ($i=0; $i < $countDepartment; $i++) { 
                $feeAmount = new FeeAmount;
                $feeAmount->fee_category_id = $request->feeCategory;
                $feeAmount->department_id = $request->department[$i];
                $feeAmount->amount = $request->amount[$i];
                $feeAmount->save();
            }
            return redirect()->route('feeAmount.view')->with("info", "Fee Amount updated Successfully!!");
        }
    }


    public function details($fee_category_id){
        $allData = FeeAmount::where('fee_category_id', $fee_category_id)->orderBy('department_id', 'asc')->get();
        return view('admin.pages.feeAmount.details-feeAmount', compact('allData'));
    }


    public function delete($id){
    	$feeCategory = FeeCategory::find($id);
    	$feeCategory->delete();
    	return redirect()->route('feeCategory.view')->with("info", "Fee Category deleted Successfully!!");
    }
}
