$(document).ready( function () {	
	var count = [];
	var loop = [];
	var interval = [];
	var $el = [];
	var $first = [];
	var $last = [];


	$("ul.list-group-flush").each( function ( index ) {		
		count[index] = 0;
		loop[index] = Math.floor(Math.random() * 20) + 1;

		$el[index] = $( this );

		interval[index] = setInterval(() => {
			$first[index] = $el[index].children(":first");
			$last[index] = $el[index].children(":last");

			$first[index].slideUp( 50, function () {
				$last[index].after( $first[index] );
				$first[index].slideDown( 50 );
			});

			count[index] += 1;

			if( count[index] >= loop[index] ) {
				window.clearInterval(interval[index]);
			}
		}, 50);
	});

	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
	});

	setTimeout( function() { display_results(); }, 1500	);
});