@extends('layouts.default')

@section('content')
{{ link_to_route('expertise.create', 'Add an Expertise', null, ['class' => 'btn btn-info']) }}
<table class="table">
	<tbody>
		@foreach ($expertise as $exp)
		<tr>
			<td>
				<li>{{ $exp->title }}</li>
				<li>{{ $exp->notes }}</li>
			</td>
			<td>@if ($exp->advisors()->first())
					{{ $exp->advisors()->first()->first_name }} {{ $exp->advisors()->first()->last_name }}</td>
				@else
					not claimed
				@endif
			<td>
				{{ link_to_route('expertise.edit',    'Edit',   $exp->id, ['class' => 'btn btn-warning']) }}
				{{ link_to_route('expertise.destroy', 'Delete', $exp->id, ['class' => 'btn btn-danger']) }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop