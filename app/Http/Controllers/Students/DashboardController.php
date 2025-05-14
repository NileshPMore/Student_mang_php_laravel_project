<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;

class DashboardController extends Controller
{
    public function dashboard(){

        try{
            $getteacherData = Teacher::select('class_teacher_name','id')->pluck('class_teacher_name','id')->toArray();
            $getstudentData = Student::select('id','name','email','class','class_teacher_id','admission_date','yearly_fees')->get()->toArray();
            return view('dashboard')->with('studentlist',$getstudentData)->with('getteacherData',$getteacherData); 
        }catch(\Exception $e){
            $e->getMessage();
        }
    }
}
