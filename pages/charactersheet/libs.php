<?php 

$aStats = [ "courage", "intelligence", "charisme", "adresse", "force" ];

//=== Origines
class Origine
{
	public $id;
	public $label;
	public $tooltip;
	public $courage;
	public $intelligence;
	public $charisme;
	public $adresse;
	public $force;
	public $ev;
	public $ea;
	public $at;
	public $prd;
	public $competencesNaissance;
	public $competencesAuChoix;
	public $poids;
	
	public function isAvailable() {
		$availaible = 0;
		global $aStats;

		foreach( $aStats as $stat ) {
			// Vérifie  les stats min
			if( $this->$stat[0] == "Non" ) { $availaible++; }
			elseif( $_SESSION[ 'post' ][ 'dice_' . $stat ] >= $this->$stat[0]  ) { $availaible++; }
			else { return false; }

			// Vérifie  les stats max
			if( $this->$stat[1] == "Non" ) { $availaible++; }
			elseif( $_SESSION[ 'post' ][ 'dice_' . $stat ] <= $this->$stat[1] ) { $availaible++; }
			else { return false; }
		}
		
		if( $availaible === 10 ) { return true; }
		else { return false; }
	}
}

$humain = new Origine();
$humain->id = 0;
$humain->label = "Humain";
$humain->tooltip = "L'aventurier de base";
$humain->courage = ["Non", "Non"];
$humain->intelligence = ["Non", "Non"];
$humain->charisme = ["Non", "Non"];
$humain->adresse = ["Non", "Non"];
$humain->force = ["Non", "Non"];
$humain->ev = [30];
$humain->ea = [0,null];
$humain->at = [8,null];
$humain->prd = [10,null];
$humain->competencesNaissance = "0";
$humain->competencesAuChoix = "1,2,3,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49";
$humain->poids = [0];

$barbare = new Origine();
$barbare->id = 1;
$barbare->label = "Barbare";
$barbare->tooltip = "Rien à voir avec les paysans";
$barbare->courage = [12, "Non"];
$barbare->intelligence = ["Non", "Non"];
$barbare->charisme = ["Non", "Non"];
$barbare->adresse = ["Non", "Non"];
$barbare->force = [13, "Non"];
$barbare->ev = [35];
$barbare->ea = [0,null];
$barbare->at = [9,null];
$barbare->prd = [9,null];
$barbare->competencesNaissance = "1,14,44,46 ";
$barbare->competencesAuChoix = "7,10,15,23,30,35,38,47,49";
$barbare->poids = [0];

$nain = new Origine();
$nain->id = 2;
$nain->label = "Nain";
$nain->tooltip = "Je ne suis pas chiant, j'ai du caractère";
$nain->courage = [11, "Non"];
$nain->intelligence = ["Non", "Non"];
$nain->charisme = ["Non", "Non"];
$nain->adresse = ["Non", "Non"];
$nain->force = [12, "Non"];
$nain->ev = [35];
$nain->ea = [0,null];
$nain->at = [8,null];
$nain->prd = [10,null];
$nain->competencesNaissance = "5,29,37,40";
$nain->competencesAuChoix = "3,8,10,11,14,26,24,33,47,49";
$nain->poids = [0];

$hautElfe = new Origine();
$hautElfe->id = 3;
$hautElfe->label = "Haut Elfe";
$hautElfe->tooltip = "Très beau et plutôt adroit mais surtout...modeste";
$hautElfe->courage = ["Non", "Non"];
$hautElfe->intelligence = [11, "Non"];
$hautElfe->charisme = [12, "Non"];
$hautElfe->adresse = [12, "Non"];
$hautElfe->force = ["Non", 12];
$hautElfe->ev = [25];
$hautElfe->ea = [0,null];
$hautElfe->at = [8,null];
$hautElfe->prd = [10,null];
$hautElfe->competencesNaissance = "22,43,48";
$hautElfe->competencesAuChoix = "13,15,31,35,39,47";
$hautElfe->poids = [10];

