<header>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="/">Naheulbeuk - Compendium</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav me-auto mb-2 mb-md-0">
					<li class="nav-item">
						<a class="nav-link <?php if( $folder == "home" ) {?>active<?php }?>" href="/"><i class="fas fa-home"></i> Accueil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php if( $folder == "faq" ) {?>active<?php }?>" href="/faq"><i class="fas fa-question-circle"></i> Mode d'emploi</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle <?php if( $folder == "grimoires" ) {?>active<?php }?>" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-book"></i> Grimoires</a>
						<ul class="dropdown-menu" aria-labelledby="dropdown01">
							<li><a class="dropdown-item <?php if( $group == "mage" ) {?>active<?php }?>" href="/grimoires/mage">Mage</a></li>
							<li><a class="dropdown-item <?php if( $group == "paladin" ) {?>active<?php }?>" href="/grimoires/paladin">Paladin</a></li>
							<li><a class="dropdown-item <?php if( $group == "Pretre" ) {?>active<?php }?>" href="/grimoires/pretre">Prêtre</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle <?php if( $folder == "pnj" ) {?>active<?php }?>" id="dropdown02" data-bs-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-book-dead"></i> PNJ</a>
						<ul class="dropdown-menu" aria-labelledby="dropdown02">
							<li><a class="dropdown-item <?php if( $group == "invocations" ) {?>active<?php }?>" href="/pnj/invocations">Invocations</a></li>
							<li><a class="dropdown-item <?php if( $group == "bestiaire" ) {?>active<?php }?>" href="/pnj/bestiaire">Bestiaire</a></li>
							<li><a class="dropdown-item <?php if( $group == "pretires" ) {?>active<?php }?>" href="/pnj/pretires">Pré-tirés</a></li>
							<li><a class="dropdown-item <?php if( $group == "traitsspeciaux" ) {?>active<?php }?>" href="/pnj/traitsspeciaux">Traits spéciaux</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle <?php if( $folder == "pj" ) {?>active<?php }?>" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-portrait"></i> PJ</a>
						<ul class="dropdown-menu" aria-labelledby="dropdown03">
							<li><a class="dropdown-item <?php if( $group == "competences" ) {?>active<?php }?>" href="/pj/competences">Compétences</a></li>
							<li><a class="dropdown-item <?php if( $group == "coupsspeciaux" ) {?>active<?php }?>" href="/pj/coupsspeciaux">Coups spéciaux</a></li>
							<li><a class="dropdown-item <?php if( $group == "traitsparticuliers" ) {?>active<?php }?>" href="/pj/traitsparticuliers">Traits particuliers</a></li>
							<li><a class="dropdown-item <?php if( $group == "ape" ) {?>active<?php }?>" href="/pj/ape">APE</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle <?php if( $folder == "objets" ) {?>active<?php }?>" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-toolbox"></i> Objets</a>
						<ul class="dropdown-menu" aria-labelledby="dropdown04">
							<li><a class="dropdown-item <?php if( $group == "armement" ) {?>active<?php }?>" href="/objets/armement">Armement</a></li>
							<li><a class="dropdown-item <?php if( $group == "protections" ) {?>active<?php }?>" href="/objets/protections">Protections</a></li>
							<li><a class="dropdown-item <?php if( $group == "accessoires" ) {?>active<?php }?>" href="/objets/accessoires">Accessoires</a></li>
							<li><a class="dropdown-item <?php if( $group == "materiel" ) {?>active<?php }?>" href="/objets/materiel">Matériel</a></li>
							<li><a class="dropdown-item <?php if( $group == "ingredients" ) {?>active<?php }?>" href="/objets/ingredients">Ingrédients</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>