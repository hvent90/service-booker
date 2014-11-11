@extends('layouts.full-width')

@section('content')
<div class="container">
	<div class="row">
		<div class="heading-text col-sm-12">
			<h2 style="display: inline-block;">Advance Your Idea. Faster.</h2><img src="/img/wsllogo.jpg" class="img-responsive" style="display: inline-block">
			<h4>Walnut St. Labs Office Hours is a joint project between Walnut St. Labs and the Chester County Economic Development Council that offers innovators the opportunity to gain expert advice from industry and domain experts from Chester County and Southeastern PA.</h4>
		</div>
	</div>
	<div class="row col-sm-12 expertise-group-listing">
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
			url: "expertise-groups/" + expertiseGroupId + "/advisors",
		})
		.done(function (payload) {
			console.log('WOA');
			$('#advisor-container').html(payload).fadeOut(0, function() { $('#advisor-container').fadeIn(200); });
		});

		return false;
	});

	$('body').on('click', '#cancel-button', function (event) {
		$('#advisor-container').fadeOut(200, function() { $('#advisor-container').empty(); });
		$.ajax({
			type: "GET",
			url: "expertise-groups/" + expertiseGroupId + "/advisors",
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
	    	url: "api/availabilities/request/" + id
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
		  url: "expertise-groups/" + expertiseGroupId,
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
		  url: "api/advisors/expertise",
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
