<h1>Hello {{ $advisorName }},</h1>

<p>This is a reminder that you are scheduled to meet with:</p>
<ul>
	<li>Name: {{ $requestee_name }}</li>
	<li>Phone: {{ $requestee_phone }}</li>
	<li>Email: {{ $requestee_email }}</li>
	<li>Notes: {{ $requestee_notes }}</li>
</ul>
<p>You are scheduled for the following time:</p>
<ul>
	<li>{{ $availabilityTime }}</li>
	<li><a href="{{ $locationWebsite }}">{{ $locationName }}</a></li>
</ul>