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
				<div class="row">
					<div class="col-md-2 offset-md-1">
						<div class="form-floating">
							<input type="text" class="form-control" name="dice_courage" id="dice_courage" 
								placeholder="Courage"
								value="<?php echo $_SESSION[ 'post' ][ 'dice_courage' ] ?>"
								required readonly						
							>
							<label for="dice_courage">Courage</label>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-floating">
							<input type="text" class="form-control" name="dice_intelligence" id="dice_intelligence" 
								placeholder="Intelligence"
								value="<?php echo $_SESSION[ 'post' ][ 'dice_intelligence' ] ?>"
								required readonly				
							>
							<label for="dice_intelligence">Intelligence</label>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-floating">
							<input type="text" class="form-control" name="dice_charisme" id="dice_charisme" 
								placeholder="Charisme"
								value="<?php echo $_SESSION[ 'post' ][ 'dice_charisme' ] ?>"
								required readonly				
							>
							<label for="dice_charisme">Charisme</label>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-floating">
							<input type="text" class="form-control" name="dice_adresse" id="dice_adresse" 
								placeholder="Adresse"
								value="<?php echo $_SESSION[ 'post' ][ 'dice_adresse' ] ?>"
								required readonly				
							>
							<label for="dice_adresse">Adresse</label>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-floating">
							<input type="text" class="form-control" name="dice_force" id="dice_force" 
								placeholder="Force"
								value="<?php echo $_SESSION[ 'post' ][ 'dice_force' ] ?>"
								required readonly				
							>
							<label for="dice_force">Force</label>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<br><p>Vos statistiques permettent de choisir parmis les Origines suivantes :</p>
				</div>
			</div>
			<div class="d-flex flex-wrap gap-1">
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

				if( in_array($oOrigine->id, $special_ids) ) {
					$class = "d-none";
				}

				echo '<div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="' . $oOrigine->tooltip. '">';
				echo '<input type="radio" required class="btn-check" name="origine" id="origine-' . $oOrigine->id . '" autocomplete="off" value="' . $oOrigine->id . '"' . $disabled .' ' . $checked .' data-pratique-magie="' . $oOrigine->pratiqueMagie . '">';
				echo '<label class="btn '. $class . '" for="origine-' . $oOrigine->id . '">' . $oOrigine->label . '</label>';
				echo '</div>';
				echo ' ';
			}
			?>
			</div>

			<p>Et les métiers suivant :</p>	

			<div class="d-flex flex-wrap gap-1">
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
				echo '<div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="' . $oMetier->tooltip. '">';
				echo '<input type="radio" required class="btn-check" name="metier" id="metier-' . $oMetier->id . '" autocomplete="off" value="' . $oMetier->id . '"' . $disabled .' ' . $checked .' data-pratique-magie="' . $oMetier->pratiqueMagie . '">';
				echo '<label class="btn '. $class . '" for="metier-' . $oMetier->id . '">' . $oMetier->label . '</label>';
				echo '</div>';
				echo ' ';
			}
			?>
			</div>

			<p>Vous pouvez également devenir Soldat pour participer aux campagnes spéciales :</p>	

			<div class="d-flex flex-wrap gap-1">
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
				echo '<div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="' . $oMetier->tooltip. '">';
				echo '<input type="radio" required class="btn-check" name="metier" id="metier-' . $oMetier->id . '" autocomplete="off" value="' . $oMetier->id . '"' . $disabled .' ' . $checked .' data-pratique-magie="' . $oMetier->pratiqueMagie . '">';
				echo '<label class="btn '. $class . '" for="metier-' . $oMetier->id . '">' . $oMetier->label . '</label>';
				echo '</div>';
				echo ' ';
			}
			?>
			</div>

			<p>Ou choisir un métier "avancé" (avec l'accord du MJ) :</p>	

			<div class="d-flex flex-wrap gap-1">
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
				echo '<div data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" title="' . $oMetier->tooltip. '">';
				echo '<input type="radio" required class="btn-check" name="metier" id="metier-' . $oMetier->id . '" autocomplete="off" value="' . $oMetier->id . '"' . $disabled .' ' . $checked .' data-pratique-magie="' . $oMetier->pratiqueMagie . '">';
				echo '<label class="btn '. $class . '" for="metier-' . $oMetier->id . '">' . $oMetier->label . '</label>';
				echo '</div>';
				echo ' ';
			}
			?>
			</div>

			<p>Ou encore ne pas choisir de métier et attendre qu'une occasion se présente (avec l'accord du MJ) :</p>			
			<input type="radio" required class="btn-check" name="metier" id="metier-23" autocomplete="off" value="23" data-pratique-magie="0" <?php if( $_SESSION[ 'post' ][ 'metier' ] == 23 or $_SESSION[ 'post' ][ 'metier' ] == -1 ) { echo 'checked'; } ?>>
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

<script>
	$( document ).ready(function() {
		var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
		var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
			return new bootstrap.Tooltip(tooltipTriggerEl)
		});

		// --- Origine ET Métier ---
		const specialIds = ['20', '21', '22']; // Nain de la Mafia, Amazone, Chaman

		// Changement de métier
		$('input[name="metier"]').change(function() {
			var selectedMetierId = $(this).val();

			if (specialIds.includes(selectedMetierId)) {
				// Métier spécial = Origine identique
				$('#origine-' + selectedMetierId).prop('checked', true);
			} else {
				var selectedOrigine = $('input[name="origine"]:checked');
				if (selectedOrigine.length > 0 && specialIds.includes(selectedOrigine.val())) {
					selectedOrigine.prop('checked', false);
				}
			}

			$('input[name="origine"]:checked').trigger('change');
		});


		// --- EXISTING LOGIC FOR MAGIC COMPATIBILITY ---

		// Store initial disabled state for metiers based on stats
		var initialMetierDisabledState = {};
		$('input[name="metier"]').each(function() {
			initialMetierDisabledState[$(this).attr('id')] = $(this).is(':disabled');
		});

		// When an ORIGIN is chosen (or forced by metier choice)
		$('input[name="origine"]').change(function() {
			var selectedOrigine = $('input[name="origine"]:checked');
			if (selectedOrigine.length === 0) {
				return; // No origin selected, do nothing
			}
			var originePratiqueMagie = selectedOrigine.data('pratique-magie');

			$('input[name="metier"]').each(function() {
				var metierInput = $(this);
				var metierId = metierInput.attr('id');
				var metierLabel = $('label[for="' + metierId + '"]');
				var metierPratiqueMagie = metierInput.data('pratique-magie');
				var initiallyDisabled = initialMetierDisabledState[metierId];

				// If a metier was disabled by stats, it stays disabled no matter what.
				if (initiallyDisabled) {
					return;
				}

				// If origin can't use magic, disable magic-using metiers
				if (originePratiqueMagie == 0 && metierPratiqueMagie == 1) {
					metierInput.prop('disabled', true);
					if (metierInput.is(':checked')) {
						metierInput.prop('checked', false);
					}
					metierLabel.addClass('btn-outline-danger').removeClass('btn-outline-primary');
				} else {
					// Otherwise, enable it
					metierInput.prop('disabled', false);
					metierLabel.removeClass('btn-outline-danger').addClass('btn-outline-primary');
				}
			});
		});

		// Trigger both change events on page load to set the correct initial state
		$('input[name="origine"]:checked').trigger('change');
		$('input[name="metier"]:checked').trigger('change');
	});
</script>