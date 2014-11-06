@extends('layouts.user')

@section('content')

<div class="row availabilities-row">
	<div class="col-md-12 advisor-column">
		<div class="availabilities-header row">
			<div class="heading">
				<div class="you-offer col-xs-1">
					You offer...
				</div>
				<div class="col-xs-8">
					@foreach ($currentUser->services()->get() as $service)
						<h3 style="display:inline-block">{{ $service->name }}</h3>
					@endforeach
				</div>
				<div class="col-xs-3 add-avail">
					{{ link_to_route('user.availabilities.create', 'Add an Availability', null, ['class' => 'btn btn-info']) }}
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 availability-dashboard-listing">
				<div class="body">
					<div class="availability-listing-header availabile">
						<p>{{$meeting->requestees()->first()->name}}</p>
					</div>
					<p>{{$meeting->requestees()->first()->email}}</p>
					<p>{{$meeting->requestees()->first()->phone}}</p>
					<p>{{$meeting->requestees()->first()->notes}}</p>
					<div class="col-xs-12 contains-full-width">
						{{ form::open(['route' => 'meetings.request.reject', 'class' => 'form-inline']) }}
						{{ form::hidden('meeting_id', $meeting->id) }}
						{{ form::submit('Cancel', ['class' => 'full-width btn btn-danger']) }}
						{{ form::close() }}
					</div>
				</div>
			</div>
		</div>
	</div>

@stop