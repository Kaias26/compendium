<?php

	function getObjectById($id, $aArray) {
		foreach ($aArray as $oClass) {
			if ($oClass->id == $id) {
				return $oClass;
			}
		}
		return null;
	}

	$maxStep = 8;
	
	if( !isset( $_SESSION[ 'step' ] ) ) {
		// Premiere page
		$_SESSION[ 'step' ] = 1;
		$_SESSION[ 'max_step_reached' ] = 1;

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
		$_SESSION[ 'post' ][ 'dice_or' ] = 0;
		$_SESSION[ 'post' ][ 'dice_orBonus' ] = 0;
		$_SESSION[ 'post' ][ 'total_or' ] = 0;

		// Step 6
		
		// Step 7
		$_SESSION[ 'post' ][ 'attr_Personnage_Nom' ] = '';
		$_SESSION[ 'post' ][ 'attr_Personnage_Sex' ] = '';
		$_SESSION[ 'post' ][ 'attr_Personnage_Age' ] = '';
		$_SESSION[ 'post' ][ 'attr_Personnage_Taille' ] = '';
		$_SESSION[ 'post' ][ 'attr_Personnage_Poids' ] = '';
		$_SESSION[ 'post' ][ 'bonus_adresse' ] = "";
		$_SESSION[ 'post' ][ 'malus_adresse' ] = "";
		$_SESSION[ 'post' ][ 'grimoire_mage' ] = '';
		$_SESSION[ 'post' ][ 'grimoire_pretre' ] = "";
		$_SESSION[ 'post' ][ 'malus_ogre_at' ] = 0;
		$_SESSION[ 'post' ][ 'malus_ogre_prd' ] = 0;
		$_SESSION[ 'post' ][ 'malus_ranger' ] = "";
		$_SESSION[ 'post' ][ 'bonus_ranger' ] = "";
		$_SESSION[ 'post' ][ 'malus_marchand' ] = "";
		$_SESSION[ 'post' ][ 'bonus_marchand' ] = "";
		$_SESSION[ 'post' ][ 'malus_ingenieur' ] = "";
		$_SESSION[ 'post' ][ 'bonus_ingenieur' ] = "";
	}

	// Gestion du step par querystring
	if (isset($_GET['step'])) {
		$step = intval($_GET['step']);
		if ($step >= 1 && $step <= $_SESSION['max_step_reached']) {
			$_SESSION['step'] = $step;
		}
	}

	// Post du formulaire
	if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

		// Changement de classe et ou de métier
		if( ( isset( $_POST['origine'] ) and $_SESSION['post']['origine'] != $_POST['origine'] )
		 OR ( isset( $_POST['metier'] ) and $_SESSION['post']['metier'] != $_POST['metier'] ) ) {
			$_SESSION[ 'post' ][ 'competences' ] = [];
			$_SESSION[ 'max_step_reached' ] = 3;
		}

		// Changement de Gold
		if( ( isset( $_POST['dice_or'] ) and $_SESSION['post']['dice_or'] != $_POST['dice_or'] )
		 OR ( isset( $_POST['dice_orBonus'] ) and $_SESSION['post']['dice_orBonus'] != $_POST['dice_orBonus'] ) ) {
			$_SESSION[ 'post' ][ 'total_or' ] = null;
			$_SESSION[ 'post' ][ 'gold_arme' ] = null;
			$_SESSION[ 'post' ][ 'gold_protection' ] = null;
			$_SESSION[ 'post' ][ 'gold_materiel' ] = null;
		}

		foreach( $_POST AS $key => $value ) {
			$_SESSION['post'][$key] = $value;
		}

		// --- Origine ET Métier ---		
		if (isset($_SESSION['post']['metier']) && in_array($_SESSION['post']['metier'], $special_ids)) {
			// If a special metier is chosen, force the origin to match.
			$_SESSION['post']['origine'] = $_SESSION['post']['metier'];
		}


		// Handle inventory data from step 6
		if (isset($_POST['inventaire'])) {
			$_SESSION['post']['inventaire_final'] = [];
			foreach ($_POST['inventaire'] as $category => $dataString) {
				if (!empty($dataString)) {
					$items = explode(',', $dataString);
					foreach ($items as $itemString) {
						list($itemId, $quantity) = explode(':', $itemString);
						$_SESSION['post']['inventaire_final'][$category][$itemId] = [
							'quantity' => (int)$quantity
						];
					}
				}
			}
		}

		// Save final gold amounts from step 6
		if (isset($_POST['gold_armes_final'])) {
			$_SESSION['post']['gold_arme'] = floatval($_POST['gold_armes_final']);
		}
		if (isset($_POST['gold_protections_final'])) {
			$_SESSION['post']['gold_protection'] = floatval($_POST['gold_protections_final']);
		}
		if (isset($_POST['gold_materiel'])) {
			$_SESSION['post']['gold_materiel'] = floatval($_POST['gold_materiel_final']);
		}

		if( isset( $_POST[ 'btnStep' ] ) ) {
			$_SESSION[ 'step' ] = $_POST[ 'btnStep' ];
		}
	}

	// Met à jour le pas maximum atteint
	if ($_SESSION['step'] > $_SESSION['max_step_reached']) {
		$_SESSION['max_step_reached'] = $_SESSION['step'];
	}

	if( isset($_SESSION['post']['origine'])) {
		$oCurrentOrigine = getObjectById($_SESSION['post']['origine'], $aOrigines);
	}
	if( isset($_SESSION['post']['metier'])) {
		$oCurrentMetier = getObjectById($_SESSION['post']['metier'], $aJobs);
	}

	if( $_SESSION[ 'step' ] == 3 ) {
		try {
			// Affichage des compétences de l'Origine 
			$origine_naissance_data = Database::createInClauseParams($oCurrentOrigine->competencesNaissance, 'ori_naiss');
			$sql_origine = "SELECT c.id, c.name, cf.value
					FROM `compendium` as c
					INNER JOIN `compendium_fields` as cf ON cf.idCompendium = c.id
					WHERE c.id IN (" . $origine_naissance_data['placeholders'] . ")
					AND cf.key = 'effet'
					ORDER BY name ASC";
			$statement_origine = $database->execute_query($sql_origine, $origine_naissance_data['params']);
			
			// Affichage des compétences du Métier 
			$metier_naissance_data = Database::createInClauseParams($oCurrentMetier->competencesNaissance, 'met_naiss');
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
			if ($oCurrentOrigine->id == 0 && $oCurrentMetier->id != 23) { // Humain
				$origine_auchoix_data = Database::createInClauseParams([0], 'ori_choix');
			} 
			else
			{
				$origine_auchoix_data = Database::createInClauseParams($oCurrentOrigine->competencesAuChoix, 'ori_choix');
			}
			$metier_auchoix_data = Database::createInClauseParams($oCurrentMetier->competencesAuChoix, 'met_choix');

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

	if( $_SESSION[ 'step' ] == 6 ) {
		$_SESSION[ 'post' ][ 'total_or' ] = intval($_SESSION[ 'post' ][ 'dice_or' ]) + intval($_SESSION[ 'post' ][ 'dice_orBonus' ]);
		$_SESSION['post']['gold_arme'] = $_SESSION['post']['gold_arme'] ?? $_SESSION[ 'post' ][ 'total_or' ];
		$_SESSION['post']['gold_protection'] = $_SESSION['post']['gold_protection'] ?? $_SESSION[ 'post' ][ 'total_or' ];
		$_SESSION['post']['gold_materiel'] = $_SESSION['post']['gold_materiel'] ?? $_SESSION[ 'post' ][ 'total_or' ];

		$cacheFile = __DIR__ . '/../../cache/items_by_category.json';
		$cacheLifetime = 3600; // Cache for 1 hour (in seconds)

		$itemsByCategory = [];

		// Check if cache file exists and is still fresh
		if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < $cacheLifetime)) {
			// Read from cache
			$itemsByCategory = json_decode(file_get_contents($cacheFile), true);
		} else {
			// Cache is stale or doesn't exist, fetch from DB and refresh cache
			try {
				$db = Database::getInstance();
				$itemsByCategory['armes'] = $db->fetch_items_by_category('armement');
				$itemsByCategory['protections'] = $db->fetch_items_by_category('protections');
				$itemsByCategory['materiel'] = $db->fetch_items_by_category('materiel');

				// Write to cache file
				file_put_contents($cacheFile, json_encode($itemsByCategory));

			} catch (Exception $e) {
				$_SESSION['error_message'] = "Erreur lors de la préparation de l'étape 6. " . $e->getMessage();
				error_log($e->getMessage());
				// Fallback to empty arrays if DB fetch fails
				$itemsByCategory['armes'] = [];
				$itemsByCategory['protections'] = [];
				$itemsByCategory['materiel'] = [];
			}
		}

		// Assign to variables used in step6.php
		$armes = $itemsByCategory['armes'] ?? [];
		$protections = $itemsByCategory['protections'] ?? [];
		$materiel = $itemsByCategory['materiel'] ?? [];

		$gold_armes = $_SESSION['post']['gold_arme'] ?? $_SESSION[ 'post' ][ 'total_or' ];
		$gold_protections = $_SESSION['post']['gold_protection'] ?? $_SESSION[ 'post' ][ 'total_or' ];
		$gold_materiel = $_SESSION['post']['gold_materiel'] ?? $_SESSION[ 'post' ][ 'total_or' ];
	}

	if( $_SESSION[ 'step' ] == 7 )
	{
	}

	if( $_SESSION[ 'step' ] == 8 )
	{
		// Points de vie
		$ev_origine = $oCurrentOrigine->ev[ 0 ];		
		$ev_metier_hasMod = $oCurrentMetier->ev[ 1 ];		

		if( $ev_metier_hasMod == "Fixe" ) {
			$ev_metier = $oCurrentMetier->ev[ 0 ];

			// Check si le mod s'applique à l'origine du joueur
			$ev_metier_modOrigines = $oCurrentMetier->ev[ 2 ];
			if( strpos( $ev_metier_modOrigines, $oCurrentOrigine->label ) !== false or $ev_metier_modOrigines == "" ) {
				// On remplace les EV d'origine par les EV du métier
				$_SESSION[ 'post' ][ 'attr_EV_max' ] = $ev_metier;
			} else {
				// Les EV Origine ne sont pas remplacés par les EV métiers, on applique un Mod.
				$ev_metier_mod = $oCurrentMetier->ev[ 3 ];
				
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
			$ev_metier = $oCurrentMetier->ev[ 0 ];
			$_SESSION[ 'post' ][ 'attr_EV_max' ] = $ev_origine + $ev_metier;
		} else {
			$_SESSION[ 'post' ][ 'attr_EV_max' ] = $ev_origine;
		}

		// Points de mana
		$_SESSION[ 'post' ][ 'attr_EA_max' ] = $oCurrentMetier->ea[ 0 ];

		// Attaque
		$at_origine = $oCurrentOrigine->at[ 0 ];		
		$at_metier_hasMod = $oCurrentMetier->at[ 1 ];

		if( $at_metier_hasMod == "Fixe" ) {
			$at_metier = $oCurrentMetier->at[ 0 ];

			$_SESSION[ 'post' ][ 'attr_Stats_Attaque' ] = $at_metier;
		} else {
			$_SESSION[ 'post' ][ 'attr_Stats_Attaque' ] = $at_origine;
		}

		// Parade
		$prd_origine = $oCurrentOrigine->prd[ 0 ];		
		$prd_metier_hasMod = $oCurrentMetier->prd[ 1 ];

		if( $prd_metier_hasMod == "Fixe" ) {
			$prd_metier = $oCurrentMetier->prd[ 0 ];

			$_SESSION[ 'post' ][ 'attr_Stats_Parade' ] = $prd_metier;
		} else {
			$_SESSION[ 'post' ][ 'attr_Stats_Parade' ] = $prd_origine;
		}		

		$_SESSION[ 'post' ][ 'attr_Stats_Courage' ] = $_SESSION[ 'post' ][ 'dice_courage' ];
		$_SESSION[ 'post' ][ 'attr_Stats_Intelligence' ] = $_SESSION[ 'post' ][ 'dice_intelligence' ];
		$_SESSION[ 'post' ][ 'attr_Stats_Charisme' ] = $_SESSION[ 'post' ][ 'dice_charisme' ];
		$_SESSION[ 'post' ][ 'attr_Stats_Adresse' ] = $_SESSION[ 'post' ][ 'dice_adresse' ];
		$_SESSION[ 'post' ][ 'attr_Stats_Force' ] = $_SESSION[ 'post' ][ 'dice_force' ];

		// Apply malus/bonus from adresse
		if (isset($_SESSION['post']['malus_adress'])) {
			$targetStat = $_SESSION['post']['malus_adress'];
			if (isset($_SESSION['post'][$targetStat])) {
				$_SESSION['post'][$targetStat] -= 1;
			}
		}

		if (isset($_SESSION['post']['bonus_adresse'])) {
			$targetStat = $_SESSION['post']['bonus_adresse'];
			if (isset($_SESSION['post'][$targetStat])) {
				$_SESSION['post'][$targetStat] += 1;
			}
		}

		// Marchand
		if ($oCurrentMetier->id == 9) { 
			$malus_marchand_stat = isset($_SESSION['post']['malus_marchand']) ? $_SESSION['post']['malus_marchand'] : '';
			$bonus_marchand_stat = isset($_SESSION['post']['bonus_marchand']) ? $_SESSION['post']['bonus_marchand'] : '';

			if (!empty($malus_marchand_stat)) {
				$targetStat = $malus_marchand_stat;
				if (isset($_SESSION['post'][$targetStat])) {
					$_SESSION['post'][$targetStat] -= 1;
				}
			}

			if (!empty($bonus_marchand_stat)) {
				$_SESSION['post']['attr_Stats_' . ucfirst($bonus_marchand_stat)] += 1;
			}
		}

		// Ingénieur
		if ($oCurrentMetier->id == 10) { 
			$malus_ingenieur_stat = isset($_SESSION['post']['malus_ingenieur']) ? $_SESSION['post']['malus_ingenieur'] : '';
			$bonus_ingenieur_stat = isset($_SESSION['post']['bonus_ingenieur']) ? $_SESSION['post']['bonus_ingenieur'] : '';

			if (!empty($malus_ingenieur_stat)) {
				$targetStat = $malus_ingenieur_stat;
				if (isset($_SESSION['post'][$targetStat])) {
					$_SESSION['post'][$targetStat] -= 1;
				}
			}

			if (!empty($bonus_ingenieur_stat)) {
				$_SESSION['post']['attr_Stats_' . ucfirst($bonus_ingenieur_stat)] += 1;
			}
		}

		// Ogre
		if ($oCurrentOrigine->id == 10) { 
			$malus_at = isset($_SESSION['post']['malus_ogre_at']) ? intval($_SESSION['post']['malus_ogre_at']) : 0;
			$malus_prd = isset($_SESSION['post']['malus_ogre_prd']) ? intval($_SESSION['post']['malus_ogre_prd']) : 0;

			$_SESSION['post']['attr_Stats_Attaque'] -= $malus_at;
			$_SESSION['post']['attr_Stats_Parade'] -= $malus_prd;
		}

		// Ranger
		if ($oCurrentMetier->id == 6) { 
			$malus_ranger_stat = isset($_SESSION['post']['malus_ranger']) ? $_SESSION['post']['malus_ranger'] : '';
			$bonus_ranger_stat = isset($_SESSION['post']['bonus_ranger']) ? $_SESSION['post']['bonus_ranger'] : '';

			if (!empty($malus_ranger_stat)) {
				$_SESSION['post']['attr_Stats_' . ucfirst($malus_ranger_stat)] -= 1;
			}
			if (!empty($bonus_ranger_stat)) {
				$_SESSION['post']['attr_Stats_' . ucfirst($bonus_ranger_stat)] += 1;
			}
		}

		// Competences
		$playerCompetences = [];
		if (!empty($_SESSION['post']['competences'])) {
			try {
				$competences_data = Database::createInClauseParams($_SESSION['post']['competences'], 'comp_ids');
				$sql_competences = "SELECT c.id, c.name, cf.value
					FROM `compendium` as c
					INNER JOIN `compendium_fields` as cf ON cf.idCompendium = c.id
					WHERE c.id IN (" . $competences_data['placeholders'] . ")
					AND cf.key = 'effet'
					ORDER BY name ASC";
				$statement_competences = $database->execute_query($sql_competences, $competences_data['params']);
				$playerCompetences = $statement_competences->fetchAll(PDO::FETCH_ASSOC);
			} catch (PDOException $e) {
				error_log("Error fetching player competences: " . $e->getMessage());
				$flashMessenger->set_flash_message('danger', 'Un problème est survenu lors de la récupération des compétences. Veuillez réessayer plus tard.');
			}
		}

		$_SESSION[ 'post' ][ 'attr_Stats_ResiMagie' ] = ceil( ( $_SESSION[ 'post' ][ 'attr_Stats_Courage' ] + $_SESSION[ 'post' ][ 'attr_Stats_Intelligence' ] + $_SESSION[ 'post' ][ 'attr_Stats_Force' ] ) / 3 );
		$_SESSION[ 'post' ][ 'attr_Stats_MagiePhy' ] = ceil( ( $_SESSION[ 'post' ][ 'attr_Stats_Intelligence' ] + $_SESSION[ 'post' ][ 'attr_Stats_Adresse' ] ) / 2 );
		$_SESSION[ 'post' ][ 'attr_Stats_MagiePsy' ] = ceil( ( $_SESSION[ 'post' ][ 'attr_Stats_Intelligence' ] + $_SESSION[ 'post' ][ 'attr_Stats_Charisme' ] ) / 2 );
	}
?>