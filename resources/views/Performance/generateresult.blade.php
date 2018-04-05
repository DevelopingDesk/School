@extends('Dashboard.dashboard')


@section('content')
<style> 
input[type=text] {
   
    padding: 12px 20px;
    margin: 4px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid lightblue;
    
}
</style>
<div class="row">
	<form action="{{route('perf.student.gen.result')}}" method="post">
		
	{{csrf_field()}}
	<dir>
		<div class="col-md-12">
			
<div class="col-md-4">
	<select class="form-control" name="sessionid">
				@foreach($session as $se)
				<option value="{{$se->id}}">
					{{$se->name}}
				</option>
				@endforeach

			</select>
</div>

<div class="col-md-4">
	<select class="form-control" name="classid">
				@foreach($class as $se)
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


	</dir>
</form>
</div>
<br><br>
@if($result !=null)
<div class="row">
	<div class="col-md-12">
			<h3 style="text-align: center;">Result View</h3>
			<table  id="example" class="table table-striped table-bordered" cellspacing="1" width="100%">
<thead>
	<th>Student Name</th>
	<th>Father Name</th>
	<th>Class</th>
	<th>obtained Percentage</th>
</thead>
<tbody>
		@foreach($result as $res)
	

	<tr>
		<td><div class="col-md-3">
	
  <input type="text" id="fname" name="fname" readonly="true" value="{{$res['name']}}">
</div></td>
		<td><div class="col-md-3">
	 
  <input type="text" id="lname" name="lname" readonly="true" value="{{$res['class']}}">
</div><div class="col-md-3"></td>
		<td> 
  <input type="text" id="lname" name="lname" readonly="true" value="{{$res['father']}}" >
<div class="col-md-3"></td>
		<td>
    @if($res['per']>50)
  <p hidden="true">{{$res['per']}}</p> 
  <input type="text" id="lname" name="lname" readonly="true" value="{{$res['per']}}%" style="color:green">
  @elseif($res['per']>80)
  <p hidden="true">{{$res['per']}}</p> 
  <input type="text" id="lname" name="lname" readonly="true" value="{{$res['per']}}%" style="color:yellow">
   @elseif($res['per']<50)
  <p hidden="true">{{$res['per']}}</p> 
  <input type="text" id="lname" name="lname" readonly="true" value="{{$res['per']}}%" style="color:red">
  
  @endif
</td>
	</tr>



	
		@endforeach
		</tbody>

</table>
	</div>
</div>

@endif
<script type="text/javascript">
  
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

@endsection