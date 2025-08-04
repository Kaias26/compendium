<?php

class Nom
{
    public $id;
    public $origine;
    public $sex;
    public $nom; // array
    public $prenom; // array
    public $titre; // array
    public $phrase; // string
    public $provenance; // array

    public function __construct($id, $origine, $sex, $nom, $prenom, $titre, $phrase, $provenance)
    {
        $this->id = $id;
        $this->origine = $origine;
        $this->sex = $sex;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->titre = $titre;
        $this->phrase = $phrase;
        $this->provenance = $provenance;
    }
}

$aNoms = [];

// semihommes-homme
$aNoms[] = new Nom(
    0,
    "semihommes",
    "homme",
    ["Gilbert", "Brolodon", "Jospard", "Berlik", "Piplin", "Sammog", "Frobedon", "Isengrin", "Fifrelin", "Julodon", "Bodanol", "Doric", "Euvrard", "Gilbart", "Tobold", "Jeredic", "Tormac", "Toradoc", "Rodanol", "Itugariol"],
    ["Latranche", "Boudinière", "Dussoce", "Dunombre", "Soulamiche", "Largebide", "Sacquetin", "Lamoutarde", "Loucherude", "Tambouillard", "Croustillo", "Labouchée", "Bravepitance", "Lardoise", "Touraillegron", "Souslegras", "Soulabarde", "Craquet"],
    ["Maître-Chef", "Le Traiteur", "Chasse-Lapin", "Plèd-velu", "L'Escamoteur", "Gobe-Jambon", "Le Gâte-Sauce", "Le Roi du Gougnon", "L'Attrape-Grain", "Le Casse-Graine", "Le Gras-Luron", "Piège-Faisan", "Ras-le-Couenne", "Le Hachoir", "Courte Jambes", "Grand-Hachoir", "Le Tranche-Lard", "Ras-du-Sol", "Leste-Canif", "Mâche-Ripaille"],
    " de ",
    ["Fierpâté", "sous la Colline", "Graissepatelin", "Rilletebourg", "Grospanier", "Roudmeule", "Labit en Mötte", "Terrineville", "Ragoutmenil", "dans l'Mooté", "Grilletardon", "là-bas dans l'Est", "Rougepinard", "Fieretable", "Graschaudron", "Combeceillour", "Moultecopine", "Fin-de-Pochon", "Bourg-de-Saindoux", "Bourg-Marcassin"]
);

// semihommes-femme
$aNoms[] = new Nom(
    1,
    "semihommes",
    "femme",
    ["Frodane", "Gilberte", "Frodelle", "Bertha", "Adalise", "Dalpee", "Chipola", "Stelline", "Foscane", "Aspoda", "Gilline", "Rambine", "Célanguine", "Mimosa", "Blanca", "Menegilde", "Myrfa", "Gousta", "Péonia", "Mortadelle"],
    ["Latranche", "Boudinière", "Dussoce", "Dunombre", "Soulamiche", "Largebide", "Sacquetin", "Lamoutarde", "Sadon-Dugou", "Loucherude", "Tambouillard", "Croustillo", "Labouchée", "Bravepitance", "Lardoise", "Souslegras", "Soulabarde", "Craquet"],
    ["La Gargotière", "L'Attrape-Chou", "Chasse-Lapin", "Grillebarde", "L'Escamoteuse", "La Jamoneuse", "La Saucisse", "Tranche-Couenne", "La Dégourdie", "Ras-le-Gouron", "La Charcutière", "Fichtrepain", "Beau-Jupon", "La Mégère", "La Nouille", "La Rôtisseuse", "La Forte-Tête", "L'Intrépide"],
    " de ",
    ["Fierpâté", "sous la Colline", "Graissepatelin", "Rilletebourg", "Grospanier", "Roudmeule", "Labit en Mötte", "Terrineville", "Ragoutmenil", "dans l'Mooté", "Grilletardon", "là-bas dans l'Est", "Rougepinard", "Fieretable", "Graschaudron", "Combeceillour", "Moultecopine", "Fin-de-Pochon", "Bourg-de-Saindoux", "Bourg-Marcassin"]
);

