<?php

	if( !isset( $_SESSION[ 'step' ] ) ) {
		// Premiere page
		$_SESSION[ 'step' ] = 1;

		$_SESSION[ 'post' ][ 'dice_courage' ] = '';
		$_SESSION[ 'post' ][ 'dice_intelligence' ] = '';
		$_SESSION[ 'post' ][ 'dice_charisme' ]= '';
		$_SESSION[ 'post' ][ 'dice_adresse' ]= '';
		$_SESSION[ 'post' ][ 'dice_force' ] = '';

		$_SESSION[ 'post' ][ 'origine' ] = -1;
		$_SESSION[ 'post' ][ 'metier' ] = -1;

		$_SESSION[ 'post' ][ 'competences' ] = '';
	}	

	// Post du formulaire
	if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {		
		foreach( $_POST AS $key => $value ) {
			$_SESSION['post'][$key] = $value;
		}

		if( isset( $_POST[ 'btnStep' ] ) ) {
			$_SESSION[ 'step' ] = $_POST[ 'btnStep' ];
		}
	}

	if( $_SESSION[ 'step' ] == 3 ) {
		$origine_id_naissance = $aOrigines[ $_SESSION['post']['origine'] ]->competencesNaissance;
		$origine_id_auChoix = $aOrigines[ $_SESSION['post']['origine'] ]->competencesAuChoix;

		// Affichage des compétences de l'Origine 
		$sql = "SELECT c.name, cf.value
				FROM `compendium` as c
				INNER JOIN `compendium_fields` as cf ON cf.idCompendium = c.id
				WHERE c.id in ( $origine_id_naissance )
                and cf.key = 'effet'
				ORDER BY name ASC";
		if (!$result_origine = $conn->query($sql)) {
			echo "Désolé, le site web subit des problèmes.";
			echo "Error: " . $conn->error  . "\n";
			exit;
		}

		$metier_id_naissance = $aJobs[ $_SESSION['post']['metier'] ]->competencesNaissance;
		$metier_id_auChoix = $aJobs[ $_SESSION['post']['metier'] ]->competencesAuChoix;

		// Affichage des compétences du Métier 
		$sql = "SELECT c.name, cf.value
				FROM `compendium` as c
				INNER JOIN `compendium_fields` as cf ON cf.idCompendium = c.id
				WHERE c.id in ( $metier_id_naissance )
				and c.id not in ( $origine_id_naissance )
                and cf.key = 'effet'
				ORDER BY name ASC";
		if (!$result_metier = $conn->query($sql)) {
			echo "Désolé, le site web subit des problèmes.";
			echo "Error: " . $conn->error  . "\n";
			exit;
		}
		
		// Affichage des compétences Au choix
		if( $aOrigines[ $_SESSION['post']['origine'] ]->id == 0 and $aJobs[ $_SESSION['post']['metier'] ]->id != 23 ) {			
			$origine_id_auChoix = 0;
		}

		$sql = "SELECT c.id, c.name, cf.value
				FROM `compendium` as c
				INNER JOIN `compendium_fields` as cf ON cf.idCompendium = c.id
				WHERE c.id in ( $origine_id_auChoix, $metier_id_auChoix )
				and c.id not in ( $metier_id_naissance,$origine_id_naissance )
                and cf.key = 'effet'
				ORDER BY name ASC";				
		if (!$result_auChoix = $conn->query($sql)) {
			echo "Désolé, le site web subit des problèmes.";
			echo "Error: " . $conn->error  . "\n";
			exit;
		}
	}
?>