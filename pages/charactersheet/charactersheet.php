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
						<h3><a class="nav-link <?php if ($_SESSION['max_step_reached'] < 1) echo 'disabled'; ?>" <?php if ($_SESSION['max_step_reached'] >= 1) echo 'href="?step=1"'; ?>>Caractéristiques principales</a></h3>
						<p>Déterminez votre destiné</p>
					</div>
					<div class="title__name">
						<h3><a class="nav-link <?php if ($_SESSION['max_step_reached'] < 2) echo 'disabled'; ?>" <?php if ($_SESSION['max_step_reached'] >= 2) echo 'href="?step=2"'; ?>>Origine et Métier</a></h3>
						<p>Paysan ou Guerrier ?</p>
					</div>
					<div class="title__name">
						<h3><a class="nav-link <?php if ($_SESSION['max_step_reached'] < 3) echo 'disabled'; ?>" <?php if ($_SESSION['max_step_reached'] >= 3) echo 'href="?step=3"'; ?>>Compétences</a></h3>
						<p>Vos points forts (ou pas)</p>
					</div>
					<div class="title__name">
						<h3><a class="nav-link <?php if ($_SESSION['max_step_reached'] < 4) echo 'disabled'; ?>" <?php if ($_SESSION['max_step_reached'] >= 4) echo 'href="?step=4"'; ?>>Points de Destin</a></h3>
						<p>Repoussez le mauvais sort</p>
					</div>
					<div class="title__name">
						<h3><a class="nav-link <?php if ($_SESSION['max_step_reached'] < 5) echo 'disabled'; ?>" <?php if ($_SESSION['max_step_reached'] >= 5) echo 'href="?step=5"'; ?>>Or</a></h3>
						<p>Votre richesse de départ</p>
					</div>
					<div class="title__name">
						<h3><a class="nav-link <?php if ($_SESSION['max_step_reached'] < 6) echo 'disabled'; ?>" <?php if ($_SESSION['max_step_reached'] >= 6) echo 'href="?step=6"'; ?>>Équipement et Matériel</a></h3>
						<p>Votre richesse de départ</p>
					</div>
					<div class="title__name">
						<h3><a class="nav-link <?php if ($_SESSION['max_step_reached'] < 7) echo 'disabled'; ?>" <?php if ($_SESSION['max_step_reached'] >= 7) echo 'href="?step=7"'; ?>>Subtilités</a></h3>
						<p>Bonus / Malus / Options</p>
					</div>
					<div class="title__name">
						<h3><a class="nav-link <?php if ($_SESSION['max_step_reached'] < 8) echo 'disabled'; ?>" <?php if ($_SESSION['max_step_reached'] >= 8) echo 'href="?step=8"'; ?>>Résumé</a></h3>
						<p>Validez votre personnage</p>
					</div>
				</div>
				<div class="progress__bar__container">
					<ul>
						<li <?php if( $_SESSION[ 'max_step_reached' ] >= 1 ) { ?>class="active"<?php } ?> id="icon1">
							<span class="fa fa-user"></span>
						</li>
						<li <?php if( $_SESSION[ 'max_step_reached' ] >= 2 ) { ?>class="active"<?php } ?> id="icon2">
							<span class="fa fa-hat-wizard"></span>
						</li>
						<li <?php if( $_SESSION[ 'max_step_reached' ] >= 3 ) { ?>class="active"<?php } ?> id="icon3">
							<span class="fa fa-book"></span>
						</li>
						<li <?php if( $_SESSION[ 'max_step_reached' ] >= 4 ) { ?>class="active"<?php } ?> id="icon4">
							<span class="fa fa-skull-crossbones"></span>
						</li>
						<li <?php if( $_SESSION[ 'max_step_reached' ] >= 5 ) { ?>class="active"<?php } ?> id="icon5">
							<span class="fa fa-coins"></span>
						</li>
						<li <?php if( $_SESSION[ 'max_step_reached' ] >= 6 ) { ?>class="active"<?php } ?> id="icon6">
							<span class="fa fa-tshirt"></span>
						</li>
						<li <?php if( $_SESSION[ 'max_step_reached' ] >= 7 ) { ?>class="active"<?php } ?> id="icon7">
							<span class="fa fa-scale-balanced"></span>
						</li>
						<li <?php if( $_SESSION[ 'max_step_reached' ] >= 8 ) { ?>class="active"<?php } ?> id="icon8">
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