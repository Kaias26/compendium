<?php

	$maxStep = 7;
	
	if( !isset( $_SESSION[ 'step' ] ) ) {
		// Premiere page
		$_SESSION[ 'step' ] = 1;

		// Step 1
		$_SESSION[ 'post' ][ 'dice_courage' ] = '';
		$_SESSION[ 'post' ][ 'dice_intelligence' ] = '';
		$_SESSION[ 'post' ][ 'dice_charisme' ]= '';
		$_SESSION[ 'post' ][ 'dice_adresse' ]= '';
		$_SESSION[ 'post' ][ 'dice_force' ] = '';

		// Step 2
		$_SESSION[ 'post' ][ 'origine' ] = -1;
		$_SESSION[ 'post' ][ 'metier' ] = -1;

		// Step 3
		$_SESSION[ 'post' ][ 'competences' ] = [];

		// Step 4
		$_SESSION[ 'post' ][ 'dice_pdt' ] = '';

		// Step 5
		$_SESSION[ 'post' ][ 'dice_or' ] = '';
		$_SESSION[ 'post' ][ 'dice_orBonus' ] = '';

		// Step 6
		
		// Step 7
		$_SESSION[ 'post' ][ 'attr_Personnage_Nom' ] = '';
		$_SESSION[ 'post' ][ 'attr_Personnage_Sex' ] = '';
		$_SESSION[ 'post' ][ 'attr_Personnage_Age' ] = '';
		$_SESSION[ 'post' ][ 'attr_Personnage_Taille' ] = '';
		$_SESSION[ 'post' ][ 'grimoire_mage' ] = '';
	}

	// Post du formulaire
	if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

		// Changement de classe et ou de métier
		if( ( isset( $_POST['origine'] ) and $_SESSION['post']['origine'] != $_POST['origine'] )
		 OR ( isset( $_POST['metier'] ) and $_SESSION['post']['metier'] != $_POST['metier'] ) ) {
			$_SESSION[ 'post' ][ 'competences' ] = [];
		}

		foreach( $_POST AS $key => $value ) {
			$_SESSION['post'][$key] = $value;
		}

		if( isset( $_POST[ 'btnStep' ] ) ) {
			$_SESSION[ 'step' ] = $_POST[ 'btnStep' ];
		}
	}

	if( $_SESSION[ 'step' ] == 3 ) {
		try {
			// Affichage des compétences de l'Origine 
			$origine_naissance_data = Database::createInClauseParams($aOrigines[$_SESSION['post']['origine']]->competencesNaissance, 'ori_naiss');
			$sql_origine = "SELECT c.id, c.name, cf.value
					FROM `compendium` as c
					INNER JOIN `compendium_fields` as cf ON cf.idCompendium = c.id
					WHERE c.id IN (" . $origine_naissance_data['placeholders'] . ")
					AND cf.key = 'effet'
					ORDER BY name ASC";
			$statement_origine = $database->execute_query($sql_origine, $origine_naissance_data['params']);
			
			// Affichage des compétences du Métier 
			$metier_naissance_data = Database::createInClauseParams($aJobs[$_SESSION['post']['metier']]->competencesNaissance, 'met_naiss');
			$params_metier = array_merge($metier_naissance_data['params'], $origine_naissance_data['params']);

			$sql_metier = "SELECT c.id, c.name, cf.value
					FROM `compendium` as c
					INNER JOIN `compendium_fields` as cf ON cf.idCompendium = c.id
					WHERE c.id IN (" . $metier_naissance_data['placeholders'] . ")
					AND c.id NOT IN (" . $origine_naissance_data['placeholders'] . ")
					AND cf.key = 'effet'
					ORDER BY name ASC";
			$statement_metier = $database->execute_query($sql_metier, $params_metier);

			// Affichage des compétences Au choix
			if ($aOrigines[$_SESSION['post']['origine']]->id == 0 && $aJobs[$_SESSION['post']['metier']]->id != 23) { // Humain
				$origine_auchoix_data = Database::createInClauseParams([0], 'ori_choix');
			} 
			else
			{
				$origine_auchoix_data = Database::createInClauseParams($aOrigines[$_SESSION['post']['origine']]->competencesAuChoix, 'ori_choix');
			}
			$metier_auchoix_data = Database::createInClauseParams($aJobs[$_SESSION['post']['metier']]->competencesAuChoix, 'met_choix');

			$not_in_combined_ids = array_merge($metier_naissance_data['ids'], $origine_naissance_data['ids']);
			$not_in_combined_ids = array_unique($not_in_combined_ids);
			$not_in_data = Database::createInClauseParams($not_in_combined_ids, 'not_in');			

			$combined_auchoix_ids = array_merge($origine_auchoix_data['ids'], $metier_auchoix_data['ids']);
			$combined_auchoix_ids = array_unique($combined_auchoix_ids);
			$auchoix_data = Database::createInClauseParams($combined_auchoix_ids, 'au_choix');

			$sql_auChoix = "SELECT c.id, c.name, cf.value
						FROM `compendium` as c
						INNER JOIN `compendium_fields` as cf ON cf.idCompendium = c.id
						WHERE c.id IN (" . $auchoix_data['placeholders'] . ")
						AND c.id NOT IN (" . $not_in_data['placeholders'] . ")
						AND cf.key = 'effet'
						ORDER BY name ASC";
			$params_auChoix = array_merge($auchoix_data['params'], $not_in_data['params']);
			$statement_auChoix = $database->execute_query($sql_auChoix, $params_auChoix);		
		} catch (PDOException $e) {
			$flashMessenger->set_flash_message('danger', 'Un problème est survenu lors de l\'accès aux données. Veuillez réessayer plus tard.');
			header('Location: /home');
			exit;
		}
	}

	if( $_SESSION[ 'step' ] == 7 )
	{
		// Points de vie
		$ev_origine = $aOrigines[ $_SESSION['post']['origine'] ]->ev[ 0 ];		
		$ev_metier_hasMod = $aJobs[ $_SESSION['post']['metier'] ]->ev[ 1 ];		

		if( $ev_metier_hasMod == "Fixe" ) {
			$ev_metier = $aJobs[ $_SESSION['post']['metier'] ]->ev[ 0 ];

			// Check si le mod s'applique à l'origine du joueur
			$ev_metier_modOrigines = $aJobs[ $_SESSION['post']['origine'] ]->ev[ 2 ];
			if( strpos( $ev_metier_modOrigines, $aJobs[ $_SESSION['post']['origine'] ]->label ) !== false or $ev_metier_modOrigines == "" ) {
				// On remplace les EV d'origine par les EV du métier
				$_SESSION[ 'post' ][ 'attr_EV_max' ] = $ev_metier;
			} else {
				// Les EV Origine ne sont pas remplacés par les EV métiers, on applique un Mod.
				$ev_metier_mod = $aJobs[ $_SESSION['post']['origine'] ]->ev[ 3 ];
				
				// On applique un mod % 
				if( strpos( $ev_metier_mod, '%' ) !== false )
				{
					$mod = ceil( $ev_origine * ( floatval( $ev_metier_mod ) / 100 ) );
					$_SESSION[ 'post' ][ 'attr_EV_max' ] = intval( $ev_origine + $mod );
				} else {
					$_SESSION[ 'post' ][ 'attr_EV_max' ] = intval( $ev_origine + $ev_metier_mod );
				}
			}
		} else if ( $ev_metier_hasMod == "origine+" ) {
			$ev_metier = $aJobs[ $_SESSION['post']['metier'] ]->ev[ 0 ];
			$_SESSION[ 'post' ][ 'attr_EV_max' ] = $ev_origine + $ev_metier;
		} else {
			$_SESSION[ 'post' ][ 'attr_EV_max' ] = $ev_origine;
		}

		// Points de mana
		$_SESSION[ 'post' ][ 'attr_EA_max' ] = $aJobs[ $_SESSION['post']['metier'] ]->ea[ 0 ];

		// Attaque
		$at_origine = $aOrigines[ $_SESSION['post']['origine'] ]->at[ 0 ];		
		$at_metier_hasMod = $aJobs[ $_SESSION['post']['metier'] ]->at[ 1 ];

		if( $at_metier_hasMod == "Fixe" ) {
			$at_metier = $aJobs[ $_SESSION['post']['metier'] ]->at[ 0 ];

			$_SESSION[ 'post' ][ 'attr_Stats_Attaque' ] = $at_metier;
		} else {
			$_SESSION[ 'post' ][ 'attr_Stats_Attaque' ] = $at_origine;
		}

		// Parade
		$prd_origine = $aOrigines[ $_SESSION['post']['origine'] ]->prd[ 0 ];		
		$prd_metier_hasMod = $aJobs[ $_SESSION['post']['metier'] ]->prd[ 1 ];

		if( $prd_metier_hasMod == "Fixe" ) {
			$prd_metier = $aJobs[ $_SESSION['post']['metier'] ]->prd[ 0 ];

			$_SESSION[ 'post' ][ 'attr_Stats_Parade' ] = $prd_metier;
		} else {
			$_SESSION[ 'post' ][ 'attr_Stats_Parade' ] = $prd_origine;
		}
		
		$_SESSION[ 'post' ][ 'attr_Stats_ResiMagie' ] = ceil( ( $_SESSION[ 'post' ][ 'dice_courage' ] + $_SESSION[ 'post' ][ 'dice_intelligence' ] + $_SESSION[ 'post' ][ 'dice_force' ] ) / 3 );
		$_SESSION[ 'post' ][ 'attr_Stats_MagiePhy' ] = ceil( ( $_SESSION[ 'post' ][ 'dice_intelligence' ] + $_SESSION[ 'post' ][ 'dice_adresse' ] ) / 2 );
		$_SESSION[ 'post' ][ 'attr_Stats_MagiePsy' ] = ceil( ( $_SESSION[ 'post' ][ 'dice_intelligence' ] + $_SESSION[ 'post' ][ 'dice_charisme' ] ) / 2 );

		$_SESSION[ 'post' ][ 'attr_Stats_Courage' ] = $_SESSION[ 'post' ][ 'dice_courage' ];
		$_SESSION[ 'post' ][ 'attr_Stats_Intelligence' ] = $_SESSION[ 'post' ][ 'dice_intelligence' ];
		$_SESSION[ 'post' ][ 'attr_Stats_Charisme' ] = $_SESSION[ 'post' ][ 'dice_charisme' ];
		$_SESSION[ 'post' ][ 'attr_Stats_Adresse' ] = $_SESSION[ 'post' ][ 'dice_adresse' ];
		$_SESSION[ 'post' ][ 'attr_Stats_Force' ] = $_SESSION[ 'post' ][ 'dice_force' ];
	}
?>