<div class="starter-template">
	<h1 class="mt-5">Les Invocations</h1>
	<p class="lead">Liste créatures magiques à invoquer.<br>Source : <a href="http://naheulbeuk.com/doc-magie.htm" target="_bank">http://naheulbeuk.com/doc-magie.htm</a></p>
</div>

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

<?php if( isset( $subgroup ) and $subgroup != "" ) {?>
<br>
<div class="container">
	<table class="table table-hover table-striped" id="myDatatable">
		<thead class="thead-dark">
		<tr>
			<th scope="col">Nom</th>
			<th scope="col">Roll20</th>
		</tr>
		</thead>
		<tbody>
			<?php
			foreach ($aRows as $row ) {

				echo "<tr>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td>";
						if( $row['roll20'] != "" ) {
						echo "<div class='input-group'>";
							echo "<input type='text' id='text_" . $row['id'] . "' class='' value='" . $row['roll20'] . "' />";
							echo "<span class='input-group-btn'>";
								echo "<button type='button' class='btn btn-default' data-id='" . $row['id'] . "' title='Copier'><i class='fa fa-copy'></i></button>";
							echo "</span>";
						echo "</div>";
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