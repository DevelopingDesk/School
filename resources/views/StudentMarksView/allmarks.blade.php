@extends('Dashboard/dashboard')
@section('content')
<h4 style="text-align: center;">Exam Record</h4>
<table  id="example" class="table table-striped table-bordered" cellspacing="1" width="100%">
	<thead>
		
		<tr>
			<th>Subject</th>
			<th> Marks</th>
			<th>Total</th>
			<th>Term</th>

		</tr>
	</thead>
	<tbody>
		<tr>
			@foreach($marks as $cls)
			<td>
				{{$cls->subject->name}}
			</td>

			<td>
				{{$cls->marks}}
			</td>

			<td>
				{{$cls->total}}
			</td>
			<td>
				{{$cls->exam->name}}
			</td>
		

		</tr>
		
		@endforeach
	</tbody>

</table>


@endsection