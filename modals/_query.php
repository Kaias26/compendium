<?php
	include("../includes/config.php");

	$id = isset($_GET['id'])?$_GET['id']:0;

	mysqli_set_charset( $conn,'utf8' );
	$sql = "SELECT c.*, cf.key, cf.value
			FROM `compendium` as c
			INNER JOIN `compendium_fields` as cf ON cf.idCompendium = c.id
			WHERE c.id = '$id'
			ORDER BY name ASC";
	if (!$result = $conn->query($sql)) {
		echo "Désolé, le site web subit des problèmes.";
		echo "Error: " . $conn->error  . "\n";
		exit;
	};

	$aRows = [];

	while( $row = $result->fetch_assoc() ) {
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