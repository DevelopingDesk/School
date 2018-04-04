@extends('Dashboard/dashboard')

@section('content')

<div class="col_3">
        	@foreach($allsubjects as $sub)
         <a href="{{ route('all.students', [$sub->subject_id, $sessionid,$classid]) }}">
            <div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left   fa fa-credit-card icon-rounded"></i>
                    <div class="stats">
                    	
                     
                      <span>{{$sub->Subject->name}}</span>
                    </div>
                </div>
                <br>
        	</div>
</a>
            @endforeach
        
        	<div class="clearfix"> </div>
      </div>
@endsection