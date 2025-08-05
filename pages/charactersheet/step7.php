<form method="post" action="/charactersheet/charactersheet" id="charactersheet">
	<fieldset id="form1">
		<div class="sub__title__container ">
			<p>Etape 7/<?php echo $maxStep ?></p>
			<h2>Résumé</h2>
			<p>Votre fiche est presque prête. Une petite relecture, quelques ajustements et vous pourrez (enfin ?) récupérer votre personnage.</p>
			<p>
				<a class="btn btn-info" data-bs-toggle="collapse" href="#collapseTips" role="button" aria-expanded="false" aria-controls="collapseTips">
					Conseil
				</a>
			</p>
			<div class="collapse" id="collapseTips">
				<div class="card card-body">
					<p>N’hésitez pas à vous reporter aux differents manuels en ligne en cas de probleme <a href="https://naheulbeuk.com/doc-personnages.htm">Devenir un héros</a>.</p>
					<p>Vous pouvez également trouver de l'aide sur <a href="https://www.naheulbeuk-online.org">le forum ou le discord Naheulbeuk Online</a></p>
				</div>
			</div>
		</div>
		<div class="input__container">	
			<br>
			<div class="row">
				<div class="col-md-4">
					<div class="form-floating">
						<input type="text" class="form-control" name="attr_Personnage_Nom" id="attr_Personnage_Nom" 
							placeholder="Nom :"
							value="<?php //echo $_SESSION[ 'post' ][ 'attr_Personnage_Nom' ] ?>"
							required
						>
						<label for="attr_Personnage_Nom">Nom :</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-floating">
						<input type="text" class="form-control" name="attr_Personnage_Origine" id="attr_Personnage_Origine" 
							placeholder="Origine :"
							value="<?php echo $aOrigines[ $_SESSION['post']['origine'] ]->label ?>"
							required readonly
						>
						<label for="attr_Personnage_Origine">Origine :</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-floating">
						<input type="text" class="form-control" name="attr_Personnage_Metiers" id="attr_Personnage_Metiers" 
							placeholder="Metier :"
							value="<?php echo $aJobs[ $_SESSION['post']['metier'] ]->label ?>"
							required readonly
						>
						<label for="attr_Personnage_Metiers">Metier :</label>
					</div>
				</div>
			</div>	
			<br>
			<div class="row">
				<div class="col-md-3">
					<div class="form-floating">
						<input type="text" class="form-control" name="attr_Personnage_Sex" id="attr_Personnage_Sex" 
							placeholder="Sexe :"
							value="<?php //echo $_SESSION[ 'post' ][ 'attr_Personnage_Sex' ] ?>"							
						>
						<label for="attr_Personnage_Sex">Sexe :</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-floating">
						<input type="text" class="form-control" name="attr_Personnage_Age" id="attr_Personnage_Age" 
							placeholder="Âge :"
							value="<?php //echo $_SESSION[ 'post' ][ 'attr_Personnage_Age' ] ?>"							
						>
						<label for="attr_Personnage_Age">Âge :</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-floating">
						<input type="text" class="form-control" name="attr_Personnage_Taille" id="attr_Personnage_Taille" 
							placeholder="Taille : "
							value="<?php //echo $_SESSION[ 'post' ][ 'attr_Personnage_Taille' ] ?>"							
						>
						<label for="attr_Personnage_Taille">Taille : </label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-floating">
						<input type="text" class="form-control" name="attr_Personnage_Poids" id="attr_Personnage_Poids" 
							placeholder="Poids : "
							value="<?php //echo $_SESSION[ 'post' ][ 'attr_Personnage_Poids' ] ?>"							
						>
						<label for="attr_Personnage_Poids">Poids : </label>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-6">
					<h3>Caractéristiques principales</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="attr_Stats_Courage" id="attr_Stats_Courage" 
									placeholder="Courage :"
									value="<?php echo $_SESSION[ 'post' ][ 'attr_Stats_Courage' ] ?>"
									required readonly						
								>
								<label for="attr_Stats_Courage">Courage :</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="attr_Stats_Intelligence" id="attr_Stats_Intelligence" 
									placeholder="Intelligence :"
									value="<?php echo $_SESSION[ 'post' ][ 'attr_Stats_Intelligence' ] ?>"
									required readonly				
								>
								<label for="attr_Stats_Courage">Intelligence :</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="attr_Stats_Charisme" id="attr_Stats_Charisme" 
									placeholder="Charisme :"
									value="<?php echo $_SESSION[ 'post' ][ 'attr_Stats_Charisme' ] ?>"
									required readonly				
								>
								<label for="attr_Stats_Charisme">Charisme :</label>
							</div>
						</div>
					</div>					
					<div class="row">
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="attr_Stats_Adresse" id="attr_Stats_Adresse" 
									placeholder="Adresse :"
									value="<?php echo $_SESSION[ 'post' ][ 'attr_Stats_Adresse' ] ?>"
									required readonly				
								>
								<label for="attr_Stats_Adresse">Adresse :</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="attr_Stats_Force" id="attr_Stats_Force" 
									placeholder="Force :"
									value="<?php echo $_SESSION[ 'post' ][ 'attr_Stats_Force' ] ?>"
									required readonly				
								>
								<label for="attr_Stats_Force">Force :</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<h3>Caractéristiques secondaires</h3>
					<div class="row">
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="attr_Personnage_Niveau" id="attr_Personnage_Niveau" 
									placeholder="Niveau :"
									value="1"
									required readonly						
								>
								<label for="attr_Personnage_Niveau">Niveau :</label>
							</div>
						</div>						
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="attr_Personnage_PointDestin" id="attr_Personnage_PointDestin" 
									placeholder="Points du destin :"
									value="<?php echo $_SESSION[ 'post' ][ 'dice_pdt' ] ?>"
									required readonly						
								>
								<label for="attr_Personnage_PointDestin">Points du destin :</label>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="attr_EV_max" id="attr_EV_max" 
									placeholder="Energie Vitale :"
									value="<?php echo $_SESSION[ 'post' ][ 'attr_EV_max' ] ?>"
									required readonly						
								>
								<label for="attr_EV_max">Energie Vitale :</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="attr_EA_max" id="attr_EA_max" 
									placeholder="Energie Astrale :"
									value="<?php echo $_SESSION[ 'post' ][ 'attr_EA_max' ] ?>"
									required readonly						
								>
								<label for="attr_EA_max">Energie Astrale :</label>
							</div>
						</div>						
					</div>
					<br>
					<div class="row">
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="attr_Stats_Attaque" id="attr_Stats_Attaque" 
									placeholder="Attaque :"
									value="<?php echo $_SESSION[ 'post' ][ 'attr_Stats_Attaque' ] ?>"
									required readonly						
								>
								<label for="attr_Stats_Attaque">Attaque :</label>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="attr_Stats_Parade" id="attr_Stats_Parade" 
									placeholder="Parade :"
									value="<?php echo $_SESSION[ 'post' ][ 'attr_Stats_Parade' ] ?>"
									required readonly						
								>
								<label for="attr_Stats_Parade">Parade :</label>
							</div>		
						</div>
					</div>					
					<br>
					<div class="row">
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="attr_Stats_ResiMagie" id="attr_Stats_ResiMagie" 
									placeholder="Résist. Magie :"
									value="<?php echo $_SESSION[ 'post' ][ 'attr_Stats_ResiMagie' ] ?>"
									required readonly						
								>
								<label for="attr_Stats_ResiMagie">Résist. Magie :</label>
							</div>
						</div>
					</div>
					<div class="row">	
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="attr_Stats_MagiePhy" id="attr_Stats_MagiePhy" 
									placeholder="Magie Phys. :"
									value="<?php echo $_SESSION[ 'post' ][ 'attr_Stats_MagiePhy' ] ?>"
									required readonly						
								>
								<label for="attr_Stats_MagiePhy">Magie Phys. :</label>
							</div>							
						</div>					
						<div class="col-md-6">
							<div class="form-floating">
								<input type="text" class="form-control" name="attr_Stats_MagiePsy" id="attr_Stats_MagiePsy" 
									placeholder="Magie Psy. :"
									value="<?php echo $_SESSION[ 'post' ][ 'attr_Stats_MagiePsy' ] ?>"
									required readonly						
								>
								<label for="attr_Stats_MagiePsy">Magie Psy. :</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<h3>Compétences</h3>
					<div class="card mb-1">
						<div class="card-body">
							<ul class="list-group list-group-flush">
								<?php if (!empty($playerCompetences)) { ?>
									<?php foreach ($playerCompetences as $competence) { ?>
										<li class="list-group-item">
											<b><?php echo htmlspecialchars($competence['name']); ?></b>: <?php echo htmlspecialchars($competence['value']); ?>
										</li>
									<?php } ?>
								<?php } else { ?>
									<li class="list-group-item">Aucune compétence sélectionnée.</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<br>
			<h3>Subtilités</h3>
			<?php if( $_SESSION[ 'post' ][ 'dice_adresse' ] <= 8 ) { // adresse- ?>
			<div class="card mb-1">
					<div class="card-body">
					<p>Un score d'Adresse <b>inférieur ou égal</b> à 8 <b>diminue</b> de 1 soit votre Attaque, soit votre Parade (au choix) :</p>
		
					<div class="col-md-4 offset-md-4">
						<select class="form-control" name="malus_adress" required>
							<option value="attr_Stats_Attaque" <?php if( $_SESSION[ 'post' ][ 'malus_adress' ] == "attr_Stats_Attaque"  ) { echo 'selected'; } ?>>Diminuer l'Attaque de 1</option>
							<option value="attr_Stats_Parade" <?php if( $_SESSION[ 'post' ][ 'malus_adress' ] == "attr_Stats_Parade"  ) { echo 'selected'; } ?>>Diminuer la Parade de 1</option>
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
			<?php if( $aOrigines[ $_SESSION['post']['origine'] ]->id == 10 ) { // Ogre ?>
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

			<?php if( $aJobs[ $_SESSION['post']['metier'] ]->id == 3 ) { // Pretre  ?>
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

			<?php if( $aJobs[ $_SESSION['post']['metier'] ]->id == 4 ) { // Mage  ?>
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

			<?php if( $aJobs[ $_SESSION['post']['metier'] ]->id == 5 ) { // Pretre  ?>
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

			<?php if( $aJobs[ $_SESSION['post']['metier'] ]->id == 6 ) { // Ranger  ?>
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

			<?php if( $aJobs[ $_SESSION['post']['metier'] ]->id == 9 ) { // Marchand  ?>
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

			<?php if( $aJobs[ $_SESSION['post']['metier'] ]->id == 10 ) { // Ingénieur  ?>
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
		<button class="nxt__btn btn btn-secondary float-start" type="submit" name="btnStep" value="5"> Retour</button>
	</form>
	<!---<button class="nxt__btn btn btn-success float-end" type="submit" name="btnStep" value="7" form="charactersheet"> Fin</button>--->
</div>

<script>
    const malusAdresseSelect = document.querySelector('select[name="malus_adress"]');
    const bonusAdresseSelect = document.querySelector('select[name="bonus_adresse"]');
    const malusRangerSelect = document.querySelector('select[name="malus_ranger"]');
    const bonusRangerSelect = document.querySelector('select[name="bonus_ranger"]');
    const malusMarchandSelect = document.querySelector('select[name="malus_marchand"]');
    const bonusMarchandSelect = document.querySelector('select[name="bonus_marchand"]');
    const malusIngenieurSelect = document.querySelector('select[name="malus_ingenieur"]');
    const bonusIngenieurSelect = document.querySelector('select[name="bonus_ingenieur"]');

    const attaqueInput = document.getElementById('attr_Stats_Attaque');
    const paradeInput = document.getElementById('attr_Stats_Parade');
    const courageInput = document.getElementById('attr_Stats_Courage');
    const intelligenceInput = document.getElementById('attr_Stats_Intelligence');
    const charismeInput = document.getElementById('attr_Stats_Charisme');
    const adresseInput = document.getElementById('attr_Stats_Adresse');
    const forceInput = document.getElementById('attr_Stats_Force');

    // Store initial values from PHP
    let baseAttaque = parseFloat(attaqueInput.value);
    let baseParade = parseFloat(paradeInput.value);
    let baseCourage = parseFloat(courageInput.value);
    let baseIntelligence = parseFloat(intelligenceInput.value);
    let baseCharisme = parseFloat(charismeInput.value);
    let baseAdresse = parseFloat(adresseInput.value);
    let baseForce = parseFloat(forceInput.value);

    function updateStats() {
        let currentAttaque = baseAttaque;
        let currentParade = baseParade;
        let currentCourage = baseCourage;
        let currentIntelligence = baseIntelligence;
        let currentCharisme = baseCharisme;
        let currentAdresse = baseAdresse;
        let currentForce = baseForce;

        // Apply malus/bonus from adresse
        if (malusAdresseSelect && malusAdresseSelect.value === 'attr_Stats_Attaque') {
            currentAttaque -= 1;
        } else if (malusAdresseSelect && malusAdresseSelect.value === 'attr_Stats_Parade') {
            currentParade -= 1;
        }

        if (bonusAdresseSelect && bonusAdresseSelect.value === 'attr_Stats_Attaque') {
            currentAttaque += 1;
        } else if (bonusAdresseSelect && bonusAdresseSelect.value === 'attr_Stats_Parade') {
            currentParade += 1;
        }

        // Apply malus/bonus from Ranger
        if (malusRangerSelect && malusRangerSelect.value) {
            const statToDecrease = malusRangerSelect.value;
            if (statToDecrease === 'courage') currentCourage -= 1;
            else if (statToDecrease === 'intelligence') currentIntelligence -= 1;
            else if (statToDecrease === 'charisme') currentCharisme -= 1;
            else if (statToDecrease === 'adresse') currentAdresse -= 1;
            else if (statToDecrease === 'force') currentForce -= 1;
        }
        if (bonusRangerSelect && bonusRangerSelect.value) {
            const statToIncrease = bonusRangerSelect.value;
            if (statToIncrease === 'courage') currentCourage += 1;
            else if (statToIncrease === 'intelligence') currentIntelligence += 1;
            else if (statToIncrease === 'charisme') currentCharisme += 1;
            else if (statToIncrease === 'adresse') currentAdresse += 1;
            else if (statToIncrease === 'force') currentForce += 1;
        }

        // Apply malus/bonus from Marchand
        if (malusMarchandSelect && malusMarchandSelect.value) {
            if (malusMarchandSelect.value === 'attr_Stats_Attaque') currentAttaque -= 1;
            else if (malusMarchandSelect.value === 'attr_Stats_Parade') currentParade -= 1;
        }
        if (bonusMarchandSelect && bonusMarchandSelect.value) {
            const statToIncrease = bonusMarchandSelect.value;
            if (statToIncrease === 'intelligence') currentIntelligence += 1;
            else if (statToIncrease === 'charisme') currentCharisme += 1;
        }

        // Apply malus/bonus from Ingénieur
        if (malusIngenieurSelect && malusIngenieurSelect.value) {
            if (malusIngenieurSelect.value === 'attr_Stats_Attaque') currentAttaque -= 1;
            else if (malusIngenieurSelect.value === 'attr_Stats_Parade') currentParade -= 1;
        }
        if (bonusIngenieurSelect && bonusIngenieurSelect.value) {
            const statToIncrease = bonusIngenieurSelect.value;
            if (statToIncrease === 'intelligence') currentIntelligence += 1;
            else if (statToIncrease === 'adresse') currentAdresse += 1;
        }

        attaqueInput.value = currentAttaque;
        paradeInput.value = currentParade;
        courageInput.value = currentCourage;
        intelligenceInput.value = currentIntelligence;
        charismeInput.value = currentCharisme;
        adresseInput.value = currentAdresse;
        forceInput.value = currentForce;
    }

    if (malusAdresseSelect) {
        malusAdresseSelect.addEventListener('change', updateStats);
    }
    if (bonusAdresseSelect) {
        bonusAdresseSelect.addEventListener('change', updateStats);
    }
    if (malusRangerSelect) {
        malusRangerSelect.addEventListener('change', updateStats);
    }
    if (bonusRangerSelect) {
        bonusRangerSelect.addEventListener('change', updateStats);
    }
    if (malusMarchandSelect) {
        malusMarchandSelect.addEventListener('change', updateStats);
    }
    if (bonusMarchandSelect) {
        bonusMarchandSelect.addEventListener('change', updateStats);
    }
    if (malusIngenieurSelect) {
        malusIngenieurSelect.addEventListener('change', updateStats);
    }
    if (bonusIngenieurSelect) {
        bonusIngenieurSelect.addEventListener('change', updateStats);
    }

    // Initial update on page load
    updateStats();
</script>