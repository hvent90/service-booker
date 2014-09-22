@extends('layouts.default')

@section('content')
{{ link_to_route('locations.create', 'Add a Location', null, ['class' => 'btn btn-info']) }}
<table class="table">
	<tbody>
		@foreach ($locations as $location)
		<tr>
			<td>{{ $location->name }}</td>
			<td>{{ $location->address }}</td>
			<td>{{ $location->website }}</td>
			<td>{{ $location->advisor_id }}</td>
			<td>
				{{ link_to_route('locations.edit',    'Edit',   $location->id, ['class' => 'btn btn-warning']) }}
				{{ link_to_route('locations.destroy', 'Delete', $location->id, ['class' => 'btn btn-danger']) }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop

