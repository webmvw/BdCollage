<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeAmount extends Model
{
    use HasFactory;
    public function feeCategory(){
    	return $this->belongsTo(FeeCategory::class, 'fee_category_id', 'id');
    }

    public function department(){
    	return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}
