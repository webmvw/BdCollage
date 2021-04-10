<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Session;
use App\Models\Semester;
use App\Models\Exam;
use App\Models\StudentMarks;
use App\Models\User;
use App\Models\Subject;
use App\Models\GradePoint;
use App\Models\AssignStudent;
use PDF;

class MarksheetController extends Controller
{
    public function view(){
    	$data['departments'] = Department::all();
    	$data['sessions'] = Session::orderBy('id', 'desc')->get();
    	$data['semesters'] = Semester::all();
    	$data['exams'] = Exam::all();
    	return view('admin.pages.report.marksheet.view-marksheet', $data);
    }


    public function getReport(Request $request){
    	$department_id = $request->department;
        $session_id = $request->session;
        $semester_id = $request->semester;
        $exam_id = $request->exam;
        $student_id_no = $request->student_id_no;

        $student_original_id = User::where('id_no', $student_id_no)->first()->id;

        /* ------------------------------------------------------------------
        | student result status pass or fail
        | -------------------------------------------------------------------
        |   return Pass or Fail status with $student_result_status variable 
        |
        */
        $count_fail = StudentMarks::where('student_id', $student_original_id)->where('department_id', $department_id)->where('session_id', $semester_id)->where('semester_id', $semester_id)->where('exam_id', $exam_id)->get();
        $subject_fail_count = 0;
        foreach($count_fail as $value){
            $subject = Subject::find($value->subject_id);
            $subject_total_mark = $subject->total_mark;
            $subject_pass_mark = $subject->pass_mark;
            $subject_original_pass_mark = $subject_pass_mark/100*$subject_total_mark;
            if($value->marks < $subject_original_pass_mark){
                $subject_fail_count++;
            }
        }
        if($subject_fail_count == 0){
            $data['student_result_status'] = "Pass";
        }else{
            $data['student_result_status'] = "Fail";
        }


        /* ------------------------------------------------------------------
        | get all subject marks where student_id = $request->student_id_no
        | -------------------------------------------------------------------  
        */
        $data['allMarks'] = StudentMarks::with('student', 'department', 'session', 'semester', 'subject', 'exam')->where('student_id', $student_original_id)->where('department_id', $department_id)->where('session_id', $session_id)->where('semester_id', $semester_id)->where('exam_id', $exam_id)->get();

        /* ------------------------------------------------------------------
        | get all marks grade point 
        | -------------------------------------------------------------------   
        */
        $data['allGrades'] = GradePoint::all();

        /* ------------------------------------------------------------------
        | get student 
        | -------------------------------------------------------------------   
        */
        $data['get_student'] = AssignStudent::with('student', 'department', 'session')->where('student_id', $student_original_id)->first();

        
        $pdf = PDF::loadView('admin.pdf.studentMarksheetPdf', $data);
        return $pdf->stream();
            
    }

}