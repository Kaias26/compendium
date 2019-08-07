<?php
	include("../includes/config.php");

	$spell = isset($_GET['id'])?$_GET['id']:0;

	mysqli_set_charset( $conn,'utf8' );
	$sql = "SELECT c.*, cf.key, cf.value
			FROM `compendium` as c
			INNER JOIN `compendium_fields` as cf ON cf.idCompendium = c.id
			WHERE c.id = '$spell'
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
	<?php if( $aRows[ 0 ]['incantation'] != "" or $aRows[ 0 ]['incantation'] != "" ) { ?>
	<p>
		<i class="fa fa-hourglass"></i>
		<?php if( $aRows[ 0 ]['incantation'] != "") { ?><b>Durée d'incantation :</b> <?php echo $aRows[ 0 ]['incantation'] ?><br><?php } ?>
		<?php if( $aRows[ 0 ]['duree'] != "") { ?><b>Durée du sort :</b> <?php echo $aRows[ 0 ]['duree'] ?><?php } ?>
	</p>
	<?php } ?>
	<?php if( $aRows[ 0 ]['cout'] != "" or $aRows[ 0 ]['epreuvelanceur_jet'] != "" ) { ?>
	<p>
		<i class="fa fa-star"></i>
		<?php if( $aRows[ 0 ]['cout'] != "") { ?><b>Coût :</b> <?php echo $aRows[ 0 ]['cout'] ?><br><?php } ?>
		<?php if( $aRows[ 0 ]['epreuvelanceur_jet'] != "" ) { ?><b>Épreuve :</b> <?php echo explode( ":", $aRows[ 0 ]['epreuvelanceur_jet'] )[ 0 ] ?> <?php } ?>
		<?php if( $aRows[ 0 ]['epreuvelanceur_mod'] != 0 ) {
				echo( " + " . $aRows[ 0 ]['epreuvelanceur_mod'] );
			}
		?>
	</p>
	<?php } ?>
	<?php if( $aRows[ 0 ]['degats'] != "" or $aRows[ 0 ]['soin'] != "" ) { ?>
	<p>
		<i class="fa fa-bolt"></i>
		<?php if( $aRows[ 0 ]['degats'] != "") { ?><b>Dégats :</b> <?php echo $aRows[ 0 ]['degats'] ?><br><?php } ?>
		<?php if( $aRows[ 0 ]['soin'] != "") { ?><b>Soin :</b> <?php echo $aRows[ 0 ]['soin'] ?><br><?php } ?>
		<?php if( $aRows[ 0 ]['bonusint'] != "") {
			echo( "N’oubliez pas votre bonus d’INTELLIGENCE" );
		} else {
			echo( "Ne comptez pas le bonus d’INTELLIGENCE" );
		}
		?>
	</p>
	<?php } ?>
	<?php if( $aRows[ 0 ]['portee'] != "" or $aRows[ 0 ]['aireeffet'] != "" ) { ?>
	<p>
		<i class="fa fa-shoe-prints"></i>
		<?php if( $aRows[ 0 ]['portee'] != "") { ?><b>Portée :</b> <?php echo $aRows[ 0 ]['portee'] ?><br><?php } ?>
		<?php if( $aRows[ 0 ]['aireeffet'] != "") { ?><b>Aire d’effet :</b> <?php echo $aRows[ 0 ]['aireeffet'] ?><?php } ?>
	</p>
	<?php } ?>
	<?php if( $aRows[ 0 ]['effet'] != "" ) { ?>
	<p>
		<b>Effet :</b><br>
		<?php echo $aRows[ 0 ]['effet'] ?>
	</p>
	<?php } ?>
	<?php if( $aRows[ 0 ]['ingre'] != "" ) { ?>
	<p>
		<b>Ingrédients :</b><br>
		<?php echo $aRows[ 0 ]['ingre'] ?>
	</p>
	<?php } ?>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
</div>