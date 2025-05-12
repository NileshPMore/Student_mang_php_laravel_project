<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
// use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator;
class StudentsAddController extends Controller
{
    //
    public function addstudent(){
        try{
            $getteacherData = Teacher::select('class_teacher_name','id')->pluck('class_teacher_name','id')->toArray();
            return view('student.addstudent')->with('teacherlist',$getteacherData);
        }catch(\Exception $e){
            $getMessage = $e->getMessage();
        }
    }

    public function savestudentdata(Request $request){
        try{
            // dd($request->all());
            $validator = Validator::make($request->all(),[
                'name' => 'required|string',
                'email'=> 'required|email',
                'classname' => 'required',
                'teachername'=> 'required',
                'add_date' => 'required|date',
                'fees' => 'required'
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $requestData = $request->all();
            // echo "<pre>";print_r($requestData);exit;
            if(isset($requestData['data_id']) && $requestData['data_id'] != ''){
                $savedetails = Student::where('id',$requestData['data_id'])->update([
                    'name' => $requestData['name'],
                    'email' => $requestData['email'],
                    'class_teacher_id' => $requestData['teachername'],
                    'class' => $requestData['classname'],
                    'admission_date' => $requestData['add_date'],
                    'yearly_fees' => $requestData['fees']
                ]);

                  if($savedetails){
                    return redirect()->route('dashboard');
                }

            }else{
                $savedetails = Student::create([
                    'name' => $requestData['name'],
                    'email' => $requestData['email'],
                    'class_teacher_id' => $requestData['teachername'],
                    'class' => $requestData['classname'],
                    'admission_date' => $requestData['add_date'],
                    'yearly_fees' => $requestData['fees']
                ]);

                if($savedetails){
                    return redirect()->route('dashboard');
                }
            }

        }catch(\Exception $e){
            $getMessage = $e->getMessage();
        }
    }

    public function editstudentdata(Request $request){
        try{

         
            $requestData = $request->all();
            $getStudentData = [];
            if(isset($requestData['id']) && $requestData['id'] !=''){
            
                $getStudentData = Student::where('id',$requestData['id'])->select('id','name','email','class','class_teacher_id','admission_date','yearly_fees')->get()->toArray();
            }
           
            $getteacherData = Teacher::select('class_teacher_name','id')->pluck('class_teacher_name','id')->toArray();
            return view('student.addstudent')->with('teacherlist',$getteacherData)->with('getStudentData',$getStudentData);
         }catch(\Exception $e){
            return $getMessage = $e->getMessage();
        }
    }   

     public function deletestudentdata(Request $request){
        try{
            
            $requestData = $request->all();
            $deteleData = Student::where('id',$requestData['id'])->delete();
            if($deteleData){
                return redirect()->route('dashboard');
            }
            
         }catch(\Exception $e){
            $getMessage = $e->getMessage();
        }
    }   
}
