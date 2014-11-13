@foreach ($advisors as $advisor)
	<div class="row col-sm-8 col-sm-offset-2 advisor-listing">
			<div class="row advisor-header">
				<h3>{{$advisor->first_name}} {{$advisor->last_name}}</h3>
				@foreach ($advisor->expertise()->get() as $exp)
					<button class="btn">{{$exp->title}}</button>
				@endforeach
				<p>{{nl2br($advisor->bio)}}</p>
			</div>
			<div class="row advisor-availability-listings">
				<h4 class="the-word-availabilities">Availabilities:</h4>
				<div class="row container-fix-avail">
				@foreach ($advisor->availabilities()->where('is_booked', '!==', '1')->get()->sortBy(function($availZ) {
					return $availZ->days()->first()['date'];
				}) as $avail)
				<a href="#" id="{{$avail->id}}" class="advisor-avail-single-a">
					<div class="col-xs-4 advisor-avail-single">
						<div>
							<table>
								<tr>
									<th class="align-right">At</th>
									<th class="item"><a href="{{ $avail->locations()->first()->website }}">{{ $avail->locations()->first()->name }}</a></th>
								</tr>
								<tr>
									<th class="align-right">On</th>
									<th class="item">{{ $avail->days()->first()['date'] }}</th>
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
	</div>
@endforeach