<div class="starter-template">
	<h1 class="mt-5">Les traits spéciaux</h1>
	<p class="lead">Liste des traits spéciaux pour les monstres.</p>
</div>

<div class="container">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "niveaux" ) {?>active<?php }?>" href="/pnj/traitsspeciaux/niveaux">A niveaux de puissance</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "simples" ) {?>active<?php }?>" href="/pnj/traitsspeciaux/simples">Simples</a>
		</li>
	</ul>
</div>
<?php if( isset( $subgroup ) and $subgroup != "" ) {?>
<br>
<div class="container">
	<table class="table table-hover table-striped dataTable" id="myDatatable">
		<thead class="table-dark">
		<tr>
			<th scope="col">Nom</th>
			<th scope="col">Roll20</th>
			<th scope="col"></th>
		</tr>
		</thead>
		<tbody>
			<?php
			foreach ($aRows as $row ) {
				$macro = '{"repeating_traits_rowID_trait_nom":"' . $row['name'] . '","repeating_traits_rowID_trait_effet":"' . $row['effet'] . '"}';

				echo "<tr>";
					echo "<td><a class='openModal' href='/trait/" . $row['id'] . "'>" . $row['name'] . "</a></td>";
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