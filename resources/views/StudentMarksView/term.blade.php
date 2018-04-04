@extends('Dashboard/dashboard')
@section('content')
<h4 style="text-align: center;">All Exams</h4>
<table  id="example" class="table table-striped table-bordered" cellspacing="1" width="100%">
	<thead>
		
		<tr>
			<th>Classes</th>
		</tr>
	</thead>
	<tbody>
		
			@foreach($terms as $cls)
			<tr>
			<td>
			<a href="{{ route('view.subject.marks', [$cls->exam->id, $classid,$sessionid]) }}">	{{$cls->exam->name}}</a>
			</td>
		</tr>	
			@endforeach

		
	</tbody>

</table>


@endsection