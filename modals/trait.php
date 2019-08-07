<?php
	include("_query.php");
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