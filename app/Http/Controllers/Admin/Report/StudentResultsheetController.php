<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentMarks;
use App\Models\Department;
use App\Models\Session;
use App\Models\Semester;
use App\Models\Exam;
use PDF;

class StudentResultsheetController extends Controller
{
    public function view(){
    	$data['departments'] = Department::all();
    	$data['sessions'] = Session::orderBy('id', 'desc')->get();
    	$data['semesters'] = Semester::all();
    	$data['exams'] = Exam::all();
    	return view('admin.pages.report.resultsheet.view-resultsheet', $data);
    }

    public function getReport(Request $request){
    	$department_id = $request->department;
    	$session_id = $request->session;
    	$semester_id = $request->semester;
    	$exam_id = $request->exam;

    	$singleResult = StudentMarks::where('department_id', $department_id)->where('session_id', $session_id)->where('semester_id', $semester_id)->where('exam_id', $exam_id)->first();
    	if($singleResult != null){
    		$data['studentMarks'] = StudentMarks::select('department_id', 'session_id', 'semester_id', 'exam_id', 'student_id')->where('department_id', $department_id)->where('session_id', $session_id)->where('semester_id', $semester_id)->where('exam_id', $exam_id)->groupBy('department_id')->groupBy('session_id')->groupBy('semester_id')->groupBy('exam_id')->groupBy('student_id')->get();
    		$pdf = PDF::loadView('admin.pdf.studentResultsheetPdf', $data);
        	return $pdf->stream();

    	}else{
    		return redirect()->back()->with('error', 'Sorry! no result found.');
    	}
    }

}
