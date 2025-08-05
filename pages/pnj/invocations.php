<div class="starter-template">
	<h1 class="mt-5">Les Invocations</h1>
	<p class="lead">Liste créatures magiques à invoquer.<br>Source : <a href="http://naheulbeuk.com/doc-magie.htm" target="_bank">http://naheulbeuk.com/doc-magie.htm</a></p>
</div>

<div class="container">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "communes" ) {?>active<?php }?>" href="/pnj/invocations/communes">Communes</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "interdites" ) {?>active<?php }?>" href="/pnj/invocations/interdites">Interdites</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "familiers" ) {?>active<?php }?>" href="/pnj/invocations/familiers">Familiers</a>
		</li>
	</ul>
</div>
<?php if( isset( $subgroup ) and $subgroup != "" ) {?>
<br>
<div class="container">
	<table class="table table-hover table-striped" id="myDatatable">
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

				echo "<tr>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td class='cell-min-width'>";
					if( $row['roll20'] != "" ) {
						echo "<input type='text' id='text_" . $row['id'] . "' class='form-control' value='" . $row['roll20'] . "' />";
					}
					echo "</td>";
					echo "<td class='cell-min-width'>";
					if( $row['roll20'] != "" ) {
						echo "<button type='button' class='btn btn-default' data-id='" . $row['id'] . "' title='Copier'><i class='fa fa-copy'></i></button></td>";
					}
					echo "</td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
	<br>
</div>
<?php }?>