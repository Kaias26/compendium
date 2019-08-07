<div class="starter-template">
	<h1 class="mt-5">Les compétences</h1>
	<p class="lead">Liste de compétences pour les personnages joueurs.<br>Source : <a href="http://www.naheulbeuk.com/jdr-docs/ecran-resumecompetences.pdf" target="_bank">http://www.naheulbeuk.com/jdr-docs/ecran-resumecompetences.pdf</a></p>
</div>

<div class="container">
	<table class="table table-hover table-striped" id="myDatatable">
		<thead class="thead-dark">
		<tr>
			<th scope="col">Nom</th>
			<th scope="col">Effet</th>
			<th scope="col">Roll20</th>
		</tr>
		</thead>
		<tbody>
			<?php
			foreach ($aRows as $row ) {
				$macro = '{"repeating_competences_rowID_competence_nom":"' . $row['name'] . '","repeating_competences_rowID_competence_effet":"' . $row['effet'] . '","repeating_competences_rowID_competence_epreuve":"' . ( $row['jet'] == "-" ? 0 : 1) . '","repeating_competences_rowID_competence_jet":"' . $row['jet'] . '","repeating_competences_rowID_competence_mod":"' . $row['mod'] . '"}';

				echo "<tr>";
					echo "<td class='cell-min-width'>" . $row['name'] . "</td>";
					echo "<td>" . $row['effet'] . "</td>";
					echo "<td class='text-center'>";
						echo "<div class='input-group'>";
							echo "<input type='text' id='text_" . $row['id'] . "' class='form-control' value='" . $macro . "' />";
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