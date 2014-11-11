@extends('layouts.user')

@section('content')

{{ Form::open(['route' => 'advisors.update']) }}
{{ Form::hidden('id', $advisor->id) }}
<!-- Username Form Input -->
    <div class="form-group">
        {{ Form::label('first_name', 'First Name (leave blank to not change)') }}
        {{ Form::text('first_name', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('last_name', 'Last Name (leave blank to not change)') }}
        {{ Form::text('last_name', null, ['class' => 'form-control']) }}
    </div>

    <!-- Email Form Input -->
    <div class="form-group">
        {{ Form::label('email', 'Email (leave blank to not change)') }}
        {{ Form::text('email', null, ['class' => 'form-control']) }}
    </div>

    <!-- Password Form Input -->
    <div class="form-group">
        {{ Form::label('password', 'Password (leave blank to not change)') }}
        {{ Form::password('password', ['class' => 'form-control']) }}
    </div>

    <div class="input-group">
        <span class="input-group-btn nav-login-submit">
            {{ Form::submit('Go!', ['class' => 'btn btn-primary'])}}
        </span>
    </div>

{{ Form::close() }}

@stop