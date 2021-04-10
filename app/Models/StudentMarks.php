<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMarks extends Model
{
    use HasFactory;

    public function student(){
    	return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function department(){
    	return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function session(){
    	return $this->belongsTo(Session::class, 'session_id', 'id');
    }

    public function semester(){
        return $this->belongsTo(Semester::class, 'semester_id', 'id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function exam(){
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }
}
