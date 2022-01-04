<div class="starter-template">
	<h1 class="mt-5">Les compétences</h1>
	<p class="lead">Liste des compétences pour les personnages joueurs.<br>Source : <a href="http://www.naheulbeuk.com/jdr-docs/ecran-resumecompetences.pdf" target="_bank">http://www.naheulbeuk.com/jdr-docs/ecran-resumecompetences.pdf</a></p>
</div>

<ul class="nav nav-tabs">
	<li class="nav-item">
		<a class="nav-link <?php if( $subgroup == "classiques" ) {?>active<?php }?>" href="/pj/competences/classiques">Classiques</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?php if( $subgroup == "supplements" ) {?>active<?php }?>" href="/pj/competences/supplements">Suppléments</a>
	</li>
</ul>

<?php if( isset( $subgroup ) and $subgroup != "" ) {?>
<br>
<div class="container">
	<table class="table table-hover table-striped" id="myDatatable">
		<thead class="table-dark">
		<tr>
			<?php if( $subgroup == "supplements" ) {?>
			<th scope="col">Métier</th>
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
				$macro = '{"repeating_competences_rowID_competence_nom":"' . $row['name'] . '","repeating_competences_rowID_competence_effet":"' . $row['effet'] . '","repeating_competences_rowID_competence_epreuve":"' . ( $row['jet'] == "-" ? 0 : 1) . '","repeating_competences_rowID_competence_jet":"' . $row['jet'] . '","repeating_competences_rowID_competence_mod":"' . $row['mod'] . '"}';

				echo "<tr>";
					if( $subgroup == "supplements" ) {
						echo "<td class='cell-min-width'>" . $row['metier'] . "</td>";
					}
					echo "<td class='cell-min-width'>" . $row['name'] . "</td>";					
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