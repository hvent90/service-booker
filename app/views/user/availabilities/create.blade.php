@extends('layouts.default')

@section('content')

<div class="row">
    <h1>Add an Availability</h1>
</div>

<div class="row">
    <div class="col-md-6">
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

             <!-- Notes Form Input -->
            <div class="form-group">
                {{ Form::label('notes', 'Notes:') }}
                {{ Form::textarea('notes', null, ['class' => 'form-control']) }}
            </div>

            {{ Form::hidden('day_ids', '', ['id' => 'day_ids'])}}

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
                                                    @foreach ( $day->availabilities()->get() as $availability )
                                                        <li>{{ $availability->title }}</li>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </a>
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

    var selected = [];

    $('#monthSingleContainer').on('click', '#monthView a', function() {
        var id = $(this).attr('id');

        $("div", this).toggleClass('dateCell-selected');

        if ($.inArray(id, selected) == -1)
        {
            selected.push(id);
            console.log(selected);

            $('#day_ids').val(selected);
        } else {
            removeA(selected, id);
            console.log(selected);

            $('#day_ids').val(selected);
        }
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
            console.log('#' + selected[index]);
         }
    });
});

</script>

@stop
