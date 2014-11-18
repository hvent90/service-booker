@extends('layouts.default')

@section('content')

<div class="row">
    <div class="col-md-6">
        <h1>Approve {{ $expertise->title }}</h1>
        <p>Completing this form will create the expertise for any advisor to choose AND it will automatically associate this expertise with {{ \MyApp\Advisor::find($expertise->requested_adv_id)->first_name }} {{ \MyApp\Advisor::find($expertise->requested_adv_id)->last_name }} (only if the {{ \MyApp\Advisor::find($expertise->requested_adv_id)->first_name }} {{ \MyApp\Advisor::find($expertise->requested_adv_id)->last_name }} has less than 4 current expertises).</p>

        @include('layouts.partials.errors')

        {{ Form::open(['route' => 'expertise.submit-approval']) }}
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
                {{ Form::label('expertiseGroups', 'Expertise Groups') }}
                {{ Form::hidden('expertiseGroups') }}
                <br />
                @foreach ($expertiseGroups as $expG)
                    <button id="{{ $expG->id }}" class="groups btn">{{ $expG->name }}</button>
                @endforeach
            </div>

            <div class="form-group">
                {{ Form::submit('Create', ['class' => 'btn btn-primary'])}}
            </div>
        {{ Form::close() }}
    </div>
</div>

@stop

@section('script')
<script>
$(document).ready(function() {

    var selectedGroups = [];

    $('button').click(function() {
        $(this).toggleClass('btn-success');

        selectedGroups = [];

        $('.btn-success').each(function() {
            selectedGroups.push($(this).attr('id'));
        });

        $('#expertiseGroups').val(selectedGroups);
        console.log($('#expertiseGroups').val());

        return false;

    });

});
</script>
@stop