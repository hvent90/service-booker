@extends('layouts.user')

@section('content')
@if(Session::get('message'))
    <div class="col-sm-12">
        <div class="alert alert-warning" role="alert">{{ Session::get('message') }}</div>
    </div>
@endif
<div class="row">
    <h1>Add an Availability</h1>
</div>

<div class="row">
    <div class="col-md-6">
        <h3>Here is how it works:</h3>
        <ul>
            <li>Choose an hour in a day</li>
            <li>You will be available for two 25-minute meetings. The first is at the start of the hour. The second is at 30 minutes in to the hour.</li>
        </ul>
        @include('layouts.partials.errors')

        {{ Form::open(['route' => 'user.availabilities.store']) }}

            {{ Form::hidden('advisor_id', $currentUser->id) }}
            {{ Form::hidden('service_id', $firstService->id)}}
            {{ Form::hidden('day_ids', '', ['id' => 'day_ids']) }}
            {{ Form::hidden('datetime', '', ['id' => 'datetime']) }}

            <div class="form-group">
                {{ Form::submit('Add', ['class' => 'btn btn-primary'])}}
            </div>
        {{ Form::close() }}
    </div>

    <div class="col-md-6" id="monthSingleContainer">
        <div id="monthIncoming">
        </div>

        <div id="monthCurrent">
            <div class="row" id="monthNavWrapper">
                <div class="col-md-5 col-offset-1" id="monthNav">
                    {{ link_to_route('api.calendar.month', '<<', [$yearPrevious, $previousMonth], ['id' => 'prevMonth']) }}
                    {{ $oneMonthViewOfDaysWithTelomeres['month']['full'].' '.$oneMonthViewOfDaysWithTelomeres['year'] }}
                    {{ link_to_route('api.calendar.month', '>>', [$yearNext, $nextMonth], ['id' => 'nextMonth']) }}
                </div>
            </div>

            <div id="monthContent">
                <table id="monthView" class="table table-striped table-bordered .table-hover">
                    <tbody>
                        <tr>
                            <td>Sunday</td>
                            <td>Monday</td>
                            <td>Tuesday</td>
                            <td>Wednesday</td>
                            <td>Thursday</td>
                            <td>Friday</td>
                            <td>Saturday</td>
                        </tr>
                        @foreach ($oneMonthViewOfDaysWithTelomeres['collection']->chunk(7) as $daySet)
                            <tr>
                                @foreach ($daySet as $day)
                                    <td id="{{$day->id}}">
                                        <a href="#" class="date" id="{{$day->id}}">
                                            <div class="dateCell" id="{{$day->id}}">
                                                {{ $day->ofMonth() }}
                                                @if ( $day->availabilities()->get() )
                                                @endif
                                            </div>
                                        </a>
                                        <div id="{{$day->id}}-hours">
                                            <div class="col-sm-6" id="{{$day->id}}-start-half">
                                            </div>
                                            <div class="col-sm-6" id="{{$day->id}}-end-half">
                                            </div>
                                        </div>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@stop

@section('script')

<script>

