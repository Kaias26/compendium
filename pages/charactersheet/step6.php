<form method="post" action="/charactersheet/charactersheet" id="charactersheet">
    <fieldset id="form1">
        <div class="sub__title__container">
            <p>Etape 6/<?php echo $maxStep ?></p>
            <h2>Équipement et Matériel</h2>
            <p><b>Armement</b><br>
			C'est l’équipement offensif de votre personnage : de la hache à la fourche en passant par l’arbalète et le poignard, bref tout ce qui fait mal à vos ennemis (et parfois à vos amis aussi).</p>
			<p><b>Protections</b><br>
			C'est l'équipement visant à protéger vos miches des bobos divers de l'aventurier lambda. Du gambison au subligar (ou slip durci protège-bourses), vous noterez ici tout ce qui sert a vous protéger.</p>
			<p><b>Matériel</b><br>
			Cette section couvre tout le reste de l'équipement de votre aventurier : du sac à dos à son outre, en passant par la ficelle et les caleçons.</p>
			<p>
				<a class="btn btn-info" data-bs-toggle="collapse" href="#collapseTips" role="button" aria-expanded="false" aria-controls="collapseTips">
					Conseil
				</a>
			</p>
			<div class="collapse" id="collapseTips">
				<div class="card card-body">
					<p>Il peut être risqué de n'avoir qu'une seule arme.<br>
						Ne vous cantonnez pas à un seul type d'arme.<br>
						Un aventurier est un être vivant, qui tient à ses membres (en règle générale).</p>
				</div>
			</div>
        </div>

        <!-- Gold Purses -->
        <div class="row text-center my-4 align-items-center">        	
            <div class="col-md-4">
                <h4>Bourse (Armes)</h4>
                <p><span id="gold-armes" data-initial="<?php echo $gold_armes; ?>"><?php echo $gold_armes; ?></span> PO</p>
            </div>
            <div class="col-md-4">
                <h4>Bourse (Protections)</h4>
                <p><span id="gold-protections" data-initial="<?php echo $gold_protections; ?>"><?php echo $gold_protections; ?></span> PO</p>
            </div>
            <div class="col-md-4">
                <h4>Bourse (Matériel)</h4>
                <p><span id="gold-materiel" data-initial="<?php echo $gold_materiel; ?>"><?php echo $gold_materiel; ?></span> PO</p>
            </div>
        </div>

        <!-- Shop Modal Triggers -->
        <div class="row text-center mb-4">
            <div class="col-md-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-armes">
                    <i class="fas fa-gavel"></i> Boutique d'Armes
                </button>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-protections">
                    <i class="fas fa-shield-alt"></i> Boutique de Protections
                </button>
            </div>
            <div class="col-md-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-materiel">
                    <i class="fas fa-box-open"></i> Boutique de Matériel
                </button>
            </div>
        </div>

        <!-- Main Content: Shopping List -->
        <div class="input__container mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fa fa-shopping-cart"></i> Mon Équipement
                    </h5>
                </div>
                <div class="card-body">
                    <div id="inventory-container">
                        <p class="text-muted">Achetez des objets pour les voir apparaître ici.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden inputs to be submitted with the form -->
        <input type="hidden" name="inventaire[armes]" id="inventaire-armes-ids">
        <input type="hidden" name="inventaire[protections]" id="inventaire-protections-ids">
        <input type="hidden" name="inventaire[materiel]" id="inventaire-materiel-ids">
        <input type="hidden" name="gold_armes_final" id="gold-armes-final">
        <input type="hidden" name="gold_protections_final" id="gold-protections-final">
        <input type="hidden" name="gold_materiel_final" id="gold-materiel-final">
    </fieldset>
</form>

</form>

<!-- Toast Container -->
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1100">
    <!-- Toasts will be appended here -->
</div>

