@extends('Dashboard/dashboard')

@section('content')


<div style="background-color: white">
<h2 style="text-align: center;"> All Teachers</h2>


<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>Id</th>
                <th> Teacher Name</th>
                <th>Father Name</th>
                <th>Father Cnic</th>
                <th>Father Cnic</th>
              
                <th>Teacher Relegion</th>
                
                <th>Teacher Email</th>
                <th>Teacher Image</th>
<th>Actions</th>



               
                
            </tr>
        </thead>
       
        <tbody>
        	@foreach($student as $students)
            <tr>

                <td>{{$students->id}}</td>
                <td>{{$students->name}}</td>
                <td>{{$students->father_name}}</td>
                <td>{{$students->student_cnic}}</td>
                <td>{{$students->father_cnic}}</td>
                <td>{{$students->religen}}</td>
               
                <td>{{$students->email}}</td>

                <td>{{$students->image}}</td>



                <td><a   href="{{route('get.edit.teacher',$students->id)}}" id="edit" class="btn btn-xs btn-primary edit"><i class="glyphicon glyphicon-edit"></i> Edit it</a>
                <a href="{{route('delete.teacher',$students->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                
           </td>
               
            </tr>
           @endforeach
        </tbody>
    </table>
<script type="text/javascript">
	
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

 
</div>
@endsection
