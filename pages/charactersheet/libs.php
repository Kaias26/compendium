<?php 

$aStats = [ "courage", "intelligence", "charisme", "adresse", "force" ];
$special_ids = [20, 21, 22]; // Nain de la Mafia, Amazone, Chaman

//=== Origines =======================================================================================================
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
	public $pratiqueMagie;

	public function __construct(array $data) {
		foreach ($data as $key => $value) {
			if (property_exists($this, $key)) {
				$this->$key = $value;
			}
		}
	}
	
	public function isAvailable() {
		$availaible = 0;
		global $aStats;
		$missingStats = [];

		foreach( $aStats as $stat ) {
			// Vérifie  les stats min
			if( $this->$stat[0] == "Non" ) { $availaible++; }
			elseif( $_SESSION[ 'post' ][ 'dice_' . $stat ] >= $this->$stat[0]  ) { $availaible++; }
			else { 
				$missingStats[] = ucfirst($stat) . " (min " . $this->$stat[0] . ")";
			}

			// Vérifie  les stats max
			if( $this->$stat[1] == "Non" ) { $availaible++; }
			elseif( $_SESSION[ 'post' ][ 'dice_' . $stat ] <= $this->$stat[1] ) { $availaible++; }
			else { 
				$missingStats[] = ucfirst($stat) . " (max " . $this->$stat[1] . ")";
			}
		}
		
		if( count($missingStats) > 0 ) {
			$this->tooltip = implode("<br>", $missingStats);
			return false;
		} else {
			return true;
		}
	}
}

class Metier extends Origine {}

//=== DATA ==========================================================================================================

