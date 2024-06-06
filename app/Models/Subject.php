<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'subjects';
    protected $fillable = ['name', 'module_id', 'user_id', 'class_id'];

    public function module()
    {
        return $this->belongsTo(Module::class, 'Module_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