<!-- Modals for Shops -->
<!-- Armes Modal -->
<div class="modal fade" id="modal-armes" tabindex="-1" aria-labelledby="modalLabel-armes" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel-armes">Boutique d'Armes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover dataTable" id="table-armes" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Niveau</th>
                            <th scope="col">Dégats</th>
                            <th scope="col">Effets</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Rup</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($armes as $item): ?>
                        <tr id="item-armes-<?php echo $item['id']; ?>">
                            <td><?php echo htmlspecialchars($item['type'] ?? 'N/A'); ?></td>
                            <td><div class='d-none'><?php echo htmlspecialchars($item['type'] ?? 'N/A'); ?></div><div class="item-name"><?php echo htmlspecialchars($item['name'] ?? 'N/A'); ?></div></td>
                            <td class="cell-min-width text-center item-price"><?php echo htmlspecialchars($item['prix']); ?></td>
                            <td class='cell-min-width text-center'><?php echo htmlspecialchars($item['niveau'] ?? '-'); ?></td>
                            <td class='cell-min-width text-center'><?php echo htmlspecialchars($item['degats'] ?? '-'); ?></td>
                            <td><?php echo htmlspecialchars($item['effets'] ?? '-'); ?></td>
                            <td><?php echo htmlspecialchars($item['notes'] ?? '-'); ?></td>
                            <td class='cell-min-width'><?php echo htmlspecialchars($item['rup'] ?? '-'); ?></td>
                            <td><button type="button" class="btn btn-sm btn-primary btn-buy" data-item-id="<?php echo $item['id']; ?>" data-item-price="<?php echo $item['prix']; ?>" data-item-category="armes">Acheter</button></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Protections Modal -->
<div class="modal fade" id="modal-protections" tabindex="-1" aria-labelledby="modalLabel-protections" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel-protections">Boutique de Protections</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover dataTable" id="table-protections" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Niveau</th>
                            <th scope="col">Dégats</th>
                            <th scope="col">Effets</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Rup</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($protections as $item): ?>
                        <tr id="item-protections-<?php echo $item['id']; ?>">
                            <td><?php echo htmlspecialchars($item['type'] ?? 'N/A'); ?></td>
                            <td><div class='d-none'><?php echo htmlspecialchars($item['type'] ?? 'N/A'); ?></div><div class="item-name"><?php echo htmlspecialchars($item['name'] ?? 'N/A'); ?></div></td>
                            <td class="cell-min-width text-center item-price"><?php echo htmlspecialchars($item['prix']); ?></td>
                            <td class='cell-min-width text-center'><?php echo htmlspecialchars($item['niveau'] ?? '-'); ?></td>
                            <td class='cell-min-width text-center'><?php echo htmlspecialchars($item['degats'] ?? '-'); ?></td>
                            <td><?php echo htmlspecialchars($item['effets'] ?? '-'); ?></td>
                            <td><?php echo htmlspecialchars($item['notes'] ?? '-'); ?></td>
                            <td class='cell-min-width'><?php echo htmlspecialchars($item['rup'] ?? '-'); ?></td>
                            <td><button type="button" class="btn btn-sm btn-primary btn-buy" data-item-id="<?php echo $item['id']; ?>" data-item-price="<?php echo $item['prix']; ?>" data-item-category="protections">Acheter</button></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Matériel Modal -->
<div class="modal fade" id="modal-materiel" tabindex="-1" aria-labelledby="modalLabel-materiel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel-materiel">Boutique de Matériel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover dataTable" id="table-materiel" style="width:100%">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Type</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Niveau</th>
                            <th scope="col">Dégats</th>
                            <th scope="col">Effets</th>
                            <th scope="col">Notes</th>
                            <th scope="col">Rup</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($materiel as $item): ?>
                        <tr id="item-materiel-<?php echo $item['id']; ?>">
                            <td><?php echo htmlspecialchars($item['type'] ?? 'N/A'); ?></td>
                            <td><div class='d-none'><?php echo htmlspecialchars($item['type'] ?? 'N/A'); ?></div><div class="item-name"><?php echo htmlspecialchars($item['name'] ?? 'N/A'); ?></div></td>
                            <td class="cell-min-width text-center item-price"><?php echo htmlspecialchars($item['prix']); ?></td>
                            <td class='cell-min-width text-center'><?php echo htmlspecialchars($item['niveau'] ?? '-'); ?></td>
                            <td class='cell-min-width text-center'><?php echo htmlspecialchars($item['degats'] ?? '-'); ?></td>
                            <td><?php echo htmlspecialchars($item['effets'] ?? '-'); ?></td>
                            <td><?php echo htmlspecialchars($item['notes'] ?? '-'); ?></td>
                            <td class='cell-min-width'><?php echo htmlspecialchars($item['rup'] ?? '-'); ?></td>
                            <td><button type="button" class="btn btn-sm btn-primary btn-buy" data-item-id="<?php echo $item['id']; ?>" data-item-price="<?php echo $item['prix']; ?>" data-item-category="materiel">Acheter</button></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="buttons">
    <form method="post" action="/charactersheet/charactersheet">
        <button class="nxt__btn btn btn-secondary float-start" type="submit" name="btnStep" value="5"> Retour</button>
    </form>
    <button class="nxt__btn btn btn-success float-end" type="submit" name="btnStep" value="7" form="charactersheet"> Suivant</button>
