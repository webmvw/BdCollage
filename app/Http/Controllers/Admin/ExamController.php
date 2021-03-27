<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Exam;

class ExamController extends Controller
{
    public function view(){
    	$allExam = Exam::latest()->get();
    	return view('admin.pages.exam.view-exam', compact('allExam'));
    }

    public function add(){
    	return view('admin.pages.exam.add-exam');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:exams',
        ]);

    	$exam = new Exam;
    	$exam->name = $request->name;
    	$exam->save();
    	return redirect()->route('exam.view')->with("success", "Exam Added Successfully!!");
    }


    public function edit($id){
    	$getExam = Exam::find($id);
    	return view('admin.pages.exam.edit-exam', compact('getExam'));
    }

    public function update(Request $request, $id){
        // Form validation
        $request->validate([
            'name'   =>  [
                'required',
                 Rule::unique('exams')->ignore($id),
            ]
        ]);
    	$exam = Exam::find($id);
    	$exam->name = $request->name;
    	$exam->save();
    	return redirect()->route('exam.view')->with("info", "Exam updated Successfully!!");
    }

    public function delete($id){
    	$exam = Exam::find($id);
    	$exam->delete();
    	return redirect()->route('exam.view')->with("info", "Exam deleted Successfully!!");
    }
}
