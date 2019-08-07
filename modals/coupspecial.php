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
	<?php if( $aRows[ 0 ]['niveau'] != "" or $aRows[ 0 ]['apprentissage'] != "" ) { ?>
	<p>
		<?php if( $aRows[ 0 ]['niveau'] != "") { ?><b>Niveau :</b> <?php echo $aRows[ 0 ]['niveau'] ?><br><?php } ?>
		<?php if( $aRows[ 0 ]['apprentissage'] != "") { ?><b>Apprentissage :</b> <?php echo $aRows[ 0 ]['apprentissage'] ?><?php } ?>
	</p>
	<?php } ?>
	<?php if( $aRows[ 0 ]['utilisation'] != "" or $aRows[ 0 ]['echec'] != "" ) { ?>
	<p>
		<i class="fa fa-hourglass"></i>
		<?php if( $aRows[ 0 ]['utilisation'] != "") { ?><b>Utilisation :</b> <?php echo $aRows[ 0 ]['utilisation'] ?><br><?php } ?>
		<?php if( $aRows[ 0 ]['echec'] != "") { ?><b>En cas d'échec, </b> <?php echo $aRows[ 0 ]['echec'] ?><?php } ?>
	</p>
	<?php } ?>
	<hr>
	<?php if( $aRows[ 0 ]['effet'] != "" or $aRows[ 0 ]['jet'] != "" or $aRows[ 0 ]['condition'] != "" ) { ?>
	<p>
		<?php if( $aRows[ 0 ]['utilisation'] != "") { ?>
			<b>Effet :</b> <?php echo $aRows[ 0 ]['effet'] ?><br>
		<?php } ?>
		<?php if( $aRows[ 0 ]['jet'] != "") { ?><b>Epreuve :</b> <?php echo explode( ":", $aRows[ 0 ]['jet'] )[ 0 ] ?><br><?php } ?>
		<?php if( $aRows[ 0 ]['condition'] != "") { ?><b>Conditions :</b> <?php echo $aRows[ 0 ]['condition'] ?><?php } ?>
	</p>
	<?php } ?>
	<hr>
	<?php if( $aRows[ 0 ]['critique'] != "" or $aRows[ 0 ]['fumble'] != "" ) { ?>
	<p>
		<?php if( $aRows[ 0 ]['fumble'] != "") { ?><b>En cas d'échec critique :</b> <?php echo $aRows[ 0 ]['fumble'] ?><br><?php } ?>
		<?php if( $aRows[ 0 ]['critique'] != "") { ?><b>Réussite critique : </b> <?php echo $aRows[ 0 ]['critique'] ?><?php } ?>
	</p>
	<?php } ?>
	<?php if( $aRows[ 0 ]['note'] != "" ) { ?>
	<p>
		<b>Notes :</b><br>
		<?php echo $aRows[ 0 ]['note'] ?>
	</p>
	<?php } ?>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
</div>