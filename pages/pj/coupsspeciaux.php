<div class="starter-template">
	<h1 class="mt-5">Les coups spéciaux</h1>
	<p class="lead">Liste des coups spéciaux .<br>Source : <a href="http://naheulbeuk.com/doc-baston.htm" target="_blank">http://naheulbeuk.com/doc-baston.htm</a></p>
</div>

<div class="container">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "universel" ) {?>active<?php }?>" href="/pj/coupsspeciaux/universel">Universels</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "menestrel" ) {?>active<?php }?>" href="/pj/coupsspeciaux/menestrel">Ménestrel</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "ninja" ) {?>active<?php }?>" href="/pj/coupsspeciaux/ninja">Ninja</a>
		</li>
	</ul>
</div>
<?php if( isset( $subgroup ) and $subgroup != "" ) {?>
<br>
<div class="container">
	<table class="table table-hover table-striped" id="myDatatable">
		<thead class="table-dark">
		<tr>
			<?php if( $subgroup != "universel" ) {?>
			<th scope="col">Niveau</th>
			<?php }?>
			<th scope="col">Nom</th>
			<th scope="col">Effet</th>
			<th scope="col">Roll20</th>
			<th scope="col"></th>
		</tr>
		</thead>
		<tbody>
			<?php
			foreach ($aRows as $row ) {
				$macro = '{"repeating_coupsspeciaux_rowID_coupspecial_nom":"' . $row['name'] . '", "repeating_coupsspeciaux_rowID_coupspecial_jet":"' . $row['jet'] . '", "repeating_coupsspeciaux_rowID_coupspecial_mod":"' . $row['mod'] . '","repeating_coupsspeciaux_rowID_coupspecial_degats":"' . $row['degats'] . '", "repeating_coupsspeciaux_rowID_coupspecial_degats_arme":"' . $row['degats_arme'] . '", "repeating_coupsspeciaux_rowID_coupspecial_utilisation":"' . $row['utilisation'] . '", "repeating_coupsspeciaux_rowID_coupspecial_echec":"' . $row['echec'] . '", "repeating_coupsspeciaux_rowID_coupspecial_effet":"' . $row['effet'] . '", "repeating_coupsspeciaux_rowID_coupspecial_note":"' . $row['note'] . '", "repeating_coupsspeciaux_rowID_coupspecial_condition":"' . $row['condition'] . '", "repeating_coupsspeciaux_rowID_coupspecial_critique":"' . $row['critique'] . '", "repeating_coupsspeciaux_rowID_coupspecial_fumble":"' . $row['fumble'] . '"}';

				echo "<tr>";
					if( $subgroup != "universel" ) {
						echo "<td class='cell-min-width'>" . sprintf( '%02d', $row['niveau'] ) . "</td>";
					}
					echo "<td class='cell-min-width'><a class='openModal' href='/coupspecial/" . $row['id'] . "'>" . $row['name'] . "</a></td>";
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