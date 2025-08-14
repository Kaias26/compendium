<div class="starter-template">
	<h1 class="mt-5">Consommables</h1>
	<p class="lead">Potions, Poisons, Ingrédients...<br>Source : <a href="http://naheulbeuk.com/doc-equipement.htm" target="_blank">http://naheulbeuk.com/doc-equipement.htm</a></p>
</div>

<div class="container">
	<ul class="nav nav-tabs">	
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "ingredients" ) {?>active<?php }?>" href="/objets/consommables/ingredients">Ingrédients magiques</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "potions" ) {?>active<?php }?>" href="/objets/consommables/potions">Poisons - Antidotes - Potions - Remedes</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "nourriture" ) {?>active<?php }?>" href="/objets/consommables/nourriture">Nourriture et boisson</a>
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
			<th scope="col">Notes</th>
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