<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'homework';
    protected $fillable = ['title','description','deadline'];

    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'homework_classe', 'homework_id', 'classe_id');
    }



}