// nobles-homme.html
$aNoms[] = new Nom(
    2,
    "Nobles",
    "homme",
    ["Fulbert", "Bertin-Renard", "Honoré-Blaise", "Bertrand", "Firmin", "Prôôme", "Eudes-Rufus", "Francaillon", "Hubert", "Helmeken", "Bonifacius", "Flarentin", "Ishidur", "Morneblae", "Burencisc", "Clotaire", "Damien-Jules", "Thilbert", "Théolibert", "Julien-Robert"],
    ["Ralagonbe", "Bravache", "Sauvagine", "Dusangbleu", "Argenteux", "Dubrillant", "Dispendiard", "Fasteriche", "Fortunard", "Nantide", "Ploutorustre", "Onéristule", "Survénal", "Moulthune", "Dupecule-Joli", "Viroflouze-Chéro", "Bourbistrouille", "Pécunière", "Fricanbar"],
    ["De Poutrefier", "De Sangverse", "Des Hôbereaux", "Du Haut-Lieu", "De Grantour", "Deuxième du nom", "Troisième du nom", "De Grandecité", "Dugratin", "Haltefort", "De Vadecôffiot", "De Raboulepèze", "Des Picaillons", "De Fierlingot", "Boursicot-Dublé", "De Môriaquie", "De l'Ancienne Vontorz", "De Rogebourson", "De Brassefroid", "De Chaudebière"],
    "",
    [] // No 4th UL in this file
);

// nobles-femme.html
$aNoms[] = new Nom(
    3,
    "Nobles",
    "femme",
    ["Sidonie", "Florentine", "Jacinte", "Louise-Roberte", "Beltandia", "Bertille", "Crépine", "Edwige", "Nono", "Aude-Sophie", "Marceline", "Angélique", "Odile", "Tarwena", "Ananie-Rose", "Honorine", "Bérangère", "Nakunälle", "Acacia"],
    ["Ralagonbe", "Bravache", "Sauvagine", "Dusangbleu", "Argenteux", "Dubrillant", "Dispendiard", "Fasteriche", "Nantide", "Ploutorustre", "Onéristule", "Survénal", "Moulthune", "Dupecule-Joli", "Viroflouze-Chéro", "Bourbistrouille", "Pécunière", "Fricanbar"],
    ["De Poutrefier", "De Sangverse", "Des Hôbereaux", "Du Haut-Lieu", "De Grantour", "Deuxième du nom", "Troisième du nom", "De Grandecité", "Dugratin", "Haltefort", "De Vadecôffiot", "De Raboulepèze", "Des Picaillons", "De Fierlingot", "Boursicot-Dublé", "De Môriaquie", "De l'Ancienne Vontorz", "De Rogebourson", "De Brassefroid", "De Chaudebière"],
    "",
    [] // No 4th UL in this file
);

// nains-homme.html
$aNoms[] = new Nom(
    4,
    "Nains",
    "homme",
    ["Gurdil", "Carlodh", "Brilodh", "Filiriol", "Dur-Brolk", "Yalonil", "Burdik", "Crânol", "Burnok", "Murizul", "Zorgön", "Bok-Dur", "Younordil", "Jargöl", "Aurudil", "Vorbadok", "Brönn", "Dormigol", "Grünn", "Hargudil"],
    ["Fierbarbe", "Frappedur", "Labarrique", "Brise-Chope", "Trois-Lingots", "Largebourse", "Tranche-Bras", "Longuebarbe", "Six-Litres", "Dutonneau", "Marchelourd", "Grosmanche", "Fierpaquet", "De l'Est", "Bonnegiffe", "Tue-Vite", "Décolle-Tête", "Longuelame", "Fort-Acier", "Puretaloche"],
    ["De Jambfer", "Des Mines Hyjup", "Des Mines Audiar", "De Mir-Nodd", "De Martembur", "De Rata-Dor", "De Brugg", "D'Abili", "De Picaroc", "De Zanblul", "D'Uzudil", "De Birtek", "De Miliuj", "De l'Est", "Du Nord", "Des Monts Perdus", "Des Mines Mortes", "De Brol-Bazaz", "De Tumigor", "De Klag-Fort"],
    " fils ",
    ["De la Pierre", "De l'Enclume", "Du Filon d'Or", "De la Strate", "De Goltor", "De la Colline Courbe", "Des Deux Pics", "De la Pioche Noire", "Des Dieux Forts", "Du Grand Forgeron", "Des Batailles", "Du Destin Perdu", "De l'Inconnu", "Des Trois Cols", "Du Col Gelé", "Du Granite Sombre", "Des Cinq Gemmes", "De la Hache Rouge", "Du Bouclier de Fer", "De mes Parents"]
);

