@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-md-6">
        <h1>Edit {{ $expertiseGroup->name }}</h1>

        @include('layouts.partials.errors')

        {{ Form::open(['route' => 'expertise-groups.update']) }}
        {{ Form::hidden('id', $expertiseGroup->id) }}
            <!-- Title Form Input -->
            <div class="form-group">
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', $expertiseGroup->title, ['class' => 'form-control']) }}
            </div>

            <!-- Notes Form Input -->
            <div class="form-group">
                {{ Form::label('description', 'Description:') }}
                {{ Form::textarea('description', $expertiseGroup->description, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Create', ['class' => 'btn btn-primary'])}}
            </div>
        {{ Form::close() }}
    </div>
</div>

@stop

