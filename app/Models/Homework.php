<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'homeworks';
    protected $fillable = ['title', 'description', 'deadline', 'pdf', 'image', 'video'];

    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'class_homework', 'homework_id', 'classe_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
