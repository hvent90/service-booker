@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-md-6">
        <h1>Connect an Expertise Group</h1>

        @include('layouts.partials.errors')

        {{ Form::open(['route' => 'expertise.group-connect']) }}
        {{ Form::hidden('expertise_id', $expertise->id) }}
            <!-- Name Form Input -->
            <div class="form-group">
                {{ Form::label('name', 'Name:') }}
                {{ Form::select('expertiseGroup_id[]', $expertiseGroupsNotContainedByExpertise, ['multiple' => true, 'class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Add', ['class' => 'btn btn-primary'])}}
            </div>
        {{ Form::close() }}
    </div>

    <div class="col-md-6">
        <h1>Remove an Expertise Group</h1>

        @include('layouts.partials.errors')

        {{ Form::open([
            'route'  => 'expertise.group-disconnect',
            'method' => 'delete']) }}
        {{ Form::hidden('expertise_id', $expertise->id) }}
            <!-- Name Form Input -->
            <div class="form-group">
                {{ Form::label('name', 'Name:') }}
                {{ Form::select('expertiseGroup_id[]', $expertiseGroupsContainedByExpertise, ['multiple' => true, 'class' => 'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::submit('Remove', ['class' => 'btn btn-primary'])}}
            </div>
        {{ Form::close() }}
    </div>
</div>

@stop

