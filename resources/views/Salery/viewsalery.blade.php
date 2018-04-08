@extends('Dashboard/dashboard')
@section('content')

<div id="myModal" style="margin-top:30px"  class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" id="myform" action="{{route('edit.schoolclass')}}">
        
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center">Edit Subject</h4>
      </div>
      <div class="modal-body" width="30px" >
       <textarea id="body" name="body" class="form-control" placeholder="your report must be solid"></textarea>
          <textarea id="idclass" name="idclass" style="display: none" class="form-control" placeholder="your report must be solid"></textarea>
     
       <input type="hidden" name="_token" value="{{Session::token()}}">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
     <button id="save" type="button" class="btn btn-primary" >Save</button> 
      </div>
      </form>

    </div>

  </div>
</div>
<div class="row" style="margin-top: 23px">
	@if($salerylist !=null)
  <div class="col-md-12">
		

<h3 style="text-align: center;color: blue">Employee Salery</h3>
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	
               <th>Id</th>
                <th>Employee Name</th>
                <th>Salery</th>
             
              
                <th>Date</th>
                
          
              
<th>Actions</th>



               
                
            </tr>
        </thead>
       
        <tbody>
        	@foreach($salerylist as $students)
            <tr>

               <td>{{$students->id}}</td>
                <td>{{$students->userDetail->name}}</td>
               
            
             
                <td>{{$students->salery}}</td>
               
                <td>{{$students->date}}</td>

             



                 <td>  <a  href="#" id="edit"  class="edit btn btn-xs btn-primary edit" data-toggle="modal"><i class="glyphicon glyphicon-edit" data-target="#myModal"></i> Edit </a>
                <a href="{{route('delete.salery',$students->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                
           </td>
               
            </tr>
           @endforeach
        </tbody>
    </table>
<script type="text/javascript">
	
	$(document).ready(function() {
    $('#example').DataTable();
} );


</script>
<script type="text/javascript" src="{{asset('js/Salery/update.js')}}"></script>
<script type="text/javascript">
var token='{{Session::token()}}';
var add='{{route('update.salery')}}';

</script>



	</div>
  @endif
@endsection