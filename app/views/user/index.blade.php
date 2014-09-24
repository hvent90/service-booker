@extends('layouts.default')

@section('content')

<div class="row">
	<div class="col-md-4">
		<div class="row">
			{{ link_to_route('user.expertise.connect', 'Add an Expertise', null, ['class' => 'btn btn-info']) }}
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

	<div class="col-md-4">
		<div class="row">
			{{ link_to_route('user.services.connect', 'Add an Service', null, ['class' => 'btn btn-info']) }}
		</div>
		<table class="table">
			<tbody>
				@foreach ($currentUser->services()->get() as $service)
				<tr>
					<td>
						<h3>{{ $service->name }}</h3>
						<li>{{ $service->notes }}</li>
						<li>{{ $service->duration }} minutes</li>
						<li>{{ $service->locationsWithAdvisor()->first()['name'] }}</li>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="col-md-4">
		<div class="row">
			{{ link_to_route('user.availabilities.create', 'Add an Availability', null, ['class' => 'btn btn-info']) }}
		</div>
		<table class="table">
			<tbody>
				@foreach ($currentUser->availabilities()->get() as $availability)
				<tr>
					<td>
						<h3>{{ $availability->title }}</h3>
						<li>{{ $availability->notes }}</li>
						<li>{{ $availability->services()->first()->name }}</li>
						<li>{{ $availability->locations()->first()->name }}</li>
						{{-- dd($availability->days()) --}}
						<li>{{ $availability->days()->first()['date'] }}</li>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

@stop

