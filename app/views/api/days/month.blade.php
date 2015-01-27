<div class="col-md-60" id="monthSingle">
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
                                <a href="#" class="date {{$day->date}}" id="{{$day->id}}">
                                    <div class="dateCell" id="{{$day->id}}">
                                        {{ $day->ofMonth() }}
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