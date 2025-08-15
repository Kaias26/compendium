<form method="post" action="/charactersheet/charactersheet" id="charactersheet">
	<fieldset id="form1">
		<div class="sub__title__container ">
			<p>Etape 5/<?php echo $maxStep ?></p>
			<h2>Pécule de départ</h2>
			<p><b>Tirez 2D6 et multipliez le résultat par 10.</b></p>
			<p>Reportez le montant obtenu (entre 20 et 120 pièces d'Or), dans la case correspondante.<br>
			Ceci est votre pécule de départ, indicateur de votre classe sociale au début de l'aventure.<br>
			Vous pouvez vous équiper en armement, en protection, et en matériel divers à hauteur d'une somme correspondant à ce pécule.</p>
			<?php if( $oCurrentMetier->id == 11 ) { ?>		
				<p>Au niveau 1, le Noble peut <b>tirer une deuxième fois</b> sa fortune et ajouter les pièces d'or à son pécule de base.</p>
			<?php } ?>	
			<p>
				<a class="btn btn-info" data-bs-toggle="collapse" href="#collapseTips" role="button" aria-expanded="false" aria-controls="collapseTips">
					Conseil
				</a>
			</p>
			<div class="collapse" id="collapseTips">
				<div class="card card-body">
					<p>Si <b>vous avez tiré 70 pièces d'Or</b> de départ, vous pourrez dépenser l’équivalent de :</p>
				    <ul>
			    		<li>70 pièces d'Or pour vos armes ;/li>
				    	<li>70 pièces d'Or pour vos protections ;</li>
				    	<li>70 pièces d'Or pour votre matériel.</li>
				    </ul>
				    <p>Vous garderez ensuite 70 pièces d'Or dans votre bourse : L'or dépensé <b>n'est pas déduit</b> de votre pécule de base, et vous <b>ne gardez pas non plus</b> la monnaie sur ce que vous ne dépensez pas.</p>
				</div>
			</div>
		</div>
		<div class="input__container">
			<div class="row g-2">
				<!-- Dice roll -->
				<div class="col-md text-center">
					<p id="dice_placeholder"></p>
					<button id="dice_button" data-dicethrows="2" data-dicebonus="0" data-dicesides="6"  type="button">Lancer 2D6</button>
				</div>
				<div class="col-md">
					<br>
					<div class="row">
						<div id="help_or" class="form-text">Roturier, paysan ou fils de noble ?<br>(N'oubliez pas de multiplier le résultat par 10)</div>
						<div class="col-md-8">
							<div class="form-floating mb-3">
								<input type="number" class="form-control col-md-4" name="dice_or" id="dice_or" 
									aria-describedby="help_or" placeholder="Point de Destin"
									value="<?php echo $_SESSION[ 'post' ][ 'dice_or' ] ?>"
									required min=20 max=120
								>
								<label for="dice_or">Or</label>
							</div>
						</div>						
					</div>
					<?php if( $oCurrentMetier->id == 11 ) { ?>
					<br>
					<div class="row">
						<div id="help_or" class="form-text">Bourgeois ou Noble !</div>
						<div class="col-md-8">
							<div class="form-floating mb-3">
								<input type="number" class="form-control col-md-4" name="dice_orBonus" id="dice_orBonus" 
									aria-describedby="help_orBonus" placeholder="Point de Destin"
									value="<?php echo $_SESSION[ 'post' ][ 'dice_orBonus' ] ?>"
									required min=20 max=120
								>
								<label for="dice_orBonus">Or bonus</label>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</fieldset>
</form>

<div class="buttons">
	<form method="post" action="/charactersheet/charactersheet">
		<button class="nxt__btn btn btn-secondary float-start" type="submit" name="btnStep" value="4"> Retour</button>
	</form>
	<button class="nxt__btn btn btn-success float-end" type="submit" name="btnStep" value="6" form="charactersheet"> Suivant</button>
</div>