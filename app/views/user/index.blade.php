@extends('layouts.user')

@section('content')

<div class="row availabilities-row">
	@if(Session::get('message'))
		<br />
		<div class="col-sm-12">
			<div class="alert alert-warning" role="alert">{{ Session::get('message') }}</div>
		</div>
	@endif
	<div class="col-md-12 advisor-column">
		<div class="availabilities-header row">
			<div class="heading">
				<div class="you-offer col-xs-1">
					You offer...
				</div>
				<div class="service-offered">
					@foreach ($currentUser->services()->get() as $service)
						<h3>{{ $service->name }}</h3>
					@endforeach
				</div>
				<div class="col-xs-3 add-avail">
					{{ link_to_route('user.availabilities.create', 'Schedule Office Hours Now', null, ['class' => 'btn btn-info']) }}
				</div>
			</div>
		</div>
		<div class="row">
			@foreach ($currentUser->availabilities()->where('expired', 0)->get()->sortBy(function($avail) {
				return $avail->days()->first()['date'];
			}) as $availability)
			<div class="col-sm-3 availability-dashboard-listing">
				<div class="body">
					@if ($availability->hasRequests())
						@if ($availability->isBooked())
							<div class="availability-listing-header accepted">
								{{ form::open(['route' => 'user.availabilities.show-booked-request'])}}
								{{ form::hidden('availability_id', $availability->id) }}
								{{ form::submit('Booked', ['class' => 'btn btn-success']) }}
								{{ form::close() }}
							</div>
						@else
							<div class="availability-listing-header requested">
								{{ form::open(['route' => 'user.availabilities.show-request'])}}
								{{ form::hidden('availability_id', $availability->id) }}
								{{ form::submit('Requested', ['class' => 'btn btn-warning']) }}
								{{ form::close() }}
							</div>
						@endif
					@else
						<div class="availability-listing-header availabile">
							<p>Availabile</p>
						</div>
					@endif
					<div class="avail-user-content">
						{{ $availability->days()->first()->prettyPrint() }}<br />
						{{ $availability->days()->first()->pivot->time }}<br />
						<a href="{{ $availability->locations()->first()['website'] }}">{{ $availability->locations()->first()['name'] }}</a>
					</div>
					<div class="contains-full-width col-xs-12">
						{{ form::open(['route' => 'user.availabilities.destroy']) }}
						{{ form::hidden('avail_id', $availability->id)}}
						{{ form::submit('Delete', ['class' => 'full-width btn btn-danger']) }}
						{{ form::close() }}
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<div class="row expertise-row">
	<div class="col-xs-6 advisor-column">
		<div class="row">
			{{ link_to_route('user.expertise.connect', 'Manage Expertise', null, ['class' => 'btn btn-info']) }}
		</div>
		<table class="table">
			<tbody>
				<tr>
				@foreach ($currentUser->expertise()->get() as $exp)
					<td>
						<h3>{{ $exp->title }}</h3>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-xs-6 advisor-column">
		<div class="row">
			{{ link_to_route('advisors.edit', 'Manage Profile', $currentUser->id, ['class' => 'btn btn-info']) }}
		</div>
		<div class="row">
			<div class="col-xs-6">
				<img src="{{ $currentUser->profile_img }}" class="img-responsive">
				<h3>{{ $currentUser->first_name }} {{ $currentUser->last_name }}</h3>
			</div>
			<div class="col-xs-6">
				<h3>{{ $currentUser->email }}</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<p>{{ $currentUser->bio }}</p>
			</div>
		</div>
	</div>
</div>

@stop

@section('script')
<script>
$(document).ready(function() {
	$('.sweet-alert').hide();
});
</script>
@stop