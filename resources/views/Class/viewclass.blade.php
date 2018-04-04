@extends('Dashboard/dashboard')

@section('content')
<h2 style="text-align: center;"> All Classes</h2>

<div style="background-color: white">
	




<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
            	<th>Id</th>
                <th>Name</th>
                <th>Actions</th>


               
                
            </tr>
        </thead>
       
        <tbody>
        	@foreach($school as $cls)
            <tr>

                <td>{{$cls->id}}</td>
                <td class="data">{{$cls->name}}</td>
                <td>
               <a  href="#" id="edit"  class="edit btn btn-xs btn-primary edit" data-toggle="modal"><i class="glyphicon glyphicon-edit" data-target="#myModal"></i> Edit </a>
                	
                <a href="{{route('delete.schoolclass',$cls->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                <a href="{{route('class.create')}}" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i> Add Class</a>
           </td>
               
            </tr>
           @endforeach
        </tbody>
    </table>
<script type="text/javascript">
	var table=null;
	$(document).ready(function() {
    table=$('#example').DataTable();



} );





</script>

<script type="text/javascript" src="{{asset('js/updateclass.js')}}"></script>
<script type="text/javascript">
var token='{{Session::token()}}';
var add='{{route('edit.schoolclass')}}';

</script> 
 
</div>

  
</div>
<div id="myModal" style="margin-top:30px"  class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" id="myform" action="{{route('edit.schoolclass')}}">
        
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align: center">Edit Class</h4>
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

@endsection