// elfesnoirs-homme.html
$aNoms[] = new Nom(
    5,
    "elfesnoirs",
    "homme",
    ["Karzalan", "Tuk'hia", "Kalyklos", "Lath'ak", "Rath", "Guldakan", "Saren", "Oren'tior", "Utriq", "Valzo'ken", "Blatagh", "Lorno'kan", "Zalvor", "Lioq", "Zuzbul", "Al'nagquk", "Korven", "Chalkir", "Lozbotir", "Otrog"],
    ["Thorp", "Turrak", "Nanouzg", "Uk'la", "Noireflèche", "Eldagagh", "Thork", "Le Sans-Père", "Zool", "Lamerouge", "Vudroz", "Rullaak", "Seldo'ron", "Vaar-Zoon", "Da'holok", "Xulatyr", "Ragmor", "Slaboroth", "Fauchegorge", "Guz'turrak"],
    ["L'Exilé", "La Lame", "Le Surineur", "L'Errant", "La Fantôme", "Le Cauchemar", "Le Sans-Père", "L'Héritier", "L'Oublié", "Le Prédateur", "L'Etrangleur", "L'Ombre", "Le Noctambule", "Le Revenant", "Le Solitaire", "Le Fossoyeur", "Le Coupe-gorge", "Le Couperet", "Le Fulgurant"],
    "",
    ["De Zuggr'hvilo", "De La Faille d'Abigor", "Des Cavernes Pourpres", "De La Passe de Ropolk", "Qui défie les Dieux", "Qui boit les âmes", "De Tragh'naggul", "Des Collines Perdues", "Des Monts du Centre", "De Zuruk", "Des Ténèbres", "Morne du Nord", "Sinistre des Caves", "De Slanoush", "Ecarlate", "Lugubre de Gal'nagh", "Funeste du Sud", "Mauve du Tertre", "des Tombeaux", "Maussade de Zoyek"]
);

// elfesnoirs-femme.html
$aNoms[] = new Nom(
    6,
    "elfesnoirs",
    "femme",
    ["Nakasha", "Tuk'hia", "Kalydulaa", "Dalar'ak", "Vatania", "Suffaka", "Sévrine", "Drelge", "Ulra'a", "Valza'hua", "Biara", "Lorna'kane", "Zathae", "Luz'ibël", "Tuzidelle", "Bil'nagga", "Korvëne", "Chalkira", "Laz'fine", "Otraga"],
    ["Thorak", "Nanouzg", "Uk'la", "Noireflèche", "Eldagagh", "Thork", "Dagonnen", "Zool", "Lamerouge", "Vudroz", "Rullaak", "Seldo'ron", "Vaar-Zoon", "Da'holok", "Xulatyr", "Ragmor", "Slaboroth", "Fauchegorge", "Guz'turrak"],
    ["L'Exilée", "La Lame", "La Chasseresse", "La Sournoise", "La Spectrale", "La Retorse", "Sanguinaire", "La Damnée", "L'Héritière", "L'Oubliée", "La Prédatrice", "L'Etrangleuse", "L'Ombre", "La Noctambule", "La Revenante", "Le Dernier Rêve", "La Faucheuse", "La Terreur", "Lame Affûtée", "La Fulgurante"],
    "",
    ["De Zuggr'hvilo", "De La Faille d'Abigor", "Des Cavernes Pourpres", "De La Passe de Ropolk", "Qui défie les Dieux", "Qui boit les âmes", "De Tragh'naggul", "Des Collines Perdues", "Des Monts du Centre", "De Zuruk", "Des Ténèbres", "Morne du Nord", "Sinistre des Caves", "De Slanoush", "Ecarlate", "Lugubre de Gal'nagh", "Funeste du Sud", "Mauve du Tertre", "des Tombeaux", "Maussade de Zoyek"]
);

