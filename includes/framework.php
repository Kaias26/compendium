<?php


	$folder = isset($_GET['folder'])
			? preg_replace("/\W+/", "", $_GET['folder'])
			: "home";
	$group = isset($_GET['group'])
			? preg_replace("/\W+/", "", $_GET['group'])
			: "";
	$subgroup = isset($_GET['subgroup'])
			? preg_replace("/\W+/", "", $_GET['subgroup'])
			: "";

	$page = "pages/" . $folder;
	if( $group != "" ) {
		$page .= "/" . $group;
	}

	$allowed_pages = [
		'pages/home',
		'pages/faq',
		'pages/grimoires/mage',
		'pages/grimoires/paladin',
		'pages/grimoires/pretre',
		'pages/pnj/invocations',
		'pages/pnj/bestiaire',
		'pages/pnj/pretires',
		'pages/pnj/traitsspeciaux',
		'pages/pj/competences',
		'pages/pj/coupsspeciaux',
		'pages/pj/traitsparticuliers',
		'pages/pj/ape',
		'pages/objets/armement',
		'pages/objets/protections',
		'pages/objets/accessoires',
		'pages/objets/materiel',
		'pages/objets/consommables',
		'pages/charactersheet/charactersheet',
		'pages/tools/generateur_bijoux',
		'pages/tools/generateurNoms',
		'pages/vault/login',
		'pages/vault/home',
		'pages/vault/account',
		'pages/vault/logout',
		'pages/vault/pwdChange',
		'pages/vault/pwdReset',
		'pages/vault/register'
	];

	if (!in_array($page, $allowed_pages)) {
		header('Location: /home');
		exit;
	}

	$page_title = "Naheulbeuk Online - Compendium";
	$page_desc = "Compendium des differents tableaux du JDR papier Le donjon de naheulbeuk. Compatible avec les fiches de personnages de la table de jeu en ligne Roll20.";
	$page_key = "Naheulbeuk,Compendium,roll20";

	/**************/
	/* Compendium */
	/**************/
	if( $folder == "grimoires" || $folder == "pnj" || $folder == "pj" || $folder == "objets" ) {
		$sql = "SELECT cg.title,cg.desc,cg.keywords, c.*, cf.key, cf.value
				FROM `compendium_group` as cg
				INNER JOIN `compendium` as c ON c.idGroup = cg.id
				INNER JOIN `compendium_fields` as cf ON cf.idCompendium = c.id
				WHERE `group` = :group
				AND `subgroup` = :subgroup
				ORDER BY name ASC";
		$params = [':group' => $group, ':subgroup' => $subgroup];
		try {
			$statement = $database->execute_query($sql, $params);
		} catch (PDOException $e) {
			$flashMessenger->set_flash_message('danger', 'Un problème est survenu lors de l\'accès aux données. Veuillez réessayer plus tard.');
			header('Location: /home');
			exit;
		}

		$aRows = [];
		$aRow = [];

		while( $row = $statement->fetch() ) {
			$aRow = "";

			if( isset( $aRows[ $row[ 'id' ] ] ) ) {
				$aRows[ $row[ 'id' ] ] = array_merge( $aRows[ $row[ 'id' ] ], array( $row[ 'key' ]  => $row[ 'value' ] ) );
			} else {
				// no data found, empty array
				$aRow = array(
					"id" => $row[ 'id' ],
					"name" => $row[ 'name' ],
					$row[ 'key' ] => $row[ 'value' ]
				);

				$aRows[ $row[ 'id' ] ] = $aRow;
			}

			$page_title = $row[ 'title' ];
			$page_desc = $row[ 'desc' ];
			$page_key = $row[ 'keywords' ];
		}
	}

	/***************/
	/*    Vault    */
	/***************/
	if( $folder == "vault" and $group == "home" ) {
		$user_id = $_SESSION[ 'user_id' ];

		$sql = "SELECT us.*
				FROM `user_sheets` as us
				WHERE `user_id` = :user_id
				AND `subgroup` = :subgroup
				ORDER BY updated ASC";
		$params = [':user_id' => $user_id, ':subgroup' => $subgroup];
		try {
			$statement = $database->execute_query($sql, $params);
		} catch (PDOException $e) {
			$flashMessenger->set_flash_message('danger', 'Un problème est survenu lors de l\'accès aux données. Veuillez réessayer plus tard.');
			header('Location: /home');
			exit;
		}
	}
?>