$demiElfe = new Origine();
$demiElfe->id = 4;
$demiElfe->label = "Demi-Elfe";
$demiElfe->tooltip = "50% humain, 50% elfe, 100% rejeté";
$demiElfe->courage = ["Non", "Non"];
$demiElfe->intelligence = ["Non", "Non"];
$demiElfe->charisme = [10, "Non"];
$demiElfe->adresse = [11, "Non"];
$demiElfe->force = ["Non", "Non"];
$demiElfe->ev = [28];
$demiElfe->ea = [0,null];
$demiElfe->at = [8,null];
$demiElfe->prd = [10,null];
$demiElfe->competencesNaissance = "3,21,16,33";
$demiElfe->competencesAuChoix = "11,15,22,23,27,34,35,47";
$demiElfe->poids = [15];

$elfeSylvain = new Origine();
$elfeSylvain->id = 5;
$elfeSylvain->label = "Elfe Sylvain";
$elfeSylvain->tooltip = "Ça rime avec shampoing";
$elfeSylvain->courage = ["Non", "Non"];
$elfeSylvain->intelligence = ["Non", "Non"];
$elfeSylvain->charisme = [12, "Non"];
$elfeSylvain->adresse = [10, "Non"];
$elfeSylvain->force = ["Non", 11];
$elfeSylvain->ev = [25];
$elfeSylvain->ea = [0,null];
$elfeSylvain->at = [8,null];
$elfeSylvain->prd = [10,null];
$elfeSylvain->competencesNaissance = "15,36,39,47,48";
$elfeSylvain->competencesAuChoix = "17,19,31,35,38,46";
$elfeSylvain->poids = [10];

$elfeNoir = new Origine();
$elfeNoir->id = 6;
$elfeNoir->label = "Elfe Noir";
$elfeNoir->tooltip = "Super Dark et super ténébreux";
$elfeNoir->courage = ["Non", "Non"];
$elfeNoir->intelligence = [12, "Non"];
$elfeNoir->charisme = ["Non", "Non"];
$elfeNoir->adresse = [13, "Non"];
$elfeNoir->force = ["Non", "Non"];
$elfeNoir->ev = [25];
$elfeNoir->ea = [0,null];
$elfeNoir->at = [8,null];
$elfeNoir->prd = [10,null];
$elfeNoir->competencesNaissance = "2,19,21,47";
$elfeNoir->competencesAuChoix = "1,16,22,23,24,25,33,38,43";
$elfeNoir->poids = [15];

$orque = new Origine();
$orque->id = 7;
$orque->label = "Orque";
$orque->tooltip = "Moi orque. Moi taper !";
$orque->courage = ["Non", "Non"];
$orque->intelligence = ["Non", 8];
$orque->charisme = ["Non", 10];
$orque->adresse = ["Non", "Non"];
$orque->force = [12, "Non"];
$orque->ev = [35];
$orque->ea = [0,null];
$orque->at = [9,null];
$orque->prd = [9,null];
$orque->competencesNaissance = "2,4,5,10,28,44,46";
$orque->competencesAuChoix = "7,14,27,30,49";
$orque->poids = [0];

$demiOrque = new Origine();
$demiOrque->id = 8;
$demiOrque->label = "Demi-Orque";
$demiOrque->tooltip = "Fort comme un orque, malin comme un humain (ou le contraire ?)";
$demiOrque->courage = ["Non", "Non"];
$demiOrque->intelligence = ["Non", 10];
$demiOrque->charisme = ["Non", "Non"];
$demiOrque->adresse = ["Non", 11];
$demiOrque->force = [12, "Non"];
$demiOrque->ev = [35];
$demiOrque->ea = [0,null];
$demiOrque->at = [8,null];
$demiOrque->prd = [10,null];
$demiOrque->competencesNaissance = "2,14,28,44,46";
$demiOrque->competencesAuChoix = "7,10,23,27,30,35,47,49";
$demiOrque->poids = [0];

$gobelin = new Origine();
$gobelin->id = 9;
$gobelin->label = "Gobelin";
$gobelin->tooltip = "Zwavezedah ! Zwavezedah !";
$gobelin->courage = ["Non", 10];
$gobelin->intelligence = ["Non", 10];
$gobelin->charisme = ["Non", 8];
$gobelin->adresse = ["Non", "Non"];
$gobelin->force = ["Non", 9];
$gobelin->ev = [20];
$gobelin->ea = [0,null];
$gobelin->at = [8,null];
$gobelin->prd = [10,null];
$gobelin->competencesNaissance = "2,3,4,9,28,29,44,46";
$gobelin->competencesAuChoix = "11,20,23,24";
$gobelin->poids = [10];

