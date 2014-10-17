@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-md-6">
        <h1>Edit {{ $service->name }}</h1>

        @include('layouts.partials.errors')

        {{ Form::open(['route' => 'services.update']) }}
        {{ Form::hidden('id', $service->id) }}
            <!-- Name Form Input -->
            <div class="form-group">
                {{ Form::label('name', 'Name:') }}
                {{ Form::text('name', $service->name, ['class' => 'form-control']) }}
            </div>

            <!-- Duration Form Input -->
            <div class="form-group">
                {{ Form::label('duration', 'Duration (Minutes):') }}
                {{ Form::input('number', 'duration', $service->duration, ['class' => 'form-control']) }}
            </div>

            <!-- Notes Form Input -->
            <div class="form-group">
                {{ Form::label('notes', 'Notes:') }}
                {{ Form::textarea('notes', $service->notes, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Create', ['class' => 'btn btn-primary'])}}
            </div>
        {{ Form::close() }}
    </div>
</div>

@stop

