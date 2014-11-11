<h1>Hello {{ $advisorName }},</h1>

<p>This is a reminder that you have cancelled the following appointment with {{ $requestee_name }}:</p>
<ul>
	<li>{{ $availabilityTime }}</li>
	<li><a href="{{ $locationWebsite }}">{{ $locationName }}</a></li>
</ul>