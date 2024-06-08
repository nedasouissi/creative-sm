<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'classes';
    protected $fillable = ['name', 'user_id', 'grade_id'];

    public function Grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    public function teachers()
    {
        return $this->belongsToMany(User::class, 'class_teachers', 'class_id', 'teacher_id');
    }
    public function students()
    {
        return $this->belongsToMany(User::class, 'class_students', 'class_id', 'student_id');
    }
    public function homeworks()
    {
        return $this->belongsToMany(Homework::class, 'class_homework', 'classe_id', 'homework_id');
    }
}
