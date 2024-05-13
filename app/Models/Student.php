<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table="student";
    protected $fillable = [
        'student_name', 'student_last_name','student_grade','student_phone','student_parent_id','birthdate','avatar'
        ];

    public function studentParent()
    {
        return $this->belongsTo(StudentParent::class,'student_parent_id');
    }
}
