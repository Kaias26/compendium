<?php

	if( !isset( $_SESSION[ 'step' ] ) ) {
		// Premiere page
		$_SESSION[ 'step' ] = 1;

		$_SESSION[ 'post' ][ 'dice_courage' ] = '';
		$_SESSION[ 'post' ][ 'dice_intelligence' ] = '';
		$_SESSION[ 'post' ][ 'dice_charisme' ]= '';
		$_SESSION[ 'post' ][ 'dice_adresse' ]= '';
		$_SESSION[ 'post' ][ 'dice_force' ] = '';
	}	

	// Post du formulaire
	if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
		foreach( $_POST AS $key => $value ) {
			$_SESSION['post'][$key] = $value;
		}

		if( isset( $_POST[ 'btnNext' ] ) and $_SESSION[ 'step' ] < 5 ) {
			$_SESSION[ 'step' ] = $_SESSION[ 'step' ] + 1;
		}

		if( isset( $_POST[ 'btnBack' ] ) and $_SESSION[ 'step' ] > 1 ) {
			$_SESSION[ 'step' ] = $_SESSION[ 'step' ] - 1;
		}
	}
?>