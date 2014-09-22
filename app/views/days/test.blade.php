@extends('layouts.default')

@section('content')

<div class="row">
	<div class="col-sm-2">
	    {{ link_to_route('calendar.month', '<<', [$yearPrevious, $previousMonth]) }}
		{{ $oneMonthViewOfDaysWithTelomeres['month']['full'].' '.$oneMonthViewOfDaysWithTelomeres['year'] }}
		{{ link_to_route('calendar.month', '>>', [$yearNext, $nextMonth]) }}
	</div>
</div>

<table class="table table-striped table-bordered .table-hover">
	<tbody>
		<tr>
			<td>Sunday</td>
			<td>Monday</td>
			<td>Tuesday</td>
			<td>Wednesday</td>
			<td>Thursday</td>
			<td>Friday</td>
			<td>Saturday</td>
		</tr>
		@foreach ($oneMonthViewOfDaysWithTelomeres['collection']->chunk(7) as $daySet)
			<tr>
				@foreach ($daySet as $day)
					<td>
						{{ $day->ofMonth() }}, {{ $day->humanDayOfWeek()['abv'] }}, {{ $day->humanMonthOfYear()['abv'] }}
						@if ( $day->availabilities()->get() )
							@foreach ( $day->availabilities()->get() as $availability )
								<li>{{ $availability->title }}</li>
							@endforeach
						@endif
					</td>
				@endforeach
			</tr>
		@endforeach
	</tbody>
</table>

@stop


