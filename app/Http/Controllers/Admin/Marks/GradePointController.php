<?php

namespace App\Http\Controllers\Admin\Marks;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GradePoint;

class GradePointController extends Controller
{
    public function view(){
    	$allData = GradePoint::all();
    	return view('admin.pages.marks.grade-point.view-gradePoint', compact('allData'));
    }

    public function add(){
    	return view('admin.pages.marks.grade-point.add-gradePoint');
    }

    public function store(Request $request){
    	$gradePoint = new GradePoint;
    	$gradePoint->grade_name = $request->grade_name;
    	$gradePoint->grade_point = $request->grade_point;
    	$gradePoint->start_mark = $request->start_mark;
    	$gradePoint->end_mark = $request->end_mark;
    	$gradePoint->start_point = $request->start_point;
    	$gradePoint->end_point = $request->end_point;
    	$gradePoint->remarks = $request->remarks;
    	$gradePoint->save();
    	return redirect()->route('gradePoint.view')->with('success', 'Grade Point added Success');
    }

    public function edit($id){
    	$gradePoint = GradePoint::find($id);
    	return view('admin.pages.marks.grade-point.edit-gradePoint', compact('gradePoint'));
    }

    public function update(Request $request, $id){
    	$gradePoint = GradePoint::find($id);
    	$gradePoint->grade_name = $request->grade_name;
    	$gradePoint->grade_point = $request->grade_point;
    	$gradePoint->start_mark = $request->start_mark;
    	$gradePoint->end_mark = $request->end_mark;
    	$gradePoint->start_point = $request->start_point;
    	$gradePoint->end_point = $request->end_point;
    	$gradePoint->remarks = $request->remarks;
    	$gradePoint->save();
    	return redirect()->route('gradePoint.view')->with('success', 'Grade Point Updated Success');
    }

    public function delete($id){
    	$gradePoint = GradePoint::find($id);
    	$gradePoint->delete();
    	return redirect()->route('gradePoint.view')->with('success', 'Grade Point Deleted Success');
    }
}