// elfes-homme.html
$aNoms[] = new Nom(
    7,
    "Elfes",
    "homme",
    ["Naziel", "Jagdaniel", "Blifilmaen", "Filibert", "Ethanul", "Tinsion", "Yaduzef", "Célidol", "Jelagamiel", "Dalgorim", "Glandubile", "Beluel", "Zifimiel", "Pilron", "Perpalinor", "Fritgal", "Filimipel", "Faladom", "Télandiv"],
    ["L'Intrépide Lame", "Le Preste Dague", "Le Vif Ménestrel", "Le Taillé-Crayon", "Le Forestier", "Le Pied Alerte", "La Flèche", "Le Bretteur Joli", "Le Fier Musard", "Le Freluquet", "Le Beau Compère", "Doux-Copain", "L'Œil Aiguisé", "L'Archer Parfait", "Le Pied Silencieux", "Le Rôdeur Souple", "Le Beau Geste", "L'Ombre Véloce", "Le Bel Ami"],
    ["à Cape d'Argent", "des Étoiles Mauves", "du Bosquet", "de la Forêt Bleue", "des Trois Monts", "des Frondaisons", "des Cimes Venteuses", "des Chênes", "des Bourgeons", "des Fougères", "des Feuillages", "des Futaies", "à Capuche Verte", "en Sandales", "des Souches", "des Taillis", "du Grand Verger", "Tranquille-Bise", "des Framboisiers", "en Tongs"],
    " de ",
    ["Bomolor", "Félédubor", "Talairfin", "Glandorn", "Nirmerollinir", "Folonariel", "N'talamela", "Larinournel", "Nubash", "Ranalfoutiel", "l'Abishal", "Lunelbar", "Schilpak", "la Forêt d'Oulien", "l'Étendue boisée par la", "Rustuli", "Zut je ne sais plus", "Shahwoudh", "l'Ouest Vivifiant", "La belle cabane"]
);

// elfes-femme.html
$aNoms[] = new Nom(
    8,
    "Elfes",
    "femme",
    ["Sulia", "Sélénia", "Pétalou", "Nurabelle", "Cyliwen", "Féanorina", "Pétronille", "Britaniel", "Cuitômiel", "Persélaboë", "Marwën", "Tépanuile", "Lépiotmel", "Sylvedwenn", "Zinielle", "Filtaboë", "Elwina", "Turwinnë", "Nobéliane"],
    ["La Douce Amie", "Compagne", "Dame Agile", "L'Enchanteresse", "La Copine", "Fine-Fleur", "La Rose Pâle", "Belle-de-Source", "L'Allumeuse", "La Grâce", "La Douce", "L'Etourdie", "La Voluptueuse", "La Merveille", "La Charmeuse", "L'Immaculée", "l'Étoile Pure", "l'Exhibitrile", "Flèche Gracieuse", "Bonasse"],
    ["des Ponays", "des Sapins", "des Biches", "des Salades", "des Étoiles Mauves", "du Ciel Nocturne", "en Sandales", "des Frondaisons", "des Frondaisons", "Éclatante", "Chatoyante", "aux Trois Gemmes", "Pétillante", "Rayonnante", "Fulgurante", "du Ciel du Matin", "de la Verdure", "des Fougères", "des Bourgeons", "des Petits Oiseaux"],
    " de ",
    ["Bomolor", "Félédubor", "Talairfin", "Glandorn", "Nirmerollinir", "Folonariel", "N'talamela", "Larinournel", "Nubash", "Ranalfoutiel", "l'Abishal", "Lunelbar", "Schilpak", "la Frambouillen", "l'Étendue boisée par la", "Rustuli", "Zut je ne sais plus", "Shahwoudh", "l'Ouest Vivifiant", "La belle cabane"]
);