$ogre = new Origine();
$ogre->id = 10;
$ogre->label = "Ogre";
$ogre->tooltip = "Akala miam miam";
$ogre->courage = ["Non", "Non"];
$ogre->intelligence = ["Non", 9];
$ogre->charisme = ["Non", 10];
$ogre->adresse = ["Non", 11];
$ogre->force = [13, "Non"];
$ogre->ev = [45];
$ogre->ea = [0,null];
$ogre->at = [9,null];
$ogre->prd = [9,null];
$ogre->competencesNaissance = "6,5,7,28,30,44,46";
$ogre->competencesAuChoix = "10,14,27,32,49";
$ogre->poids = [0];

$hobbit = new Origine();
$hobbit->id = 11;
$hobbit->label = "Semi-Homme";
$hobbit->tooltip = "Un genre de hobbit";
$hobbit->courage = [12, "Non"];
$hobbit->intelligence = [10, "Non"];
$hobbit->charisme = ["Non", "Non"];
$hobbit->adresse = ["Non", "Non"];
$hobbit->force = ["Non", 10];
$hobbit->ev = [25];
$hobbit->ea = [0,null];
$hobbit->at = [8,null];
$hobbit->prd = [10,null];
$hobbit->competencesNaissance = "5,9,18,28,42";
$hobbit->competencesAuChoix = "3,16,22,26,27,25,29,34,47";
$hobbit->poids = [10];

$gnome = new Origine();
$gnome->id = 12;
$gnome->label = "Gnôme";
$gnome->tooltip = "Des forêts du Nord (et avec deux jambes)";
$gnome->courage = ["Non", "Non"];
$gnome->intelligence = [10, "Non"];
$gnome->charisme = ["Non", "Non"];
$gnome->adresse = [13, "Non"];
$gnome->force = ["Non", 8];
$gnome->ev = [15];
$gnome->ea = [0,null];
$gnome->at = [10,null];
$gnome->prd = [8,null];
$gnome->competencesNaissance = "1,3,15,16,19,29";
$gnome->competencesAuChoix = "17,20,21,23,31,34,35,45";
$gnome->poids = [2];

$aOrigines = [ $humain, $barbare, $nain, $hautElfe, $demiElfe, $elfeSylvain, $elfeNoir, $orque, $demiOrque, $gobelin, $ogre, $hobbit, $gnome ];

//=== Origines
class Metier
{
	public $id;
	public $label;
	public $tooltip;
	public $courage;
	public $intelligence;
	public $charisme;
	public $adresse;
	public $force;
	public $ev;
	public $ea;
	public $at;
	public $prd;
	public $competencesNaissance;
	public $competencesAuChoix;
	public $poids;
	
	public function isAvailable() {
		$availaible = 0;
		global $aStats;
		
		foreach( $aStats as $stat ) {
			// Vérifie  les stats min
			if( $this->$stat[0] == "Non" ) { $availaible++; }
			elseif( $_SESSION[ 'post' ][ 'dice_' . $stat ] >= $this->$stat[0]  ) { $availaible++; }
			else { return false; }

			// Vérifie  les stats max
			if( $this->$stat[1] == "Non" ) { $availaible++; }
			elseif( $_SESSION[ 'post' ][ 'dice_' . $stat ] <= $this->$stat[1] ) { $availaible++; }
			else { return false; }
		}
		
		if( $availaible === 10 ) { return true; }
		else { return false; }
	}
}


//=== METIERS
$guerrier = new Metier();
$guerrier->id = 0;
$guerrier->label = "Guerrier";
$guerrier->tooltip = "Apte à la baston dès le plus bas niveau !";
$guerrier->courage = [12, "Non"];
$guerrier->intelligence = ["Non", "Non"];
$guerrier->charisme = ["Non", "Non"];
$guerrier->adresse = ["Non", "Non"];
$guerrier->force = [12, "Non"];
$guerrier->ev = [35,"Fixe","Humain,Barbare",5];
$guerrier->ea = [0,null];
$guerrier->at = [0,null];
$guerrier->prd = [0,null];
$guerrier->competencesNaissance = "7,10";
$guerrier->competencesAuChoix = "1,14,15,24,30,47,49";