$originesData = [
	[
		'id' => 0,
		'label' => 'Humain',
		'tooltip' => "L'aventurier de base",
		'courage' => ['Non', 'Non'],
		'intelligence' => ['Non', 'Non'],
		'charisme' => ['Non', 'Non'],
		'adresse' => ['Non', 'Non'],
		'force' => ['Non', 'Non'],
		'ev' => [30],
		'ea' => [0,null],
		'at' => [8,null],
		'prd' => [10,null],
		'competencesNaissance' => [0],
		'competencesAuChoix' => [1,2,3,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49],
		'poids' => [0],
		'pratiqueMagie' => 1,
	],
	[
		'id' => 1,
		'label' => 'Barbare',
		'tooltip' => 'Rien à voir avec les paysans',
		'courage' => [12, 'Non'],
		'intelligence' => ['Non', 'Non'],
		'charisme' => ['Non', 'Non'],
		'adresse' => ['Non', 'Non'],
		'force' => [13, 'Non'],
		'ev' => [35],
		'ea' => [0,null],
		'at' => [9,null],
		'prd' => [9,null],
		'competencesNaissance' => [1,14,44,46],
		'competencesAuChoix' => [7,10,15,23,30,35,38,47,49],
		'poids' => [0],
		'pratiqueMagie' => 0,
	],
	[
		'id' => 2,
		'label' => 'Nain',
		'tooltip' => "Je ne suis pas chiant, j'ai du caractère",
		'courage' => [11, 'Non'],
		'intelligence' => ['Non', 'Non'],
		'charisme' => ['Non', 'Non'],
		'adresse' => ['Non', 'Non'],
		'force' => [12, 'Non'],
		'ev' => [35],
		'ea' => [0,null],
		'at' => [8,null],
		'prd' => [10,null],
		'competencesNaissance' => [5,29,37,40],
		'competencesAuChoix' => [3,8,10,11,14,26,24,33,47,49],
		'poids' => [0],
		'pratiqueMagie' => 0,
	],
	[
		'id' => 3,
		'label' => 'Haut Elfe',
		'tooltip' => 'Très beau et plutôt adroit mais surtout...modeste',
		'courage' => ['Non', 'Non'],
		'intelligence' => [11, 'Non'],
		'charisme' => [12, 'Non'],
		'adresse' => [12, 'Non'],
		'force' => ['Non', 12],
		'ev' => [25],
		'ea' => [0,null],
		'at' => [8,null],
		'prd' => [10,null],
		'competencesNaissance' => [22,43,48],
		'competencesAuChoix' => [13,15,31,35,39,47],
		'poids' => [10],
		'pratiqueMagie' => 1,
	],
	[
		'id' => 4,
		'label' => 'Demi-Elfe',
		'tooltip' => '50% humain, 50% elfe, 100% rejeté',
		'courage' => ['Non', 'Non'],
		'intelligence' => ['Non', 'Non'],
		'charisme' => [10, 'Non'],
		'adresse' => [11, 'Non'],
		'force' => ['Non', 'Non'],
		'ev' => [28],
		'ea' => [0,null],
		'at' => [8,null],
		'prd' => [10,null],
		'competencesNaissance' => [3,21,16,33],
		'competencesAuChoix' => [11,15,22,23,27,34,35,47],
		'poids' => [15],
		'pratiqueMagie' => 1,
	],
	[
		'id' => 5,
		'label' => 'Elfe Sylvain',
		'tooltip' => 'Ça rime avec shampoing',
		'courage' => ['Non', 'Non'],
		'intelligence' => ['Non', 'Non'],
		'charisme' => [12, 'Non'],
		'adresse' => [10, 'Non'],
		'force' => ['Non', 11],
		'ev' => [25],
		'ea' => [0,null],
		'at' => [8,null],
		'prd' => [10,null],
		'competencesNaissance' => [15,36,39,47,48],
		'competencesAuChoix' => [17,19,31,35,38,46],
		'poids' => [10],
		'pratiqueMagie' => 1,
	],
	[
		'id' => 6,
		'label' => 'Elfe Noir',
		'tooltip' => 'Super Dark et super ténébreux',
		'courage' => ['Non', 'Non'],
		'intelligence' => [12, 'Non'],
		'charisme' => ['Non', 'Non'],
		'adresse' => [13, 'Non'],
		'force' => ['Non', 'Non'],
		'ev' => [25],
		'ea' => [0,null],
		'at' => [8,null],
		'prd' => [10,null],
		'competencesNaissance' => [2,19,21,47],
		'competencesAuChoix' => [1,16,22,23,24,25,33,38,43],
		'poids' => [15],
		'pratiqueMagie' => 1,
	],
	[
		'id' => 7,
		'label' => 'Orque',
		'tooltip' => 'Moi orque. Moi taper !',
		'courage' => ['Non', 'Non'],
		'intelligence' => ['Non', 8],
		'charisme' => ['Non', 10],
		'adresse' => ['Non', 'Non'],
		'force' => [12, 'Non'],
		'ev' => [35],
		'ea' => [0,null],
		'at' => [9,null],
		'prd' => [9,null],
		'competencesNaissance' => [2,4,5,10,28,44,46],
		'competencesAuChoix' => [7,14,27,30,49],
		'poids' => [0],
		'pratiqueMagie' => 0,
	],
	[
		'id' => 8,
		'label' => 'Demi-Orque',
		'tooltip' => 'Fort comme un orque, malin comme un humain (ou le contraire ?)',
		'courage' => ['Non', 'Non'],
		'intelligence' => ['Non', 10],
		'charisme' => ['Non', 'Non'],
		'adresse' => ['Non', 11],
		'force' => [12, 'Non'],
		'ev' => [35],
		'ea' => [0,null],
		'at' => [8,null],
		'prd' => [10,null],
		'competencesNaissance' => [2,14,28,44,46],
		'competencesAuChoix' => [7,10,23,27,30,35,47,49],
		'poids' => [0],
		'pratiqueMagie' => 0,
	],
	[
		'id' => 9,
		'label' => 'Gobelin',
		'tooltip' => 'Zwavezedah ! Zwavezedah !',
		'courage' => ['Non', 10],
		'intelligence' => ['Non', 10],
		'charisme' => ['Non', 8],
		'adresse' => ['Non', 'Non'],
		'force' => ['Non', 9],
		'ev' => [20],
		'ea' => [0,null],
		'at' => [8,null],
		'prd' => [10,null],
		'competencesNaissance' => [2,3,4,9,28,29,44,46],
		'competencesAuChoix' => [11,20,23,24],
		'poids' => [10],
		'pratiqueMagie' => 0,
	],
	[
		'id' => 10,
		'label' => 'Ogre',
		'tooltip' => 'Akala miam miam',
		'courage' => ['Non', 'Non'],
		'intelligence' => ['Non', 9],
		'charisme' => ['Non', 10],
		'adresse' => ['Non', 11],
		'force' => [13, 'Non'],
		'ev' => [45],
		'ea' => [0,null],
		'at' => [9,null],
		'prd' => [9,null],
		'competencesNaissance' => [6,5,7,28,30,44,46],
		'competencesAuChoix' => [10,14,27,32,49],
		'poids' => [0],
		'pratiqueMagie' => 0,
	],
	[
		'id' => 11,
		'label' => 'Semi-Homme',
		'tooltip' => 'Un genre de hobbit',
		'courage' => [12, 'Non'],
		'intelligence' => [10, 'Non'],
		'charisme' => ['Non', 'Non'],
		'adresse' => ['Non', 'Non'],
		'force' => ['Non', 10],
		'ev' => [25],
		'ea' => [0,null],
		'at' => [8,null],
		'prd' => [10,null],
		'competencesNaissance' => [5,9,18,28,42],
		'competencesAuChoix' => [3,16,22,26,27,25,29,34,47],
		'poids' => [10],
		'pratiqueMagie' => 1,
	],
	[
		'id' => 12,
		'label' => 'Gnôme',
		'tooltip' => 'Des forêts du Nord (et avec deux jambes)',
		'courage' => ['Non', 'Non'],
		'intelligence' => [10, 'Non'],
		'charisme' => ['Non', 'Non'],
		'adresse' => [13, 'Non'],
		'force' => ['Non', 8],
		'ev' => [15],
		'ea' => [0,null],
		'at' => [10,null],
		'prd' => [8,null],
		'competencesNaissance' => [1,3,15,16,19,29],
		'competencesAuChoix' => [17,20,21,23,31,34,35,45],
		'poids' => [2],
		'pratiqueMagie' => 0,
	],
];

