<h1>Hello {{ $advisorName }},</h1>

<p>You have been requested to fulfill the following availability:</p>
<ul>
	<li>{{ $availabilityTime }}</li>
	<li><a href="{{ $locationWebsite }}">{{ $locationName }}</a></li>
</ul>
<p>The request has been made by:</p>
<ul>
	<li>Name: {{ $requestee_name }}</li>
	<li>Phone: {{ $requestee_phone }}</li>
	<li>Email: {{ $requestee_email }}</li>
	<li>Notes: {{ $requestee_notes }}</li>
</ul>