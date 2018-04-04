@extends('Dashboard/dashboard')
@section('content')
<h1 style="text-align: center;color: green">Enter Student Record</h1>
  <div class="panel-body">
			<form role="form" method="POST" class="form-horizontal" action="{{route('store.student')}}">
				{{csrf_field()}}
							<div class="form-group">
							<label class="col-md-2 control-label">Student Name</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<input id="name" name="studentname" class="form-control1" type="text" placeholder="student name">
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
									<input id="fathername" class="form-control1" name="fathername" type="text" placeholder="student name">
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
									<input id="fathercnice" class="form-control1" name="fathercnice" type="text" placeholder="student cnic">
								</div>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Student Cnic</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<input id="studentcnic" class="form-control1" name="studentcnice" type="text" placeholder="student cnic">
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
							<label class="col-md-2 control-label">Select Class</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<select name="classid" class="form-control">
										@foreach($schoolclass as $class)
										<option value="{{$class->id}}">{{$class->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Select Section</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<select name="sectionid" class="form-control">
										@foreach($section as $sec)
										<option value="{{$sec->id}}">{{$sec->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Select Session</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<select name="sessionid" class="form-control">
										@foreach($session as $sec)
										<option value="{{$sec->id}}">{{$sec->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Account Type</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<span class="input-group-addon">
										<i class="fa fa-user"></i>
									</span>
									<select name="acounttype" class="form-control">
										@foreach($role as $re)
										<option value="{{$re->id}}">{{$re->name}}</option>
										
										@endforeach
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
									<input id="email" name="email" class="form-control1" type="text" placeholder="Email Address">
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
									<input type="password" class="form-control1" placeholder="Password" name="password">
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