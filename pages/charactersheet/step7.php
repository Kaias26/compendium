<form method="post" action="/charactersheet/charactersheet" id="charactersheet">
	<fieldset id="form1">
		<div class="sub__title__container ">
			<p>Etape 7/<?php echo $maxStep ?></p>
			<h2>Subtilités</h2>
			<p>Votre fiche est presque prête. Quelques spécifités peuvent s'appliquer en fonction de vos statistiques, origine ou métier.</p>			
		</div>
		<div class="input__container">
			<br>
			<?php if( $_SESSION[ 'post' ][ 'dice_adresse' ] <= 8 ) { // adresse- ?>
			<div class="card mb-1">
					<div class="card-body">
					<p>Un score d'Adresse <b>inférieur ou égal</b> à 8 <b>diminue</b> de 1 soit votre Attaque, soit votre Parade (au choix) :</p>
		
					<div class="col-md-4 offset-md-4">
						<select class="form-control" name="malus_adresse" required>
							<option value="attr_Stats_Attaque" <?php if( $_SESSION[ 'post' ][ 'malus_adresse' ] == "attr_Stats_Attaque"  ) { echo 'selected'; } ?>>Diminuer l'Attaque de 1</option>
							<option value="attr_Stats_Parade" <?php if( $_SESSION[ 'post' ][ 'malus_adresse' ] == "attr_Stats_Parade"  ) { echo 'selected'; } ?>>Diminuer la Parade de 1</option>
						</select>
					</div>
				</div>
			</div>
			<?php } ?>
			<?php if( $_SESSION[ 'post' ][ 'dice_adresse' ] >= 13 ) { // adresse+ ?>
				<div class="card mb-1">
  					<div class="card-body">
						<p>Un score d'Adresse <b>supérieur ou égal</b> à 13 <b>augmente</b> de 1 soit votre Attaque, soit votre Parade (au choix) :</p>					

						<div class="col-md-4 offset-md-4">
							<select class="form-control" name="bonus_adresse" id="bonus_adresse" required>
								<option value="attr_Stats_Attaque" <?php if( $_SESSION[ 'post' ][ 'bonus_adresse' ] == "attr_Stats_Attaque"  ) { echo 'selected'; } ?>>Augmenter l'Attaque de 1</option>
								<option value="attr_Stats_Parade" <?php if( $_SESSION[ 'post' ][ 'bonus_adresse' ] == "attr_Stats_Parade"  ) { echo 'selected'; } ?>>Augmenter la Parade de 1</option>
							</select>
						</div>
					</div>
				</div>
			<?php } ?>
			<?php if( $_SESSION[ 'post' ][ 'dice_force' ] <= 8 ) { // Force- ?>
				<div class="card mb-1">
  					<div class="card-body">
						<p>Un score de Force <b>inférieur ou égal</b> à 8 <d>diminue</d> de 1 vos dégâts physiques.</p>
					</div>
				</div>
			<?php } ?>
			<?php if( $_SESSION[ 'post' ][ 'dice_force' ] >= 13 ) { // Force+ ?>
				<div class="card mb-1">
  					<div class="card-body">
						<p>Pour <b>chaque</b> point de Force <b>supérieur</b> à 12 : +1 point d’impact (P.I).</p>
					</div>
				</div>
			<?php } ?>
			<?php if( $_SESSION[ 'post' ][ 'dice_intelligence' ] >= 12 ) { // Int+ ?>
				<div class="card mb-1">
  					<div class="card-body">
						<p>Pour <b>chaque point</b> d'Intelligence <b>supérieur</b> à 12 : +1 point de dégâts des sorts (selon sortilège).</p>
					</div>
				</div>
			<?php } ?>
			<?php if( $oCurrentOrigine->id == 10 ) { // Ogre ?>
				<div class="card mb-1">
  					<div class="card-body">
						<p><b>SUPER-BOURRIN :</b>< L'ogre a le droit de retrancher jusqu'à 3 points à son score de base en ATTAQUE et/ou en PARADE pour en faire un bonus de dégâts (au corps à corps, toutes armes confondues). Ainsi il peut avoir +3 en dégâts en plus de ses autres bonus de FORCE, mais son côté bourrin le rend maladroit. Le bonus est à choisir en début de carrière et ne pourra être modifié par la suite.</p>
						<div class="row">
	  						<div class="col-md-3 offset-md-3">
	  							<p class="text-center">Je diminue mon Attaque :</p>
								<select class="form-control" name="malus_ogre_at" id="malus_ogre_at">
									<option></option>
									<option value="1" <?php if( $_SESSION[ 'post' ][ 'malus_ogre_at' ] == "1"  ) { echo 'selected'; } ?>>de 1</option>
									<option value="2" <?php if( $_SESSION[ 'post' ][ 'malus_ogre_at' ] == "2"  ) { echo 'selected'; } ?>>de 2</option>
									<option value="3" <?php if( $_SESSION[ 'post' ][ 'malus_ogre_at' ] == "3"  ) { echo 'selected'; } ?>>de 3</option>
								</select>
							</div>
							<div class="col-md-3">
	  							<p class="text-center">Je diminue ma Parade :</p>
								<select class="form-control" name="malus_ogre_prd" id="malus_ogre_prd">
									<option></option>
									<option value="1" <?php if( $_SESSION[ 'post' ][ 'malus_ogre_prd' ] == "1"  ) { echo 'selected'; } ?>>de 1</option>
									<option value="2" <?php if( $_SESSION[ 'post' ][ 'malus_ogre_prd' ] == "2"  ) { echo 'selected'; } ?>>de 2</option>
									<option value="3" <?php if( $_SESSION[ 'post' ][ 'malus_ogre_prd' ] == "3"  ) { echo 'selected'; } ?>>de 3</option>
								</select>
							</div>
							<div class="col-md-3">
	  							<p class="text-center">Pour augmenter mes dégats de :</p>
								<input type="number" name="bonus_ogre" id="bonus_ogre" value="0" required readonly min="0" max="3">
							</div>
						</div>
  					</div>
  				</div>
			<?php } ?>

			<?php if( $oCurrentMetier->id == 3 ) { // Pretre  ?>
				<div class="card mb-1">
  					<div class="card-body">
  						<p>Un Prêtre doit choisir un dieu, et un seul, en début de carrière :</p>
  						<div class="row">
	  						<div class="col-md-4 offset-md-4">					
								<select class="form-control" name="grimoire_pretre" id="grimoire_pretre">
									<option value="adathie" <?php if( $_SESSION[ 'post' ][ 'grimoire_pretre' ] == "adathie"  ) { echo 'selected'; } ?>>Adathie</option>
									<option value="dlul" <?php if( $_SESSION[ 'post' ][ 'grimoire_pretre' ] == "dlul"  ) { echo 'selected'; } ?>>Dlul</option>
									<option value="youclidh" <?php if( $_SESSION[ 'post' ][ 'grimoire_pretre' ] == "youclidh"  ) { echo 'selected'; } ?>>Youclidh</option>
									<option value="slanoush" <?php if( $_SESSION[ 'post' ][ 'grimoire_pretre' ] == "slanoush"  ) { echo 'selected'; } ?>>Slanoush</option>
								</select>
							</div>
						</div>
						<p>Il pourra choisir de changer de religion plus tard, mais perdra tous les avantages liés au précédent dieu, au profit du second</p>
	  				</div>
  				</div>
			<?php } ?>

			<?php if( $oCurrentMetier->id == 4 ) { // Mage  ?>
				<div class="card mb-1">
  					<div class="card-body">
  						<p>Les mages qui désirent faire carrière doivent se spécialiser dans une école de magie :</p>
  						<div class="row">
	  						<div class="col-md-4 offset-md-4">							
								<select class="form-control" name="grimoire_mage" id="grimoire_mage">
									<option value="air" <?php if( $_SESSION[ 'post' ][ 'grimoire_mage' ] == "air"  ) { echo 'selected'; } ?>>Air</option>
									<option value="combat" <?php if( $_SESSION[ 'post' ][ 'grimoire_mage' ] == "combat"  ) { echo 'selected'; } ?>>Combat</option>
									<option value="eau" <?php if( $_SESSION[ 'post' ][ 'grimoire_mage' ] == "eau"  ) { echo 'selected'; } ?>>Eau / Glace</option>
									<option value="feu" <?php if( $_SESSION[ 'post' ][ 'grimoire_mage' ] == "feu"  ) { echo 'selected'; } ?>>Feu</option>
									<option value="metamorphe" <?php if( $_SESSION[ 'post' ][ 'grimoire_mage' ] == "metamorphe"  ) { echo 'selected'; } ?>>Métamorphose</option>
									<option value="necromancien" <?php if( $_SESSION[ 'post' ][ 'grimoire_mage' ] == "necromancien"  ) { echo 'selected'; } ?>>Nécromancien</option>
									<option value="terre" <?php if( $_SESSION[ 'post' ][ 'grimoire_mage' ] == "terre"  ) { echo 'selected'; } ?>>Terre</option>
									<option value="thermo" <?php if( $_SESSION[ 'post' ][ 'grimoire_mage' ] == "thermo"  ) { echo 'selected'; } ?>>Thermodynamique</option>
									<option value="tzinntch" <?php if( $_SESSION[ 'post' ][ 'grimoire_mage' ] == "tzinntch"  ) { echo 'selected'; } ?>>Tzinntch</option>
									<option value="invocateur" <?php if( $_SESSION[ 'post' ][ 'grimoire_mage' ] == "invocateur"  ) { echo 'selected'; } ?>>Invocateur</option>
								</select>								
							</div>
						</div>
						<p>En plus de sa spécialisation, le mage maitrise la magie "Généraliste" (sauf Invocateur)</p>
						<p>Il pourra choisir une nouvelle discipline à partir du niveau 5 (sauf Tzinntch et Nécromancien)</p>
	  				</div>
  				</div>
			<?php } ?>

			<?php if( $oCurrentMetier->id == 5 ) { // Pretre  ?>
				<div class="card mb-1">
  					<div class="card-body">
  						<p>Un Paladin doit choisir un dieu, et un seul, en début de carrière :</p>
  						<div class="row">
	  						<div class="col-md-4 offset-md-4">
								<select class="form-control" name="grimoire_paladin" id="grimoire_paladin">
									<option value="braav" <?php if( $_SESSION[ 'post' ][ 'grimoire_paladin' ] == "braav"  ) { echo 'selected'; } ?>>Braav</option>
									<option value="dlul" <?php if( $_SESSION[ 'post' ][ 'grimoire_paladin' ] == "dlul"  ) { echo 'selected'; } ?>>Dlul</option>
									<option value="khornettoh" <?php if( $_SESSION[ 'post' ][ 'grimoire_paladin' ] == "khornettoh"  ) { echo 'selected'; } ?>>Khornettoh</option>
									<option value="slanoush" <?php if( $_SESSION[ 'post' ][ 'grimoire_paladin' ] == "slanoush"  ) { echo 'selected'; } ?>>Slanoush</option>
								</select>								
							</div>
						</div>
						<p>Il pourra choisir de changer de religion plus tard, mais perdra tous les avantages liés au précédent dieu, au profit du second</p>
	  				</div>
  				</div>
			<?php } ?>

			<?php if( $oCurrentMetier->id == 6 ) { // Ranger  ?>
				<div class="card mb-1">
  					<div class="card-body">
  						<p>En raison de sa polyvalence, au niveau 1 le Ranger peut choisir de <b>soustraire</b> 1 point d'une CARAC pour l'<b>ajouter</b> à une autre (INT, CHA, COU, FO, AD)</p>
  						<div class="row">
	  						<div class="col-md-3 offset-md-3">
	  							<p class="text-center">Je soustrait 1 :</p>
								<select class="form-control" name="malus_ranger" id="malus_ranger">
									<option></option>
									<option value="courage" <?php if( $_SESSION[ 'post' ][ 'malus_ranger' ] == "courage"  ) { echo 'selected'; } ?>>Courage</option>
									<option value="intelligence" <?php if( $_SESSION[ 'post' ][ 'malus_ranger' ] == "intelligence"  ) { echo 'selected'; } ?>>Intelligence</option>
									<option value="charisme" <?php if( $_SESSION[ 'post' ][ 'malus_ranger' ] == "charisme"  ) { echo 'selected'; } ?>>Charisme</option>
									<option value="adresse" <?php if( $_SESSION[ 'post' ][ 'malus_ranger' ] == "adresse"  ) { echo 'selected'; } ?>>Adresse</option>
									<option value="force" <?php if( $_SESSION[ 'post' ][ 'malus_ranger' ] == "force"  ) { echo 'selected'; } ?>>Force</option>
								</select>
							</div>
							<div class="col-md-3">
								<p class="text-center">Pour gagner 1 :</p>
								<select class="form-control" name="bonus_ranger" id="bonus_ranger">
									<option></option>
									<option value="courage" <?php if( $_SESSION[ 'post' ][ 'bonus_ranger' ] == "courage"  ) { echo 'selected'; } ?>>Courage</option>
									<option value="intelligence" <?php if( $_SESSION[ 'post' ][ 'bonus_ranger' ] == "intelligence"  ) { echo 'selected'; } ?>>Intelligence</option>
									<option value="charisme" <?php if( $_SESSION[ 'post' ][ 'bonus_ranger' ] == "charisme"  ) { echo 'selected'; } ?>>Charisme</option>
									<option value="adresse" <?php if( $_SESSION[ 'post' ][ 'bonus_ranger' ] == "adresse"  ) { echo 'selected'; } ?>>Adresse</option>
									<option value="force" <?php if( $_SESSION[ 'post' ][ 'bonus_ranger' ] == "force"  ) { echo 'selected'; } ?>>Force</option>
								</select>
							</div>
						</div>
	  				</div>
  				</div>
			<?php } ?>

			<?php if( $oCurrentMetier->id == 9 ) { // Marchand  ?>
				<div class="card mb-1">
  					<div class="card-body">
  						<p>En raison de son érudition, au niveau 1 le Marchand doit retirer 1 point à l'attaque ou à la parade, qu'il pourra ajouter au choix à l'intelligence ou au charisme</p>
  						<div class="row">
	  						<div class="col-md-3 offset-md-3">
	  							<select class="form-control" name="malus_marchand" id="malus_marchand" required>
								<option value="attr_Stats_Attaque" <?php if( $_SESSION[ 'post' ][ 'malus_marchand' ] == "attr_Stats_Attaque"  ) { echo 'selected'; } ?>>Diminuer l'Attaque de 1</option>
								<option value="attr_Stats_Parade" <?php if( $_SESSION[ 'post' ][ 'malus_marchand' ] == "attr_Stats_Parade"  ) { echo 'selected'; } ?>>Diminuer la Parade de 1</option>
							</select>
							</div>
							<div class="col-md-3">
								<p class="text-center">Pour gagner 1 :</p>
								<select class="form-control" name="bonus_marchand" id="bonus_marchand">
									<option value="intelligence" <?php if( $_SESSION[ 'post' ][ 'bonus_marchand' ] == "intelligence"  ) { echo 'selected'; } ?>>Intelligence</option>
									<option value="charisme" <?php if( $_SESSION[ 'post' ][ 'bonus_marchand' ] == "charisme"  ) { echo 'selected'; } ?>>Charisme</option>
								</select>
							</div>
						</div>
  					</div>
  				</div>
			<?php } ?>

			<?php if( $oCurrentMetier->id == 10 ) { // Ingénieur  ?>
				<div class="card mb-1">
  					<div class="card-body">
  						<p>En raison de sa spécialisation technique, au niveau 1 l'Ingénieur doit retirer 1 point à l'attaque ou à la parade, qu'il pourra ajouter au choix à l'intelligence ou à l'adresse</p>
  						<div class="row">
	  						<div class="col-md-3 offset-md-3">
	  							<select class="form-control" name="malus_ingenieur" id="malus_ingenieur" required>
								<option value="attr_Stats_Attaque" <?php if( $_SESSION[ 'post' ][ 'malus_ingenieur' ] == "attr_Stats_Attaque"  ) { echo 'selected'; } ?>>Diminuer l'Attaque de 1</option>
								<option value="attr_Stats_Parade" <?php if( $_SESSION[ 'post' ][ 'malus_ingenieur' ] == "attr_Stats_Parade"  ) { echo 'selected'; } ?>>Diminuer la Parade de 1</option>
							</select>
							</div>
							<div class="col-md-3">
								<p class="text-center">Pour gagner 1 :</p>
								<select class="form-control" name="bonus_ingenieur" id="bonus_ingenieur">
									<option value="intelligence" <?php if( $_SESSION[ 'post' ][ 'bonus_ingenieur' ] == "intelligence"  ) { echo 'selected'; } ?>>Intelligence</option>
									<option value="adresse" <?php if( $_SESSION[ 'post' ][ 'bonus_ingenieur' ] == "adresse"  ) { echo 'selected'; } ?>>Adresse</option>
								</select>
							</div>
						</div>
  					</div>
  				</div>
			<?php } ?>
			<br>
		</div>
	</fieldset>
</form>

<div class="buttons">
	<form method="post" action="/charactersheet/charactersheet">
		<button class="nxt__btn btn btn-secondary float-start" type="submit" name="btnStep" value="6"> Retour</button>
	</form>
	<button class="nxt__btn btn btn-success float-end" type="submit" name="btnStep" value="8" form="charactersheet"> Suivant</button>
	<!--- Fin</button>--->
</div>