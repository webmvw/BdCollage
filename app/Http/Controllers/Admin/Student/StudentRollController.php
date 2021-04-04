<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Session;
use App\Models\AssignStudent;

class StudentRollController extends Controller
{
    public function view(){
    	$data['departments'] = Department::all();
    	$data['sessions'] = Session::orderBy('id', 'desc')->get();
    	return view('admin.pages.student.student-roll.view-studentRoll', $data);
    }

    public function getStudents(Request $request){
    	$allStudent = AssignStudent::with('student', 'department', 'session')->where('department_id', $request->department)->where('session_id', $request->session)->get();
    	return response()->json($allStudent, 200);
    }

    public function store(Request $request){
    	if($request->student_id != Null){
    		$allStudent = count($request->student_id);
    		for ($i=0; $i < $allStudent ; $i++) { 
	    		$getStudent = $request->student_id[$i];
	    		$assignStudent = AssignStudent::where('student_id', $getStudent)->first();
	    		$assignStudent->roll = $request->roll[$i];
	    		$assignStudent->save();
	    	}
    	}else{
    		return redirect()->back()->with('error', 'Sorry! There are no Student.');
    	}
    	return redirect()->route('roll.generate.view')->with('success', 'Roll Added Success!!');
    }

    
}
