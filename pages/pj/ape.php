<div class="starter-template">
	<h1 class="mt-5">Les APE</h1>
	<p class="lead">Liste des Aptitudes Parfois Étranges pour les personnages joueurs.<br>Source : <a href="http://naheulbeuk.com/jdr-docs/supplement-APE-jdrddn.zip" target="_bank">http://naheulbeuk.com/jdr-docs/supplement-APE-jdrddn.zip</a></p>
</div>

<ul class="nav nav-tabs">
	<li class="nav-item">
		<a class="nav-link <?php if( $subgroup == "barbare" ) {?>active<?php }?>" href="/pj/ape/barbare">Barbare</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?php if( $subgroup == "elfe" ) {?>active<?php }?>" href="/pj/ape/elfe">Elfe</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?php if( $subgroup == "elfenoir" ) {?>active<?php }?>" href="/pj/ape/elfenoir">Elfe noir</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?php if( $subgroup == "gnome" ) {?>active<?php }?>" href="/pj/ape/gnome">Gnome</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?php if( $subgroup == "humain" ) {?>active<?php }?>" href="/pj/ape/humain">Humain</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?php if( $subgroup == "nain" ) {?>active<?php }?>" href="/pj/ape/nain">Nain</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?php if( $subgroup == "peauverte" ) {?>active<?php }?>" href="/pj/ape/peauverte">Peau verte</a>
	</li>
</ul>

<?php if( isset( $subgroup ) and $subgroup != "" ) {?>
<br>
<div class="container">
	<table class="table table-hover table-striped" id="myDatatable">
		<thead class="thead-dark">
		<tr>
			<th scope="col">D100</th>
			<th scope="col">Type</th>
			<th scope="col">Nom</th>
			<th scope="col">Note</th>
			<th scope="col">Effet</th>
			<th scope="col">Roll20</th>
		</tr>
		</thead>
		<tbody>
			<?php
			foreach ($aRows as $row ) {
				$macro = '{"repeating_ape_rowID_ape_nom":"' . $row['name'] . '", "repeating_ape_rowID_ape_note":"' . $row['note'] . '","repeating_ape_rowID_ape_effet":"' . $row['effet'] . '","repeating_ape_rowID_ape_occurence":"1"}';

				echo "<tr>";
					echo "<td class='cell-min-width'>" . sprintf( '%03d', $row['d100'] ) . "</td>";
					echo "<td class='cell-min-width'>" . $row['type'] . "</td>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td>" . $row['note'] . "</td>";
					echo "<td>" . $row['effet'] . "</td>";
					echo "<td>";
						echo "<div class='input-group'>";
							echo "<input type='text' id='text_" . $row['id'] . "' class='' value='" . $macro . "' />";
							echo "<span class='input-group-btn'>";
								echo "<button type='button' class='btn btn-default' data-id='" . $row['id'] . "' title='Copier'><i class='fa fa-copy'></i></button>";
							echo "</span>";
						echo "</div>";
					echo "</td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
	<br>
</div>
<?php }?>