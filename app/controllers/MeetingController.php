<?php

use \MyApp\Meeting;

class MeetingController extends BaseController {

	public function storeRequest()
	{
		$day_id          = Input::get('day_id');
		$service_id      = Input::get('service_id');
		$advisor_id      = Input::get('advisor_id');
		$location_id     = Input::get('location_id');
		$availability_id = Input::get('availability_id');

		$requestee_name  = Input::get('name');
		$requestee_email = Input::get('email');
		$requestee_notes = Input::get('notes');

		$meeting = Meeting::createMeetingRequest(
			$day_id,
			$service_id,
			$advisor_id,
			$location_id,
			$availability_id,
			$requestee_name,
			$requestee_email,
			$requestee_notes
		);

		return Redirect::route('home')->with('message', 'Request Created');
	}

	public function acceptRequest()
	{
		$meeting = Meeting::find(Input::get('meeting_id'));

		$meeting->acceptMeetingRequest();

		return Redirect::route('dashboard.index');
	}

	public function rejectRequest()
	{
		$meeting = Meeting::find(Input::get('meeting_id'));

		$meeting->declineMeetingRequest();

		return Redirect::route('dashboard.index');
	}
}