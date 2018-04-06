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
    
}
</style>
<h1 style="text-align: center;color: green">Enter Parent Record</h1>
  <div class="panel-body">
			<form role="form" method="POST" class="form-horizontal" action="{{route('store.parent')}}">
				{{csrf_field()}}
							<div class="form-group">
							<label class="col-md-2 control-label">Father Name</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									
									<input id="name" name="parentname" class="form-control1" type="text" placeholder="parent name">
								</div>
							</div>
							
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Father Cnic</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									
									<input id="fathercnice" class="form-control1" name="fathercnice" type="text" placeholder="father cnic">
								</div>
							</div>
							
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Select Religon</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									
									<select name="religon" class="form-control">
										
										<option>Muslim</option>
										<option>Non Muslim</option>
									</select>
								</div>
							</div>
							
						</div>

						
						<div class="form-group">
							
							<div class="col-md-8">
								<div class="input-group input-icon right">
									
								<input type="hidden" name="acounttype" value="4">
								</div>
							</div>
							
						</div>
						
						<div class="form-group">
							<label class="col-md-2 control-label">Email Address</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									
									<input id="email" name="email" class="form-control1" type="text" placeholder="Email Address">
								</div>
							</div>
							
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Password</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									
									<input type="password" name="password" class="form-control1" placeholder="Password">
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