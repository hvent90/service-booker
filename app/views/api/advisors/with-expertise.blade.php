<div class="row homepage-advisor-list">
	<div class="homepage-advisor-list-bg">
		@foreach ($advisorsWithAvailability as $adv)
			<div id="{{ $adv->id }}" class="advisor-homepage">
				<div class="title-advisor">
					<h4>{{ $adv->first_name }} {{ $adv->last_name }}</h4>
					<h5>{{ $adv->subtitle }}</h5>
				</div>
				<div class="advisor-avail-container">
				@foreach ($adv->availabilities()->get() as $avail)
					<div id="{{ $avail->id }}"class="advisor-avail-single">
						<div class="col-xs-7">
							<p>{{ $avail->title }}</p>
							<p>{{ $avail->locations()->first()->name }}</p>
							@foreach ($avail->days()->get() as $day)
								<p>{{ $day['date'] }} {{ $day->pivot->time }}</p>
							@endforeach
						</div>
						<div class="col-xs-5">
							<a href="#" class="advisor-avail-single-btn btn btn-info">Request</a>
						</div>
						<form id="{{ $avail->id }}-form" action="meetings" method="POST" role="form">
							<legend>Request a Meeting</legend>

							<div class="form-group">
								<label for="">Name</label>
								<input type="text" class="form-control" name ="name" id="requestee_name" placeholder="Name">
							</div>

							<div class="form-group">
								<label for="">Email</label>
								<input type="email" class="form-control" name="email" id="requestee_email" placeholder="Email">
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Message:</label>
								<textarea name="notes" class="form-control" rows="3"></textarea>
							</div>

							<input  type="hidden" name="availability_id" value="{{$avail->id}}">
							<input  type="hidden" name="advisor_id"      value="{{$avail->advisors()->first()->id}}">
							<input  type="hidden" name="day_id"      value="{{$avail->days()->first()->id}}">
							<input  type="hidden" name="location_id"     value="{{$avail->locations()->first()->id}}">
							<input  type="hidden" name="service_id"      value="{{$avail->services()->first()->id}}">

							<button type="submit" class="btn btn-primary">Request</button>
						</form>
					</div>
				@endforeach
				</div>
			</div>
		@endforeach
	</div>
</div>