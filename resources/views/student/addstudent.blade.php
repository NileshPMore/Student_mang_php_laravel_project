<?php
    $name = '';
    $email = '';
    $class = '';
    $class_teacher_id = '';
    $admission_date = '';
    $yearly_fees = '';
    $updatedata = '';


    if(isset($getStudentData) && !empty($getStudentData)){
        $getStudentData = (array) current($getStudentData);
        $name = $getStudentData['name'];
        $email = $getStudentData['email'];
        $class = $getStudentData['class'];
        $class_teacher_id = $getStudentData['class_teacher_id'];
        $admission_date = $getStudentData['admission_date'];
        $yearly_fees = $getStudentData['yearly_fees'];
        $updatedata = $getStudentData['id'];

    }
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
               <center> 
                    <form action="{{ route('savestudentdata') }}" method="POST">
                        @csrf
                        <input type="text"  name="data_id" value="{{$updatedata}}" id="data_id" hidden />
                        <div class="row p-1">
                            <div class="col-md-4">
                                <label>{{ __('Student Name') }}</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="name" value="{{ old('name') != ''?old('name'):$name }}" id="name" placeholder="Please enter name" />
                            </div>
                            
                            @error('name')
                                <lable style="color:red;">Please enter name</lable>
                            @enderror
                        </div>

                           <div class="row p-1">
                            <div class="col-md-4">
                                <label>{{ __('Student Email') }}</label>
                            </div>
                            <div class="col-md-4">
                                <input type="email" class="form-control" value="{{$email}}" name="email" id="email" placeholder="Please enter email" />
                            </div>
                            @error('email')
                                <lable style="color:red;">Please enter valid mail</lable>
                            @enderror
                        </div>

                           <div class="row p-1">
                            <div class="col-md-4">
                                <label>{{ __('Class Teacher') }}</label>
                            </div>
                            <div class="col-md-4">
                               <select class="form-select" aria-label="teacher" name="teachername" id="teachername">
                                <option selected value=''>Please select teacher</option>
                                    @foreach($teacherlist as $key => $value)
                                    <option value="{{$key}}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('teachername')
                                <lable style="color:red;">Please select value</lable>
                            @enderror

                        </div>
                           <div class="row p-1">
                            <div class="col-md-4">
                                <label>{{ __('Class Name') }}</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" value="{{$class}}" name="classname" id="classname" placeholder="Please enter class" />
                            </div>
                            @error('classname')
                                <lable style="color:red;">Please select value</lable>
                            @enderror
                        </div>
                         <div class="row p-1">
                            <div class="col-md-4">
                                <label>{{ __('Addmission Date') }}</label>
                            </div>
                            <div class="col-md-4">
                                <input type="date" class="form-control" value="{{$admission_date}}" name="add_date" id="add_date" placeholder="Please select admission date" />
                            </div>
                            @error('add_date')
                                <lable style="color:red;">Please select value</lable>
                            @enderror
                        </div>

                         <div class="row p-1">
                            <div class="col-md-4">
                                <label>{{ __('Yearly Fees') }}</label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" value="{{$yearly_fees}}" name="fees" id="fees" placeholder="Please enter fees" />
                            </div>
                            @error('fees')
                                <lable style="color:red;">Please select value</lable>
                            @enderror
                        </div>
                        <div class="row p-1">
                            <div class="col-4  mx-auto">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
               </center>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>