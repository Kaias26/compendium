<?php
	include("../includes/config.php");

	$id = openssl_decrypt( $_GET['id'], $cipher, $key, 0, $iv, $tag )
	$sql = "SELECT us.*
			FROM `user_sheets` as us
			WHERE `id` = '$id'";
	if (!$result = $conn->query($sql)) {
		echo "Désolé, le site web subit des problèmes.";
		echo "Error: " . $conn->error  . "\n";
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