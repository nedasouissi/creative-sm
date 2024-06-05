<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'subjects';
    protected $fillable = ['name', 'module_id', 'user_id', 'class_id'];

    // public function module()
    // {
    //     return $this->belongsTo(Module::class, 'module_id');
    // }

    // public function teachers()
    // {
    //     return $this->hasMany(Teacher::class, 'subject_id');
    // }
}
