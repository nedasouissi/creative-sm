<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'classe';
    protected $fillable = ['name', 'teacher_id','grade_id'];

    public function Grade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }
    public function teacher()
    {
        return $this->hasMany(Teacher::class, 'classe_id');
    }
    public function homework()
    {
        return $this->hasMany(Homework::class, 'classe_id');
    }
}
