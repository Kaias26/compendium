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

	$page_title = "Naheulbeuk Online - Compendium";
	$page_desc = "Compendium des differents tableaux du JDR papier Le donjon de naheulbeuk. Compatible avec les fiches de personnages de la table de jeu en ligne Roll20.";
	$page_key = "Naheulbeuk,Compendium,roll20";

	if( $folder == "grimoires" || $folder == "pnj" || $folder == "pj" || $folder == "objets" ) {
		$sql = "SELECT cg.title,cg.desc,cg.keywords, c.*, cf.key, cf.value
				FROM `compendium_group` as cg
				INNER JOIN `compendium` as c ON c.idGroup = cg.id
				INNER JOIN `compendium_fields` as cf ON cf.idCompendium = c.id
				WHERE `group` = '$group'
				AND `subgroup` = '$subgroup'
				ORDER BY name ASC";
		if (!$result = $conn->query($sql)) {
			echo "Désolé, le site web subit des problèmes.";
			echo "Error: " . $conn->error  . "\n";
			exit;
		}

		$aRows = [];
		$aRow = [];

		while( $row = $result->fetch_assoc() ) {
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
?>