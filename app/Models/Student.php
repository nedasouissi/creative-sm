<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'user_id',
        'father_name',
        'father_last_name',
        'father_phone',
        'father_job',
        'status',
        'email',
        'mother_name',
        'mother_last_name',
        'mother_phone',
        'mother_job',
        'password',
        'student_name',
        'student_last_name',
        'student_grade',
        'student_phone',
        'student_birthdate',
        'student_avatar',
    ];
}
