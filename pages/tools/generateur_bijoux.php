<?php 

$aStats = [ "courage", "intelligence", "charisme", "adresse", "force" ];

//=== Pierres et Gemmes
class Pierre
{
	public $id;
	public $label;
	public $tooltip;
	public $ug;
}

$barbonate = new Pierre();
$barbonate->id = 0;
$barbonate->label = "d'une barbonate chatoyante";
$barbonate->tooltip = "jaune luminescente";
$barbonate->gold = 210;

$diamantBleu = new Pierre();
$diamantBleu->id = 1;
$diamantBleu->label = "d'un diamant bleu";
$diamantBleu->tooltip = "légèrement bleuté";
$diamantBleu->gold = 160;

$diamantBlanc = new Pierre();
$diamantBlanc->id = 2;
$diamantBlanc->label = "d'un diamant blanc";
$diamantBlanc->tooltip = "";
$diamantBlanc->gold = 130;

$klokolium = new Pierre();
$klokolium->id = 3;
$klokolium->label = "d'un klokolium";
$klokolium->tooltip = "jaune opaque, irisé";
$klokolium->gold = 150;

$saphir = new Pierre();
$saphir->id = 4;
$saphir->label = "d'un saphir";
$saphir->tooltip = "bleu assez profond";
$saphir->gold = 100;

$rubis = new Pierre();
$rubis->id = 5;
$rubis->label = "d'un rubis";
$rubis->tooltip = "rouge / rose";
$rubis->gold = 95;

$zacorite = new Pierre();
$zacorite->id = 6;
$zacorite->label = "d'une zacorite";
$zacorite->tooltip = "mauve translucide, irisé";
$zacorite->gold = 90;

$emeraude = new Pierre();
$emeraude->id = 7;
$emeraude->label = "d'une émeraude";
$emeraude->tooltip = "vert profond";
$emeraude->gold = 70;

$ambre = new Pierre();
$ambre->id = 8;
$ambre->label = "d'une ambre";
$ambre->tooltip = "orangé / jaune translucide";
$ambre->gold = 160;

$opale = new Pierre();
$opale->id = 9;
$opale->label = "d'une opale noire";
$opale->tooltip = "noire, irisée";
$opale->gold = 60;

$spinelle = new Pierre();
$spinelle->id = 10;
$spinelle->label = "d'une spinelle";
$spinelle->tooltip = "rouge";
$spinelle->gold = 60;

$jaspe = new Pierre();
$jaspe->id = 11;
$jaspe->label = "d'un jaspe";
$jaspe->tooltip = "couleurs variées";
$jaspe->gold = 55;

$grenat = new Pierre();
$grenat->id = 12;
$grenat->label = "d'une grenat";
$grenat->tooltip = "rouge-brun";
$grenat->gold = 50;

$beryl = new Pierre();
$beryl->id = 13;
$beryl->label = "d'une béryl rouge";
$beryl->tooltip = "rouge";
$beryl->gold = 45;

$cornaline = new Pierre();
$cornaline->id = 14;
$cornaline->label = "d'une cornaline";
$cornaline->tooltip = "rouge orangé sombre";
$cornaline->gold = 20;

$kunzite = new Pierre();
$kunzite->id = 15;
$kunzite->label = "d'une kunzite";
$kunzite->tooltip = "gris légèrement teinté";
$kunzite->gold = 15;

$perleRose = new Pierre();
$perleRose->id = 16;
$perleRose->label = "d'une perle rose";
$perleRose->tooltip = "ronde, rose pâle, irisée";
$perleRose->gold = 12;

$perleBlanche = new Pierre();
$perleBlanche->id = 17;
$perleBlanche->label = "d'une perle blanche";
$perleBlanche->tooltip = "ronde, blanche, irisée";
$perleBlanche->gold = 10;

$serpentine = new Pierre();
$serpentine->id = 18;
$serpentine->label = "d'une serpentine";
$serpentine->tooltip = "généralement verte / turquoise";
$serpentine->gold = 5;

$sardonyx = new Pierre();
$sardonyx->id = 19;
$sardonyx->label = "d'un sardonyx";
$sardonyx->tooltip = "couleurs variées ou noir";
$sardonyx->gold = 4;

