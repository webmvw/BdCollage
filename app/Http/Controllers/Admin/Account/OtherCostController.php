<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AccountOtherCost;

class OtherCostController extends Controller
{
    public function view(){
    	$allData = AccountOtherCost::orderBy('id', 'desc')->get();
    	return view('admin.pages.account.others-cost.view-otherCost', compact('allData'));
    }

    public function add(){
    	return view('admin.pages.account.others-cost.add-otherCost');
    }

    public function store(Request $request){
    	$accountOtherCost = new AccountOtherCost;
        $accountOtherCost->date = date('Y-m-d', strtotime($request->date));
        $accountOtherCost->amount = $request->amount;
        $accountOtherCost->description = $request->description;
        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time().$file->getClientOriginalName();
            $file->move('public/img/account/otherscost/',$filename);
            $accountOtherCost->image = $filename;
        }
        $accountOtherCost->save();
        return redirect()->route('account.other.cost.view')->with('success', 'Other Cost Added Success');
    }

    public function edit($id){
    	$accountOtherCost = AccountOtherCost::find($id);
    	return view('admin.pages.account.others-cost.edit-otherCost', compact('accountOtherCost'));
    }

    public function update(Request $request, $id){
    	$accountOtherCost = AccountOtherCost::find($id);
    	$accountOtherCost->date = date('Y-m-d', strtotime($request->date));
        $accountOtherCost->amount = $request->amount;
        $accountOtherCost->description = $request->description;
        if($request->hasfile('image')){
        	if(File::exists('public/img/account/otherscost/'.$accountOtherCost->image)){
                File::delete('public/img/account/otherscost/'.$accountOtherCost->image);
            }
            $file = $request->file('image');
            $filename = time().$file->getClientOriginalName();
            $file->move('public/img/account/otherscost/',$filename);
            $accountOtherCost->image = $filename;
        }
        $accountOtherCost->save();
        return redirect()->route('account.other.cost.view')->with('success', 'Other Cost Updated Success');
    }

}
