@extends('layouts.default')

@section('content')

<div class="row">
	<div class="col-md-6">
		<h1>Send an email to all advisors</h1>

		@include('layouts.partials.errors')

		{{ Form::open(['route' => 'emails.send-all-advisors', 'method' => 'post']) }}
		    <!-- Linkedin Form Input -->
		    <div class="form-group">
		        {{ Form::label('subject', 'Subject') }}
		        {{ Form::text('subject', null, ['class' => 'form-control']) }}
		    </div>

			<!-- Bio Form Input -->
		    <div class="form-group">
		        {{ Form::label('body', 'Body:') }}
		        {{ Form::textarea('body', null, ['class' => 'form-control']) }}
		    </div>

			<div class="form-group">
				{{ Form::submit('Send', ['class' => 'btn btn-primary'])}}
			</div>
		{{ Form::close() }}
	</div>
</div>

@stop

