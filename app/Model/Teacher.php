<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function department(){
        return $this->belongsTo(Department::class,'deptId','id');
    }
}
