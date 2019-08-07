<div class="starter-template">
	<h1 class="mt-5">Les traits particuliers</h1>
	<p class="lead">Liste des traits particuliers pour les monstres.</p>
</div>

<div class="container">
	<table class="table table-hover table-striped" id="myDatatable">
		<thead class="thead-dark">
		<tr>
			<th scope="col">Type</th>
			<th scope="col">Nom</th>
			<th scope="col">Roll20</th>
		</tr>
		</thead>
		<tbody>
			<?php
			foreach ($aRows as $row ) {
				$macro = '{"repeating_traits_rowID_trait_nom":"' . $row['name'] . '","repeating_traits_rowID_trait_effet":"' . $row['effet'] . '"}';

				echo "<tr>";
					echo "<td class='cell-min-width'>" . $row['type'] . "</td>";
					echo "<td><a class='openModal' href='/trait/" . $row['id'] . "'>" . $row['name'] . "</a></td>";
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