var dice = {
	sides: 6,
	bonus: 0,
	throw: 1,
	roll: function () {
		var randomNumber = 0;
		for( i = 0; i < this.throw; i++ ) {
			randomNumber += Math.floor(Math.random() * this.sides) + 1;
		}
		return randomNumber + this.bonus;
	}
}

//Prints dice roll to the page
function printNumber(number) {
	var placeholder = document.getElementById( 'dice_placeholder' );
	placeholder.innerHTML = number;
}

$(document).ready( function () {
	var $button = $( '#dice_button' );

	$button.on( 'click', function() {
		var x = 0;
		dice.throw = $(this).data( 'dicethrows' );
		dice.bonus = $(this).data( 'dicebonus' );
		dice.sides = $(this).data( 'dicesides' );

		var intervalID = setInterval(() => {
			result = dice.roll();	
			printNumber( result );

			if( ++x === 20 ) {
				window.clearInterval(intervalID);
			}
		}, 50);
	});

	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
	});

	$('input[data-checklimit]').on('change', function(evt) {
		var _limit = $(this).data( 'checklimit' );
		if($(this).siblings(':checked').length >= _limit) {
			this.checked = false;
		}
	});
});