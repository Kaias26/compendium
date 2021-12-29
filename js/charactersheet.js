var dice = {
	sides: 6,
	roll: function () {
		var randomNumber = Math.floor(Math.random() * this.sides) + 1;
		return randomNumber;
	}
}

//Prints dice roll to the page
function printNumber(number) {
	var placeholder = document.getElementById( 'dice_placeholder' );
	placeholder.innerHTML = number + 7;
}

$(document).ready( function () {
	var $button = $( '#dice_button' );

	$button.on( 'click', function() {
		var x = 0;
		var intervalID = setInterval(() => {
			var result = dice.roll();
			printNumber(result);

			if( ++x === 20 ) {
				window.clearInterval(intervalID);
			}
		}, 50);
	});

	var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
	var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
		return new bootstrap.Tooltip(tooltipTriggerEl)
	});
});