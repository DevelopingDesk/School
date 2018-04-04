@extends('Dashboard/dashboard')

@section('content')
<div class="row">
	<form action="{{route('select.attendance.post')}}" method="post">
		{{csrf_field()}}
	
	<h3 style="text-align: center;">Make Choices</h3>
<div class="col-md-3">
	<input type="date" name="date" class="form-control" required="true">
</div>	
<div class="col-md-3">
	<select class="form-control" name="classid">
		@foreach($class as $cls)
		<option value="{{$cls->id}}">{{$cls->name}}</option>
		@endforeach
	</select>
</div>	
<div class="col-md-3">
	<select class="form-control" name="sessionid">
		@foreach($session as $cls)
		<option value="{{$cls->id}}">{{$cls->name}}</option>
		@endforeach
	</select>
</div>	
<div class="col-md-3">
	<button class="btn btn-success">View</button>
</div>	

</form>
</div>
<br>

<div class="col-md-12">
	@if($proxy !=null)
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Student Name</th>
                 <th>Father Name</th>
                 <th>Subject</th>
                 <th>Class</th>
                 <th>Session</th>
                 <th>Status</th>
           
                
            </tr>
        </thead>
       
        <tbody>

            @foreach($proxy as $students)
            <tr>

                <td>{{$students->UserDetail->name}} <input type="hidden" name="studentid[]" value="{{$students->UserDetail->id}}"></td>
                <td>{{$students->UserDetail->father_name}}</td>
                <td>{{$students->Subject->name}}</td>
                <td>{{$students->schoolClass->name}} <input type="hidden" name="classid[]" value="{{$students->schoolClass->id}}"></td>
                <td>{{$students->session->name}} <input type="hidden" name="sessionid[]" value="{{$students->session->id}}"></td>
               
               <td>
            


                <p>{{$students->status}}</p>

             </td>


            
               
            </tr>
           @endforeach
        </tbody>
    </table>
@endif
</div>
@endsection