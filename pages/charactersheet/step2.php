<form method="post" action="/charactersheet/charactersheet" id="charactersheet">
	<fieldset id="form1">
		<div class="sub__title__container ">
			<p>Etape 2/<?php echo $maxStep ?></p>
			<h2>L'origine et le métier du héros, </h2>
			<p>Les caractéristiques du personnage (page précédente) déterminent son origine et son métier.</p>
			<p>Vous devez en premier lieu définir  son Origine : c'est ainsi qu'il héritera de ses compétences, ses qualités et ses défauts.<br>
				Vous pourrez ensuite choisir un métier (ou pas) et ajouter encore des compétences.<br>
				Un héros sans métier aura moins de compétences à gérer et sera donc plus limité, et puis c'est un peu moins la classe quand on se présente.</p>
			<p>
				<a class="btn btn-info" data-bs-toggle="collapse" href="#collapseTips" role="button" aria-expanded="false" aria-controls="collapseTips">
					Conseils
				</a>
			</p>
			<div class="collapse" id="collapseTips">
				<div class="card card-body">
					<p>N’hésitez pas à vous reporter au Manuel des <a href="http://www.naheulbeuk.com/jdr-docs/origines-metiers-naheulbeuk-jdr.pdf" target="_blank">Origines et Métiers</a> afin de voir les valeurs minimum et maximum requises pour votre personnage...ou laissez le destin décider.</p>
					<p>Si le héros est un Humain sans métier, il peut choisir 2 compétences dans la liste de toutes les compétences !</p>
				</div>
			</div>
		</div>
		<div class="input__container">
			<br>
			<div class="row text-center">
				<div class="col">
					<div class="card">
						<div class="card-header">
							Courage
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><?php echo $_SESSION[ 'post' ][ 'dice_courage' ]; ?></li>
						</ul>
					</div>
				</div>
				<div class="col">
					<div class="card">
						<div class="card-header">
							Intelligence
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><?php echo $_SESSION[ 'post' ][ 'dice_intelligence' ]; ?></li>
						</ul>
					</div>
				</div>
				<div class="col">
					<div class="card">
						<div class="card-header">
							Charisme
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><?php echo $_SESSION[ 'post' ][ 'dice_charisme' ]; ?></li>
						</ul>
					</div>
				</div>
				<div class="col">
					<div class="card text-center">
						<div class="card-header">
							Adresse
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><?php echo $_SESSION[ 'post' ][ 'dice_adresse' ]; ?></li>
						</ul>
					</div>
				</div>
				<div class="col">
					<div class="card text-center">
						<div class="card-header">
							Force
						</div>
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><?php echo $_SESSION[ 'post' ][ 'dice_force' ]; ?></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<br><p>Vos statistiques permettent de choisir parmis les Origines suivantes :</p>
				</div>
			</div>
			<?php 			
			foreach( $aOrigines as $oOrigine ) {
				$disabled = "";
				$checked = "";
				$class = "btn-outline-primary";				

				if( $oOrigine->id == $_SESSION[ 'post' ][ 'origine' ] ) {
					$checked = "checked";
				}
				if( $oOrigine->isAvailable() == false ) {
					$disabled = "disabled";
					$checked = "";
					$class = "btn-outline-danger";
				}
				echo '<input type="radio" required class="btn-check" name="origine" id="origine-' . $oOrigine->id . '" autocomplete="off" value="' . $oOrigine->id . '"' . $disabled .' ' . $checked .'>';
				echo '<label class="btn '. $class . '" for="origine-' . $oOrigine->id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $oOrigine->tooltip. '">' . $oOrigine->label . '</label>';
				echo ' ';
			}
			?>

			<p>Et les métiers suivant :</p>	

			<?php 			
			foreach( $aMetiers as $oMetier ) {
				$disabled = "";
				$checked = "";
				$class = "btn-outline-primary";

				if( $oMetier->id == $_SESSION[ 'post' ][ 'metier' ] ) {
					$checked = "checked";
				}
				if( $oMetier->isAvailable() == false ) {
					$disabled = "disabled";
					$checked = "";
					$class = "btn-outline-danger";
				}				
				echo '<input type="radio" required class="btn-check" name="metier" id="metier-' . $oMetier->id . '" autocomplete="off" value="' . $oMetier->id . '"' . $disabled .' ' . $checked .'>';
				echo '<label class="btn '. $class . '" for="metier-' . $oMetier->id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $oMetier->tooltip. '">' . $oMetier->label . '</label>';
				echo ' ';
			}
			?>

			<p>Vous pouvez également devenir Soldat pour participer aux campagnes spéciales :</p>	

			<?php 			
			foreach( $aSoldats as $oMetier ) {
				$disabled = "";
				$checked = "";
				$class = "btn-outline-primary";

				if( $oMetier->id == $_SESSION[ 'post' ][ 'metier' ] ) {
					$checked = "checked";
				}
				if( $oMetier->isAvailable() == false ) {
					$disabled = "disabled";
					$checked = "";
					$class = "btn-outline-danger";
				}				
				echo '<input type="radio" required class="btn-check" name="metier" id="metier-' . $oMetier->id . '" autocomplete="off" value="' . $oMetier->id . '"' . $disabled .' ' . $checked .'>';
				echo '<label class="btn '. $class . '" for="metier-' . $oMetier->id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $oMetier->tooltip. '">' . $oMetier->label . '</label>';
				echo ' ';
			}
			?>

			<p>Ou choisir un métier "avancé" (avec l'accord du MJ) :</p>	

			<?php 			
			foreach( $aSupplements as $oMetier ) {
				$disabled = "";
				$checked = "";
				$class = "btn-outline-primary";

				if( $oMetier->id == $_SESSION[ 'post' ][ 'metier' ] ) {
					$checked = "checked";
				}
				if( $oMetier->isAvailable() == false ) {
					$disabled = "disabled";
					$checked = "";
					$class = "btn-outline-danger";
				}				
				echo '<input type="radio" required class="btn-check" name="metier" id="metier-' . $oMetier->id . '" autocomplete="off" value="' . $oMetier->id . '"' . $disabled .' ' . $checked .'>';
				echo '<label class="btn '. $class . '" for="metier-' . $oMetier->id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $oMetier->tooltip. '">' . $oMetier->label . '</label>';
				echo ' ';
			}
			?>

			<p>Ou encore ne pas choisir de métier et attendre qu'une occasion se présente (avec l'accord du MJ) :</p>			
			<input type="radio" required class="btn-check" name="metier" id="metier-23" autocomplete="off" value="23" <?php if( $_SESSION[ 'post' ][ 'metier' ] == 23 or $_SESSION[ 'post' ][ 'metier' ] == -1 ) { echo 'checked'; } ?>>
			<label class="btn btn-outline-primary" for="metier-23" data-bs-toggle="tooltip" data-bs-placement="top" title="">Sans métier</label>
		</div>
	</fieldset>
</form>

<div class="buttons">
	<form method="post" action="/charactersheet/charactersheet">
		<button class="nxt__btn btn btn-secondary float-start" type="submit" name="btnStep" value="1"> Retour</button>
	</form>
	<button class="nxt__btn btn btn-success float-end" type="submit" name="btnStep" value="3" form="charactersheet"> Suivant</button>
</div>