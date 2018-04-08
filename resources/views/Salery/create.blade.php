@extends('Dashboard/dashboard')
@section('content')
<style type="text/css">
	
	input[type=text] {
   
    padding: 5px 13px;
    margin: 4px 0;
   
    border: none;
    border-bottom: 2px solid lightgreen;
    
}
</style>
<div class="row">
	<form method="post" action="{{route('post.salery')}}">
		{{csrf_field()}}
	<div class="col-md-12">
		<div class="col-md-3">
			<select class="form-control" name="teacherid">
			@foreach($teacher as $cls)
				<option value="{{$cls->id}}">
					{{$cls->name}}
				</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-3">
			<input type="date" name="datepicker" class="form-control" required="true">
		</div>
		<div class="col-md-3">
			<input type="text" name="salery" placeholder="salery" required="true">
		</div>
		<div class="col-md-3">
			<button class="btn btn-primary">Save</button>
		</div>
		
	</div>
	</form>

	
</div>

<div class="row" style="margin-top: 23px">
	<div class="col-md-12">
		
@if($salerylist !=null)
<h3 style="text-align: center;color: blue">Employee Salery</h3>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	
               
                <th>Employee Name</th>
                <th>Salery</th>
             
              
                <th>Date</th>
                
          
              




               
                
            </tr>
        </thead>
       
        <tbody>
        	@foreach($salerylist as $students)
            <tr>

               
                <td>{{$students->userDetail->name}}</td>
               
            
             
                <td>{{$students->salery}}</td>
               
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


@endif

	</div>
</div>
@endsection