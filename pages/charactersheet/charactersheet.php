<?php include(__DIR__ . "/libs.php");?>
<?php include(__DIR__ . "/process.php");?>

<div class="starter-template">
	<h1 class="mt-5">Créer votre personnage</h1>
	<p class="lead">Outil d'aide à la création de fiche de personnage pour le Donjon de Naheulbeuk</p>
</div>

<div class="container">
	<div class="bg-white border rounded-5">
		<div class="row body__container">
			<div class="col-lg-4 left__container">
				<div class="side__titles">
					<div class="title__name">
						<h3>Caractéristiques principales</h3>
						<p>Déterminez votre destiné</p>
					</div>
					<div class="title__name">
						<h3>Origine et Métier</h3>
						<p>Paysan ou Guerrier ?</p>
					</div>
					<div class="title__name">
						<h3>Compétences</h3>
						<p>Vos points forts (ou pas)</p>
					</div>
					<div class="title__name">
						<h3>Points de Destin</h3>
						<p>Repoussez le mauvais sort</p>
					</div>
					<div class="title__name">
						<h3>Or</h3>
						<p>Votre richesse de départ</p>
					</div>
					<div class="title__name">
						<h3>Équipement et Matériel</h3>
						<p>Votre richesse de départ</p>
					</div>
					<div class="title__name">
						<h3>Subtilités</h3>
						<p>Bonus / Malus / Options</p>
					</div>
					<div class="title__name">
						<h3>Résumé</h3>
						<p>Validez votre personnage</p>
					</div>
				</div>
				<div class="progress__bar__container">
					<ul>
						<li <?php if( $_SESSION[ 'step' ] >= 1 ) { ?>class="active"<?php } ?> id="icon1">
							<span class="fa fa-user"></span>
						</li>
						<li <?php if( $_SESSION[ 'step' ] >= 2 ) { ?>class="active"<?php } ?> id="icon2">
							<span class="fa fa-hat-wizard"></span>
						</li>
						<li <?php if( $_SESSION[ 'step' ] >= 3 ) { ?>class="active"<?php } ?> id="icon3">
							<span class="fa fa-book"></span>
						</li>
						<li <?php if( $_SESSION[ 'step' ] >= 4 ) { ?>class="active"<?php } ?> id="icon4">
							<span class="fa fa-skull-crossbones"></span>
						</li>
						<li <?php if( $_SESSION[ 'step' ] >= 5 ) { ?>class="active"<?php } ?> id="icon5">
							<span class="fa fa-coins"></span>
						</li>
						<li <?php if( $_SESSION[ 'step' ] >= 6 ) { ?>class="active"<?php } ?> id="icon6">
							<span class="fa fa-tshirt"></span>
						</li>
						<li <?php if( $_SESSION[ 'step' ] >= 7 ) { ?>class="active"<?php } ?> id="icon7">
							<span class="fa fa-scale-balanced"></span>
						</li>
						<li <?php if( $_SESSION[ 'step' ] >= 8 ) { ?>class="active"<?php } ?> id="icon8">
							<span class="fa fa-book-reader"></span>
						</li>
					</ul>
				</div>
			</div>			
			<div class="col-lg-8 right__container">
				<?php include( __DIR__ . "/step" . $_SESSION[ 'step' ] . ".php");?>
			</div>
		</div><!-- /.row -->
	</div>
</div>
<br>