$(document).ready(function() {

    var selected = [];
    var selectedTimes = [];
    var times = {};

    function removeA(arr) {
        var what, a = arguments, L = a.length, ax;
        while (L > 1 && arr.length) {
            what = a[--L];
            while ((ax= arr.indexOf(what)) !== -1) {
                arr.splice(ax, 1);
            }
        }
        return arr;
    }

    function hourSelection(id) {
        var hours = '<span id="'+ id + '-time"> <select class="start-hour"><option value="null">Select Hour</option>';
        var i = 1;
        for(i = 1; i < 13; i++)
        {
            hours += '<option value="' + i + '">' + i + '</option>';
        }
        hours += '</select>'
        period = '<select class="period"><option value="null">Period</option><option value="AM">AM</option><option value="PM">PM</option></select>'
        locations = '<select class="location"><option value="null">Location</option><option value="wsl">Walnut St. Labs</option><option value="ice">ICE</option><option value="evolve">Evolve IP</option><option value="evolve">ICE</option><option value="remote">Remote</option></select></span>'

        return hours+period+locations;
    }

    function initialHourSelection() {
        var hours = '<select class="start-hour"><option value="null">start</option>';
        var i = 0;
        for(i = 0; i < 24; i++)
        {
            hours += '<option value="' + i + '">' + i + '</option>';
        }
        hours += '</select>'

        return hours;
    };

    function hourSelectionRepopulator(dayId, prevChosenStart, prevChosenEnd) {
        var hours = '<select id="'+dayId+'-start" class="start-hour"><option value="null">start</option>';
        for(i = 0; i < 24; i++)
        {
            hours += '<option value="' + i + '">' + i + '</option>';
        }
        hours += '</select>'

        $('#' + dayId).append(hours);

        $('#' + dayId + '-start').val(prevChosenStart);

        i = prevChosenStart + 1;
        hours = '<select id="'+dayId+'-end" class="end-hour"><option value="null">end</option>';
        for ( (i + 1); i < 24; i++)
        {
            hours += '<option value="' + i + '">' + i + '</option>';
        }

        $('#' + dayId).append(hours);

        $('#' + dayId + '-end').val(prevChosenEnd);
    };

    // $('body').delegate('.end-hour', 'change', function (e) {
    //     var dayId = $(this).parent().attr('id');
    //     var endInput = $(this);
    //     var endValueSelected   = parseInt($(this).val());
    //     var startValueSelected = parseInt($(this).prev().val());
    //     var indexToRemove = -1;

    //     $.each(selectedTimes, function(index) {
    //         if ( this.dayId == dayId )
    //         {
    //             indexToRemove = index;
    //         }
    //     })

    //     if ( indexToRemove > -1 )
    //     {
    //         selectedTimes.splice(indexToRemove, 1);
    //     }

    //     selectedTimes.push({
    //         dayId: dayId,
    //         startHour: startValueSelected,
    //         endHour: endValueSelected
    //     });

    //     $('#datetime').val(JSON.stringify(selectedTimes));

    //     console.log(selectedTimes);
    // });


    // $('body').delegate('.start-hour', 'change', function (e) {
    //     var startInput = $(this);

    //     var valueSelected  = parseInt(this.value) + 1;

    //     var hours = '<select class="end-hour"><option value="null">end</option>';

    //     if( $(this).next().attr('class') == 'end-hour' )
    //     {
    //         var startInput = $(this);

    //         var valueSelected  = parseInt(this.value) + 1;

    //         var hours = '<select onchange="endVal(this.value)" class="end-hour"><option value="'+valueSelected+'">'+valueSelected+'</option>';

    //         for( valueSelected; valueSelected < 24; valueSelected++ )
    //         {
    //             hours += '<option value="' + valueSelected + '">' + valueSelected + '</option>';
    //         }
    //         hours += '</select>'

    //         $(this).next().html(hours);

    //     } else {
    //         for( valueSelected; valueSelected < 24; valueSelected++ )
    //         {
    //             hours += '<option value="' + valueSelected + '">' + valueSelected + '</option>';
    //         }
    //         hours += '</select>'

    //         $(startInput).after(hours);
    //     }

    // });


    $('#monthSingleContainer').on('click', '#monthView a', function() {
        var id = $(this).attr('id');

        $("div", this).toggleClass('dateCell-selected');

        if (times[id] == null) {
            times[id] = [];
            console.log(times);
            $(this).after(hourSelection(id));

            $('#day_ids').val(JSON.stringify(times));
        } else {
            delete times[id];
            console.log(times);
            $('#'+id+'-time').remove();

            $('#day_ids').val(JSON.stringify(times));
        }
    });

    $('body').delegate('.start-hour', 'change', function(e) {
        var hourSelected = parseInt(this.value);
        var id = $(this).parent().parent().attr('id');
        times[id][0] = hourSelected;

        $('#day_ids').val(JSON.stringify(times));
    });

    $('body').delegate('.period', 'change', function(e) {
        var period = this.value;
        var id = $(this).parent().parent().attr('id');
        times[id][1] = period;

        $('#day_ids').val(JSON.stringify(times));
    });

    $('body').delegate('.location', 'change', function(e) {
        var location = this.value;
        var id = $(this).parent().parent().attr('id');
        times[id][2] = location;

        $('#day_ids').val(JSON.stringify(times));
    });

    $('#monthSingleContainer').on('click', '#monthNav a', function() {
         // grabs the -HREF- -ATTRIBUTE- of the clicked object
         var url = $(this).attr('href');
         $('#monthCurrent').empty();
         $('#monthIncoming').load(url + ' #monthSingle');

         var index;

         // negates the normal click behavior of the element on the page
         return false;
    });

    $(document).ajaxComplete(function() {
        for (index = 0; index < selected.length; ++index) {
            $("div", 'td#' + selected[index]).toggleClass('dateCell-selected');
        }

        for (index = 0; index < selectedTimes.length; ++index)
        {
            hourSelectionRepopulator(selectedTimes[index].dayId, selectedTimes[index].startHour, selectedTimes[index].endHour);
        }

    });
});

</script>

@stop
