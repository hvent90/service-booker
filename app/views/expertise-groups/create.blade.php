@extends('layouts.default')

@section('content')

<div class="row">
	<div class="col-md-6">
		<h1>New Expertise Group</h1>

		@include('layouts.partials.errors')

		{{ Form::open(['route' => 'expertise-groups.store']) }}
		{{ Form::hidden('advisor_id', Auth::user()->id) }}
			<!-- Title Form Input -->
			<div class="form-group">
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}
			</div>

			<!-- Notes Form Input -->
			<div class="form-group">
				{{ Form::label('description', 'Description:') }}
				{{ Form::textarea('description', null, ['class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::submit('Create', ['class' => 'btn btn-primary'])}}
			</div>
		{{ Form::close() }}
	</div>
</div>

@stop

