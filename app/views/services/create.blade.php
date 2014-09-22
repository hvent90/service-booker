@extends('layouts.default')

@section('content')

<div class="row">
	<div class="col-md-6">
		<h1>New Service</h1>

		@include('layouts.partials.errors')

		{{ Form::open(['route' => 'services.store']) }}
		{{ Form::hidden('advisor_id', Auth::user()->id) }}
			<!-- Name Form Input -->
			<div class="form-group">
				{{ Form::label('name', 'Name:') }}
				{{ Form::text('name', null, ['class' => 'form-control']) }}
			</div>

			<!-- Duration Form Input -->
			<div class="form-group">
				{{ Form::label('duration', 'Duration (Minutes):') }}
                {{ Form::input('number', 'duration', null, ['class' => 'form-control']) }}
			</div>

			<!-- Notes Form Input -->
			<div class="form-group">
				{{ Form::label('notes', 'Notes:') }}
				{{ Form::textarea('notes', null, ['class' => 'form-control']) }}
			</div>

			<div class="form-group">
				{{ Form::submit('Create', ['class' => 'btn btn-primary'])}}
			</div>
		{{ Form::close() }}
	</div>
</div>

@stop

