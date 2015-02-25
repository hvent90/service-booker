<h1>Hello {{ $requestee_name }},</h1>

<p>This is a reminder that you have an appointment with {{ $advisorName }} soon:</p>
<ul>
	<li>{{ $availabilityTime }}</li>
	<li><a href="{{ $locationWebsite }}">{{ $locationName }}</a></li>
</ul>
