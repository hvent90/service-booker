@extends('layouts.full-width')

@section('content')
<div class="container">
	<div class="row">
		<div class="heading-text col-sm-12">
			<a href="http://walnutstlabs.com"><img src="/img/wsllogo.jpg" ></a>
			<a href="http://www.i2npa.org/"><img src="/img/i2n.png" ></a>
			<br />
			<h2>Advance Your Idea. Faster.</h2>
			<h4>Office Hours is a joint project between <span id="wsl-tag"><a href="http://walnutstlabs.com">Walnut St. Labs</a></span> and the <span id="i2n-tag"><a href="http://www.i2npa.org/">Ideas x Innovation Network</a></span> that offers innovators the opportunity to gain expert advice from industry and domain experts from Chester County and Southeastern PA.</h4>
		</div>
	</div>
	<div class="row col-sm-12 expertise-group-listing">
		<a href="#" id="all">
			<h3 class="btn btn-info">All</h3>
		</a>
		@foreach ($expertiseGroups as $expG)
			<a href="#" id="{{ $expG->id }}">
				<h3 class="btn btn-info">{{ $expG->name }}</h3>
			</a>
		@endforeach
	</div>
	<div class="row col-sm-12">
		<h2>The advisor is available for a remote consultation.</h2>
	</div>
</div>