$ninja = new Metier();
$ninja->id = 1;
$ninja->label = "Ninja ";
$ninja->tooltip = "Tu ne le sais pas encore mais tu es déjà mort";
$ninja->courage = ["Non", "Non"];
$ninja->intelligence = ["Non", "Non"];
$ninja->charisme = ["Non", "Non"];
$ninja->adresse = [13, "Non"];
$ninja->force = ["Non", "Non"];
$ninja->ev = [0,null];
$ninja->ea = [0,null];
$ninja->at = [11,"Fixe"];
$ninja->prd = [8,"Fixe"];
$ninja->competencesNaissance = "19,25,47";
$ninja->competencesAuChoix = "1,14,15,22,23,33,35,42";

$voleur = new Metier();
$voleur->id = 2;
$voleur->label = "Voleur";
$voleur->tooltip = "C'est dans ma poche";
$voleur->courage = ["Non", "Non"];
$voleur->intelligence = ["Non", "Non"];
$voleur->charisme = ["Non", "Non"];
$voleur->adresse = [12, "Non"];
$voleur->force = ["Non", "Non"];
$voleur->ev = [0,null];
$voleur->ea = [0,null];
$voleur->at = [0,null];
$voleur->prd = [0,null];
$voleur->competencesNaissance = "3,16,19,21,45";
$voleur->competencesAuChoix = "8,20,22,23,27,25,33,42";

$pretre = new Metier();
$pretre->id = 3;
$pretre->label = "Prêtre";
$pretre->tooltip = "Peut faire appel aux prodiges des dieux";
$pretre->courage = ["Non", "Non"];
$pretre->intelligence = ["Non", "Non"];
$pretre->charisme = [12, "Non"];
$pretre->adresse = ["Non", "Non"];
$pretre->force = ["Non", "Non"];
$pretre->ev = [0,null];
$pretre->ea = [20];
$pretre->at = [0,null];
$pretre->prd = [0,null];
$pretre->competencesNaissance = "22,33,41";
$pretre->competencesAuChoix = "8,15,18,26,39,40,43";

$mage = new Metier();
$mage->id = 4;
$mage->label = "Mage";
$mage->tooltip = "Abracadab...woups";
$mage->courage = ["Non", "Non"];
$mage->intelligence = [12, "Non"];
$mage->charisme = ["Non", "Non"];
$mage->adresse = ["Non", "Non"];
$mage->force = ["Non", "Non"];
$mage->ev = [20,"Fixe","Humain","-30%"];
$mage->ea = [30];
$mage->at = [0,null];
$mage->prd = [0,null];
$mage->competencesNaissance = "22,41,43";
$mage->competencesAuChoix = "3,13,15,26,32,39";

$paladin = new Metier();
$paladin->id = 5;
$paladin->label = "Paladin";
$paladin->tooltip = "Mi Guerrier, Mi Prêtre";
$paladin->courage = [12, "Non"];
$paladin->intelligence = [10, "Non"];
$paladin->charisme = [11, "Non"];
$paladin->adresse = ["Non", "Non"];
$paladin->force = [9, "Non"];
$paladin->ev = [32,"Fixe","Humain",2];
$paladin->ea = [10];
$paladin->at = [0,null];
$paladin->prd = [0,null];
$paladin->competencesNaissance = "15,30,41";
$paladin->competencesAuChoix = "7,14,22,26,39";

$ranger = new Metier();
$ranger->id = 6;
$ranger->label = "Ranger";
$ranger->tooltip = "Connaissez vous le Ranger du chaos ?";
$ranger->courage = ["Non", "Non"];
$ranger->intelligence = ["Non", "Non"];
$ranger->charisme = [10, "Non"];
$ranger->adresse = [10, "Non"];
$ranger->force = ["Non", "Non"];
$ranger->ev = [0,null];
$ranger->ea = [0,null];
$ranger->at = [0,null];
$ranger->prd = [0,null];
$ranger->competencesNaissance = "21,15,19,35,38";
$ranger->competencesAuChoix = "1,13,17,20,22,23,33,39,47";

