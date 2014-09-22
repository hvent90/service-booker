@extends('layouts.default')

@section('content')

<table class="table">
	<tbody>
		@foreach ($advisors as $advisor)
		<tr>
			<td>{{ $advisor->first_name }} {{ $advisor->last_name }}</td>
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

