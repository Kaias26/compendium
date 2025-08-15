<?php
	$checklimit = 2;
	if( $oCurrentOrigine->id === 0 && $oCurrentMetier->id === 23 ) {
		$checklimit = 3;
	}
?>
<form method="post" action="/charactersheet/charactersheet" id="charactersheet">
	<fieldset id="form1">
		<div class="sub__title__container ">
			<p>Etape 3/<?php echo $maxStep ?></p>
			<h2>Les compétences</h2>
			<p>Maintenant que vous avez l'ossature de votre personnage, il vous faut noter ses compétences, qui sont ses points forts (ou ses points faibles).</p>

			<p>Vous disposez de celles de votre Origine (Compétences de naissance) et de celles de votre Métier (Compétences héritées), mais aussi de <?php echo $checklimit ?> autres compétences au choix parmi celles qui vous sont proposées, soit par votre Origine, soit par votre Métier.</p>			
			<p>
				<a class="btn btn-info" data-bs-toggle="collapse" href="#collapseTips" role="button" aria-expanded="false" aria-controls="collapseTips">
					Conseils
				</a>
			</p>
			<div class="collapse" id="collapseTips">
				<div class="card card-body">
					<p>Les descriptions détaillées des compétences sont consultables sur le document <a href="https://www.naheulbeuk.com/jdr-docs/competences-naheulbeuk-jdr.pdf">Détail des Compétences</a>.</p>
				</div>
			</div>
		</div>
		<div class="input__container">
			<br>
			<div class="row text-center">
				<div class="col">
					<div class="card">
						<div class="card-header">
							<b><?php echo $oCurrentOrigine->label ?></b><br>
							Compétences de naissance
						</div>
						<ul class="list-group list-group-flush">
							<?php
								if( $statement_origine->rowCount() > 0 ) {
									while( $row = $statement_origine->fetch() ) {
										echo '<li class="list-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $row[ 'value' ] . '"> ' . $row[ 'name' ] . ' </li>';
										echo '<input type="hidden" name="competences[]" value="' . $row[ 'id' ] . '">';
									}
								} else {
									echo "Aucune";
								}
							?>
						</ul>
					</div>
				</div>
				<div class="col">
					<?php 
						if( !in_array($_SESSION['post']['metier'], $special_ids) ) {
					?>
					<div class="card">
						<div class="card-header">
							<b><?php echo $oCurrentMetier->label ?></b><br>
							Compétences héritées
						</div>
						<ul class="list-group list-group-flush">
							<?php
								if( $statement_metier->rowCount() > 0 ) {
									while( $row = $statement_metier->fetch() ) {
										echo '<li class="list-group-item" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $row[ 'value' ] . '"> ' . $row[ 'name' ] . ' </li>';
										echo '<input type="hidden" name="competences[]" value="' . $row[ 'id' ] . '">';
									}
								} else {
									echo "Aucune";
								}	
							?>
						</ul>
					</div>
					<?php 
						}
					?>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<br><p>Votre Origine et votre Métier permettent de choisir <?php echo $checklimit ?> des compétences suivantes :</p>
				</div>
			</div>
			<div class="d-flex flex-wrap gap-1">
			<?php
				while( $row = $statement_auChoix->fetch() ) {
					$checked = "";
					if( in_array( $row[ 'id' ], $_SESSION[ 'post' ][ 'competences' ] ) ) {
						$checked = "checked";
					}

					echo '<input type="checkbox" class="btn-check" data-checklimit="' . $checklimit . '" name="competences[]" id="competence-' . $row[ 'id' ] . '" autocomplete="off" value="' . $row[ 'id' ] . '"' . $checked .'>';
					echo '<label class="btn btn-outline-primary" for="competence-' . $row[ 'id' ] . '" data-bs-toggle="tooltip" data-bs-placement="top" title="' . $row[ 'value' ] . '">' . $row[ 'name' ] . '</label>';
					echo ' ';
				}
			?>
			</div>
		</div>
	</fieldset>
</form>

<div class="buttons">
	<form method="post" action="/charactersheet/charactersheet">
		<button class="nxt__btn btn btn-secondary float-start" type="submit" name="btnStep" value="2"> Retour</button>
	</form>
	<button class="nxt__btn btn btn-success float-end" type="submit" name="btnStep" value="4" form="charactersheet"> Suivant</button>
</div>