$menestrel = new Metier();
$menestrel->id = 7;
$menestrel->label = "Ménestrel";
$menestrel->tooltip = "Chante pour motiver (ou pas) le groupe";
$menestrel->courage = ["Non", "Non"];
$menestrel->intelligence = ["Non", "Non"];
$menestrel->charisme = [12, "Non"];
$menestrel->adresse = [11, "Non"];
$menestrel->force = ["Non", "Non"];
$menestrel->ev = [0,null];
$menestrel->ea = [0,null];
$menestrel->at = [0,null];
$menestrel->prd = [0,null];
$menestrel->competencesNaissance = "9,15,22,26,31,36";
$menestrel->competencesAuChoix = "33,34,39,43,47";

$pirate = new Metier();
$pirate->id = 8;
$pirate->label = "Pirate";
$pirate->tooltip = "Yaaaarrrrgl !";
$pirate->courage = [11, "Non"];
$pirate->intelligence = ["Non", "Non"];
$pirate->charisme = ["Non", "Non"];
$pirate->adresse = [11, "Non"];
$pirate->force = ["Non", "Non"];
$pirate->ev = [0,null];
$pirate->ea = [0,null];
$pirate->at = [0,null];
$pirate->prd = [0,null];
$pirate->competencesNaissance = "3,5,8,16,23,35";
$pirate->competencesAuChoix = "21,27,33,34,29,47";

$marchand = new Metier();
$marchand->id = 9;
$marchand->label = "Marchand";
$marchand->tooltip = "Son métier ? le profit";
$marchand->courage = ["Non", "Non"];
$marchand->intelligence = [12, "Non"];
$marchand->charisme = [11, "Non"];
$marchand->adresse = ["Non", "Non"];
$marchand->force = ["Non", "Non"];
$marchand->ev = [0,null];
$marchand->ea = [0,null];
$marchand->at = [0,null];
$marchand->prd = [0,null];
$marchand->competencesNaissance = "3,8,22,26,33";
$marchand->competencesAuChoix = "13,15,18,24,29,43";

$ingenieur = new Metier();
$ingenieur->id = 10;
$ingenieur->label = "Ingénieur ";
$ingenieur->tooltip = "Des années d'études pour en arriver la";
$ingenieur->courage = ["Non", "Non"];
$ingenieur->intelligence = ["Non", "Non"];
$ingenieur->charisme = ["Non", "Non"];
$ingenieur->adresse = [11, "Non"];
$ingenieur->force = ["Non", "Non"];
$ingenieur->ev = [0,null];
$ingenieur->ea = [0,null];
$ingenieur->at = [0,null];
$ingenieur->prd = [0,null];
$ingenieur->competencesNaissance = "11,20,24,42,45";
$ingenieur->competencesAuChoix = "3,18,15,22,35,39";

$bourgeois = new Metier();
$bourgeois->id = 11;
$bourgeois->label = "Bourgeois";
$bourgeois->tooltip = "Mes parents sont puissants et influents !";
$bourgeois->courage = ["Non", "Non"];
$bourgeois->intelligence = [10, "Non"];
$bourgeois->charisme = [11, "Non"];
$bourgeois->adresse = ["Non", "Non"];
$bourgeois->force = ["Non", "Non"];
$bourgeois->ev = [0,null];
$bourgeois->ea = [0,null];
$bourgeois->at = [7,"Fixe"];
$bourgeois->prd = [9,"Fixe"];
$bourgeois->competencesNaissance = "3,9,15,22,37";
$bourgeois->competencesAuChoix = "8,13,31,33,35,43";

$aMetiers = [ $guerrier, $ninja, $voleur, $pretre, $mage, $paladin, $ranger, $menestrel, $pirate, $marchand, $ingenieur, $bourgeois ];

//=== Soldats

$officier = new Metier();
$officier->id = 12;
$officier->label = "Officier";
$officier->courage = ["Non", "Non"];
$officier->intelligence = [11, "Non"];
$officier->charisme = [12, "Non"];
$officier->adresse = ["Non", "Non"];
$officier->force = ["Non", "Non"];
$officier->ev = [0,null];
$officier->ea = [0,null];
$officier->at = [9,"Fixe"];
$officier->prd = [10,"Fixe"];
$officier->competencesNaissance = "13,33,32,3,15";
$officier->competencesAuChoix = "0";

