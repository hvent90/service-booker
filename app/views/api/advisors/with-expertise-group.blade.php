@foreach ($advisors as $advisor)
	<div class="row col-sm-8 col-sm-offset-2 advisor-listing">
			<div class="row advisor-header">
				@if($advisor->profile_img)
					<img src="{{ $advisor->profile_img }}" class="img-responsive">
				@endif
				@if($advisor->linkedin)
					<a href="{{ $advisor->linkedin }}" target="_blank"><i class="fa fa-linkedin-square"></i></a>
				@endif
				{{ link_to_route('advisors.show', $advisor->first_name.' '.$advisor->last_name, [$advisor->id, $advisor->first_name, $advisor->last_name], ['class' => 'advisor-name']) }}
				<br />
				@foreach ($advisor->expertise()->get() as $exp)
					<button class="btn">{{$exp->title}}</button>
				@endforeach
				<p>{{nl2br($advisor->bio)}}</p>
			</div>
			@if ($advisor->availabilities()->first())
			<div class="row advisor-availability-listings">
				<h4 class="the-word-availabilities">Availabilities:</h4>
				<div class="row container-fix-avail">
				@foreach ($advisor->availabilities()->where('is_booked', '!==', '1')->where('expired', 0)->get()->sortBy(function($availZ) {
					return $availZ->days()->first()['date'];
				}) as $avail)
				<a href="#" id="{{$avail->id}}" class="advisor-avail-single-a">
					<div class="col-xs-4 advisor-avail-single">
						<div class="height-fix">
							<table>
								<tr>
									<th class="align-right">At</th>
									<th class="item"><a href="{{ $avail->locations()->first()->website }}">{{ $avail->locations()->first()->name }}</a></th>
								</tr>
								<tr>
									<th class="align-right">On</th>
									<th class="item">{{ $avail->days()->first()->prettyPrint() }}</th>
								</tr>
								<tr>
									<th class="align-right">During</th>
									<th class="item">{{ $avail->days()->first()->pivot->time }}</th>
								</tr>
							</table>
						</div>
					</div>
				</a>
				@endforeach
				</div>
			</div>
			@endif
	</div>
@endforeach