if( !isset( $_SESSION[ 'post' ][ 'bijoux_qualite' ] ) ) {
	// Premiere connexion
	$_SESSION[ 'post' ][ 'bijoux_qualite' ] = 0;
	$_SESSION[ 'post' ][ 'bijoux_taille' ] = 0;
}

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{
	foreach( $_POST AS $key => $value ) {
		$_SESSION['post'][$key] = $value;
	}
}

// Gemmes
if( $_SESSION[ 'post' ][ 'bijoux_qualite' ] == 1 ) 
{
	$aPierres = [  $cornaline, $kunzite, $perleRose, $perleBlanche, $serpentine, $sardonyx ];
} 
else if( $_SESSION[ 'post' ][ 'bijoux_qualite' ] == 2 )
{
	$aPierres = [ $rubis, $zacorite, $emeraude, $ambre, $opale, $spinelle, $jaspe, $grenat, $beryl ];
}
else if( $_SESSION[ 'post' ][ 'bijoux_qualite' ] == 3 )
{
	$aPierres = [ $barbonate, $diamantBleu, $diamantBlanc, $klokolium, $saphir ];
}
else
{
	$aPierres = [ $barbonate, $diamantBleu, $diamantBlanc, $klokolium, $saphir, $rubis, $zacorite, $emeraude, $ambre, $opale, $spinelle, $jaspe, $grenat, $beryl, $cornaline, $kunzite, $perleRose, $perleBlanche, $serpentine, $sardonyx ];
}

if( $_SESSION[ 'post' ][ 'bijoux_taille' ] == 1 ) 
{
	$aUg = [1,2,3,4];
}
else if( $_SESSION[ 'post' ][ 'bijoux_taille' ] == 2 ) 
{
	$aUg = [4,5,6,7];
}
else if( $_SESSION[ 'post' ][ 'bijoux_taille' ] == 3 ) 
{
	$aUg = [7,8,9,10];
}
else
{
	$aUg = [1,2,3,4,5,6,7,8,9,10];
}

$aBijoux = [ "une bague", "un collier", "une broche", "un médaillon", "une gourmette", "une alliance" ];
$aBijouxQualite = [ "d'artisan", "de bonne famille", "elfique", "orc","barbare", "de cultiste", "de noble", "de mauvaise facture", "de piètre qualité", "en mauvais état", "&nbsp;", "&nbsp;", "&nbsp;", "&nbsp;" ];
$aBijouxMatiere = [ "en os", "en cuir", "en bois", "en cuivre", "en bronze", "en argent", "en or", "en thritil" ];

?>
<div class="starter-template">
	<h1 class="mt-5">Générateur de Butin</h1>
	<p class="lead">Bijoux, Gemmes et Pierres précieuses</p>
