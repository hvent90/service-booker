@extends('layouts.full-width')

@section('content')

<div class="row">
	<div class="heading-text col-sm-12">
		<h2>Get Advice. Free.</h2>
	</div>
</div>
<div class="row">
	<div class="exp-group-list col-sm-2">
		<ul>
		@foreach ($expertiseGroups as $expG)
			<li>
				<a href="#" id="{{ $expG->id }}">{{ $expG->name }}</a>
			</li>
		@endforeach
		</ul>
	</div>
	<div id="expertise-group-content" class="col-sm-4">
	</div>
	<div id="advisor-with-availability-content" class="col-sm-6"></div>
</div>

@stop

@section('script')

<script>
$(document).ready(function() {
	$('.exp-group-list a').click(function() {
		var expertiseGroupId = $(this).attr('id');+
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

	$(document).on('click', '.advisor-avail-single', function(event) {
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