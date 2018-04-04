@extends('Dashboard/dashboard')
@section('content')

<form method="post" action="{{route('view.classes.marks')}}">
	{{csrf_field()}}
	<div class="col-md-12">
		

		<div class="col-md-6">
			<select class="form-control" name="sessionid">
			@foreach($session as $session)
	}
				
<option value="{{$session->id}}">
	{{$session->name}}

</option>
@endforeach
			</select>
		</div>

		<div class="col-md-6">
			<button class="btn btn-success">Continue</button>
		</div>
	</div>


</form>



@endsection