</div>
<div class="container">
	<form method="post" action="/tools/generateur_bijoux" id="bijoux">
		<div class="row justify-content-md-center">
			<div class="col-lg-3">
				<div class="card">
					<div class="card-header">
						<b>Qualité des Gemmes</b>
					</div>
					<?php
						$checked = "";
						if( $_SESSION[ 'post' ][ 'bijoux_qualite' ] == 0 ) {
							$checked = "checked";
						}
					?>
					<input type="radio" required="" class="btn-check" name="bijoux_qualite" id="qualite-0" autocomplete="off" value="0"<?php echo( $checked )?>>
					<label class="btn btn-outline-primary" for="qualite-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Gemmes de 4 à 200Po">Toutes</label>

					<?php
						$checked = "";
						if( $_SESSION[ 'post' ][ 'bijoux_qualite' ] == 1 ) {
							$checked = "checked";
						}
					?>
					<input type="radio" required="" class="btn-check" name="bijoux_qualite" id="qualite-1" autocomplete="off" value="1" <?php echo( $checked )?>>
					<label class="btn btn-outline-primary" for="qualite-1" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Gemmes de 4 à 20Po">Communes</label>

					<?php
						$checked = "";
						if( $_SESSION[ 'post' ][ 'bijoux_qualite' ] == 2 ) {
							$checked = "checked";
						}
					?>
					<input type="radio" required="" class="btn-check" name="bijoux_qualite" id="qualite-2" autocomplete="off" value="2" <?php echo( $checked )?>>
					<label class="btn btn-outline-primary" for="qualite-2" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Gemmes de 45 à 95Po">Rares</label>

					<?php
						$checked = "";
						if( $_SESSION[ 'post' ][ 'bijoux_qualite' ] == 3 ) {
							$checked = "checked";
						}
					?>
					<input type="radio" required="" class="btn-check" name="bijoux_qualite" id="qualite-3" autocomplete="off" value="3" <?php echo( $checked )?>>
					<label class="btn btn-outline-primary" for="qualite-3" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Gemmes de 100 à 200Po">Précieuses</label>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card">
					<div class="card-header">
						<b>Taille des Gemmes</b>
					</div>
					<?php
						$checked = "";
						if( $_SESSION[ 'post' ][ 'bijoux_taille' ] == 0 ) {
							$checked = "checked";
						}
					?>
					<input type="radio" required="" class="btn-check" name="bijoux_taille" id="taille-0" autocomplete="off" value="0" <?php echo( $checked )?>>
					<label class="btn btn-outline-primary" for="taille-0" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Gemmes de 1 à 10 UG">Toutes</label>

					<?php
						$checked = "";
						if( $_SESSION[ 'post' ][ 'bijoux_taille' ] == 1 ) {
							$checked = "checked";
						}
					?>
					<input type="radio" required="" class="btn-check" name="bijoux_taille" id="taille-1" autocomplete="off" value="1"<?php echo( $checked )?>>
					<label class="btn btn-outline-primary" for="taille-1" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Gemmes de 1 à 4 UG">Petites</label>

					<?php
						$checked = "";
						if( $_SESSION[ 'post' ][ 'bijoux_taille' ] == 2 ) {
							$checked = "checked";
						}
					?>
					<input type="radio" required="" class="btn-check" name="bijoux_taille" id="taille-2" autocomplete="off" value="2"<?php echo( $checked )?>>
					<label class="btn btn-outline-primary" for="taille-2" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Gemmes de 4 à 7 UG">Moyennes</label>

					<?php
						$checked = "";
						if( $_SESSION[ 'post' ][ 'bijoux_taille' ] == 3 ) {
							$checked = "checked";
						}
					?>
					<input type="radio" required="" class="btn-check" name="bijoux_taille" id="taille-3" autocomplete="off" value="3"<?php echo( $checked )?>>
					<label class="btn btn-outline-primary" for="taille-3" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Gemmes de 7 à 10 UG">Grandes</label>
				</div>
			</div>
			<div class="col-lg-1 align-self-center">
				<button class="btn btn-success" type="submit">Relancer</button>
			</div>
		</div>
	</div>
	<br>
	<div class="row text-center">
		<div class="col">
			<div class="card">
				<div class="card-header">
					<b>Bijoux</b>
				</div>
				<ul class="list-group list-group-flush">
					<?php 			
					foreach( $aBijoux as $iBijoux ) {
						echo '<li>' . $iBijoux . '</li>';
					}
					?>
				</ul>
			</div>
		</div>
		
		<div class="col">
			<div class="card">
				<div class="card-header">
					<b>Qualité</b>
				</div>
				<ul class="list-group list-group-flush">
					<?php 			
					foreach( $aBijouxQualite as $iQualite ) {
						echo '<li>' . $iQualite . '</li>';
					}
					?>
				</ul>
			</div>
		</div>

		<div class="col">
			<div class="card">
				<div class="card-header">
					<b>Matière</b>
				</div>
				<ul class="list-group list-group-flush">
					<?php 			
					foreach( $aBijouxMatiere as $iMatiere ) {
						echo '<li>' . $iMatiere . '</li>';
					}
					?>
				</ul>
			</div>
		</div>

		<div class="col">
			<div class="card">
				<div class="card-header">
					<b>Gemme / Pierre</b>
				</div>
				<ul class="list-group list-group-flush">
					<?php 			
					foreach( $aPierres as $oPierre ) {
						echo '<li data-gold="' . $oPierre->gold . '" data-desc="' . $oPierre->tooltip . '">' . $oPierre->label . '</li>';
					}
					?>
				</ul>
			</div>
		</div>

		<div class="col">
			<div class="card">
				<div class="card-header">
					<b>UG</b>
				</div>
				<ul class="list-group list-group-flush">
					<?php 			
					foreach( $aUg as $iUg ) {
						echo '<li>' . $iUg . '</li>';
					}
					?>
				</ul>
			</div>
		</div>
	</div>
	<br>
	<div class="row text-center">
		<span id="results"></span><br>
		<span id="price"></span>
	</div>
</div>