</div>

<?php
$initialPurchasedItemsJson = "{}"; // Default empty JSON
if (isset($_SESSION['post']['inventaire_final']) && !empty($_SESSION['post']['inventaire_final'])) {
    // We need to convert the PHP array to a format suitable for JS
    // The PHP array is [category => [itemId => [quantity => X]]]
    // The JS needs [category => [itemId => {name: X, price: Y, quantity: Z}]]
    // So, we need to fetch name and price for each item from the cached itemsByCategory
    $jsFriendlyPurchasedItems = [];
    foreach ($_SESSION['post']['inventaire_final'] as $category => $items) {
        foreach ($items as $itemId => $data) {
            $quantity = $data['quantity'];
            // Find the item in the cached itemsByCategory to get name and price
            $foundItem = null;
            // Assuming $armes, $protections, $materiel are available from process.php
            $sourceArray = [];
            if ($category === 'armes') $sourceArray = $armes;
            else if ($category === 'protections') $sourceArray = $protections;
            else if ($category === 'materiel') $sourceArray = $materiel;

            foreach ($sourceArray as $cachedItem) {
                if ($cachedItem['id'] == $itemId) {
                    $foundItem = $cachedItem;
                    break;
                }
            }
            if ($foundItem) {
                $jsFriendlyPurchasedItems[$category][$itemId] = [
                    'name' => htmlspecialchars($foundItem['name'] ?? 'N/A'),
                    'price' => htmlspecialchars($foundItem['prix'] ?? '0'),
                    'quantity' => $quantity
                ];
            }
        }
    }
    $initialPurchasedItemsJson = json_encode($jsFriendlyPurchasedItems);
}
?>
<script>
var initialPurchasedItems = <?php echo $initialPurchasedItemsJson; ?>;

// Init DataTables
var groupColumn = 0;

var dataTables_options = {
    rowGroup: {
        dataSrc: groupColumn
    },
    "columnDefs": [
        { "targets": groupColumn, "visible": false },
        { "orderable": false, "targets": [ -1, -2 ] }
    ],
    "order": [[ 0, "asc" ], [ 2, "asc" ]],
    "initComplete": function (settings, json) {
        var api = this.api();
        var typeColumn = api.column(groupColumn);

        var $container = $('#' + settings.sTableId + '_wrapper > .row > .col-md-auto.me-auto').first();

        var $label = $('<label class="ms-2">Type:</label>');
        var $select = $('<select class="form-select form-select-sm ms-1" style="width: 200px; display: inline-block;"><option value="">Tous</option></select>')
            .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                typeColumn.search(val ? '^' + val + '$' : '', true, false).draw();
            });

        $container.append($label).append($select);

        typeColumn.data().unique().sort().each(function (d, j) {
            $select.append( '<option value="'+d+'">'+d+'</option>' );
        });
    }
};

// Redraw DataTables when their modal is shown to fix column alignment
document.querySelectorAll('.modal').forEach((modal) => {
    modal.addEventListener('shown.bs.modal', event => {
        const table = modal.querySelector('.dataTable');
        if (table && $.fn.DataTable.isDataTable(table)) {
            $(table).DataTable().columns.adjust();
        }
    });
});
</script>
