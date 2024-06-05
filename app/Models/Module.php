<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'modules';
    protected $fillable = ['name', 'coefficient'];

    // public function grade()
    // {
    //     return $this->belongsTo(Grade::class, 'grade_id');
    // }

    // public function subjects()
    // {
    //     return $this->hasMany(Subject::class, 'module_id');
    // }
}
