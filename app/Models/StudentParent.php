<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Student;


class StudentParent extends Authenticatable implements MustVerifyEmail
{
    use notifiable;
    protected $table="student_parent";
    //
    protected $fillable = [
        'father_name', 'father_last_name', 'father_phone', 'father_job','status','parent_email',
        'mother_name', 'mother_last_name', 'mother_phone', 'mother_job','password'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    // getters and setters for attributes
    public function getFatherNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setFatherNameAttribute($value)
    {
        $this->attributes['father_name'] = strtolower($value);
    }

    public function getFatherLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setFatherLastNameAttribute($value)
    {
        $this->attributes['father_last_name'] = strtolower($value);
    }

    public function getFatherPhoneAttribute($value)
    {
        return $value; // No special processing for phone number
    }

    public function setFatherPhoneAttribute($value)
    {
        $this->attributes['father_phone'] = $value;
    }

    public function getFatherJobAttribute($value)
    {
        return $value; // No special processing for job
    }

    public function setFatherJobAttribute($value)
    {
        $this->attributes['father_job'] = strtolower($value);
    }

    public function getMotherNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setMotherNameAttribute($value)
    {
        $this->attributes['mother_name'] = strtolower($value);
    }

    public function getMotherLastNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function setMotherLastNameAttribute($value)
    {
        $this->attributes['mother_last_name'] = strtolower($value);
    }

    public function getMotherPhoneAttribute($value)
    {
        return $value; // No special processing for phone number
    }

    public function setMotherPhoneAttribute($value)
    {
        $this->attributes['mother_phone'] = $value;
    }

    public function getMotherJobAttribute($value)
    {
        return $value; // No special processing for job
    }

    public function setMotherJobAttribute($value)
    {
        $this->attributes['mother_job'] = strtolower($value);
    }

    public function getStatusAttribute($value)
    {
        return (bool) $value;
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = (bool) $value;
    }

    public function getParentEmailAttribute($value)
    {
        return strtolower($value);
    }

    public function setParentEmailAttribute($value)
    {
        $this->attributes['parent_email'] = strtolower($value);
    }



    //relation
    public function students()
    {
        return $this->hasMany(Student::class);
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
