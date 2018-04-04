@extends('Dashboard/dashboard')

@section('content')
<div class="col-md-12"   >
    <form action="{{route('bank.fee')}}">
        
   
    <div class="col-md-2"  >
        <input type="number" name="days" class="form-control" placeholder="dateback">
    </div>
    <div class="col-md-2">
       <select class="form-control"  name="classid" >
           @foreach($allclasses as $cls)
           <option class="form-control" value="{{$cls->id}}">{{$cls->name}}</option>
           @endforeach
       </select>
        
    </div>
    <div class="col-md-2">
       <select class="form-control" name="sectionid">
           @foreach($section as $cls)
           <option class="form-control" value="{{$cls->id}}">{{$cls->name}}</option>
           @endforeach
       </select>
        
    </div>
     <div class="col-md-2">
       <select class="form-control" name="sessionid">
           @foreach($session as $cls)
           <option class="form-control" value="{{$cls->id}}">{{$cls->name}}</option>
           @endforeach
       </select>
        
    </div>
    <div class="col-md-3" >
         <div class="row">
           
                <button class="btn-warning btn ">Search</button>
                
                
          
        </div>
    </div>
     </form>
</div>


<div style="background-color: white">
<h2 style="text-align: center;"> All Students</h2>

<form action="{{route('store.fee')}}" method="post">
    {{csrf_field()}}
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                 <th>Student Image</th>
                <th> Student Name</th>
                <th>Father Name</th>
               
                <th>Student Class</th>
                <th>Student Section</th>
              <th>Attendence Data</th>
                 <th>Fee</th>
                



               
                
            </tr>
        </thead>
       
        <tbody>
            @foreach($student as $students)
            <tr>

                <td>{{$students->id}}</td>
                <input type="hidden" name="studentid[]" value="{{$students->student_id}}">
                <td>{{$students->userDetail->image}}</td>

                <td>{{$students->userDetail->name}}</td>
                <td>{{$students->userDetail->father_name}}</td>
               
                <td>{{$students->schoolClass->name}}</td>
                <input type="hidden" name="classid[]" value="{{$students->schoolClass->id}}">
                <input type="hidden" name="sessionid[]" value="{{$students->session_id}}">
                <td>{{$students->section->name}}<input type="hidden" name="sectionid[]" value="{{$students->section->id}}"></td>
                <td><input class="form-control" type="date" name="datepicker[]"></td>
                
<th><input type="text" class="form-control" name="fee[]"></th>



               
               
            </tr>
           @endforeach
        </tbody>
    </table>
    <br>
  <div class="row">
            <div class="col-sm-8 col-sm-offset-11">
                <button class="btn-warning btn ">Submit</button>
                
                
            </div>
        </div>
</form>
<script type="text/javascript">
    
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

 
</div>
@endsection
