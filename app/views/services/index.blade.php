@extends('layouts.default')

@section('content')
{{ link_to_route('services.create', 'Add a Service', null, ['class' => 'btn btn-info']) }}
<table class="table">
	<tbody>
		@foreach ($services as $service)
		<tr>
			<td>
				<li>{{ $service->name }}</li>
				<li>{{ $service->notes }}</li>
				<li>{{ $service->duration }} Minutes</li>
			</td>
			<td>
				@if ($service->advisors->first())
				{{ link_to_route('advisors.show', $service->advisors()->first()->first_name.' '.$service->advisors()->first()->last_name, $service->advisors()->first()->id) }} created this service.
				@else
					not claimed
				@endif
			</td>
			<td>
				{{ link_to_route('services.edit',    'Edit',   $service->id, ['class' => 'btn btn-warning']) }}
				{{ link_to_route('services.destroy', 'Delete', $service->id, ['class' => 'btn btn-danger']) }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop