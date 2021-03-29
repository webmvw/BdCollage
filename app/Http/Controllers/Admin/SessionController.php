<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Session;

class SessionController extends Controller
{
    public function view(){
    	$allSession = Session::latest()->get();
    	return view('admin.pages.session.view-session', compact('allSession'));
    }

    public function add(){
    	return view('admin.pages.session.add-session');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:sessions',
        ]);

    	$session = new Session;
    	$session->name = $request->name;
    	$session->save();
    	return redirect()->route('session.view')->with("success", "Session Added Successfully!!");
    }


    public function edit($id){
    	$getSession = Session::find($id);
    	return view('admin.pages.session.edit-session', compact('getSession'));
    }

    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'name'   =>  [
                'required',
                 Rule::unique('sessions')->ignore($id),
            ]
        ]);
    	$session = Session::find($id);
    	$session->name = $request->name;
    	$session->save();
    	return redirect()->route('session.view')->with("info", "Session updated Successfully!!");
    }

    public function delete($id){
    	$session = Session::find($id);
    	$session->delete();
    	return redirect()->route('session.view')->with("info", "Session deleted Successfully!!");
    }
}
