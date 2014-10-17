@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-md-6">
        <h1>Edit {{ $expertise->title }}</h1>

        @include('layouts.partials.errors')

        {{ Form::open(['route' => 'expertise.update']) }}
        {{ Form::hidden('id', $expertise->id) }}
            <!-- Title Form Input -->
            <div class="form-group">
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', $expertise->title, ['class' => 'form-control']) }}
            </div>

            <!-- Notes Form Input -->
            <div class="form-group">
                {{ Form::label('notes', 'Notes:') }}
                {{ Form::textarea('notes', $expertise->notes, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Create', ['class' => 'btn btn-primary'])}}
            </div>
        {{ Form::close() }}
    </div>
</div>

@stop

