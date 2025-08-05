<div class="starter-template">
	<h1 class="mt-5">Armement et trucs de bourrins</h1>
	<p class="lead">Source : <a href="http://naheulbeuk.com/doc-equipement.htm" target="_blank">http://naheulbeuk.com/doc-equipement.htm</a></p>
</div>

<div class="container">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "armes" ) {?>active<?php }?>" href="/objets/armement/armes">Armes</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "karma" ) {?>active<?php }?>" href="/objets/armement/karma">Prêtres et Paladins</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "astral" ) {?>active<?php }?>" href="/objets/armement/astral">Mages et Sorciers</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "guns" ) {?>active<?php }?>" href="/objets/armement/guns">Armes à poudre</a>
		</li>	
	</ul>
</div>
<?php if( isset( $subgroup ) and $subgroup != "" ) {?>
<br>
<div class="container">	
	<table class="table table-hover table-striped" id="myDatatable">
		<thead class="table-dark">
		<tr>
			<th scope="col">Type</th>
			<th scope="col">Nom</th>
			<th scope="col">Prix</th>			
			<?php if( $subgroup == "karma" or $subgroup == "astral" ) {?>
				<th scope="col">Niveau</th>
			<?php }?>
			<th scope="col">Dégats</th>
			<th scope="col">Effets</th>
			<th scope="col">Notes</th>
			<th scope="col">Rup</th>
			<th scope="col">Roll20</th>
			<th scope="col"></th>
		</tr>
		</thead>
		<tbody>
			<?php
			foreach ($aRows as $row ) {

				
				$macro = '{"repeating_armes_rowID_arme_nom":"' . $row['name'] . '","repeating_armes_rowID_arme_portee":"' . $row['portee'] . '","repeating_armes_rowID_arme_at":"' . $row['at'] . '","repeating_armes_rowID_arme_prd":"' . $row['prd'] . '","repeating_armes_rowID_arme_rup":"' . $row['rup'] . '","repeating_armes_rowID_arme_effet":"' . $row['effet'] .'","repeating_armes_rowID_arme_note":"' . $row['notes'] . '","repeating_armes_rowID_arme_degats":"' . $row['degats'] . '","repeating_armes_rowID_arme_typedegat":"' . strtolower( $row['typedegat'] ) . '"}';				

				echo "<tr>";
					echo "<td>" . $row['type'] . "</td>";
					echo "<td class='cell-min-width'><div class='d-none'>" . $row['type'] . "</div>" . $row['name'] . "</td>";
					echo "<td class='cell-min-width text-center'>" . $row['prix'] . "</td>";
					if( $subgroup == "karma" or $subgroup == "astral" ) {				
						echo "<td class='cell-min-width text-center'>" . $row['niveau'] . "</td>";
					}
					echo "<td class='cell-min-width text-center'>" . $row['degats'] . "</td>";
					echo "<td>" . $row['effet'] . "</td>";					
					echo "<td>" . $row['notes'] . "</td>";					
					echo "<td class='cell-min-width'>" . $row['rup'] . "</td>";
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
	<?php if( $subgroup == "armes" ) {?>
		<div class="alert alert-primary d-flex align-items-center" role="alert">
			<svg xmlns="http://www.w3.org/2000/svg" class="bi flex-shrink-0 me-2" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" role="img" aria-label="Info:">
				<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path>
			  </svg>
			<div>* modification appliquée au jet uniquement<br>
				** Arme prévue pour le jet<br>
				*** Gratuit ou récupéré</div>
		</div>
	<?php }?>
	<br>	
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