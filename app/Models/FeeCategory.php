<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeCategory extends Model
{
    use HasFactory;
    
    public function feeAmount(){
    	return $this->belongsTo(FeeAmount::class, 'id', 'fee_category_id');
    }

}
