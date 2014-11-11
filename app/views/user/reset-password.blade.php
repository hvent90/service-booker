@extends('layouts.full-width')

@section('content')

<div class="container">
	<br />
	<br />
	<h2>Enter your email and a new password will be sent to you.</h2>
	{{ Form::open() }}
		<div class="form-group">
			{{ Form::label('email', 'Email:') }}
			{{ Form::text('email', null, ['class' => 'form-control'])}}
		</div>
		<div class="form-group">
			{{ Form::submit('Reset', ['class' => 'btn btn-success']) }}
		</div>
	{{ Form::close()}}

</div>
@stop