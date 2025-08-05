<div class="starter-template">
	<h1 class="mt-5">Les objets de protections</h1>
	<p class="lead">Armures, vêtements et protections<br>Source : <a href="http://naheulbeuk.com/doc-equipement.htm" target="_blank">http://naheulbeuk.com/doc-equipement.htm</a></p>
</div>

<div class="container">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "armures" ) {?>active<?php }?>" href="/objets/protections/armures">Armures et protections</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "karma" ) {?>active<?php }?>" href="/objets/protections/karma">Prêtres et Paladins</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "astral" ) {?>active<?php }?>" href="/objets/protections/astral">Mages et Sorciers</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "tete" ) {?>active<?php }?>" href="/objets/protections/tete">Chapeaux et couvre-chefs</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "vetements" ) {?>active<?php }?>" href="/objets/protections/vetements">Vêtements</a>
		</li>
	</ul>
</div>
<?php if( isset( $subgroup ) and $subgroup != "" ) {?>
<br>
<div class="container">
	<?php if( $subgroup == "karma" ) {?>
		<div class="alert alert-warning d-flex align-items-center" role="alert">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox	="0 0 16 16" role="img" aria-label="Warning:">
			    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
			  </svg>
			  <div>NOTE : une robe de prêtre ne peut PAS être portée à un niveau inférieur, sans quoi le dieu est fâché.</div>
		</div>
	<?php }?>
	<?php if( $subgroup == "astral" ) {?>
		<div class="alert alert-warning d-flex align-items-center" role="alert">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox	="0 0 16 16" role="img" aria-label="Warning:">
			    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
			  </svg>
			  <div>NOTE : une robe peut être portée à un niveau inférieur, mais la colonne BONUS n'est pas appliquée – l'armure seule demeure utilisable</div>
		</div>
	<?php }?>
	<table class="table table-hover table-striped" id="myDatatable">
		<thead class="table-dark">
		<tr>
			<th scope="col">Type</th>
			<th scope="col">Emplacement</th>
			<th scope="col">Nom</th>
			<th scope="col">Prix</th>			
			<?php if( $subgroup == "karma" or $subgroup == "astral" ) {?>
				<th scope="col">Niveau</th>
			<?php }?>
			<?php if( $subgroup != "vetements" ) {?>
				<th scope="col">PR&nbsp;Phy</th>
				<th scope="col">PR&nbsp;Mag.</th>
			<?php }?>
				<th scope="col">Effets</th>
			<?php if( $subgroup != "vetements" ) {?>
				<th scope="col">Rup</th>
			<?php }?>
			<th scope="col">Roll20</th>
			<th scope="col"></th>
		</tr>
		</thead>
		<tbody>
			<?php
			foreach ($aRows as $row ) {

				if( $subgroup != "vetements" ) {
					$macro = '{"repeating_armures_rowID_armure_nom":"' . $row['name'] . '","repeating_armures_rowID_armure_prphy":"' . $row['PRPhy'] . '","repeating_armures_rowID_armure_prmag":"' . $row['PRMag'] . '","repeating_armures_rowID_armure_rup":"' . $row['rup'] . '","repeating_armures_rowID_armure_effet":"' . $row['effet'] . '"}';					
				} else {
					$macro = '{"repeating_vetements_rowID_vetement_nom":"' . $row['name'] . '","repeating_vetements_rowID_vetement_effet":"' . $row['effet'] . '"}';
					
				}

				echo "<tr>";
					echo "<td>" . $row['type'] . "</td>";
					echo "<td>" . $row['emplacement'] . "</td>";
					echo "<td class='cell-min-width'><div class='d-none'>" . $row['type'] . "</div>" . $row['name'] . "</td>";
					echo "<td class='cell-min-width text-center'>" . $row['prix'] . "</td>";
					if( $subgroup == "karma" or $subgroup == "astral" ) {
						echo "<td class='cell-min-width text-center'>" . $row['niveau'] . "</td>";
					}
					if( $subgroup != "vetements" ) {
						echo "<td class='cell-min-width text-center'>" . $row['PRPhy'] . "</td>";
						echo "<td class='cell-min-width text-center'>" . $row['PRMag'] . "</td>";
					}
					echo "<td>" . $row['effet'] . "</td>";
					if( $subgroup != "vetements" ) {
						echo "<td class='cell-min-width'>" . $row['rup'] . "</td>";
					}
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
	<?php if( $subgroup == "astral" ) {?>
		<div class="alert alert-primary d-flex align-items-center" role="alert">
			<svg xmlns="http://www.w3.org/2000/svg" class="bi flex-shrink-0 me-2" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" role="img" aria-label="Info:">
				<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path>
			  </svg>
			<div>*Bonus ou malus de charisme ne pouvant être utilisé que sur épreuve de charisme, ne modifiant pas la valeur MagiePsy<br>
			**le bonus de charisme d'une robe enchantée PEUT être utilisé pour augmenter la valeur MagiePsy</div>
		</div>
	<?php }?>

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
			{ "targets": 1,"visible": false },
			{ "orderable": false, "targets": [ -1, -2 ] }
		],
		"order": [[ 0, "asc" ], [ 3, "asc" ]],
		"initComplete": function (settings, json) {
			var $column = this.api().column( 1 );
			var $div = $('<div class="dataTables_length" id="myDatatable_length"><label id="myDatatable_typefilter">Emplacement : </label></div>')
				.prependTo( $( '#myDatatable_wrapper' ) );
			var $select = $('<select id="searchString"><option value=""></option></select>')
				.appendTo( $( '#myDatatable_typefilter' ) )
				.on( 'change', function () {
					var val = $.fn.dataTable.util.escapeRegex(
						$(this).val()
					);

					$column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
				} );

			$column.data().unique().sort().each( function ( d, j ) {
				$select.append( '<option value="'+d+'">'+d+'</option>' )
			});
		}
	};
</script>