<div class="starter-template">
	<h1 class="mt-5">Les accessoires</h1>
	<p class="lead">Bagues, broches, médaillons...<br>Source : <a href="http://naheulbeuk.com/doc-equipement.htm" target="_blank">http://naheulbeuk.com/doc-equipement.htm</a></p>
</div>

<div class="container">
	<ul class="nav nav-tabs">	
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "accessoires" ) {?>active<?php }?>" href="/objets/accessoires/accessoires">Accessoires</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "karma" ) {?>active<?php }?>" href="/objets/accessoires/karma">Prêtres et Paladins</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "astral" ) {?>active<?php }?>" href="/objets/accessoires/astral">Mages et Sorciers</a>
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
			  <div>NOTE : un adepte peut porter une bague chargée à chaque main ainsi qu'une broche<br>
			  	Il ne peut pas cumuler plusieurs bagues sur un prodige<br>
				Il est possible de cumuler, en revanche, une bague et un effet de broche</div>
		</div>
	<?php }?>
	<?php if( $subgroup == "astral" ) {?>
		<div class="alert alert-warning d-flex align-items-center" role="alert">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox	="0 0 16 16" role="img" aria-label="Warning:">
			    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
			  </svg>
			  <div>NOTE : un mage peut porter une bague chargée à chaque main ainsi qu'un pendentif<br>
				Il ne peut pas cumuler plusieurs bagues sur 1 sort<br>
				Il est possible de cumuler, en revanche, une bague et un effet de pendentif
			</div>
		</div>
	<?php }?>
	<table class="table table-hover table-striped dataTable" id="myDatatable">
		<thead class="table-dark">
		<tr>
			<th scope="col">Type</th>
			<th scope="col">Nom</th>
			<th scope="col">Prix</th>			
			<th scope="col">Niveau</th>			
			<th scope="col">Charges</th>			
			<th scope="col">Effets</th>
			<th scope="col">Roll20</th>
			<th scope="col"></th>
		</tr>
		</thead>
		<tbody>
			<?php
			foreach ($aRows as $row ) {

				$macro = '{"repeating_bagues_rowID_bague_nom":"' . $row['name'] . '","repeating_bagues_rowID_bague_count":"' . $row['charges'] . '","repeating_bagues_rowID_bague_bonus":"' . $row['effet'] . '"}';	

				echo "<tr>";
					echo "<td>" . $row['type'] . "</td>";
					echo "<td class='cell-min-width'><div class='d-none'>" . $row['type'] . "</div>" . $row['name'] . "</td>";
					echo "<td class='cell-min-width text-center'>" . $row['prix'] . "</td>";					
					echo "<td class='cell-min-width text-center'>" . $row['niveau'] . "</td>";					
					echo "<td class='cell-min-width text-center'>" . $row['charges'] . "</td>";					
					echo "<td>" . $row['effet'] . "</td>";					
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