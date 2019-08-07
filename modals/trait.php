<?php
	include("../includes/config.php");

	$trait = isset($_GET['id'])?$_GET['id']:0;

	mysqli_set_charset( $conn,'utf8' );
	$sql = "SELECT c.*, cf.key, cf.value
			FROM `compendium` as c
			INNER JOIN `compendium_fields` as cf ON cf.idCompendium = c.id
			WHERE c.id = '$trait'
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
<div class="modal-header">
	<h5 class="modal-title" id="modal-title"><?php echo $aRows[ 0 ]['name'] ?></h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
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
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
</div>