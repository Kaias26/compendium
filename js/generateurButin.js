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

function display_results() {
	var _aResults = $("ul.list-group-flush");
	var _bijoux = $( _aResults[0] ).children(":first").html();
	var _qualite = $( _aResults[1] ).children(":first").html();
	var _matiere = $( _aResults[2] ).children(":first").html();
	var _gemme = $( _aResults[3] ).children(":first").html();
	var _desc = $( _aResults[3] ).children(":first").data( "desc" );
	var _gold = $( _aResults[3] ).children(":first").data( "gold" );
	var _ug = $( _aResults[4] ).children(":first").html();

	$( "#results" ).html( "Vous trouvez " + _bijoux + " " + _qualite + " " + _matiere + " serti " + _gemme + " (" +  _desc + "), de " +  _ug + " U.G" );
	$( "#price" ).html( "Valeur de la gemme seule : " + ( _ug * _gold ) + " P.O (" + _ug + " x " + _gold + ").<br>Bonus ou Malus possible en fonction de la qualité et la matière du bijoux." );
}