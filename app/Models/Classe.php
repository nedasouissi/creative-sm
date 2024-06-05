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
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function homeworks()
    {
        return $this->belongsToMany(Homework::class, 'homework_classe', 'classe_id', 'homework_id');
    }
}
