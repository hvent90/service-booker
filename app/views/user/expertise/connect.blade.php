@extends('layouts.user')

@section('head')
    <link rel="stylesheet" type="text/css" href="/css/tooltipster.css" />
@stop

@section('content')

<div class="main-expertise-container row">
    @include('layouts.partials.errors')
    <div>
        <h1>
            <span class="tooltippls" title="test">Add</span>
            an Expertise
        </h1>

        <!-- Expertise Addition Form -->
        {{ Form::open([
            'route' => 'user.expertise.store',
            'id'    => 'add-expertise-form'
        ]) }}
        {{ Form::hidden('advisor_id', $currentUser->id, ['id' => 'add-advisor-id']) }}
            <!-- Name Form Input -->
            <div class="form-group">
                <input class="typehead form-control" id="typehead" type="text" name="expertise" placeholder="Start typing...">
                {{ Form::submit('Add', ['class' => 'btn btn-primary'])}}
            </div>
            <div id="exp-group-container" class="hidden row">
                <h2>You are creating a new Expertise that is not already in our system. Please associate this Expertise with one or many Categories.</h2>
                <div class="row">
                {{ Form::text('expertiseGroups', null, ['id' => 'expertiseGroups', 'class' => 'hidden']) }}
                    @foreach ($expertiseGroups as $expG)
                        <button id="{{ $expG->id }}" class="expertises-groups-to-add btn">{{ $expG->name }}</button>
                    @endforeach
                </div>
            </div>
        {{ Form::close() }}

        <!-- Expertise Removal Form -->
        {{ Form::open([
            'route'  => 'user.expertise.destroy',
            'method' => 'delete',
            'id'     => 'remove-expertise-form',
            'class'  => 'hidden'
        ]) }}
        {{ Form::hidden('advisor_id', $currentUser->id) }}
        <!-- Name Form Input -->
        <div class="form-group">
            {{ Form::text('expertisesToRemove', null, ['id' => 'expertisesToRemove', 'class' => 'hidden']) }}
            @foreach ($expertiseContainedByAdvisor as $id => $name)
                <button id="{{ $id }}" class="expertises-to-remove btn">{{ $name }}</button>
            @endforeach
        </div>

        <div class="form-group">
            {{ Form::submit('Remove', ['class' => 'btn btn-danger'])}}
        </div>
        {{ Form::close() }}
    </div>

</div>

@stop

@section('script')
<script type="text/javascript" src="/js/jquery.tooltipster.min.js"></script>
<script src="/js/fittext.js"></script>
<script src="/js/typeahead.js"></script>

<script>
$(document).ready(function() {
    $('h1').fitText();

    $('.active-expertise').click(function() {
        $('#selectable-expertise-container')
            .toggleClass('hidden')
            .append($('.hidden'));
        $('.selectable-expertise')
            .toggleClass('hidden');
    });

    $('.tooltippls').tooltipster({
        content: $('<span class="expertise-selectable-filter">Remove</span>'),
        interactive: true
    });

    var selectedExpertisesToRemove = [];

    $('.expertises-to-remove').click(function() {
        $(this).toggleClass('btn-warning');

        selectedExpertisesToRemove = [];

        $('.btn-warning').each(function() {
            selectedExpertisesToRemove.push($(this).attr('id'));
        });

        console.log(selectedExpertisesToRemove);

        $('#expertisesToRemove').val(selectedExpertisesToRemove);
        console.log($('#expertisesToRemove').val());

        return false;
    });

    var selectedExpertiseGroups = [];

    $('body').on('click', '.expertises-groups-to-add', function() {
        $(this).toggleClass('btn-success');

        selectedExpertiseGroups = [];

        $('.btn-success').each(function() {
            selectedExpertiseGroups.push($(this).attr('id'));
        });

        console.log(selectedExpertiseGroups);

        $('#expertiseGroups').val(selectedExpertiseGroups);
        console.log($('#expertiseGroups').val());

        return false;
    });

    var changeToolTipster = function(filter) {
        $('.tooltippls').tooltipster('content', $('<span class="expertise-selectable-filter">'+filter+'</span>'));
        console.log(filter);
        if(filter == 'Add') {
            $('.tooltippls').fadeOut(100, function() {
                $(this).text('Remove').fadeIn(100);
            });

            $('#add-expertise-form').fadeOut(100, function() {
                $('#remove-expertise-form')
                    .removeClass('hidden')
                    .fadeIn(100);
            });
        } else {
            $('.tooltippls').fadeOut(100, function() {
                $(this).text('Add').fadeIn(100);
            });

            $('#remove-expertise-form').fadeOut(100, function() {
                $('#add-expertise-form').fadeIn(100);
            });

        }
    }

    $('body').on('click', '.expertise-selectable-filter', function() {
        var filter = $(this).text();

        if(filter == 'Remove') {
            changeToolTipster('Add');
        } else {
            changeToolTipster('Remove');
        }
        return false;
    });


    var substringMatcher = function(strs) {
      return function findMatches(q, cb) {
        var matches, substrRegex;

        // an array that will be populated with substring matches
        matches = [];

        // regex used to determine if a string contains the substring `q`
        substrRegex = new RegExp(q, 'i');

        // iterate through the pool of strings and for any string that
        // contains the substring `q`, add it to the `matches` array
        $.each(strs, function(i, str) {
          if (substrRegex.test(str)) {
            // the typeahead jQuery plugin expects suggestions to a
            // JavaScript object, refer to typeahead docs for more info
            matches.push({ value: str });
          }
        });

        cb(matches);
      };
    };

    var values = ['test', 'another test', 'entry'];
    $('#typehead').typeahead({
        hint: false,
        highlight: true,
        minLength: 1,
        limit: 10
    },
    {
        source: substringMatcher({{ json_encode($expertiseNotContainedByAdvisor) }})
    });


    //Submitting
    $('#add-expertise-form').submit(function() {
        if(!$('.expertises-groups-to-add').hasClass('btn-success') && $('#exp-group-container').hasClass('visible')) {
            sweetAlert("Please select a Category for your Expertise.");
            return false;
        }

        $.ajax({
            type: "POST",
            url: "/dashboard/expertise/connect",
            data: {
                expertise: $('#typehead').val(),
                expertiseGroups: $('#expertiseGroups').val(),
                advisor_id: $('#add-advisor-id').val()
            }
        })
        .done(function( payload ) {
            console.log(payload);
            if(payload == 'create') {
                $('#exp-group-container')
                    .hide()
                    .toggleClass('hidden visible')
                    .fadeIn(1000);
                $('#add-expertise-form input[type=submit').fadeOut(500, function() {
                    $(this).toggleClass('upper-margin')
                           .appendTo('#exp-group-container').fadeIn(500);
                });
            } else if(payload == 'added') {
                window.location.href = '/dashboard';
            } else {
                window.location.href = '/dashboard';
            }
        })
        .fail(function( payload ) {
            alert( payload );
        });

        return false;
    });
});
</script>
@stop
