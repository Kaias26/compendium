<form method="post" action="/charactersheet/charactersheet" id="charactersheet">
	<fieldset id="form1">
		<div class="sub__title__container ">
			<p>Etape 8/<?php echo $maxStep ?></p>
			<h2>Résumé</h2>
			<p>Une petite relecture, quelques ajustements et vous pourrez (enfin ?) récupérer votre personnage.</p>
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
							value="<?php echo $oCurrentOrigine->label ?>"
							required readonly
						>
						<label for="attr_Personnage_Origine">Origine :</label>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-floating">
						<input type="text" class="form-control" name="attr_Personnage_Metiers" id="attr_Personnage_Metiers" 
							placeholder="Metier :"
							value="<?php echo $oCurrentMetier->label ?>"
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
							value="<?php echo $_SESSION[ 'post' ][ 'attr_Personnage_Sex' ] ?>"							
						>
						<label for="attr_Personnage_Sex">Sexe :</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-floating">
						<input type="text" class="form-control" name="attr_Personnage_Age" id="attr_Personnage_Age" 
							placeholder="Âge :"
							value="<?php echo $_SESSION[ 'post' ][ 'attr_Personnage_Age' ] ?>"							
						>
						<label for="attr_Personnage_Age">Âge :</label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-floating">
						<input type="text" class="form-control" name="attr_Personnage_Taille" id="attr_Personnage_Taille" 
							placeholder="Taille : "
							value="<?php echo $_SESSION[ 'post' ][ 'attr_Personnage_Taille' ] ?>"							
						>
						<label for="attr_Personnage_Taille">Taille : </label>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-floating">
						<input type="text" class="form-control" name="attr_Personnage_Poids" id="attr_Personnage_Poids" 
							placeholder="Poids : "
							value="<?php echo $_SESSION[ 'post' ][ 'attr_Personnage_Poids' ] ?>"							
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
		</div>
	</fieldset>
	<br>
</form>

<div class="buttons">
	<form method="post" action="/charactersheet/charactersheet">
		<button class="nxt__btn btn btn-secondary float-start" type="submit" name="btnStep" value="7"> Retour</button>
	</form>
	<!---<button class="nxt__btn btn btn-success float-end" type="submit" name="btnStep" value="7" form="charactersheet"> Fin</button>--->
</div>