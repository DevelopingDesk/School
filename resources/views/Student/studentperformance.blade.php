@extends('Dashboard/dashboard')
@section('content')
<div class="row">
	<form action="{{route('perf.student.get.result')}}" method="post">
		{{csrf_field()}}
	
	<div class="col-md-12">
		<div class="col-md-6">
			<select class="form-control" name="sessionid">
				@foreach($session as $se)
				<option value="{{$se->id}}">
					{{$se->name}}
				</option>
				@endforeach

			</select>
		</div>
		<div class="col-md-3">
			<button class="btn btn-success">View Result</button>
		</div>

	</div>
	</form>
</div>
@if($bio!=null)
<div class="row">
	<div class="col-md-12">
<br><hr>
<div class="col-md-12">

	<hr>
	<h3 style="text-align: center;">Result View</h3>
<style> 
input[type=text] {
   
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid lightblue;
    
}
</style>

<div class="col-md-3">
	 <label for="fname">Student Name</label>
  <input type="text" id="fname" name="fname" readonly="true" value="{{$bio->UserDetail->name}}">
</div>
<div class="col-md-3">
	  <label for="lname">Class Name</label>
  <input type="text" id="lname" name="lname" readonly="true" value="{{$bio->schoolClass->name}}">
</div><div class="col-md-3">
	
    <label for="lname">Session</label>
  <input type="text" id="lname" name="lname" readonly="true" value="{{$bio->session->name}}" >
</div><div class="col-md-3">
	
    <label for="lname">Percentage</label>
   
  <input type="text" id="lname" name="lname" readonly="true" value="{{$per}}%" >


</div>
 


</div>


	</div>

<div class="col-md-12">
  
        <div class="graphs">
	    <div class="graph_box">
			<div class="col-md-4 grid_2"><div class="grid_1">
				<h3>Graphical View</h3>
				<canvas id="doughnut" height="300" width="400" style="width: 400px; height: 300px;"></canvas>
			</div></div>
			
			
			<div class="clearfix"> </div>
	    </div>
	   
    <script>

		var doughnutData = [
				
				
				{
					value : {{$per}},
					color : "#3b5998"
				},
				
				{
					value : 100-{{$per}},
					color : "#4D5360"
				}
			
			];
	
	
	new Chart(document.getElementById("doughnut").getContext("2d")).Doughnut(doughnutData);
	
	
	</script>
		
   </div>
    
      <!-- /#page-wrapper -->
   </div>
</div>
@endif

	
</div>
@endsection