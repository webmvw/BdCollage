<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\FeeCategory;


class FeeCategoryController extends Controller
{
    public function view(){
    	$allFeeCategory = FeeCategory::latest()->get();
    	return view('admin.pages.feeCategory.view-feeCategory', compact('allFeeCategory'));
    }

    public function add(){
    	return view('admin.pages.feeCategory.add-feeCategory');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:fee_categories',
        ]);

    	$feeCategory = new FeeCategory;
    	$feeCategory->name = $request->name;
    	$feeCategory->save();
    	return redirect()->route('feeCategory.view')->with("success", "Fee Category Added Successfully!!");
    }


    public function edit($id){
    	$getFeeCategory = FeeCategory::find($id);
    	return view('admin.pages.feeCategory.edit-feeCategory', compact('getFeeCategory'));
    }

    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'name'   =>  [
                'required',
                 Rule::unique('fee_categories')->ignore($id),
            ]
        ]);
    	$feeCategory = FeeCategory::find($id);
    	$feeCategory->name = $request->name;
    	$feeCategory->save();
    	return redirect()->route('feeCategory.view')->with("info", "Fee Category updated Successfully!!");
    }

    public function delete($id){
    	$feeCategory = FeeCategory::find($id);
    	$feeCategory->delete();
    	return redirect()->route('feeCategory.view')->with("info", "Fee Category deleted Successfully!!");
    }
}
