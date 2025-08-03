<?php
	include("../includes/config.php");

try {
		$id = openssl_decrypt( $_GET['id'], $cipher, $key, 0, $iv, $tag );
		$sql = "SELECT us.*
				FROM `user_sheets` as us
				WHERE `id` = :id";
				
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
		$flashMessenger->set_flash_message('danger', 'Un problème est survenu lors de l'accès aux données. Veuillez réessayer plus tard.');
		// For AJAX requests, you might want to return a JSON error instead of redirecting
		// For now, we'll just output a simple error message
		echo "<p>Erreur: " . htmlspecialchars($e->getMessage()) . "</p>";
		exit;
	}
?>
<div class="modal-header">
	<h5 class="modal-title" id="modal-title"><?php echo $aRows[ 0 ]['name'] ?></h5>
	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
	<?php if( $aRows[ 0 ]['effet'] != "" ) { ?>
	<p>
		<b>Effet :</b><br>
		<?php echo $aRows[ 0 ]['effet'] ?>
	</p>
	<?php } ?>
	<?php if( isset( $aRows[ 0 ]['notes'] ) and $aRows[ 0 ]['notes'] != "" ) { ?>
	<p>
		<b>Notes :</b><br>
		<?php echo $aRows[ 0 ]['notes'] ?>
	</p>
	<?php } ?>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
</div>