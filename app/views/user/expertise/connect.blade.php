@extends('layouts.user')

@section('content')

<div class="row">
    <div class="col-md-6">
        <h1>Add an Expertise</h1>

        @include('layouts.partials.errors')

        {{ Form::open(['route' => 'user.expertise.store']) }}
        {{ Form::hidden('advisor_id', $currentUser->id) }}
            <!-- Name Form Input -->
            <div class="form-group">
                {{ Form::label('name', 'Name:') }}
                {{ Form::select('expertise[]', $expertiseNotContainedByAdvisor, ['multiple' => true, 'class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Add', ['class' => 'btn btn-primary'])}}
            </div>
        {{ Form::close() }}
    </div>

    <div class="col-md-6">
        <h1>Remove an Expertise</h1>

        @include('layouts.partials.errors')

        {{ Form::open([
            'route'  => 'user.expertise.destroy',
            'method' => 'delete']) }}
        {{ Form::hidden('advisor_id', $currentUser->id) }}
            <!-- Name Form Input -->
            <div class="form-group">
                {{ Form::label('name', 'Name:') }}
                {{ Form::select('expertise[]', $expertiseContainedByAdvisor, ['multiple' => true, 'class' => 'form-control']) }}
                {{-- Form::select('channels[]', $channelFormPopulator, $channelsToQuery, ['multiple' => true, 'id' => 'channel_picker', 'class' => 'matchingSize']) --}}
            </div>

            <div class="form-group">
                {{ Form::submit('Remove', ['class' => 'btn btn-primary'])}}
            </div>
        {{ Form::close() }}
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <h2>Request a new Expertise</h2>
        {{ Form::open(['route' => 'user.expertise.request-new']) }}
            {{ Form::hidden('advisor_id', $currentUser->id )}}
            <div class="form-group">
                {{ Form::label('requestedExpertise', 'Name of expertise:') }}
                {{ Form::text('requestedExpertise', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Request', ['class' => 'btn btn-success'])}}
            </div>
        {{ Form::close() }}
    </div>
</div>

@stop

