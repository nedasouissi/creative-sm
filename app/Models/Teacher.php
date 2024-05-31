<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';
    protected $table = 'teacher';
    protected $fillable = ['user_id','name', 'last_name','teacher_phone', 'teacher_birthdate', 'subject_id','classe_id', 'status'];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function classes()
    {
        return $this->hasMany(Classe::class, 'teacher_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
