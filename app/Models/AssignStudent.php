<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
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

    public function discount(){
        return $this->belongsTo(DiscountStudent::class, 'id', 'assign_student_id');
    }
}
