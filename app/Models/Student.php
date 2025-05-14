<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Student extends Model
{
    use HasFactory; use SoftDeletes;

    protected $fillable = ['name','email','class_teacher_id','class','admission_date','yearly_fees','deleted_at'];
 

    public function teachers(){
        return $this->hasMany(Student::class);
    }
}
