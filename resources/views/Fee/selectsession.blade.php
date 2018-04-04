@extends('Dashboard.dashboard')

@section('content')

<div class="col-md-12"   >
    <form action="{{route('add.fee')}}">
        
   {{csrf_field()}}
   <input type="hidden" name="classid" value="{{$classid}}">
    <div class="col-md-4"  >
     <select class="form-control" name="sessionid">
     	@foreach($session as $se)
     	<option value="{{$se->id}}">{{$se->name}}</option>
     	@endforeach
     </select>
    </div>
    <div class="col-md-4" >
         <div class="row">
           
                <button class="btn-warning btn ">Search</button>
                
                
          
        </div>
    </div>
     </form>
</div>



@endsection