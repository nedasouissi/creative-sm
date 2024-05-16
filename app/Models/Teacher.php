<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'teacher';
    protected $fillable = ['name', 'last_name', 'teacher_phone', 'teacher_birthdate', 'subject_id','classe_id'];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function classes()
    {
        return $this->hasMany(Classe::class, 'teacher_id');
    }

}
