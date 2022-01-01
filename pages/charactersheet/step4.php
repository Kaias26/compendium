<form method="post" action="/charactersheet/charactersheet" id="charactersheet">
	<fieldset id="form1">
		<div class="sub__title__container ">
			<p>Etape 4/<?php echo $maxStep ?></p>
			<h2>Points de Destin</h2>
			<p><b>Tirez 1D4-1</b><br>
			Reportez cette valeur (entre 0 et 3) dans votre case de Points de Destin.</p>			
			<p>
				<a class="btn btn-info" data-bs-toggle="collapse" href="#collapseTips" role="button" aria-expanded="false" aria-controls="collapseTips">
					Conseils
				</a>
			</p>
			<div class="collapse" id="collapseTips">
				<div class="card card-body">
					<p>Les <b>Points de Destin</b> sont une <b>ressource précieuse</b> qui peut vous <b>sauver la vie</b> en annulant l'effet de la dernière action néfaste à votre encontre.</p>
				</div>
			</div>
		</div>
		<div class="input__container">
			<div class="row g-2">
				<!-- Dice roll -->
				<div class="col-md text-center">
					<p id="dice_placeholder"></p>
					<button id="dice_button" data-dicethrows="1" data-dicebonus="-1" data-dicesides="4" type="button">Lancer 1D4-1</button>
				</div>
				<div class="col-md">
					<br>
					<div class="row">
						<div id="help_pdt" class="form-text">L'intervention divine caractérisée</div>
						<div class="col-md-8">
							<div class="form-floating mb-3">
								<input type="number" class="form-control col-md-4" name="dice_pdt" id="dice_pdt" 
									aria-describedby="help_pdt" placeholder="Point de Destin"
									value="<?php echo $_SESSION[ 'post' ][ 'dice_pdt' ] ?>"
									required min=0 max=3
								>
								<label for="dice_pdt">Point de Destin</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</fieldset>
</form>

<div class="buttons">
	<form method="post" action="/charactersheet/charactersheet">
		<button class="nxt__btn btn btn-secondary float-start" type="submit" name="btnStep" value="3"> Retour</button>
	</form>
	<button class="nxt__btn btn btn-success float-end" type="submit" name="btnStep" value="5" form="charactersheet"> Suivant</button>
</div>