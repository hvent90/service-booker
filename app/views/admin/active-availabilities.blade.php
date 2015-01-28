@extends('layouts.default')

@section('content')

<div class="row">
@if($availabilities)
	@foreach($availabilities as $availability)
		<div class="advisor-header col-sm-4" style="border: 1px solid #999; padding: 10px; margin: 5px">
		<div style="padding: 5px">
			@if($availability->advisor_profile_img) 
				<img src="{{ $availability->advisor_profile_img }}" class="img-responsive">
			@endif
			{{ $availability->advisor_first_name }} {{ $availability->advisor_last_name }} <br />
			{{ $availability->advisor_email }} <br />
			{{ $availability->time }} <br />
			{{ $availability->date }} <br />
			{{ $availability->location }} <br />
		</div>
		<hr>
		{{ $availability->requestee_name }} <br />
		{{ $availability->requestee_email }} <br />
		{{ $availability->requestee_phone }} <br />
		{{ $availability->requestee_notes }} <br />
		@if($availability->status == 0)
			{{ $availability->advisor_first_name }} {{ $availability->advisor_last_name }} has not yet confirmed this request.
		@else
			{{ $availability->advisor_first_name }} {{ $availability->advisor_last_name }} has CONFIRMED this request.
		@endif
		</div>
	@endforeach
@else
	<h2>There are no Advisors with active requests.</h2>
@endif
</div>

@stop