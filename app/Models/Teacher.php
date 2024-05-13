<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teacher';
    protected $fillable = ['name', 'last_name', 'teacher_phone', 'teacher_birthdate'];

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'teacher_id');
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class,'classe_id');
    }
}