// barbares-femme.html
$aNoms[] = new Nom(
    9,
    "Barbares",
    "femme",
    ["Oanell","Valva","Noma","Lili","Beltaz","Bulguth","Germä","Vorgine","Sandrili","Urglane","Klara","Sorna","Friga","Urzine","Vloggen","Hialdr","Gullicne","Brutzell","Booldine","Zirgild"],
    ["Casseuse de","La tueuse de","Flèche-des-","Maraîchère de","Broie-les-","L'éventreuse de","Chasseresse des","Diablesse des","Fendeuse de","Tabasse-des-","Cauchemar des","Mutile-des-","Domine-les-","Bastonneuse de","Brise-les-","La désolation des","Ombre-tueuse de","Exécutrice des","Marche-sur-les-"],
    ["Connards","Fauves","Trolls","Peaux-vertes","Corbeaux","Léviathans","Fougères","Monstres","Licornes","Destins","Mâles","Dragons","Souverains","Démons","Dragons","Géants","Guerriers","Mages noirs","Dieux","Felons"],
    " du clan ",
    ["Ruckha","Des Hyènes","Des Ouklafs","Drugal","Raggak","Des Fendeurs de Têtes","Brazok","De la plaine de Krild","Du Grand lac Noir","Nuk-Razzil","Invaincu du Nord","Glorieux de l'Ouest","Eud' la Côte","Bah j'ai oublié","De la rivière Kraouk","Des Chevaliers Violents","Qui sent des pieds","Dans la jungle","Des Brutaux du Centre","Qui t'emmerde"]
);

// barbares-homme.html
$aNoms[] = new Nom(
    10,
    "Barbares",
    "homme",
    ["Tor", "Thod", "Kyrn", "Taurogh", "Gourga", "Oagak", "Nounouk", "Cranan", "Aruhl", "Munghor", "Fraq", "Hok-Dan", "Yougar", "Bragh", "Auruth", "Vorbaz", "Xounouk", "Vorguk", "Beurgh", "Kuul"],
    ["Briseur de", "Le faucheur de", "Frappe-des-", "Le broyeur de", "Tabasse-des-", "Piétine-les-", "Le martyr-des", "Trancheur-de", "Le destructeur de", "Cauchemar des", "Ravageur des", "L'abuseur de", "Le bourreau des", "Tourmente-les-", "Ecorcheur des", "Spéciale des", "L'exécuteur des", "Tortionnaire des"],
    ["Coccinelles", "Gobelins", "Visages", "Coyotes", "Montagnes", "Gros Ours", "Monstres", "Mammouths", "Destins", "Mauviettes", "Bouchers", "Rois", "Démons", "Dragons", "Géants", "Tripes", "Sorciers", "Dieux", "Crânes morts"],
    " du clan ",
    ["Ruckha","Des Hyènes","Des Ouklafs","Drugal","Raggak","Des Fendeurs de Têtes","Brazok","De la plaine de Krild","Du Grand lac Noir","Nuk-Razzil","Invaincu du Nord","Glorieux de l'Ouest","Eud' la Côte","Bah j'ai oublié","De la rivière Kraouk","Des Chevaliers Violents","Qui sent des pieds","Dans la jungle","Des Brutaux du Centre","Qui t'emmerde"]
);

if( !isset( $_SESSION[ 'post' ][ 'sex' ] ) ) {
	// Premiere connexion
	$_SESSION[ 'post' ][ 'sex' ] = "femme";
	$_SESSION[ 'post' ][ 'origine' ] = "Barbares";
}

if( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{
	foreach( $_POST AS $key => $value ) {
		$_SESSION['post'][$key] = $value;
	}
}

$selectedNom = null;
$aSelectedNoms=[];
$aPrenoms=[];
$aTitres=[];
$phrase="";
$aProvenances=[];

foreach ($aNoms as $nomItem) {
    if ($nomItem->origine == $_SESSION['post']['origine'] && $nomItem->sex == $_SESSION['post']['sex']) {
    	$selectedNom = $nomItem;
        $aSelectedNoms = $nomItem->nom;
        $aPrenoms = $nomItem->prenom;
        $aTitres = $nomItem->titre;
        $phrase = $nomItem->phrase;
        $aProvenances = $nomItem->provenance;
        break;
    }
}

?>
<div class="starter-template">
	<h1 class="mt-5">Générateur de Nom</h1>
</div>
<div class="container">
	<form method="post" action="/tools/generateurNoms" id="noms">
		<div class="row justify-content-md-center">
			<div class="col-lg-3">
				<div class="card">
					<div class="card-header">
						<b>Origine</b>
					</div>
					<?php
						$allOrigins = [];
						foreach ($aNoms as $nomItem) {
							if (!in_array($nomItem->origine, $allOrigins)) {
								$allOrigins[] = $nomItem->origine;
							}
						}
						sort($allOrigins);

						foreach ($allOrigins as $origin) {
							$checked = "";
							if( $_SESSION[ 'post' ][ 'origine' ] == $origin ) {
								$checked = "checked";
							}
							$label = ucfirst($origin);
							if ($origin == "elfesnoirs") {
								$label = "Elfes Noirs";
							} else if ($origin == "semihommes") {
								$label = "Semi-Hommes";
							}
							$tooltip = "Générateur de noms pour les " . $label . ".";
					?>
					<input type="radio" required="" class="btn-check" name="origine" id="origine-<?php echo $origin; ?>" autocomplete="off" value="<?php echo $origin; ?>"<?php echo( $checked )?>>
					<label class="btn btn-outline-primary" for="origine-<?php echo $origin; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="<?php echo $tooltip; ?>"><?php echo $label; ?></label>
					<?php
						}
					?>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card">
					<div class="card-header">
						<b>Sexe</b>
					</div>
					<?php
						$checked = "";
						if( $_SESSION[ 'post' ][ 'sex' ] == "femme" ) {
							$checked = "checked";
						}
					?>
					<input type="radio" required="" class="btn-check" name="sex" id="sex-femme" autocomplete="off" value="femme" <?php echo( $checked )?>>
					<label class="btn btn-outline-primary" for="sex-femme">Féminin</label>

					<?php
						$checked = "";
						if( $_SESSION[ 'post' ][ 'sex' ] == "homme" ) {
							$checked = "checked";
						}
					?>
					<input type="radio" required="" class="btn-check" name="sex" id="sex-homme" autocomplete="off" value="homme"<?php echo( $checked )?>>
					<label class="btn btn-outline-primary" for="sex-homme">Masculin</label>
				</div>
			</div>
			<div class="col-lg-1 align-self-center">
				<button class="btn btn-success" type="submit">Relancer</button>
			</div>
		</div>
	</div>
	<br>
	<div class="row text-center">
		<div class="col">
			<div class="card">
				<div class="card-header">
					<b>Tirage</b>
				</div>
				<ul class="list-group list-group-flush">
					<?php 			
					foreach( $aSelectedNoms as $iNom ) {
						echo '<li>' . $iNom . '</li>';
					}
					?>
				</ul>
			</div>
		</div>
		
		<div class="col">
			<div class="card">
				<div class="card-header">
					<b>Tirage</b>
				</div>
				<ul class="list-group list-group-flush">
					<?php 			
					foreach( $aPrenoms as $iPrenom ) {
						echo '<li>' . $iPrenom . '</li>';
					}
					?>
				</ul>
			</div>
		</div>

		<div class="col">
			<div class="card">
				<div class="card-header">
					<b>Tirage</b>
				</div>
				<ul class="list-group list-group-flush">
					<?php 			
					foreach( $aTitres as $iTitre ) {
						echo '<li>' . $iTitre . '</li>';
					}
					?>
				</ul>
			</div>
		</div>

		<div class="col">
			<div class="card">
				<div class="card-header">
					<b>Tirage</b>
				</div>
				<ul class="list-group list-group-flush">
					<?php 			
					foreach( $aProvenances as $iProvenances ) {
						echo '<li>' . $iProvenances . '</li>';
					}
					?>
				</ul>
			</div>
		</div>
	</div>
	<br>
	<div class="row text-center">
		<span id="results"></span>
	</div>
</div>

<script>
function display_results() {
	var _aResults = $("ul.list-group-flush");
	var _nom = $( _aResults[0] ).children(":first").html();
	var _prenom = $( _aResults[1] ).children(":first").html();
	var _titre = $( _aResults[2] ).children(":first").html();
	var _provenance = $( _aResults[3] ).children(":first").html();
	var _phrase = "<?php echo $phrase ?>";

	$( "#results" ).html( "Je suis " + _nom + " " + _prenom + " " + _titre + " " + _phrase + " " + _provenance  );
}
</script>