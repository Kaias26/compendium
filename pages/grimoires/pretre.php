<div class="starter-template">
	<h1 class="mt-5">Les grimoires</h1>
	<p class="lead">Liste de sorts pour les prêtres.<br>Source : <a href="http://naheulbeuk.com/doc-magie.htm" target="_blank">http://naheulbeuk.com/doc-magie.htm</a></p>
</div>

<div class="container">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "adathie" ) {?>active<?php }?>" href="/grimoires/pretre/adathie">Adathie</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "dlul" ) {?>active<?php }?>" href="/grimoires/pretre/dlul">Dlul</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "youclidh" ) {?>active<?php }?>" href="/grimoires/pretre/youclidh">Youclidh</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "slanoush" ) {?>active<?php }?>" href="/grimoires/pretre/slanoush">Slanoush</a>
		</li>
	</ul>
</div>
<?php if( isset( $subgroup ) and $subgroup != "" ) {?>
<br>
<div class="container">
	<table class="table table-hover table-striped" id="myDatatable">
		<thead class="table-dark">
		<tr>
			<th scope="col">Niveau</th>
			<th scope="col">Nom</th>
			<th scope="col">Type</th>
			<th scope="col">Rituel</th>
			<th scope="col">Roll20</th>
			<th scope="col"></th>
		</tr>
		</thead>
		<tbody>
			<?php
			foreach ($aRows as $row ) {
				$macro = '{"repeating_magies_rowID_magie_ecole":"' . $subgroup . '","repeating_magies_rowID_magie_niveau":"' . $row['niveau'] . '","repeating_magies_rowID_magie_nom":"' . $row['name'] . '","repeating_magies_rowID_magie_incantation":"' . $row['incantation'] . '","repeating_magies_rowID_magie_duree":"' . $row['duree'] . '","repeating_magies_rowID_magie_cout":"' . $row['cout'] . '","repeating_magies_rowID_magie_portee":"' . $row['portee'] . '","repeating_magies_rowID_magie_aireeffet":"' . $row['aireeffet'] . '","repeating_magies_rowID_magie_notes":"","repeating_magies_rowID_magie_epreuvelanceur_jet":"' . $row['epreuvelanceur_jet'] . '","repeating_magies_rowID_magie_epreuvelanceur_mod":"' . $row['epreuvelanceur_mod'] . '","repeating_magies_rowID_magie_epreuvecible_jet":"' . $row['epreuvecible_jet'] . '","repeating_magies_rowID_magie_epreuvecible_mod":"' . $row['epreuvecible_mod'] . '","repeating_magies_rowID_magie_soin":"' . $row['soin'] . '","repeating_magies_rowID_magie_degats":"' . $row['degats'] . '","repeating_magies_rowID_magie_bonusint":"' . $row['bonusint'] . '","repeating_magies_rowID_magie_effet":"' . $row['effet'] . '","repeating_magies_rowID_magie_ingre":"' . $row['ingre'] . '"}';

				echo "<tr>";
					echo "<td class='cell-min-width'>" . sprintf( '%02d', $row['niveau'] ) . "</td>";
					echo "<td class=''><a class='openModal' href='/spell/" . $row['id'] . "'>" . $row['name'] . "</a></td>";
					echo "<td class='cell-min-width'>" . $row['type'] . "</td>";
					echo "<td class='cell-min-width'>" . $row['rituel'] . "</td>";
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