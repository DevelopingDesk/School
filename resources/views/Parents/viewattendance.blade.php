@extends('Dashboard/dashboard')

@section('content')


<div class="row">
	
	<form action="{{route('child.attendence')}}" method="post">
		{{csrf_field()}}
		<div class="col-md-12">
			<div class="col-md-3">
				<select class="form-control" name="childid">
					@foreach($childs as $chi)
					<option  value="{{$chi->id}}">
					{{$chi->name}}
				</option>
				@endforeach
				</select>
				
			</div>
			<div class="col-md-3">
				<select class="form-control" name="classid">
					@foreach($classes as $chi)
					<option  value="{{$chi->id}}">
					{{$chi->name}}
				</option>
				@endforeach
				</select>
			</div>
			
			<div class="col-md-3">
				<input type="date" name="datepicker" class="form-control">
			</div>
			<div class="col-md-3">
				<button class="btn btn-danger">Filter</button>
			</div>
		</div>
	</form>
</div>
@if($attendance !=null)
<div class="row">
	<div class="col-md-12
	">
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	
               
                <th>Child Name</th>
                <th>Child Class</th>
             
              
                <th>Child Subject</th>
                
                <th>Status</th>
                <th>Date</th>
              


     </tr>
        </thead>
       
        <tbody>
        	@foreach($attendance as $students)
            <tr>

                <td>{{$students->UserDetail->name}}</td>
                <td>{{$students->schoolClass->name}}</td>
               
            
                <td>{{$students->subject->name}}</td>
                <td>{{$students->status}}</td>
               
               
<td>{{$students->date}}</td>
             



               
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
</div>
@endif
@endsection