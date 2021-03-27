<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function view(){
    	$allSubject = Subject::latest()->get();
    	return view('admin.pages.subject.view-subject', compact('allSubject'));
    }

    public function add(){
    	return view('admin.pages.subject.add-subject');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:subjects',
            'subject_code' => 'required|unique:subjects',
        ]);

    	$subject = new Subject;
    	$subject->name = $request->name;
    	$subject->subject_code = $request->subject_code;
    	$subject->save();
    	return redirect()->route('subject.view')->with("success", "Subject Added Successfully!!");
    }


    public function edit($id){
    	$getSubject = Subject::find($id);
    	return view('admin.pages.subject.edit-subject', compact('getSubject'));
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
    	$subject->save();
    	return redirect()->route('subject.view')->with("info", "Subject updated Successfully!!");
    }

    public function delete($id){
    	$subject = Subject::find($id);
    	$subject->delete();
    	return redirect()->route('subject.view')->with("info", "Subject deleted Successfully!!");
    }
}
