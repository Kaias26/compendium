<header>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="#">Naheulbeuk - Compendium</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item <?php if( $folder == "home" ) {?>active<?php }?>">
					<a class="nav-link" href="/"><i class="fas fa-home"></i> Accueil</a>
				</li>
				<li class="nav-item <?php if( $folder == "faq" ) {?>active<?php }?>">
					<a class="nav-link" href="/faq"><i class="fas fa-question-circle"></i> Mode d'emploi</a>
				</li>
				<li class="nav-item dropdown <?php if( $folder == "grimoires" ) {?>active<?php }?>">
					<a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="fas fa-book"></i> Grimoires</a>
					<div class="dropdown-menu" aria-labelledby="dropdown01">
						<a class="dropdown-item <?php if( $group == "mage" ) {?>active<?php }?>" href="/grimoires/mage">Mage</a>
						<a class="dropdown-item <?php if( $group == "paladin" ) {?>active<?php }?>" href="/grimoires/paladin">Paladin</a>
						<a class="dropdown-item <?php if( $group == "Pretre" ) {?>active<?php }?>" href="/grimoires/pretre">Prêtre</a>
					</div>
				</li>
				<li class="nav-item dropdown <?php if( $folder == "pnj" ) {?>active<?php }?>">
					<a class="nav-link dropdown-toggle" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="fas fa-book-dead"></i> PNJ</a>
					<div class="dropdown-menu" aria-labelledby="dropdown02">
						<a class="dropdown-item <?php if( $group == "invocations" ) {?>active<?php }?>" href="/pnj/invocations">Invocations</a>
						<a class="dropdown-item <?php if( $group == "bestiaire" ) {?>active<?php }?>" href="/pnj/bestiaire">Bestiaire</a>
						<a class="dropdown-item <?php if( $group == "pretires" ) {?>active<?php }?>" href="/pnj/pretires">Pré-tirés</a>
						<a class="dropdown-item <?php if( $group == "traitsspeciaux" ) {?>active<?php }?>" href="/pnj/traitsspeciaux">Traits spéciaux</a>
					</div>
				</li>
				<li class="nav-item dropdown <?php if( $folder == "pj" ) {?>active<?php }?>">
					<a class="nav-link dropdown-toggle" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="fas fa-portrait"></i> PJ</a>
					<div class="dropdown-menu" aria-labelledby="dropdown03">
						<a class="dropdown-item <?php if( $group == "competences" ) {?>active<?php }?>" href="/pj/competences">Compétences</a>
						<a class="dropdown-item <?php if( $group == "coupsspeciaux" ) {?>active<?php }?>" href="/pj/coupsspeciaux">Coups spéciaux</a>
						<a class="dropdown-item <?php if( $group == "traitsparticuliers" ) {?>active<?php }?>" href="/pj/traitsparticuliers">Traits particuliers</a>
						<a class="dropdown-item <?php if( $group == "ape" ) {?>active<?php }?>" href="/pj/ape">APE</a>
					</div>
				</li>
				<li class="nav-item dropdown <?php if( $folder == "objets" ) {?>active<?php }?>">
					<a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="fas fa-toolbox"></i> Objets</a>
					<div class="dropdown-menu" aria-labelledby="dropdown04">
						<a class="dropdown-item <?php if( $group == "armement" ) {?>active<?php }?>" href="/objets/traitsspeciaux">Armement</a>
						<a class="dropdown-item <?php if( $group == "protections" ) {?>active<?php }?>" href="/objets/protections">Protections</a>
						<a class="dropdown-item <?php if( $group == "accessoires" ) {?>active<?php }?>" href="/objets/accessoires">Accessoires</a>
						<a class="dropdown-item <?php if( $group == "materiel" ) {?>active<?php }?>" href="/objets/materiel">Matériel</a>
						<a class="dropdown-item <?php if( $group == "ingredients" ) {?>active<?php }?>" href="/objets/ingredients">Ingrédients</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</header>