@extends('layouts.full-width-cxp')

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
	<div id="advisor-container" class="row">
		@if(Session::get('message'))
			<div class="col-sm-12">
				<div class="alert alert-warning" role="alert">{{ Session::get('message') }}</div>
			</div>
		@endif
		<div class="row col-sm-8 col-sm-offset-2 advisor-listing">
			<div class="row advisor-header">
			@if($advisor->profile_img)
				<img src="{{ $advisor->profile_img }}" class="img-responsive">
			@endif
			@if($advisor->linkedin)
				<a href="{{ $advisor->linkedin }}" target="_blank"><i class="fa fa-linkedin-square"></i></a>
			@endif
			{{ link_to_route('advisors.show', $advisor->first_name.' '.$advisor->last_name, [$advisor->id, $advisor->first_name, $advisor->last_name], ['class' => 'advisor-name']) }}
			<br />
			@foreach ($advisor->expertise()->get() as $exp)
				<button class="btn">{{$exp->title}}</button>
			@endforeach
				<p>{{nl2br($advisor->bio)}}</p>
			</div>
			@if ($advisor->availabilities()->first())
			<div class="row advisor-availability-listings">
				<h4 class="the-word-availabilities">Availabilities:</h4>
				<div class="row container-fix-avail">
				@foreach ($advisor->availabilities()->where('is_booked', '!==', '1')->where('expired', 0)->get()->sortBy(function($availZ) {
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
			@endif
	</div>
	</div>
</div>

@stop

@section('script')

<script>
$(document).ready(function() {
	// Not as awesome as I want it yet
	// $('.expertise-group-listing h3').hover(
	// 	function() {
	// 		$(this).toggleClass('expertise-group-listing-hover');
	// 	}, function() {
	// 		$(this).toggleClass('expertise-group-listing-hover');
	// 	}
	// );

	// Pull advisors based off of expertise expertise group
	// Expertise Group -> Expertises -> Advisors
	var expertiseGroupId;
	$('.expertise-group-listing a').click(function() {
		console.log('WOAa');
		$('#advisor-container').fadeOut(200, function() { $('#advisor-container').empty(); });
		expertiseGroupId = $(this).attr('id');
		$.ajax({
			type: "GET",
			url: "/expertise-groups/" + expertiseGroupId + "/advisors",
		})
		.done(function (payload) {
			console.log('WOA');
			$('#advisor-container').fadeOut(50, function() { $('#advisor-container').html(payload).fadeIn(200); });
		});

		return false;
	});

	$('body').on('click', '#cancel-button', function (event) {
		$('#advisor-container').fadeOut(200, function() { $('#advisor-container').empty(); });
		$.ajax({
			type: "GET",
			url: "/expertise-groups/" + expertiseGroupId + "/advisors",
		})
		.done(function (payload) {
			$('#advisor-container').html(payload).hide().fadeIn(200);
		});

		return false;
	});

	var availContentStorage;
	var id;
	var container;
	// Delegate hover to advisor avail hover effect
	$('body').on('click', '.advisor-avail-single-a', function( event ) {
		id = $(this).attr('id');
		container = $(this).parent().parent();
		availContentStorage = $(this).parent();
	    $.ajax({
	    	type: "GET",
	    	url: "/api/availabilities/request/" + id
	    })
	    .done(function (payload) {
	    	$('.the-word-availabilities').fadeOut(300);
	    	$(availContentStorage).fadeOut(300, function() {
	    		$(availContentStorage)
	    			.empty()
	    			.html(payload)
	    			.hide()
	    			.fadeIn(300);
	    	})
	    });
	});

	$('.exp-group-list a').click(function() {
		var expertiseGroupId = $(this).attr('id');
		$.ajax({
		  type: "GET",
		  url: "/expertise-groups/" + expertiseGroupId,
		  data: {
		  	expertiseGroup_id: expertiseGroupId
		  }
		})
		.done(function( payload ) {
		    $('#expertise-group-content').html(payload)
		    	.hide()
		    	.fadeIn(200);
		    $('#advisor-with-availability-content').find('div').animate({
		    	left: '100%'
		    },500, "easeInOutExpo", function() {
		    	$('#advisor-with-availability-content').empty();
		    });
		    $('.expertise-homepage p').each(function() {
		    	// $(this).hide();
		    });
		  });

		return false;
	});

	// $(document).on('mouseenter', '.expertise-homepage', function( event ) {
	// 	var expId = $(this).attr('id');
	// 	var h4 = $('h4', this);
	// 	var p = $('p', this);
	// 	console.log($('#' + expId).find('h4').html());
	//     $(h4).fadeOut(100, function(){
	//     	$(p).fadeIn(100);
	//     });
	// }).on('mouseleave', '.expertise-homepage', function( event ) {
	// 	var h4 = $('h4', this);
	// 	var p = $('p', this);
	// 	$(p).fadeOut(100, function() {
	// 		$(h4).fadeIn(100);
	// 	});
	// });

	$(document).on( 'click', '.expertise-homepage', function(){
		var expertiseId = $(this).attr('id');
		$.ajax({
		  type: "GET",
		  url: "/api/advisors/expertise",
		  data: {
		  	expertise_id: expertiseId
		  }
		})
		.done(function( payload ) {
			if ($('#advisor-with-availability-content').html() != '') {
				$('#advisor-with-availability-content').animate({
					left: "100%"
				},500, "easeInOutExpo", function() {
					return true;
				});
			}
		    $('#advisor-with-availability-content')
		    	.html(payload)
		    	.animate({
		    		left: "100%"
		    	}, 0)
		    	.animate({
		    		left: "0%"
		    	}, 500, "easeInOutExpo");
		    $('#advisor-with-availability-content form').each(function() {
		    	$(this).hide();
		    });
		});

		return false;
	});

	$(document).on('click', '.advisor-avail-single-a', function(event) {
		var availId = $(this).attr('id');
		var target = $(event.target);
		console.log(target.text());
		if (target.is('a')) {
			$(this).parent().parent()
				.toggleClass('row selected-avail', 500, "easeInOutExpo");
			$('#'+availId+'-form').fadeToggle(300);
			if(target.text() == 'Request') {
				target.text('Cancel')
					  .toggleClass('btn-info btn-danger');
			} else {
				target.text('Request')
					  .toggleClass('btn-info btn-danger');
			}
		}

		return false;

	});
});
</script>

@stop
