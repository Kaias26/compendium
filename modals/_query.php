<?php
	include("../includes/config.php");

	$id = isset($_GET['id'])?$_GET['id']:0;

	$sql = "SELECT c.*, cf.key, cf.value
			FROM `compendium` as c
			INNER JOIN `compendium_fields` as cf ON cf.idCompendium = c.id
			WHERE c.id = :id
			ORDER BY name ASC";
	
	$statement = $database->execute_query($sql, [':id' => $id]);

	$aRows = [];

	while( $row = $statement->fetch() ) {
		$aRow = "";

		$rowValue = str_replace( "\n", "<br>", $row[ 'value' ] );

		if( isset( $aRows[ 0 ] ) ) {
			$aRows[ 0 ] = array_merge( $aRows[ 0 ], array( $row[ 'key' ]  => $rowValue ) );
		} else {
			// no data found, empty array
			$aRow = array(
				"id" => $row[ 'id' ],
				"name" => $row[ 'name' ],
				$row[ 'key' ] => $rowValue
			);

			$aRows[ 0 ] = $aRow;
		}
	}
?>