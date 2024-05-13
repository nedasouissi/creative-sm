<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'module';
    protected $fillable = ['name', 'coefficient', 'grade_id'];

    public function grade(){
        return   $this->belongsTo(Grade::class , 'grade_id');
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'module_id');
    }
}
