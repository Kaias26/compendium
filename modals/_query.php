<?php
	include("../includes/config.php");

	$id = isset($_GET['id'])?$_GET['id']:0;

	mysqli_set_charset( $conn,'utf8' );
	$sql = "SELECT c.*, cf.key, cf.value
			FROM `compendium` as c
			INNER JOIN `compendium_fields` as cf ON cf.idCompendium = c.id
			WHERE c.id = ?
			ORDER BY name ASC";
	
	if ($statement = $conn->prepare($sql)) {
		$statement->bind_param('i', $id);
		$statement->execute();
		$result = $statement->get_result();
	} else {
		set_flash_message('danger', 'Un problème est survenu lors de l\'accès aux données. Veuillez réessayer plus tard.');
		header('Location: /home');
		exit;
	}

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