$eclaireur = new Metier();
$eclaireur->id = 13;
$eclaireur->label = "Éclaireur";
$eclaireur->courage = ["Non", "Non"];
$eclaireur->intelligence = ["Non", "Non"];
$eclaireur->charisme = ["Non", "Non"];
$eclaireur->adresse = [12, "Non"];
$eclaireur->force = ["Non", "Non"];
$eclaireur->ev = [3, "origine+"];
$eclaireur->ea = [0,null];
$eclaireur->at = [11,"Fixe"];
$eclaireur->prd = [9,"Fixe"];
$eclaireur->competencesNaissance = "15,19,47,23,35,21,38";
$eclaireur->competencesAuChoix = "0";

$soldatLourd = new Metier();
$soldatLourd->id = 14;
$soldatLourd->label = "Soldat lourd";
$soldatLourd->courage = [11, "Non"];
$soldatLourd->intelligence = ["Non", "Non"];
$soldatLourd->charisme = ["Non", "Non"];
$soldatLourd->adresse = ["Non", "Non"];
$soldatLourd->force = [12, "Non"];
$soldatLourd->ev = [8, "origine+"];
$soldatLourd->ea = [0,null];
$soldatLourd->at = [10,"Fixe"];
$soldatLourd->prd = [11,"Fixe"];
$soldatLourd->competencesNaissance = "10,7,30,14,49";
$soldatLourd->competencesAuChoix = "0";

$medecin = new Metier();
$medecin->id = 15;
$medecin->label = "Médecin";
$medecin->courage = ["Non", "Non"];
$medecin->intelligence = [12, "Non"];
$medecin->charisme = ["Non", "Non"];
$medecin->adresse = [12, "Non"];
$medecin->force = ["Non", "Non"];
$medecin->ev = [2, "origine+"];
$medecin->ea = [0,null];
$medecin->at = [9,"Fixe"];
$medecin->prd = [11,"Fixe"];
$medecin->competencesNaissance = "22,39,3,35,15,18,43";
$medecin->competencesAuChoix = "0";

$armurierArtificer = new Metier();
$armurierArtificer->id = 16;
$armurierArtificer->label = "Artificier";
$armurierArtificer->courage = ["Non", "Non"];
$armurierArtificer->intelligence = [12, "Non"];
$armurierArtificer->charisme = ["Non", "Non"];
$armurierArtificer->adresse = [12, "Non"];
$armurierArtificer->force = ["Non", "Non"];
$armurierArtificer->ev = [4, "origine+"];
$armurierArtificer->ea = [0,null];
$armurierArtificer->at = [9,"Fixe"];
$armurierArtificer->prd = [10,null];
$armurierArtificer->competencesNaissance = "22,11,20,45,21,24";
$armurierArtificer->competencesAuChoix = "0";

$volontaire = new Metier();
$volontaire->id = 17;
$volontaire->label = "Volontaire";
$volontaire->courage = ["Non", "Non"];
$volontaire->intelligence = ["Non", "Non"];
$volontaire->charisme = ["Non", "Non"];
$volontaire->adresse = ["Non", "Non"];
$volontaire->force = ["Non", "Non"];
$volontaire->ev = [0,null];
$volontaire->ea = [0,null];
$volontaire->at = [0,null];
$volontaire->prd = [0,null];
$volontaire->competencesNaissance = "0";
$volontaire->competencesAuChoix = "0";

$aSoldats=[ $officier, $eclaireur, $soldatLourd, $medecin, $armurierArtificer, $volontaire ];

//=== SUPPLEMENTS
$bourreau = new Metier();
$bourreau->id = 18;
$bourreau->label = "Bourreau";
$bourreau->courage = ["Non", "Non"];
$bourreau->intelligence = ["Non", "Non"];
$bourreau->charisme = ["Non", "Non"];
$bourreau->adresse = ["Non", "Non"];
$bourreau->force = ["Non", "Non"];
$bourreau->ev = [2, "origine+"];
$bourreau->ea = [0,null];
$bourreau->at = [10,"Fixe"];
$bourreau->prd = [8,"Fixe"];
$bourreau->competencesNaissance = "7,5,25,30,32,33,2088,2089,2090";
$bourreau->competencesAuChoix = "21,11,24,47,35,23,15,14,39,49";

