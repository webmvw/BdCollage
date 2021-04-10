<?php

namespace App\Http\Controllers\Admin\Marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Session;
use App\Models\Subject;
use App\Models\Exam;
use App\Models\AssignStudent;
use App\Models\StudentMarks;
use App\Models\Semester;

class MarksController extends Controller
{
    public function view(){
    	$data['departments'] = Department::all();
    	$data['sessions'] = Session::orderBy('id', 'desc')->get();
    	$data['exams'] = Exam::all();
        $data['semesters'] = Semester::all();
    	return view('admin.pages.marks.marks-entry.view-marksentry', $data);
    }

    public function gelAllSubject(Request $request){
    	$department_id = $request->department;
    	$allSubject = Subject::where('department_id', $department_id)->get();
    	return response()->json($allSubject, 200);
    }

    public function getStudent(Request $request){
    	$allStudent = AssignStudent::with('student', 'department', 'session')->where('department_id', $request->department)->where('session_id', $request->session)->get();
    	return response()->json($allStudent, 200);
    }

    public function store(Request $request){
    	$department_id = $request->department;
    	$session_id = $request->session;
    	$subject_id = $request->subject;
        $semester_id = $request->semester;
    	$exam_id = $request->exam;
        $getStudentMarks = StudentMarks::where('department_id', $department_id)->where('session_id', $session_id)->where('semester_id', $semester_id)->where('subject_id', $subject_id)->where('exam_id', $exam_id)->get()->count();
        if($getStudentMarks == 0){
            if($request->student_id != Null){
                $allStudent = count($request->student_id);
                for ($i=0; $i < $allStudent ; $i++) { 
                    $studentMarks = new StudentMarks; 
                    $studentMarks->student_id = $request->student_id[$i];
                    $studentMarks->department_id = $department_id;
                    $studentMarks->session_id = $session_id;
                    $studentMarks->semester_id = $semester_id;
                    $studentMarks->subject_id = $subject_id;
                    $studentMarks->exam_id = $exam_id;
                    $studentMarks->marks = $request->mark[$i];
                    $studentMarks->save();
                }
            }else{
                return redirect()->back()->with('error', 'Sorry! There are no Student.');
            }
        }else{
        	return redirect()->back()->with('error', 'Sorry! This subject marks already exists!');
        }
    	return redirect()->back()->with('success', 'Marks Added Success!!');
    }

    public function edit(){
    	$data['departments'] = Department::all();
    	$data['sessions'] = Session::orderBy('id', 'desc')->get();
    	$data['exams'] = Exam::all();
        $data['semesters'] = Semester::all();
    	return view('admin.pages.marks.marks-entry.edit-marksentry', $data);
    }

    public function getEditMarks(Request $request){
    	$allStudentMarks = StudentMarks::with('student', 'department', 'session', 'semester')->where('department_id', $request->department)->where('session_id', $request->session)->where('subject_id', $request->subject)->where('semester_id', $request->semester)->where('exam_id', $request->exam)->get();
    	return response()->json($allStudentMarks, 200);
    }

    public function update(Request $request){
    	if($request->student_id != Null){
    		StudentMarks::where('department_id', $request->department)->where('session_id', $request->session)->where('subject_id', $request->subject)->where('semester_id', $request->semester)->where('exam_id', $request->exam)->delete();
    		$allStudent = count($request->student_id);
    		for ($i=0; $i < $allStudent ; $i++) { 
    			$studentMarks = new StudentMarks; 
	    		$studentMarks->student_id = $request->student_id[$i];
	    		$studentMarks->department_id = $request->department;
	    		$studentMarks->session_id = $request->session;
                $studentMarks->semester_id = $request->semester;
	    		$studentMarks->subject_id = $request->subject;
	    		$studentMarks->exam_id = $request->exam;
	    		$studentMarks->marks = $request->mark[$i];
	    		$studentMarks->save();
	    	}
    	}else{
    		return redirect()->back()->with('error', 'Sorry! There are no Student.');
    	}
    	return redirect()->back()->with('success', 'Marks Updated Success!!');
    }

}
