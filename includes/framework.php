<?php

	function set_flash_message($type, $message) {
		$_SESSION['flash_messages'][] = ['type' => $type, 'message' => $message];
	}

	function display_flash_messages() {
		$output = '';
		if (isset($_SESSION['flash_messages'])) {
			foreach ($_SESSION['flash_messages'] as $flash_message) {
				$type = $flash_message['type'];
				$message = $flash_message['message'];
				$icon = ($type == 'success') ? '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>' : '<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>';
				$output .= "<div class=\"alert alert-" . $type . " d-flex align-items-center\" role=\"alert\">
"
					."<svg xmlns=\"http://www.w3.org/2000/svg\" class=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" viewBox=\"0 0 16 16\" fill=\"currentColor\" role=\"img\" aria-label=\"" . $type . ":\">
"
					. $icon
					."</svg>
"
					."<div>" . $message . "</div>
"
				."</div>";
			}
		}
		return $output;
	}

	function clear_flash_messages() {
		unset($_SESSION['flash_messages']);
	}

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
		'pages/generateurButin/bijoux',
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
		$statement = $database->execute_query($sql, $params);

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
		$statement = $database->execute_query($sql, $params);
	}
?>