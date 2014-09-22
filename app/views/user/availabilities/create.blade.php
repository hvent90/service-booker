@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-md-6">
        <h1>Add an Availability</h1>

        @include('layouts.partials.errors')

        {{ Form::open(['route' => 'user.availabilities.store']) }}
        {{ Form::hidden('advisor_id', $currentUser->id) }}
            <!-- Title Form Input -->
            <div class="form-group">
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ['class' => 'form-control']) }}
            </div>

            <!-- Service Form Input -->
            <div class="form-group">
                {{ Form::label('services', 'Service:') }}
                {{ Form::select('services[]', $servicesContainedByAdvisor, ['multiple' => true, 'class' => 'form-control']) }}
            </div>

            <!-- Location Form Input -->
            <div class="form-group">
                {{ Form::label('locations', 'Location:') }}
                {{ Form::select('locations[]', $locationFormPopulator, ['multiple' => true, 'class' => 'form-control']) }}
            </div>

            <!-- Day Form Input -->
            <div class="form-group">
                {{ Form::label('days', 'Days:') }}
                {{ Form::select('days[]', $dayFormPopulator, ['multiple' => true, 'class' => 'form-control']) }}
            </div>

             <!-- Notes Form Input -->
            <div class="form-group">
                {{ Form::label('notes', 'Notes:') }}
                {{ Form::textarea('notes', null, ['class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Add', ['class' => 'btn btn-primary'])}}
            </div>
        {{ Form::close() }}
    </div>

     <div class="col-md-6">
        <h1>Remove an Availability</h1>

        @include('layouts.partials.errors')

        {{ Form::open([
            'route'  => 'user.availabilities.destroy',
            'method' => 'delete']) }}
        {{ Form::hidden('advisor_id', $currentUser->id) }}
            <!-- Name Form Input -->
            <div class="form-group">
                {{ Form::label('name', 'Availability:') }}
                {{ Form::select('availabilities[]', $advisorAvailabilities, ['multiple' => true, 'class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Remove', ['class' => 'btn btn-primary'])}}
            </div>
        {{ Form::close() }}
    </div>
</div>

@stop

