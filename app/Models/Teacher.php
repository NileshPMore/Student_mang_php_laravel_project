<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

   protected $fillable = ['class_teacher_name','email'];

    public function students(){
        return $this->belongsTo(Teacher::class);
    }
}
