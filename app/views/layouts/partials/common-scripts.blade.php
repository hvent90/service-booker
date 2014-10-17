<script>
$(document).ready(function() {

	$('#nav-log-out').click(function(e) {
		$('html').prepend('<div id="popup-logout-background">{{ link_to_route('advisors.logout', 'Confirm', null,['id' => 'popup-logout']) }}</div>');

		$('#popup-logout-background').click(function() {
			$(this).remove();
			console.log('test');
		});

		$('#popup-logout').stop().animate({
			left: '+=80%',
		},
			300,
			'easeInSine'
		); // end animate

		return false;
	});

});
</script>
