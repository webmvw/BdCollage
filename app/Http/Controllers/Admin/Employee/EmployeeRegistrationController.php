<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;
use DB;
use File;

class EmployeeRegistrationController extends Controller
{
    public function view(){
    	$data['allEmployee'] = User::orderBy('id', 'desc')->where('role_id', '2')->get();
    	return view('admin.pages.employee.employee-reg.view-employee', $data);
    }

    public function add(){
    	$data['departments'] = Department::all();
    	$data['designations'] = Designation::all();
    	return view('admin.pages.employee.employee-reg.add-employee', $data);
    }

    public function store(Request $request){
    	DB::transaction(function() use($request){
            // start generate student id number
            $teacher = User::where('role_id', '2')->orderBy('id','desc')->first();
            if($teacher == null){
                $firstReg = 0;
                $teacherId = $firstReg+1;
                if($teacherId<10){
                    $id_no = '000'.$teacherId;
                }elseif($teacherId<100){
                    $id_no = '00'.$teacherId;
                }elseif ($teacherId<1000) {
                    $id_no = '0'.$teacherId;
                }
            }else{
                $teacher = User::where('role_id','2')->orderBy('id','desc')->first()->id;
                $teacherId = $teacher+1;
                if($teacherId<10){
                    $id_no = '000'.$teacherId;
                }elseif($teacherId<100){
                    $id_no = '00'.$teacherId;
                }elseif ($teacherId<1000) {
                    $id_no = '0'.$teacherId;
                }
            }
            $department = Department::find($request->department);
            $department_code = $department->department_code;
            $join_date = $request->join_date;
            $join_date = explode('-', $join_date);
            $final_id_no = $department_code.'-'.$join_date[0].$join_date[1].$join_date[2].'-'.$id_no;
            // end generate student id number

            

            // start insert employee data in user model
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
            $user->join_date = date('Y-m-d', strtotime($request->join_date));
            $user->designation_id = $request->designation;
            $user->salary = $request->salary;
            $user->role_id = '2';
            $user->status = '1';
            if($request->hasfile('image')){
                $file = $request->file('image');
                $filename = time().$file->getClientOriginalName();
                $file->move('public/img/teacher/',$filename);
                $user->image = $filename;
            }
            $user->save();
            // end insert employee data in user model

            // start insert employee data in EmployeeSalaryLog model
            $employeeSalaryLog = new EmployeeSalaryLog;
            $employeeSalaryLog->employee_id = $user->id;
            $employeeSalaryLog->previous_salary = $request->salary;
            $employeeSalaryLog->present_salary = $request->salary;
            $employeeSalaryLog->increment_salary = '0';
            $employeeSalaryLog->effected_date = date('Y-m-d', strtotime($request->join_date));
            $employeeSalaryLog->save();
            // end insert employee data in EmployeeSalaryLog model

    	});
        return redirect()->route('employee.registration.view')->with('success', 'Employee Registration Successfully!!');
    }


    public function edit($id){
        $data['getTeacher'] = User::find($id);
        $data['departments'] = Department::all();
    	$data['designations'] = Designation::all();
        return view('admin.pages.employee.employee-reg.edit-employee', $data);
    }

    public function update(Request $request, $id){
        DB::transaction(function() use($request, $id){
            // start update teacher data in user model
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));
            $user->join_date = date('Y-m-d', strtotime($request->join_date));
            $user->designation_id = $request->designation;
            $user->salary = $request->salary;
            if($request->hasfile('image')){
                if(File::exists('public/img/teacher/'.$user->image)){
                    File::delete('public/img/teacher/'.$user->image);
                }
                $file = $request->file('image');
                $filename = time().$file->getClientOriginalName();
                $file->move('public/img/teacher/',$filename);
                $user->image = $filename;
            }
            $user->save();
            // end update teacher data in user model

            // start update employee data in EmployeeSalaryLog model
            $employeeSalaryLog = EmployeeSalaryLog::where('employee_id', $id)->first();
            $employeeSalaryLog->department_id = $request->department;
            $employeeSalaryLog->previous_salary = $request->salary;
            $employeeSalaryLog->present_salary = $request->salary;
            $employeeSalaryLog->effected_date = date('Y-m-d', strtotime($request->join_date));
            $employeeSalaryLog->save();
            // end update employee data in EmployeeSalaryLog model
        });
        return redirect()->route('employee.registration.view')->with('success', 'Employee Update Successfully!!');
    }
}
