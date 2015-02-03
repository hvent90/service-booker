@extends('layouts.default')

@section('content')

<div class="row">
	<div class="col-md-6">
		<h1>Register!</h1>

		@include('layouts.partials.errors')

		{{ Form::open(['route' => 'advisors.store', 'method' => 'post', 'files' => true]) }}
			<div class="form-group">
		        {{ Form::label('first_name', 'First Name') }}
		        {{ Form::text('first_name', null, ['class' => 'form-control', 'required']) }}
		    </div>

		    <div class="form-group">
		        {{ Form::label('last_name', 'Last Name') }}
		        {{ Form::text('last_name', null, ['class' => 'form-control', 'required']) }}
		    </div>

		    <!-- Profile Image Form Input -->
			<div class="form-group">
				{{ Form::label('image', 'Profile Image:') }}
				{{ Form::file('image') }}
			</div>

			<!-- Email Form Input -->
			<div class="form-group">
				{{ Form::label('email', 'Email:') }}
				{{ Form::text('email', null, ['class' => 'form-control', 'required']) }}
			</div>

		    <!-- Linkedin Form Input -->
		    <div class="form-group">
		        {{ Form::label('linkedin', 'LinkedIn Profile URL:') }}
		        {{ Form::text('linkedin', null, ['class' => 'form-control']) }}
		    </div>

			<!-- Bio Form Input -->
		    <div class="form-group">
		        {{ Form::label('bio', 'Bio:') }}
		        {{ Form::textarea('bio', null, ['class' => 'form-control', 'required']) }}
		    </div>

			<!-- Password Form Input -->
			<div class="form-group">
				{{ Form::label('password', 'Password:') }}
				{{ Form::password('password', ['class' => 'form-control', 'required']) }}
			</div>

			<div class="form-group">
				{{ Form::submit('Sign Up', ['class' => 'btn btn-primary'])}}
			</div>
		{{ Form::close() }}
	</div>
</div>

@stop

