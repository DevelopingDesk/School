@extends('Dashboard/dashboard')

@section('content')
<div class="col-md-12"   >
    <form action="{{route('post.assign.course')}}" method="post">
        {{csrf_field()}}
   <input type="hidden" value="{{$sessionid}}" name="sessionid">
   <input type="hidden" value="{{$classid}}" name="classid">
   <input type="hidden" value="{{$studentid}}" name="studentid">
    <div class="col-md-3"  >
      <select class="form-control" name="subjectid">
        @foreach($subject as $sub)
        <option value="{{$sub->id}}">
          {{$sub->name}}
        </option>
@endforeach
      </select>
    </div>
     <div class="col-md-3"  >
      <select class="form-control" name="teacherid">
        @foreach($teacher as $teacher)
        <option value="{{$teacher->id}}">
          {{$teacher->name}}
        </option>
@endforeach
      </select>
    </div>
   

    <div class="col-md-4" >
         <div class="row">
           
                <button class="btn-warning btn ">Assign</button>
                
                  </div>
    </div>
       
     </form>
</div>
<hr><br>

<div style="background-color: white">
<h2 style="text-align: center;"> Course List</h2>


<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th> Course Name</th>
                <th>Actions</th>     
            </tr>
        </thead>
       
        <tbody>
            @foreach($allcourse as $students)
            <tr>

                <td>{{$students->id}}</td>
                <td>{{$students->Subject->name}}</td>
              
               

               <td>
                <a href="{{route('delete.assign.course',$students->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                <br><br>
                
                
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

 
</div>
@endsection
