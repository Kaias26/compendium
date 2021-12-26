<div class="starter-template">
	<h1 class="mt-5">Les traits particuliers</h1>
	<p class="lead">Liste des maladies, poisons, folies, mutations...<br>Source : <a href="http://naheulbeuk.com/doc-equipement.htm" target="_blank">http://naheulbeuk.com/doc-equipement.htm</a></p>
</div>

<ul class="nav nav-tabs">
	<li class="nav-item">
		<a class="nav-link <?php if( $subgroup == "maladies" ) {?>active<?php }?>" href="/pj/traitsparticuliers/maladies">Maladies</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?php if( $subgroup == "mutations" ) {?>active<?php }?>" href="/pj/traitsparticuliers/mutations">Mutations</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?php if( $subgroup == "poisons" ) {?>active<?php }?>" href="/pj/traitsparticuliers/poisons">Poisons</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?php if( $subgroup == "folies" ) {?>active<?php }?>" href="/pj/traitsparticuliers/folies">Folies</a>
	</li>
</ul>

<?php if( isset( $subgroup ) and $subgroup != "" ) {?>
<br>
<div class="container">
	<table class="table table-hover table-striped" id="myDatatable">
		<thead class="thead-dark">
		<tr>
			<?php if( $subgroup == "mutations" OR $subgroup == "poisons" ) {?>
			<th scope="col">Provenance</th>
			<?php }?>
			<th scope="col">Nom</th>
			<th scope="col">Effet</th>
			<th scope="col">Mod.</th>
			<th scope="col">Roll20</th>
			<th scope="col"></th>
		</tr>
		</thead>
		<tbody>
			<?php
			foreach ($aRows as $row ) {
				$macro = '{"repeating_conditions_rowID_condition_provenance":"' . $row['provenance'] . '", "repeating_conditions_rowID_condition_nom":"' . $row['name'] . '","repeating_conditions_rowID_condition_effet":"' . $row['mod'] . '","repeating_conditions_rowID_condition_actif":"1"}';

				echo "<tr>";
					if( $subgroup == "mutations" OR $subgroup == "poisons" ) {
						echo "<td class='cell-min-width'>" . $row['provenance'] . "</td>";
					}
					echo "<td class='cell-min-width'>" . $row['name'] . "</td>";
					echo "<td>" . $row['effet'] . "</td>";
					echo "<td>" . $row['mod'] . "</td>";
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