$metiersData = [
    [
        'id' => 0,
        'label' => 'Guerrier',
        'tooltip' => 'Apte à la baston dès le plus bas niveau !',
        'courage' => [12, 'Non'],
        'intelligence' => ['Non', 'Non'],
        'charisme' => ['Non', 'Non'],
        'adresse' => ['Non', 'Non'],
        'force' => [12, 'Non'],
        'ev' => [35,'Fixe','Humain,Barbare',5],
        'ea' => [0,null],
        'at' => [0,null],
        'prd' => [0,null],
        'competencesNaissance' => [7,10],
        'competencesAuChoix' => [1,14,15,24,30,47,49],
        'pratiqueMagie' => 0,
    ],
    [
        'id' => 1,
        'label' => 'Ninja',
        'tooltip' => 'Tu ne le sais pas encore mais tu es déjà mort',
        'courage' => ['Non', 'Non'],
        'intelligence' => ['Non', 'Non'],
        'charisme' => ['Non', 'Non'],
        'adresse' => [13, 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [0,null],
        'ea' => [0,null],
        'at' => [11,'Fixe'],
        'prd' => [8,'Fixe'],
        'competencesNaissance' => [19,25,47],
        'competencesAuChoix' => [1,14,15,22,23,33,35,42],
        'pratiqueMagie' => 0,
    ],
    [
        'id' => 2,
        'label' => 'Voleur',
        'tooltip' => "C'est dans ma poche",
        'courage' => ['Non', 'Non'],
        'intelligence' => ['Non', 'Non'],
        'charisme' => ['Non', 'Non'],
        'adresse' => [12, 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [0,null],
        'ea' => [0,null],
        'at' => [0,null],
        'prd' => [0,null],
        'competencesNaissance' => [3,16,19,21,45],
        'competencesAuChoix' => [8,20,22,23,27,25,33,42],
        'pratiqueMagie' => 0,
    ],
    [
        'id' => 3,
        'label' => 'Prêtre',
        'tooltip' => 'Peut faire appel aux prodiges des dieux',
        'courage' => ['Non', 'Non'],
        'intelligence' => ['Non', 'Non'],
        'charisme' => [12, 'Non'],
        'adresse' => ['Non', 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [0,null],
        'ea' => [20],
        'at' => [0,null],
        'prd' => [0,null],
        'competencesNaissance' => [22,33,41],
        'competencesAuChoix' => [8,15,18,26,39,40,43],
        'pratiqueMagie' => 1,
    ],
    [
        'id' => 4,
        'label' => 'Mage',
        'tooltip' => 'Abracadab...woups',
        'courage' => ['Non', 'Non'],
        'intelligence' => [12, 'Non'],
        'charisme' => ['Non', 'Non'],
        'adresse' => ['Non', 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [20,'Fixe','Humain','-30%'],
        'ea' => [30],
        'at' => [0,null],
        'prd' => [0,null],
        'competencesNaissance' => [22,41,43],
        'competencesAuChoix' => [3,13,15,26,32,39],
        'pratiqueMagie' => 1,
    ],
    [
        'id' => 5,
        'label' => 'Paladin',
        'tooltip' => 'Mi Guerrier, Mi Prêtre',
        'courage' => [12, 'Non'],
        'intelligence' => [10, 'Non'],
        'charisme' => [11, 'Non'],
        'adresse' => ['Non', 'Non'],
        'force' => [9, 'Non'],
        'ev' => [32,'Fixe','Humain',2],
        'ea' => [10],
        'at' => [0,null],
        'prd' => [0,null],
        'competencesNaissance' => [15,30,41],
        'competencesAuChoix' => [7,14,22,26,39],
        'pratiqueMagie' => 1,
    ],
    [
        'id' => 6,
        'label' => 'Ranger',
        'tooltip' => 'Connaissez vous le Ranger du chaos ?',
        'courage' => ['Non', 'Non'],
        'intelligence' => ['Non', 'Non'],
        'charisme' => [10, 'Non'],
        'adresse' => [10, 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [0,null],
        'ea' => [0,null],
        'at' => [0,null],
        'prd' => [0,null],
        'competencesNaissance' => [21,15,19,35,38],
        'competencesAuChoix' => [1,13,17,20,22,23,33,39,47],
        'pratiqueMagie' => 0,
    ],
    [
        'id' => 7,
        'label' => 'Ménestrel',
        'tooltip' => 'Chante pour motiver (ou pas) le groupe',
        'courage' => ['Non', 'Non'],
        'intelligence' => ['Non', 'Non'],
        'charisme' => [12, 'Non'],
        'adresse' => [11, 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [0,null],
        'ea' => [0,null],
        'at' => [0,null],
        'prd' => [0,null],
        'competencesNaissance' => [9,15,22,26,31,36],
        'competencesAuChoix' => [33,34,39,43,47],
        'pratiqueMagie' => 0,
    ],
    [
        'id' => 8,
        'label' => 'Pirate',
        'tooltip' => 'Yaaaarrrrgl !',
        'courage' => [11, 'Non'],
        'intelligence' => ['Non', 'Non'],
        'charisme' => ['Non', 'Non'],
        'adresse' => [11, 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [0,null],
        'ea' => [0,null],
        'at' => [0,null],
        'prd' => [0,null],
        'competencesNaissance' => [3,5,8,16,23,35],
        'competencesAuChoix' => [21,27,33,34,29,47],
        'pratiqueMagie' => 0,
    ],
    [
        'id' => 9,
        'label' => 'Marchand',
        'tooltip' => 'Son métier ? le profit',
        'courage' => ['Non', 'Non'],
        'intelligence' => [12, 'Non'],
        'charisme' => [11, 'Non'],
        'adresse' => ['Non', 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [0,null],
        'ea' => [0,null],
        'at' => [0,null],
        'prd' => [0,null],
        'competencesNaissance' => [3,8,22,26,33],
        'competencesAuChoix' => [13,15,18,24,29,43],
        'pratiqueMagie' => 0,
    ],
    [
        'id' => 10,
        'label' => 'Ingénieur',
        'tooltip' => "Des années d'études pour en arriver la",
        'courage' => ['Non', 'Non'],
        'intelligence' => ['Non', 'Non'],
        'charisme' => ['Non', 'Non'],
        'adresse' => [11, 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [0,null],
        'ea' => [0,null],
        'at' => [0,null],
        'prd' => [0,null],
        'competencesNaissance' => [11,20,24,42,45],
        'competencesAuChoix' => [3,18,15,22,35,39],
        'pratiqueMagie' => 0,
    ],
    [
        'id' => 11,
        'label' => 'Bourgeois',
        'tooltip' => 'Mes parents sont puissants et influents !',
        'courage' => ['Non', 'Non'],
        'intelligence' => [10, 'Non'],
        'charisme' => [11, 'Non'],
        'adresse' => ['Non', 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [0,null],
        'ea' => [0,null],
        'at' => [7,'Fixe'],
        'prd' => [9,'Fixe'],
        'competencesNaissance' => [3,9,15,22,37],
        'competencesAuChoix' => [8,13,31,33,35,43],
        'pratiqueMagie' => 0,
    ],
];

$soldatsData = [
    [
        'id' => 12,
        'label' => 'Officier',
        'tooltip' => "Un vrai meneur d'hommes",
        'courage' => ['Non', 'Non'],
        'intelligence' => [11, 'Non'],
        'charisme' => [12, 'Non'],
        'adresse' => ['Non', 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [0,null],
        'ea' => [0,null],
        'at' => [9,'Fixe'],
        'prd' => [10,'Fixe'],
        'competencesNaissance' => [13,33,32,3,15],
        'competencesAuChoix' => [],
        'pratiqueMagie' => 0,
    ],
    [
        'id' => 13,
        'label' => 'Éclaireur',
        'tooltip' => 'Discret et rapide',
        'courage' => ['Non', 'Non'],
        'intelligence' => ['Non', 'Non'],
        'charisme' => ['Non', 'Non'],
        'adresse' => [12, 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [3, 'origine+'],
        'ea' => [0,null],
        'at' => [11,'Fixe'],
        'prd' => [9,'Fixe'],
        'competencesNaissance' => [15,19,47,23,35,21,38],
        'competencesAuChoix' => [],
        'pratiqueMagie' => 0,
    ],
    [
        'id' => 14,
        'label' => 'Soldat lourd',
        'tooltip' => 'Une vraie brute',
        'courage' => [11, 'Non'],
        'intelligence' => ['Non', 'Non'],
        'charisme' => ['Non', 'Non'],
        'adresse' => ['Non', 'Non'],
        'force' => [12, 'Non'],
        'ev' => [8, 'origine+'],
        'ea' => [0,null],
        'at' => [10,'Fixe'],
        'prd' => [11,'Fixe'],
        'competencesNaissance' => [10,7,30,14,49],
        'competencesAuChoix' => [],
        'pratiqueMagie' => 0,
    ],
    [
        'id' => 15,
        'label' => 'Médecin',
        'tooltip' => 'Soigne les petits et les gros bobos',
        'courage' => ['Non', 'Non'],
        'intelligence' => [12, 'Non'],
        'charisme' => ['Non', 'Non'],
        'adresse' => [12, 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [2, 'origine+'],
        'ea' => [0,null],
        'at' => [9,'Fixe'],
        'prd' => [11,'Fixe'],
        'competencesNaissance' => [22,39,3,35,15,18,43],
        'competencesAuChoix' => [],
        'pratiqueMagie' => 0,
    ],
    [
        'id' => 16,
        'label' => 'Artificier',
        'tooltip' => 'BOUM !',
        'courage' => ['Non', 'Non'],
        'intelligence' => [12, 'Non'],
        'charisme' => ['Non', 'Non'],
        'adresse' => [12, 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [4, 'origine+'],
        'ea' => [0,null],
        'at' => [9,'Fixe'],
        'prd' => [10,null],
        'competencesNaissance' => [22,11,20,45,21,24],
        'competencesAuChoix' => [],
        'pratiqueMagie' => 0,
    ],
    [
        'id' => 17,
        'label' => 'Volontaire',
        'tooltip' => 'La bleusaille',
        'courage' => ['Non', 'Non'],
        'intelligence' => ['Non', 'Non'],
        'charisme' => ['Non', 'Non'],
        'adresse' => ['Non', 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [0,null],
        'ea' => [0,null],
        'at' => [0,null],
        'prd' => [0,null],
        'competencesNaissance' => [],
        'competencesAuChoix' => [],
        'pratiqueMagie' => 0,
    ],
];

$supplementsData = [
    [
        'id' => 18,
        'label' => 'Bourreau',
        'tooltip' => 'Couic',
        'courage' => ['Non', 'Non'],
        'intelligence' => ['Non', 'Non'],
        'charisme' => ['Non', 'Non'],
        'adresse' => ['Non', 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [2, 'origine+'],
        'ea' => [0,null],
        'at' => [10,'Fixe'],
        'prd' => [8,'Fixe'],
        'competencesNaissance' => [7,5,25,30,32,33,2088,2089,2090],
        'competencesAuChoix' => [21,11,24,47,35,23,15,14,39,49],
        'pratiqueMagie' => 0,
    ],
    [
        'id' => 19,
        'label' => 'Sbire',
        'tooltip' => 'Le larbin de base',
        'courage' => ['Non', 10],
        'intelligence' => ['Non', 11],
        'charisme' => ['Non', 11],
        'adresse' => ['Non', 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [0,null],
        'ea' => [0,null],
        'at' => [9,'Fixe'],
        'prd' => [9,'Fixe'],
        'competencesNaissance' => [3,25,32,26,33,34,42,27,2091,2092,2093],
        'competencesAuChoix' => [1,2,3,5,6,7,8,9,10,11,12,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49],
        'pratiqueMagie' => 0,
    ],
];

$pairsData = [
    [
        'id' => 20,
        'label' => 'Nain de la Mafia',
        'tooltip' => 'Origine ET Métier',
        'courage' => [10, 'Non'],
        'intelligence' => [11, 'Non'],
        'charisme' => ['Non', 'Non'],
        'adresse' => [12, 'Non'],
        'force' => [11, 'Non'],
        'ev' => [38,'Fixe', '', ''],
        'ea' => [0,null],
        'at' => [10,'Fixe'],
        'prd' => [9,'Fixe'],
        'competencesNaissance' => [5,29,40,1,10,16,42,2094,2095],
        'competencesAuChoix' => [45,3,38,21,8,11,26,33,47,20],
        'pratiqueMagie' => 0,
    ],
    [
        'id' => 21,
        'label' => 'Amazone Sylderienne',
        'tooltip' => 'Origine ET Métier',
        'courage' => [12, 'Non'],
        'intelligence' => ['Non', 'Non'],
        'charisme' => [12, 'Non'],
        'adresse' => [11, 'Non'],
        'force' => [12, 'Non'],
        'ev' => [38,'Fixe', '', ''],
        'ea' => [0,null],
        'at' => [10,'Fixe'],
        'prd' => [8,'Fixe'],
        'competencesNaissance' => [9,14,10,15,46,49,2096,2097,2098,2099],
        'competencesAuChoix' => [23,30,35,38,47,28],
        'pratiqueMagie' => 0,
    ],
    [
        'id' => 22,
        'label' => 'Chaman de Jungle',
        'tooltip' => 'Origine ET Métier',
        'courage' => ['Non', 'Non'],
        'intelligence' => [11, 'Non'],
        'charisme' => [11, 'Non'],
        'adresse' => [11, 'Non'],
        'force' => ['Non', 'Non'],
        'ev' => [34,'Fixe', '', ''],
        'ea' => [0,null],
        'at' => [10,'Fixe'],
        'prd' => [9,'Fixe'],
        'competencesNaissance' => [2,10,19,23,35,38,39,47,28,2100,2101],
        'competencesAuChoix' => [7,3,14,15,17,18,21,30],
        'pratiqueMagie' => 0,
    ],
];

$joblessData = [
    'id' => 23,
    'label' => 'Sans métier',
    'tooltip' => 'Toutes les portes sont ouvertes',
    'courage' => ['Non', 'Non'],
    'intelligence' => ['Non', 'Non'],
    'charisme' => ['Non', 'Non'],
    'adresse' => ['Non', 'Non'],
    'force' => ['Non', 'Non'],
    'ev' => [0,null],
    'ea' => [0,null],
    'at' => [0,null],
    'prd' => [0,null],
    'competencesNaissance' => [],
    'competencesAuChoix' => [],
    'pratiqueMagie' => 0,
];


//=== INSTANTIATION ===============================================================================================

$aOrigines = [];
foreach ($originesData as $data) {
	$aOrigines[] = new Origine($data);
}

$aMetiers = [];
foreach ($metiersData as $data) {
	$aMetiers[] = new Metier($data);
}

$aSoldats = [];
foreach ($soldatsData as $data) {
	$aSoldats[] = new Metier($data);
}

$aSupplements = [];
foreach ($supplementsData as $data) {
	$aSupplements[] = new Metier($data);
}

foreach ($pairsData as $data) {
	$aOrigines[] = new Origine($data);
	$aSupplements[] = new Metier($data);
}

$jobless = new Metier($joblessData);

$aJobs = array_merge($aMetiers, $aSoldats, $aSupplements);
$aJobs[] = $jobless;
?>
