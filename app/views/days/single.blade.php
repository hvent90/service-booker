@extends('layouts.default')

@section('content')

<table class="table table-hover table-bordered table-striped">
	<tbody>
		<tr>
			<td>Time</td>
			<td>Availability</td>
			<td>Advisor</td>
		</tr>
		@for ( $i = 0; $i < 24; $i++ )
			<tr>
				<td>
					{{ $i }}
				</td>
			</tr>
		@endfor
	</tbody>
</table>

@stop