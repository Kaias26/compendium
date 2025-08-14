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

        <!-- Controls: Gold Purses & Inventory Button -->
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
        <div class="row text-center mb-4 align-items-center">
            <div class="col-md-4 offset-md-4">
                <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasInventory" aria-controls="offcanvasInventory">
                	<i class="fa fa-shopping-cart"></i>
                    <span>Mon Équipement</span>
                </button>
            </div>
        </div>

        <!-- Equipment Shops in Tabs -->
        <div class="input__container mb-4">
            <ul class="nav nav-tabs" id="shopTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab-armes" data-bs-toggle="tab" data-bs-target="#pane-armes" type="button" role="tab" aria-controls="pane-armes" aria-selected="true">Armement</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-protections" data-bs-toggle="tab" data-bs-target="#pane-protections" type="button" role="tab" aria-controls="pane-protections" aria-selected="false">Protections</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-materiel" data-bs-toggle="tab" data-bs-target="#pane-materiel" type="button" role="tab" aria-controls="pane-materiel" aria-selected="false">Matériel</button>
                </li>
            </ul>

            <div class="tab-content" id="shopTabsContent">
                <!-- Armes Pane -->
                <div class="tab-pane fade show active" id="pane-armes" role="tabpanel" aria-labelledby="tab-armes">
                    <div class="p-3 border border-top-0">
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
                                    <td><div class='d-none'><?php echo htmlspecialchars($item['type'] ?? 'N/A'); ?></div><?php echo htmlspecialchars($item['name'] ?? 'N/A'); ?></td>
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

                <!-- Protections Pane -->
                <div class="tab-pane fade" id="pane-protections" role="tabpanel" aria-labelledby="tab-protections">
                     <div class="p-3 border border-top-0">
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
                                    <td><div class='d-none'><?php echo htmlspecialchars($item['type'] ?? 'N/A'); ?></div><?php echo htmlspecialchars($item['name'] ?? 'N/A'); ?></td>
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

                <!-- Matériel Pane -->
                <div class="tab-pane fade" id="pane-materiel" role="tabpanel" aria-labelledby="tab-materiel">
                     <div class="p-3 border border-top-0">
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
                                    <td><div class='d-none'><?php echo htmlspecialchars($item['type'] ?? 'N/A'); ?></div><?php echo htmlspecialchars($item['name'] ?? 'N/A'); ?></td>
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

        <!-- Hidden inputs to be submitted with the form -->
        <input type="hidden" name="inventaire[armes]" id="inventaire-armes-ids">
        <input type="hidden" name="inventaire[protections]" id="inventaire-protections-ids">
        <input type="hidden" name="inventaire[materiel]" id="inventaire-materiel-ids">
    </fieldset>
</form>

<!-- Offcanvas Panel for Inventory -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasInventory" aria-labelledby="offcanvasInventoryLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasInventoryLabel">Votre Équipement</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div id="inventory-container">
            <!-- Purchased items will appear here via JavaScript -->
            <p class="text-muted">Achetez des objets pour les voir apparaître ici.</p>
        </div>
    </div>
</div>

<div class="buttons">
    <form method="post" action="/charactersheet/charactersheet">
        <button class="nxt__btn btn btn-secondary float-start" type="submit" name="btnStep" value="5"> Retour</button>
    </form>
    <button class="nxt__btn btn btn-success float-end" type="submit" name="btnStep" value="7" form="charactersheet"> Suivant</button>
</div>

<script>
	// Init DataTables
	var groupColumn = 0;

	var dataTables_options = {
		rowGroup: {
			dataSrc: groupColumn
		},
		"columnDefs": [
			{ "targets": groupColumn,"visible": false },
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
				$select.append($('<option></option>').attr('value', d).text(d));
			});
		}
	};

    // Redraw DataTables when their tab is shown to fix column alignment
    document.querySelectorAll('button[data-bs-toggle="tab"]').forEach((tab) => {
        tab.addEventListener('shown.bs.tab', event => {
            const table = document.querySelector(event.target.dataset.bsTarget).querySelector('.dataTable');
            if (table && $.fn.DataTable.isDataTable(table)) {
                $(table).DataTable().columns.adjust();
            }
        });
    });
</script>