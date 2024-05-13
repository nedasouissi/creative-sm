<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $table = 'classe';
    protected $fillable =['name','grade_id'];

    public function Grade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }
}
