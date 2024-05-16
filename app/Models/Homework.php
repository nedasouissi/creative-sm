<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['title','content','deadline','classe_id'];

    public function classes()
    {
        return $this->belongsToMany(Classe::class);
    }

}