$sbire = new Metier();
$sbire->id = 19;
$sbire->label = "Sbire";
$sbire->courage = ["Non", 10];
$sbire->intelligence = ["Non", 11];
$sbire->charisme = ["Non", 11];
$sbire->adresse = ["Non", "Non"];
$sbire->force = ["Non", "Non"];
$sbire->ev = [0,null];
$sbire->ea = [0,null];
$sbire->at = [9,"Fixe"];
$sbire->prd = [9,"Fixe"];
$sbire->competencesNaissance = "3,25,32,26,33,34,42,27,2091,2092,2093";
$sbire->competencesAuChoix = "1,2,3,5,6,7,8,9,10,11,12,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49";

$nainDeLaMafia = new Metier();
$nainDeLaMafia->id = 20;
$nainDeLaMafia->label = "Nain de la Mafia";
$nainDeLaMafia->courage = [10, "Non"];
$nainDeLaMafia->intelligence = [11, "Non"];
$nainDeLaMafia->charisme = ["Non", "Non"];
$nainDeLaMafia->adresse = [12, "Non"];
$nainDeLaMafia->force = [11, "Non"];
$nainDeLaMafia->ev = [38,"Fixe", "", ""];
$nainDeLaMafia->ea = [0,null];
$nainDeLaMafia->at = [10,"Fixe"];
$nainDeLaMafia->prd = [9,"Fixe"];
$nainDeLaMafia->competencesNaissance = "5,29,40,1,10,16,42,2094,2095";
$nainDeLaMafia->competencesAuChoix = "45,3,38,21,8,11,26,33,47,20";

$amazoneSylderienne = new Metier();
$amazoneSylderienne->id = 21;
$amazoneSylderienne->label = "Amazone Sylderienne";
$amazoneSylderienne->courage = [12, "Non"];
$amazoneSylderienne->intelligence = ["Non", "Non"];
$amazoneSylderienne->charisme = [12, "Non"];
$amazoneSylderienne->adresse = [11, "Non"];
$amazoneSylderienne->force = [12, "Non"];
$amazoneSylderienne->ev = [38,"Fixe", "", ""];
$amazoneSylderienne->ea = [0,null];
$amazoneSylderienne->at = [10,"Fixe"];
$amazoneSylderienne->prd = [8,"Fixe"];
$amazoneSylderienne->competencesNaissance = "9,14,10,15,46,49,2096,2097,2098,2099";
$amazoneSylderienne->competencesAuChoix = "23,30,35,38,47,28";

$chaman = new Metier();
$chaman->id = 22;
$chaman->label = "Chaman de Jungle";
$chaman->courage = ["Non", "Non"];
$chaman->intelligence = [11, "Non"];
$chaman->charisme = [11, "Non"];
$chaman->adresse = [11, "Non"];
$chaman->force = ["Non", "Non"];
$chaman->ev = [34,"Fixe", "", ""];
$chaman->ea = [0,null];
$chaman->at = [10,"Fixe"];
$chaman->prd = [9,"Fixe"];
$chaman->competencesNaissance = "2,10,19,23,35,38,39,47,28,2100,2101";
$chaman->competencesAuChoix = "7,3,14,15,17,18,21,30";

$jobless = new Metier();
$jobless->id = 23;
$jobless->label = "Sans métier";
$jobless->courage = ["Non", "Non"];
$jobless->intelligence = ["Non", "Non"];
$jobless->charisme = ["Non", "Non"];
$jobless->adresse = ["Non", "Non"];
$jobless->force = ["Non", "Non"];
$jobless->ev = [0,null];
$jobless->ea = [0,null];
$jobless->at = [0,null];
$jobless->prd = [0,null];
$jobless->competencesNaissance = "0";
$jobless->competencesAuChoix = "0";

$aSupplements = [ $bourreau, $sbire, $nainDeLaMafia, $amazoneSylderienne, $chaman ] ;

$aJobs = [ $guerrier, $ninja, $voleur, $pretre, $mage, $paladin, $ranger, $menestrel, $pirate, $marchand, $ingenieur, $bourgeois, $officier, $eclaireur, $soldatLourd, $medecin, $armurierArtificer, $volontaire, $bourreau, $sbire, $nainDeLaMafia, $amazoneSylderienne, $chaman, $jobless ];

?>