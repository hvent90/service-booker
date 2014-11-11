<h1>Hello {{ $requestee_name }},</h1>

<p>The following appointment has been cancelled due to unforseen circumstances with {{ $advisorName }}:</p>
<ul>
	<li>{{ $availabilityTime }}</li>
	<li><a href="{{ $locationWebsite }}">{{ $locationName }}</a></li>
</ul>
