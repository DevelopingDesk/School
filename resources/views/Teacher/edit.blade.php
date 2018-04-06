@extends('Dashboard/dashboard')
@section('content')
<style type="text/css">
	
	input[type=text] {
   
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid lightgreen;
    
}
input[type=password] {
   
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid red;
    
}</style>
<h1 style="text-align: center;color: green">Update Teacher Record</h1>
  <div class="panel-body">
			<form role="form" method="POST" class="form-horizontal" action="{{route('edit.teacher')}}">
				{{csrf_field()}}
							<div class="form-group">
							<label class="col-md-2 control-label">Teacher Name</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<input id="name" value="{{$student->name}}" name="studentname" class="form-control1" type="text" placeholder="student name">
									<input type="hidden" id="id" value="{{$id}}" name="id" class="form-control1" type="text" placeholder="student name">
								</div>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Father Name</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<input id="fathername" value="{{$student->father_name}}"  class="form-control1" name="fathername" type="text" placeholder="student name">
								</div>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Father Cnic</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<input value="{{$student->father_cnic}}"  id="fathercnice" class="form-control1" name="fathercnice" type="text" placeholder="student cnic">
								</div>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Teacher Cnic</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<input value="{{$student->student_cnic}}"  id="studentcnic" class="form-control1" name="studentcnice" type="text" placeholder="student cnic">
								</div>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Select Religon</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<select name="religon" class="form-control">
										
										<option>Muslim</option>
										<option>Non Muslim</option>
									</select>
								</div>
							</div>
							
						</div>

						
						

						
						<div class="form-group">
							<label class="col-md-2 control-label">Email Address</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-envelope-o"></i>
									</span>
									<input id="email" value="{{$student->email}}"  name="email" class="form-control1" type="text" placeholder="Email Address">
								</div>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Password</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-key"></i>
									</span>
									<input type="password" name="password" value="{{$student->password}}"  class="form-control1" placeholder="Password">
								</div>
							</div>
							
						</div>
						 <div class="panel-footer">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button class="btn-warning btn">Submit</button>
				<button class="btn-success btn">Cancel</button>
				
			</div>
		</div>
	 </div>
					</form>		
	</div>
	
	@endsection