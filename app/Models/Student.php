<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';
    protected $table="student";
    protected $fillable = [
        'student_name', 'student_last_name','student_grade','student_phone','student_parent_id','birthdate','avatar'
        ];
    public function getAvatarUrlAttribute()
    {
        return $this->avatar ? Storage::url($this->avatar) : null;
    }

    public function studentParent()
    {
        return $this->belongsTo(StudentParent::class, 'student_parent_id');
    }
}
