@extends('layouts.user')

@section('content')

<div class="row">
    <div class="col-md-6">
        <h1>Add a Service</h1>

        @include('layouts.partials.errors')

        {{ Form::open(['route' => 'user.services.store']) }}
        {{ Form::hidden('advisor_id', $currentUser->id) }}
            <!-- Service Form Input -->
            <div class="form-group">
                {{ Form::label('services', 'Service:') }}
                {{ Form::select('services[]', $servicesNotContainedByAdvisor, ['multiple' => true, 'class' => 'form-control']) }}
            </div>

            <!-- Location Form Input -->
            <div class="form-group">
                {{ Form::label('location', 'Location:') }}
                {{ Form::select('locations[]', $locationFormPopulator, ['multiple' => true, 'class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Add', ['class' => 'btn btn-primary'])}}
            </div>
        {{ Form::close() }}
    </div>

    <div class="col-md-6">
        <h1>Remove a Service</h1>

        @include('layouts.partials.errors')

        {{ Form::open([
            'route'  => 'user.services.destroy',
            'method' => 'delete']) }}
        {{ Form::hidden('advisor_id', $currentUser->id) }}
            <!-- Name Form Input -->
            <div class="form-group">
                {{ Form::label('name', 'Name:') }}
                {{ Form::select('services[]', $servicesContainedByAdvisor, ['multiple' => true, 'class' => 'form-control']) }}
                {{-- Form::select('channels[]', $channelFormPopulator, $channelsToQuery, ['multiple' => true, 'id' => 'channel_picker', 'class' => 'matchingSize']) --}}
            </div>

            <div class="form-group">
                {{ Form::submit('Remove', ['class' => 'btn btn-primary'])}}
            </div>
        {{ Form::close() }}
    </div>
</div>

@stop

