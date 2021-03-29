<?php

namespace App\Http\Controllers\Admin\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\Department;
use App\Models\Session;
use DB;

class StudentRegistrationController extends Controller
{
    public function view(){
    	$allStudent = AssignStudent::all();
    	return view('admin.pages.student.student-reg.view-student', compact('allStudent'));
    }

    public function add(){
    	$data['departments'] = Department::all();
    	$data['sessions'] = Session::all();
    	return view('admin.pages.student.student-reg.add-student', $data);
    }

    public function store(Request $request){
    	DB::transaction(function() use($request){
            // start generate student id number
            $student = AssignStudent::where('department_id', $request->department)->where('session_id', $request->session)->orderBy('id','desc')->first();
            if($student == null){
                $firstReg = 0;
                $studentId = $firstReg+1;
                if($studentId<10){
                    $id_no = '000'.$studentId;
                }elseif($studentId<100){
                    $id_no = '00'.$studentId;
                }elseif ($studentId<1000) {
                    $id_no = '0'.$studentId;
                }
            }else{
                $student = AssignStudent::where('department_id', $request->department)->where('session_id', $request->session)->orderBy('id','desc')->first()->id;
                $studentId = $student+1;
                if($studentId<10){
                    $id_no = '000'.$studentId;
                }elseif($studentId<100){
                    $id_no = '00'.$studentId;
                }elseif ($studentId<1000) {
                    $id_no = '0'.$studentId;
                }
            }
            $department = Department::find($request->department);
            $department_code = $department->department_code;
            $session = Session::find($request->session);
            $session_name = $session->name;
            $final_id_no = $department_code.$session_name.$id_no;
            // end generate student id number

            

            // start insert student data in user model
            $user = new User;
            $code = rand(0000, 9999);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($code);
            $user->mobile = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->religion = $request->religion;
            $user->id_no = $final_id_no;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->code = $code;
            $user->role_id = '3';
            $user->status = '1';
            if($request->hasfile('image')){
                $file = $request->file('image');
                $filename = time().$file->getClientOriginalName();
                $file->move('public/img/students/',$filename);
                $user->image = $filename;
            }
            $user->save();
            // end insert student data in user model

            // start insert student data in AssignStudent model
            $assignStudent = new AssignStudent;
            $assignStudent->student_id = $user->id;
            $assignStudent->department_id = $request->department;
            $assignStudent->session_id = $request->session;
            $assignStudent->save();
            // end insert student data in AssignStudent model

            // start insert student data in Discount model
            $discount = new DiscountStudent;
            $discount->assign_student_id = $assignStudent->id;
            $discount->discount = $request->discount;
            $discount->save();
            //end insert student data in discount model

    	});
        return redirect()->route('student.registration.view')->with('success', 'Student Registration Successfully!!');
    }

}
