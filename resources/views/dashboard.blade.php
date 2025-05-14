<x-app-layout>
    <x-slot name="header">
        
        <h1 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('STUDENTS LIST') }}
        </h1>
    </x-slot>
    @if (session('message'))
        <div id="toast" class="fixed top-4 right-4 bg-green-500 text-white px-4 py-2 rounded shadow-md z-50">
            {{ session('message') }}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <a class="btn btn-primary" href="{{ route('addstudent') }}">Add Student</a>   
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
                                <th>Action Edit</th>
                                <th>Action Delete</th>

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
                                                <input type="text" name="type_flag" value="edit" hidden />
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
    @if (session('message'))
        <script>
            // Get the toast element
            const toast = document.getElementById('toast');

            // Show the toast
            toast.style.display = 'block';

            // Hide the toast after 3 seconds (3000ms)
            setTimeout(() => {
                toast.style.display = 'none';
            }, 4000);
        </script>
    @endif
    <script>
        $(document).ready(function () {
            $('#student_table').DataTable();
        });
    </script>
  
</x-app-layout>
