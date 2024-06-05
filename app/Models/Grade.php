<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'grades';
    protected $fillable = ['name', 'classe_id'];

    // public function classe()
    // {
    //     return $this->hasMany(Classe::class, 'grade_id');
    // }
}
