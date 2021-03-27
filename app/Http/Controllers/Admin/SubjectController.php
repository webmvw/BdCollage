<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Subject;
use App\Models\Department;
use App\Models\Semester;

class SubjectController extends Controller
{
    public function view(){
    	$allSubject = Subject::latest()->get();
    	return view('admin.pages.subject.view-subject', compact('allSubject'));
    }

    public function add(){
        $departments = Department::all();
        $semesters = Semester::all();
    	return view('admin.pages.subject.add-subject', compact('departments', 'semesters'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:subjects',
            'subject_code' => 'required|unique:subjects',
        ]);

    	$subject = new Subject;
    	$subject->name = $request->name;
    	$subject->subject_code = $request->subject_code;
        $subject->department_id = $request->department;
        $subject->semester_id = $request->semester;
        $subject->total_mark = $request->total_mark;
        $subject->tc = $request->tc;
        $subject->tf = $request->tf;
        $subject->pc = $request->pc;
        $subject->pf = $request->pf;
        $subject->cradit = $request->cradit;
    	$subject->save();
    	return redirect()->route('subject.view')->with("success", "Subject Added Successfully!!");
    }


    public function edit($id){
    	$data['getSubject'] = Subject::find($id);
        $data['departments'] = Department::all();
        $data['semesters'] = Semester::all();
    	return view('admin.pages.subject.edit-subject', $data);
    }

    public function update(Request $request, $id){
        //Form validation
        $request->validate([
            'name'   =>  [
                'required',
                 Rule::unique('subjects')->ignore($id),
            ],
            'subject_code' => [
            	'required',
            	Rule::unique('subjects')->ignore($id),
            ]
        ]);
        
    	$subject = Subject::find($id);
    	$subject->name = $request->name;
        $subject->subject_code = $request->subject_code;
        $subject->department_id = $request->department;
        $subject->semester_id = $request->semester;
        $subject->total_mark = $request->total_mark;
        $subject->tc = $request->tc;
        $subject->tf = $request->tf;
        $subject->pc = $request->pc;
        $subject->pf = $request->pf;
        $subject->cradit = $request->cradit;
        $subject->save();
    	return redirect()->route('subject.view')->with("info", "Subject updated Successfully!!");
    }

    public function delete($id){
    	$subject = Subject::find($id);
    	$subject->delete();
    	return redirect()->route('subject.view')->with("info", "Subject deleted Successfully!!");
    }
}
