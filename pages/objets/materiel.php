<div class="starter-template">
	<h1 class="mt-5">Matériel</h1>
	<p class="lead">Equipement d'aventure, Instruments, libres... <br>Source : <a href="http://naheulbeuk.com/doc-equipement.htm" target="_blank">http://naheulbeuk.com/doc-equipement.htm</a></p>
</div>

<div class="container">
	<ul class="nav nav-tabs">	
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "materiel" ) {?>active<?php }?>" href="/objets/materiel/materiel">Matériel</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "vetements" ) {?>active<?php }?>" href="/objets/materiel/vetements">Vêtements</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "livres" ) {?>active<?php }?>" href="/objets/materiel/livres">Livres</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "instruments" ) {?>active<?php }?>" href="/objets/materiel/instruments">Instruments</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "objets" ) {?>active<?php }?>" href="/objets/materiel/objets">Objets magiques</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "butins" ) {?>active<?php }?>" href="/objets/materiel/butins">Butins (inutiles)</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "gemmes" ) {?>active<?php }?>" href="/objets/materiel/gemmes">Gemmes</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "reliques" ) {?>active<?php }?>" href="/objets/materiel/reliques">Reliques</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "montures" ) {?>active<?php }?>" href="/objets/materiel/montures">Montures</a>
		</li>
	</ul>
</div>
<?php if( isset( $subgroup ) and $subgroup != "" ) {?>
<br>
<div class="container">	
	<table class="table table-hover table-striped dataTable" id="myDatatable">
		<thead class="table-dark">
		<tr>
			<th scope="col">Type</th>
			<th scope="col">Nom</th>
			<th scope="col">Prix</th>		
			<th scope="col">Notes / Effets</th>
			<th scope="col">Roll20</th>
			<th scope="col"></th>
		</tr>
		</thead>
		<tbody>
			<?php
			foreach ($aRows as $row ) {

				if( $subgroup == "vetements" ) {
					$macro = '{"repeating_vetements_rowID_vetement_nom":"' . $row['name'] . '","repeating_vetements_rowID_vetement_effet":"' . $row['effet'] . '"}';
				} else if( isset( $row['slot']) ) {
					if( $row['slot'] == "materiels" ) {
						$macro = '{"repeating_materiels_rowID_materiel_nom":"' . $row['name'] . '"}';
					} else if( $row['slot'] == "bouffes" ) {
						$macro = '{"repeating_bouffes_rowID_bouffe_nom":"' . $row['name'] . '"}';				
					} else if( $row['slot'] == "sacs" ) {
						$macro = '{"repeating_sacs_rowID_sac_nom":"' . $row['name'] . '","repeating_sacs_rowID_sac_charge_max":"' . $row['charge_max'] . '"}';
					} else if( $row['slot'] == "bourses" ) {
						$macro = '{"repeating_bourses_rowID_bourse_nom":"' . $row['name'] . '","repeating_bourses_rowID_bourse_charge_max":"' . $row['charge_max'] . '"}';				
					} else if( $row['slot'] == "livres" ) {
						$macro = '{"repeating_livres_rowID_livre_nom":"' . $row['name'] . '"}';				
					}
				}		

				echo "<tr>";
					echo "<td>" . ($row['emplacement'] ?? $row['type']) . "</td>";
					echo "<td class='cell-min-width'><div class='d-none'>" . ($row['emplacement'] ?? $row['type']) . "</div>" . $row['name'] . "</td>";
					echo "<td class='cell-min-width text-center'>" . $row['prix'] . "</td>";					
					echo "<td>" . ($row['notes'] ?? $row['effet']) . "</td>";					
					echo "<td class='cell-min-width'>";
						echo "<input type='text' id='text_" . $row['id'] . "' class='form-control' value='" . $macro . "' />";
					echo "</td>";
					echo "<td class='cell-min-width'>";
						echo "<button type='button' class='btn btn-default' data-id='" . $row['id'] . "' title='Copier'><i class='fa fa-copy'></i></button>";
					echo "</td>";
				echo "</tr>";
				
			}
			?>
		</tbody>
	</table>
	<br>
	<?php if( $subgroup == "vetements" ) {?>
		<div class="alert alert-primary d-flex align-items-center" role="alert">
			<svg xmlns="http://www.w3.org/2000/svg" class="bi flex-shrink-0 me-2" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" role="img" aria-label="Info:">
				<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path>
			  </svg>
			<div>*Les bonus et malus de CHARISME des vêtements s'appliquent si on ne porte rien dessus - ne modifient pas la valeur MagiePsy</div>
		</div>
	<?php }?>
</div>
<?php }?>
<script type="text/javascript">
	var groupColumn = 0;

	var dataTables_options = {
		rowGroup: {
	        dataSrc: groupColumn
	    },
	    "columnDefs": [
			{ "targets": groupColumn,"visible": false },
			{ "orderable": false, "targets": [ -1, -2 ] }
		],
		"order": [[ 0, "asc" ], [ 2, "asc" ]]		
	};
</script>