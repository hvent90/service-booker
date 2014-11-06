@extends('layouts.default')

@section('content')

<div class="row">
	<div class="col-md-8 advisor-column">
		<div class="row">
			{{ link_to_route('user.services.connect', 'Manage Services', null, ['class' => 'btn btn-info']) }}
		</div>
		<table class="table">
			<tbody>
				@foreach ($currentUser->services()->get() as $service)
				<tr>
					<td>
						<h3>{{ $service->name }}</h3>
						<li>{{ $service->notes }}</li>
						<li>{{ $service->locationsWithAdvisor()->first()['name'] }}</li>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-md-4 advisor-column">
		<div class="row">
			{{ link_to_route('user.availabilities.create', 'Add an Availability', null, ['class' => 'btn btn-info']) }}
		</div>
		<h3>Choose a Day and Time to be requested for your services.</h3>
		<table class="table">
			<tbody>
				@foreach ($currentUser->availabilities()->get() as $availability)
				<tr>
					<td>
						<h3>{{ $availability->title }}</h3>
						{{ form::open(['route' => 'user.availabilities.destroy']) }}
						{{ form::hidden('avail_id', $availability->id)}}
						{{ form::submit('Delete', ['class' => 'btn btn-danger']) }}
						{{ form::close() }}
						<li>{{ $availability->notes }}</li>
						<li>{{ $availability->services()->first()->name }}</li>
						<li>{{ $availability->locations()->first()->name }}</li>
						<li>{{ $availability->days()->first()['date'] }}</li>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-4 advisor-column">
		<div class="row">
			{{ link_to_route('user.expertise.connect', 'Manage Expertise', null, ['class' => 'btn btn-info']) }}
		</div>
		<table class="table">
			<tbody>
				<tr>
				@foreach ($currentUser->expertise()->get() as $exp)
					<td>
						<h3>{{ $exp->title }}</h3>
						<li>{{ $exp->notes }}</li>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-xs-4">
		@foreach($pendingMeetingRequests as $meeting)
		<div>
			<li>{{ $meeting->title }}</li>
			<li>{{ $meeting->services()->first()->name }}</li>
			<li>{{ $meeting->locations()->first()->name }}</li>
			<li>{{ $meeting->days()->first()['date'] }} at {{ $meeting->availabilities()->first()->days()->first()->pivot->time }}</li>
			<li>{{ $meeting->requestees()->first()->name }}</li>
			<li>{{ $meeting->requestees()->first()->email }}</li>
			<li>{{ $meeting->requestees()->first()->notes }}</li>
			<li>{{ $meeting->status }}</li>
			<div class="col-xs-3">
				{{ form::open(['route' => 'meetings.request.accept', 'class' => 'form-inline']) }}
				{{ form::hidden('meeting_id', $meeting->id) }}
				{{ form::submit('Accept', ['class' => 'btn btn-success']) }}
				{{ form::close() }}
			</div>
			<div class="col-xs-3">
				{{ form::open(['route' => 'meetings.request.reject', 'class' => 'form-inline']) }}
				{{ form::hidden('meeting_id', $meeting->id) }}
				{{ form::submit('Reject', ['class' => 'btn btn-danger']) }}
				{{ form::close() }}
			</div>
		</div>
		@endforeach
	</div>
	<div class="col-xs-4">
		@foreach($acceptedMeetings as $meeting)
		<div>
			<li>{{ $meeting->title }}</li>
			<li>{{ $meeting->services()->first()->name }}</li>
			<li>{{ $meeting->locations()->first()->name }}</li>
			<li>{{ $meeting->days()->first()['date'] }} at {{ $meeting->availabilities()->first()->days()->first()->pivot->time }}</li>
			<li>{{ $meeting->requestees()->first()->name }}</li>
			<li>{{ $meeting->requestees()->first()->email }}</li>
			<li>{{ $meeting->requestees()->first()->notes }}</li>
			<li>{{ $meeting->status }}</li>
			<div class="col-xs-3">
				{{ form::open(['route' => 'meetings.request.reject', 'class' => 'form-inline']) }}
				{{ form::hidden('meeting_id', $meeting->id) }}
				{{ form::submit('Cancel', ['class' => 'btn btn-danger']) }}
				{{ form::close() }}
			</div>
		</div>
		@endforeach
	</div>
</div>

@stop

