<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <a class="btn btn-border" style="padding:10px;border:solid 1px;" href="{{ route('addstudent') }}">Add Student</a>   
                    </div>
                     <br>
                    <div>
                        <table class="table" id="student_table">
                            <thead>
                                <tr>
                                <th>Id</th>
                                <th>Student Name</th>
                                <th>Email</th>
                                <th>Teacher Name</th>
                                <th>Class</th>
                                <th>Admission Date</th>
                                <th>Yearly Fees</th>
                                <th>Action</th>
                                <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($studentlist))
                                    @for($i=0;count($studentlist)>$i;$i++)
                                        <?php
                                           $studentlist[$i]['class_teacher_id'] = isset($getteacherData[$studentlist[$i]['class_teacher_id']]) && $getteacherData[$studentlist[$i]['class_teacher_id']] !=''?$getteacherData[$studentlist[$i]['class_teacher_id']]:'';
                                        ?>
                                        <tr>
                                        <td>{{ $studentlist[$i]['id'] }}</td>
                                        <td>{{ $studentlist[$i]['name'] }}</td>
                                        <td>{{ $studentlist[$i]['email'] }}</td>
                                        <td>{{ $studentlist[$i]['class_teacher_id'] }}</td>
                                        <td>{{ $studentlist[$i]['class'] }}</td>
                                        <td>{{ $studentlist[$i]['admission_date'] }}</td>
                                        <td>{{ $studentlist[$i]['yearly_fees'] }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('editstudentdata') }}">
                                                @csrf
                                                 <input type="text" name="id" value="{{$studentlist[$i]['id']}}" hidden />
                                                <button type="submit" class="btn"><i class="bi bi-pen" style="color:blue;"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('deletestudentdata') }}">
                                                @csrf
                                                <input type="text" name="id" value="{{$studentlist[$i]['id']}}" hidden />
                                                <button type="submit" class="btn"><i class="bi bi-trash" style="color:red;"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endfor
                                   
                                @endif
                            </tbody>
                 
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
