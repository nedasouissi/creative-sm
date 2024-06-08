<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'homeworks';
    protected $fillable = ['title', 'description', 'deadline', 'pdf', 'image', 'video','user_id'];

    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'class_homeworks', 'homework_id', 'class_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
