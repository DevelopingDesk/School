@extends('Dashboard/dashboard')

@section('content')
<button onclick="myFunction()" class="btn btn-danger">More Filters</button>
<div id="myDIV" style="display: none">
  


<form action="{{route('uploaded.attendence.students')}}" method="get">
  <br><br>

<div class="row">
  <h3 style="text-align: center;color: red">Filter Uploaded Attendance Student</h3>
<div class="col-md-12">
    <div class="col-md-3" style="border:2px solid lightblue;border-radius: 15px">
    <input type="date" name="date" placeholder="Enter Total Marks" class="form-control" style="border:2px solid red" >
  </div>
 
  <div class="col-md-2" style="border:2px solid lightblue;border-radius: 15px">
   <select class="form-control" name="classid">
     @foreach($class as $exa)
     <option value="{{$exa->id}}">{{$exa->name}}</option>
     @endforeach
   </select>
  </div>
  <div class="col-md-2" style="border:2px solid lightblue;border-radius: 15px">
   <select class="form-control" name="sessionid">
     @foreach($session as $exa)
     <option value="{{$exa->id}}">{{$exa->name}}</option>
     @endforeach
   </select>
  </div>
  <div class="col-md-2" style="border:2px solid lightblue;border-radius: 15px">
   <select class="form-control" name="status">
    <option>Present</option>
    <option>Absent</option>
    <option>Leave</option>
   </select>
  </div>
  <div class="col-md-2" >
   <button class="btn btn-primary">Filter</button>
  </div>
  
</div>
  <input type="hidden" name="subjectid" value="{{$subjectid}}">

</div>
</form>
</div>
<br><br><br>

<div style="background-color: white">
<h2 style="text-align: center;">Enter Student Attendance</h2>

<form action="{{route('store.attendence')}}" method="post">
   <div class="col-md-12">
    <div class="col-md-4" style="border:2px solid lightblue;border-radius: 15px">
    <input type="date" name="date" placeholder="Enter Total Marks" class="form-control" style="border:2px solid red" >
  </div>
 
  <input type="hidden" name="subjectid" value="{{$subjectid}}">

  
</div>
<br>
<br>
<br>

    {{csrf_field()}}
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Student Name</th>
                 <th>Father Name</th>
                 <th>Class</th>
                 <th>Session</th>
                 <th>Status</th>
           
                
            </tr>
        </thead>
       
        <tbody>
            @foreach($allstudents as $students)
            <tr>

                <td>{{$students->UserDetail->name}} <input type="hidden" name="studentid[]" value="{{$students->UserDetail->id}}"></td>
                <td>{{$students->UserDetail->father_name}}</td>
                <td>{{$students->schoolClass->name}} <input type="hidden" name="classid[]" value="{{$students->schoolClass->id}}"></td>
                <td>{{$students->session->name}} <input type="hidden" name="sessionid[]" value="{{$students->session->id}}"></td>
               
               <td>
            


                <select class="form-control" name="status[]">
                 <option value="Present">Present</option>
                 <option value="Absent">Absent</option>
                 <option value="Leave">Leave</option>
               </select>

             </td>


            
               
            </tr>
           @endforeach
        </tbody>
    </table>
    <br>
  <div class="row">
            <div class="col-md-8 col-sm-offset-11">
                <button class="btn-warning btn " id="btn1">Submit Attendence</button>
                
                
            </div>
        </div>
</form>
<script type="text/javascript">
    
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script>



function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
 </script>
</div>
@endsection