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

    <div class="col-md-6 how-it-works">
        <h3>Here is how it works:</h3>
        <ul>
            <li>Choose an hour in a day</li>
            <li>You will be available for two 25-minute meetings. The first is at the start of the hour. The second is at 30 minutes in to the hour.</li>
        </ul>

        @include('layouts.partials.errors')
    </div>
</div>
<div class="row">
<div class="col-md-6">
    <h2>You can pick individual dates with this calendar</h2>
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
                        <thead>
                            <td>Sun</td>
                            <td>Mon</td>
                            <td>Tue</td>
                            <td>Wed</td>
                            <td>Thu</td>
                            <td>Fri</td>
                            <td>Sat</td>
                        </thead>
                        @foreach ($oneMonthViewOfDaysWithTelomeres['collection']->chunk(7) as $daySet)
                            <tr>
                                @foreach ($daySet as $day)
                                    <td id="{{$day->id}}">
                                        <a href="#" class="date {{$day->date}}" id="{{$day->id}}">
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
        {{ Form::open(['route' => 'user.availabilities.store']) }}

            {{ Form::hidden('advisor_id', $currentUser->id) }}
            {{ Form::hidden('service_id', $firstService->id)}}
            {{ Form::hidden('day_ids', '', ['id' => 'day_ids']) }}
            {{ Form::hidden('datetime', '', ['id' => 'datetime']) }}
            <div id="forms-container"></div>
            {{ Form::submit("Add", ["class" => "btn btn-primary", "id" => "add-avail-btn"])}}

        {{ Form::close() }}
    </div>
</div>
<hr>
<div class="col-md-6">
    <h2>And you can set reoccuring times for availability</h2>
    @foreach ($recurringAvailabilities as $recurAvail)
        <p>{{ link_to_route('user.recurring-availabilities.destroy', 'Delete', $recurAvail->id, ['class' => 'btn btn-danger']) }} Every {{ $recurAvail->humanDay() }} at {{ $recurAvail->humanTime() }} at {{ $recurAvail->location->name }}</p>
    @endforeach
</div>
<div class="col-md-6 recurring-hours">
    {{ Form::open(['route' => 'user.recurring-availabilities.store']) }}
        <div class="col-xs-3 recur">
            <h5>Day</h4>
            <select name="day" class="form-control">
                <option name="day" value="0">Sunday</option>
                <option name="day" value="1">Monday</option>
                <option name="day" value="2">Tuesday</option>
                <option name="day" value="3">Wednesday</option>
                <option name="day" value="4">Thursday</option>
                <option name="day" value="5">Friday</option>
                <option name="day" value="6">Saturday</option>
            </select>
        </div>
        <div class="col-xs-3">
            <h5>Time</h4>
            <select name="time" class="form-control">
                <option name="time" value="12">12</option>
                <option name="time" value="1">1</option>
                <option name="time" value="2">2</option>
                <option name="time" value="3">3</option>
                <option name="time" value="4">4</option>
                <option name="time" value="5">5</option>
                <option name="time" value="6">6</option>
                <option name="time" value="7">7</option>
                <option name="time" value="8">8</option>
                <option name="time" value="9">9</option>
                <option name="time" value="10">10</option>
                <option name="time" value="11">11</option>
            </select>
        </div>
        <div class="col-xs-3">
            <h5>AM/PM</h4>
            <select name="am_pm" class="form-control">
                <option name="am_pm" value="am">AM</option>
                <option name="am_pm" value="pm">PM</option>
            </select>
        </div>
        <div class="col-xs-3">
            <h5>Location</h4>
            <select name="location_id" class="form-control">
                @foreach ($locations as $location)
                    <option name="location_id" value="{{$location->id}}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>
        {{ Form::hidden('advisor_id', $currentUser->id) }}
        {{ Form::hidden('service_id', $firstService->id)}}
        {{ Form::submit("Add", ["class" => "add-button btn btn-primary", "id" => "add-avail-btn"])}}
    {{ Form::close() }}
</div>


@stop

<style>
    .dropdown {
        display: inline-block;
    }
    
    .recurring-hours {
        margin-top: 25px;
    }

    .col-xs-3.recur {
        padding-left: 0;
    }

    .add-button {
        margin-top: 20px;
    } 
    
</style>

@section('script')

