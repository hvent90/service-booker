{{ Form::open([
		'class' => 'avail-request-form',
		'role'  => 'form',
		'route' =>'meetings.request.create'
	]) }}
	<h4>Request to meet with {{$availability->advisors()->first()->first_name}} {{$availability->advisors()->first()->last_name}} at <a href="{{$availability->locations()->first()->website}}">{{$availability->locations()->first()->name}}</a> on {{ $availability->days()->first()->prettyPrint() }} at {{ $availability->days()->first()->pivot->time }}.</h4>
	<div class="form-group">
		{{ Form::label('email', 'E-Mail Address') }}
		{{ Form::text('email', '', ['class' => 'form-control']) }}
	</div>

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', '', ['class' => 'form-control']) }}
	</div>

	<div class="form-group">
		{{ Form::label('phoneNumber', 'Phone Number') }}
		{{ Form::text('phonenumber', '', ['class' => 'form-control']) }}
	</div>
	<div class="form-group">
		{{ Form::label('notes', 'Message') }}
		{{ Form::textarea('notes', '', ['class' => 'form-control']) }}
	</div>
	{{ Form::button('Request', ['type' => 'submit', 'class' => 'col-xs-6 btn btn-success']) }}
	<button id="cancel-button" class="col-xs-6 btn btn-danger">Cancel</button>
	<input  type="hidden" name="availability_id" value="{{$availability->id}}">
	<input  type="hidden" name="advisor_id"      value="{{$availability->advisors()->first()->id}}">
	<input  type="hidden" name="day_id"          value="{{$availability->days()->first()->id}}">
	<input  type="hidden" name="service_id"      value="{{$availability->services()->first()->id}}">
	<input  type="hidden" name="location_id"     value="{{$availability->locations()->first()->id}}">
{{ Form::close() }}
