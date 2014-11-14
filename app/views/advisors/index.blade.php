@extends('layouts.default')

@section('content')
{{ link_to_route('advisors.create', 'Add an Advisor', null, ['class' => 'btn btn-info']) }}
<table class="table">
	<tbody>
		@foreach ($advisors as $advisor)
		<tr>
			<td>{{ link_to_route('advisors.show', $advisor->first_name.' '.$advisor->last_name, $advisor->id) }}</td>
			<td>{{ $advisor->email }}</td>
			<td>
				{{ link_to_route('advisors.edit', 'Edit', $advisor->id, ['class' => 'btn btn-warning']) }}
				{{ link_to_route('advisors.destroy', 'Delete', $advisor->id, ['class' => 'btn btn-danger']) }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop

