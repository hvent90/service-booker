@extends('layouts.default')

@section('content')
{{ link_to_route('expertise.create', 'Add an Expertise', null, ['class' => 'btn btn-info']) }}
@if($requested->first())
<table class="table">
	<tbody>
		@foreach ($requested as $exp)
		<tr>
			<td>
				<li>{{ $exp->title }}</li>
			</td>
			<td>
				<li>Requested by {{ \MyApp\Advisor::find($exp->requested_adv_id)->first_name }} {{ \MyApp\Advisor::find($exp->requested_adv_id)->last_name }}</li>
			</td>
			<td>
			</td>
			<td>
				{{ link_to_route('expertise.approve',    'Finalize and Approve',   $exp->id, ['class' => 'btn btn-success']) }}
				{{ form::open(['route' => 'expertise.destroy']) }}
				{{ form::hidden('id', $exp->id)}}
				{{ form::submit('Delete', ['class' => 'full-width btn btn-danger']) }}
				{{ form::close() }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif
<table class="table">
	<tbody>
		@foreach ($expertise as $exp)
		<tr>
			<td>
				<li>{{ $exp->title }}</li>
				<li>{{ $exp->notes }}</li>
			</td>
			<td>@if ($exp->advisors()->first())
					{{ $exp->advisors()->first()->first_name }} {{ $exp->advisors()->first()->last_name }}
				@else
					not claimed
				@endif
			</td>
			<td>
				{{ link_to_route('expertise.group-connect-and-disconnect', 'Groups',   $exp->id, ['class' => 'btn btn-info']) }}
			</td>
			<td>
				{{ link_to_route('expertise.edit',    'Edit',   $exp->id, ['class' => 'btn btn-warning']) }}
				{{ form::open(['route' => 'expertise.destroy']) }}
				{{ form::hidden('id', $exp->id)}}
				{{ form::submit('Delete', ['class' => 'full-width btn btn-danger']) }}
				{{ form::close() }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop