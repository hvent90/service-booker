{{ Form::open(['route' => 'advisors.store']) }}
<!-- Username Form Input -->
    <div class="form-group">
        {{ Form::label('first_name', 'First Name') }}
        {{ Form::text('first_name', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('last_name', 'Last Name') }}
        {{ Form::text('last_name', null, ['class' => 'form-control']) }}
    </div>

    <!-- Email Form Input -->
    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', null, ['class' => 'form-control']) }}
    </div>

    <!-- Password Form Input -->
    <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', ['class' => 'form-control']) }}
    </div>

    <!-- Password Confirmation Form Input -->
        {{ Form::label('password_confirmation', 'Confirm Password') }}
    <div class="input-group">
        {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
        <span class="input-group-btn nav-login-submit">
            {{ Form::submit('Go!', ['class' => 'btn btn-primary'])}}
        </span>
    </div>

{{ Form::close() }}