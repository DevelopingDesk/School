@extends('Dashboard/dashboard')
@section('content')
<h4 style="text-align: center;">All Classes Record</h4>
<table  id="example" class="table table-striped table-bordered" cellspacing="1" width="100%">
	<thead>
		
		<tr>
			<th>Classes</th>
		</tr>
	</thead>
	<tbody>
		<tr>

			@foreach($classes as $cls)
			<td>
			<a href="{{route('view.terms.marks',[$cls->schoolClass->id, $sessionid])}}">	{{$cls->schoolClass->name}}</a>
			</td>
			@endforeach

		</tr>
	</tbody>

</table>


@endsection