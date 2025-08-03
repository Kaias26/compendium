<?php
	include(__DIR__ . "/../includes/config.php");

	$id = isset($_GET['id'])?$_GET['id']:0;

	try {
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
	} catch (PDOException $e) {
		$flashMessenger->set_flash_message('danger', 'Un problème est survenu lors de l\'accès aux données. Veuillez réessayer plus tard.');
		// For AJAX requests, you might want to return a JSON error instead of redirecting
		// For now, we'll just output a simple error message
		echo "<p>Erreur: " . htmlspecialchars($e->getMessage()) . "</p>";
		exit;
	}
?>