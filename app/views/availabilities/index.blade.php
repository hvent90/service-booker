@extends('layouts.default')

@section('content')

<table id="availabilities" class="table">
	<tbody>
		@foreach ($availabilities as $availability)
		<tr>
			<td>
				<h3>{{ $availability->title }}</h3>
				<li>{{ $availability->services()->first()->name }}</li>
				<li>{{ $availability->locations()->first()->name }}</li>
				<li>{{ $availability->days()->first()['date'] }}</li>
				<li>{{ $availability->days()->first()->pivot->time }}</li>
				<li>{{ $availability->notes }}</li>
				<button class="btn btn-default" id="{$availability->id}" type="button">Request Meeting</button>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop

@section('script')

<script>
$(document).ready(function() {
	console.log({{$availabilities->first()}});
	@if(!$availabilities->isEmpty())
		var form = '<div id="avail-form" class="full-height availability-form"><div class="request-form"><form role="form" action="/meetings" method="post"><div class="form-group"><label for="email">Email address</label><input type="email" class="form-control" name="email" id="email" placeholder="Enter email"></div><div class="form-group"><label for="">Name</label><input type="text" class="form-control" name="name" id="name" placeholder="Enter name"></div><div class="form-group"><label for="">Notes</label><textarea rows="10" class="form-control" name="notes" id="notes" placeholder="Write a message"></textarea></div><input  type="hidden" name="availability_id" value="{{$availability->id}}"><input  type="hidden" name="advisor_id"      value="{{$availability->advisors()->first()->id}}"><input  type="hidden" name="day_id"      value="{{$availability->days()->first()->id}}"><input  type="hidden" name="location_id"     value="{{$availability->locations()->first()->id}}"><input  type="hidden" name="service_id"      value="{{$availability->services()->first()->id}}"><button type="submit" class="btn btn-default">Submit</button></form></div></div>';
	@endif

	$('button').click(function() {
		if ($('#avail-form').html())
		{
			console.log('first');
			$(this).toggleClass('selected');
			$(this).text('Request Meeting');
			$('#avail-form').animate({
				left: '100%'
				}, 500, function() {
					$(this).remove();
				}
			);
		} else {
			$(this).toggleClass('selected');
			$(this).text('Cancel');
			$('#availabilities').before(form);

			$('#avail-form').animate({
	            left: '50%'
	        	}, 500
	        );
		}

		return false;
	});
});
</script>
@stop