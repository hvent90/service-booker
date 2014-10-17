@extends('layouts.default')

@section('content')
{{ link_to_route('expertise-groups.create', 'Add an Expertise Group', null, ['class' => 'btn btn-info']) }}
<table class="table">
	<tbody>
		@foreach ($expertiseGroups as $exp)
		<tr>
			<td>
				<li>{{ $exp->name }}</li>
				<li>{{ $exp->description }}</li>
			</td>
			<td>
				{{ link_to_route('expertise-groups.edit',    'Edit',   $exp->id, ['class' => 'btn btn-warning']) }}
				{{ link_to_route('expertise-groups.destroy', 'Delete', $exp->id, ['class' => 'btn btn-danger']) }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@stop