<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'subject';
    protected $fillable = ['name', 'module_id', 'teacher_id'];

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id');
    }

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class, 'subject_teacher', 'subject_id', 'teacher_id');
    }
}
