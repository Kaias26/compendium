<form method="post" action="/charactersheet/charactersheet" id="charactersheet">
	<input type="hidden" name="step" value="1">
	<fieldset id="form1">
		<div class="sub__title__container ">
			<p>Etape 1/5</p>
			<h2>Commençons par tirer vos caractéristiques principales</h2>
			<p>Tirez 5 fois <b>1D6+7</b><br>Vous obtenez normalement 5 nombres entre 8 et 13 inclus.</p>
			<p><b>Allouez vos scores aux différentes caractéristiques de votre personnage.</b><br>
			Utilisez chaque nombre obtenu une fois, et dispersez-les tous entre Courage, Charisme, Intelligence, Adresse et Force.</p>			
			<p>
				<a class="btn btn-info" data-bs-toggle="collapse" href="#collapseTips" role="button" aria-expanded="false" aria-controls="collapseTips">
					Conseils
				</a>
			</p>
			<div class="collapse" id="collapseTips">
				<div class="card card-body">
					<p>Pour être au plus proche des règles du jeu, allouez les jets du dé dans l'ordre du tirage et découvrez ensuite quel type de personnage vous jouerez.<br>
					Le destion est cruel avec vous ? Vous pouvez toujours échanger le résultat de deux dés pour faire pencher la tendance.</p>
				</div>
			</div>
		</div>
		<div class="input__container">
			<div class="row g-2">
				<!-- Dice roll -->
				<div class="col-md text-center">
					<p id="dice_placeholder"></p>
					<button id="dice_button" type="button">Lancer</button>
				</div>
				<div class="col-md">
					<div class="row">
						<div id="help_courage" class="form-text">La bravoure du personnage face au danger et à la mort</div>
						<div class="col-md-4">
							<div class="form-floating mb-3">
								<input type="number" class="form-control col-md-4" name="dice_courage" id="dice_courage" 
									aria-describedby="help_courage" placeholder="Courage"
									value="<?php echo $_SESSION[ 'post' ][ 'dice_courage' ] ?>"
									required min=8 max=13
								>
								<label for="dice_courage">Courage</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div id="help_intelligence" class="form-text">La capacité à réfléchir et l'érudition</div>
						<div class="col-md-4">
							<div class="form-floating mb-3">
								<input type="number" class="form-control" name="dice_intelligence" id="dice_intelligence"
									aria-describedby="help_intelligence" placeholder="Intelligence"
									value="<?php echo $_SESSION[ 'post' ][ 'dice_intelligence' ] ?>"
									required min=8 max=13
								>
								<label for="dice_intelligence">Intelligence</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div id="help_charisme" class="form-text">La beauté physique et la capacité à convaincre les autres</div>
						<div class="col-md-4">
							<div class="form-floating mb-3">
								<input type="number" class="form-control" name="dice_charisme" id="dice_charisme"
									aria-describedby="help_charisme" placeholder="Charisme"
									value="<?php echo $_SESSION[ 'post' ][ 'dice_charisme' ] ?>"
									required min=8 max=13
								>
								<label for="dice_charisme">Charisme</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div id="help_adresse" class="form-text">L'agilité, la souplesse et la précision</div>
						<div class="col-md-4">
							<div class="form-floating mb-3">
								<input type="number" class="form-control" name="dice_adresse" id="dice_adresse"
									aria-describedby="help_adresse" placeholder="Adresse"
									value="<?php echo $_SESSION[ 'post' ][ 'dice_adresse' ] ?>"
									required min=8 max=13
								>
								<label for="dice_adresse">Adresse</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div id="help_force" class="form-text">La capacité musculaire du personnage, et sa résistance</div>
						<div class="col-md-4">
							<div class="form-floating mb-3">
								<input type="number" class="form-control" name="dice_force" id="dice_force"
									aria-describedby="help_force" placeholder="Force"
									value="<?php echo $_SESSION[ 'post' ][ 'dice_force' ] ?>"
									required min=8 max=13
								>
								<label for="dice_force">Force</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</fieldset>
</form>

<div class="buttons">				
	<button class="nxt__btn btn btn-success float-end" type="submit" name="btnStep" value="2" form="charactersheet"> Suivant</button>
</div>