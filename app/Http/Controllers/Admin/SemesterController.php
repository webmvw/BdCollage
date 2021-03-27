<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Semester;

class SemesterController extends Controller
{
     public function view(){
    	$allSemester = Semester::latest()->get();
    	return view('admin.pages.semester.view-semester', compact('allSemester'));
    }

    public function add(){
    	return view('admin.pages.semester.add-semester');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:semesters',
        ]);

    	$semester = new Semester;
    	$semester->name = $request->name;
    	$semester->save();
    	return redirect()->route('semester.view')->with("success", "Semester Added Successfully!!");
    }


    public function edit($id){
    	$getSemester = Semester::find($id);
    	return view('admin.pages.semester.edit-semester', compact('getSemester'));
    }

    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'name'   =>  [
                'required',
                 Rule::unique('semesters')->ignore($id),
            ]
        ]);
    	$semester = Semester::find($id);
    	$semester->name = $request->name;
    	$semester->save();
    	return redirect()->route('semester.view')->with("info", "Semester updated Successfully!!");
    }

    public function delete($id){
    	$semester = Semester::find($id);
    	$semester->delete();
    	return redirect()->route('semester.view')->with("info", "Semester deleted Successfully!!");
    }
}