<script>
$(document).ready(function() {

    function recurHour(hour, timeOfDay) {
        hour = parseInt(hour);

        if(timeOfDay == "pm-hour-picker" && hour != 12) {
            return hour + 12;
        }

        return hour;
    }

    $('div.hour-cell .hour').click(function() {
        $(this).toggleClass('selected-recur-hour');

        if (!$("input[type=checkbox]", this).attr('checked') == 'checked') {
            $("input[type=checkbox]", this).attr('checked', 'checked');
        } else {
            $("input[type=checkbox]", this).attr('checked', '')
        }
    });

    $('#recur-avail-submit').click(function() {
        var recurAvail = [];

        $('.hour.selected-recur-hour').each(function() {
            if ($(this).next().children('select').val() == 'null') {
                sweetAlert('Please enter a location for all recurring availabilities.');
                return false;
            }
            recurAvail.push({
                "day_of_week": $(this).parent().parent().parent().parent().attr('day-of-week'),
                "location_name": $(this).next().children('select').val(),
                "hour": recurHour($(this).text(), $(this).parent().parent().parent().attr('class'))
            });
        });

        console.log(recurAvail);

        return false;
    });

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
        var currDate = $("#"+id+" a").attr('class');
        console.log(id);
        console.log($("#"+id+" a"));
        console.log(currDate);
        currDate = currDate.substring(5,currDate.length);
        label = "<p class='formLab'>"+parseDate(currDate)+"</p>";
        var hours = '<select class="start-hour"><option value="null">Select Hour</option>';
        var i = 1;
        for(i = 1; i < 13; i++)
        {
            hours += '<option value="' + i + '">' + i + '</option>';
        }
        hours += '</select>'
        period = '<select class="period"><option value="null">Period</option><option value="AM">AM</option><option value="PM">PM</option></select>'
        locations = '<select class="location"><option value="null">Location</option><option value="evolve">Evolve IP</option><option value="ice">ICE</option><option value="wsl">Walnut St. Labs</option><option value="remote">Remote</option></select>'


        return "<div class='time-select "+id+"'>"+label+hours+period+locations+"</div>";
    }

    function parseDate(dateClicked) {
        var dateString  = dateClicked.split('-');
        var year        = dateString[0];
        var month       = dateString[1];
        var day         = dateString[2];
        var weekday;

        var date        = new Date(year, month-1, day);

        switch(date.getDay()) {
            case 0: weekday="Sun, "
                break;
            case 1: weekday="Mon, "
                break;
            case 2: weekday="Tue, "
                break;
            case 3: weekday="Wed, "
                break;
            case 4: weekday="Thu, "
                break;
            case 5: weekday="Fri, "
                break;
            case 6: weekday="Sat, "
                break;
        }
        switch(date.getMonth()){ 
            case 0: month="Jan "
                break;
            case 1: month="Feb "
                break;
            case 2: month="Mar "
                break;
            case 3: month="Apr "
                break;
            case 4: month="May "
                break;
            case 5: month="Jun "
                break;
            case 6: month="Jul "
                break;
            case 7: month="Aug "
                break;
            case 8: month="Sep "
                break;
            case 9: month="Oct "
                break;
            case 10: month="Nov "
                break;
            case 11: month="Dec "
                break;
        }
        return weekday+month+day+', '+year;
        
    }

    function sortForms() {
        var container = document.getElementById("forms-container");
        var elements = container.childNodes;
        var sortMe = [];
        for (var i=0; i<elements.length; i++) {
            if (!elements[i].className) {
                continue;
            }
            var sortPart = elements[i].className.split(" ");
            if (sortPart.length > 1) {
                sortMe.push([ 1 * sortPart[1] , elements[i] ]);
            }
        }
        sortMe.sort(function(x, y) {
            return x[0] - y[0];
        });
        for (var i=0; i<sortMe.length; i++) {
            container.appendChild(sortMe[i][1]);
        }
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

        if($(this).children('div.dateCell').hasClass('dateCell-selected')) {
            $(".time-select."+id).remove()
            delete times[id];
            $("div", this).toggleClass('dateCell-selected');
            console.log(times);
            return;
        }

        $("div", this).toggleClass('dateCell-selected');

        if (times[id] == null) {
            times[id] = [];
            console.log(times);

            $('#day_ids').val(JSON.stringify(times));
        } else {
            delete times[id];
            console.log(times);
            $('#'+id+'-time').remove();

            $('#day_ids').val(JSON.stringify(times));
        }

        $("#forms-container").append(hourSelection(id));
        sortForms();        

    });

    $('body').delegate('.start-hour', 'change', function(e) {
        var hourSelected = parseInt(this.value);
        var currClass = $(this).parent().attr('class');
        var id = currClass.substring(12,currClass.length)
        times[id][0] = hourSelected;

        $('#day_ids').val(JSON.stringify(times));
    });

    $('body').delegate('.period', 'change', function(e) {
        var period = this.value;
        var currClass = $(this).parent().attr('class');
        var id = currClass.substring(12,currClass.length)
        times[id][1] = period;

        $('#day_ids').val(JSON.stringify(times));
    });

    $('body').delegate('.location', 'change', function(e) {
        var location = this.value;
        var currClass = $(this).parent().attr('class');
        var id = currClass.substring(12,currClass.length)
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
