@extends('Dashboard/dashboard')

@section('content')
<div class="col-md-12"   >
    <form action="{{route('course.student')}}">
        
   
    <div class="col-md-3"  >
       <select name="classid" class="form-control">
           @foreach($schoolclass as $cls)
           <option value="{{$cls->id}}">{{$cls->name}}</option>
           @endforeach
       </select>
    </div>
    <div class="col-md-3"  >
       <select name="sectionid"  class="form-control">
           @foreach($section as $cls)
           <option value="{{$cls->id}}">{{$cls->name}}</option>
           @endforeach
       </select>
    </div>
     <div class="col-md-2"  >
       <select name="sessionid"  class="form-control">
           @foreach($session as $cls)
           <option value="{{$cls->id}}">{{$cls->name}}</option>
           @endforeach
       </select>
    </div>

    <div class="col-md-4" >
         <div class="row">
           
                <button class="btn-warning btn ">Search</button>
                
                
          
        </div>
    </div>
       
     </form>
</div>
<hr><br>

<div style="background-color: white">
<h2 style="text-align: center;"> All Students</h2>


<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th> Student Name</th>
                <th>Father Name</th>
                <th>Student Cnic</th>
              
              
                <th>Student Relegion</th>
                <th>Student Class</th>
                <th>Student Section</th>
                <th>Student Email</th>
              
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
               
                <td>{{$students->religen}}</td>
                <td>{{$students->schoolClass->name}}</td>
                <td>{{$students->section->name}}</td>
                <td>{{$students->email}}</td>

               



                <td><a   href="{{route('get.edit.student',$students->id)}}" id="edit" class="btn btn-xs btn-primary edit"><i class="glyphicon glyphicon-edit"></i> Edit it</a>
                <a href="{{route('delete.student',$students->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                <br><br>
                 <a href="{{route('assign.course',$students->id)}}" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus"></i> Assign  Course</a>
                
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
