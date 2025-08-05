<div class="starter-template">
	<h1 class="mt-5">Les Personnages pré-tirés</h1>
	<p class="lead">Pack de personnages bas niveau<br>Source : <a href="http://naheulbeuk.com/doc-magie.htm" target="_bank">https://www.naheulbeuk.com/doc-aidesdejeu.htm#Pretires</a></p>
</div>

<div class="container">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "officiels" ) {?>active<?php }?>" href="/pnj/pretires/officiels">Officiels</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "contributions" ) {?>active<?php }?>" href="/pnj/pretires/contributions">Contributions</a>
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
			<th scope="col">Origine</th>
			<th scope="col">Métier</th>
			<th scope="col">Niveau</th>
			<th scope="col">Source</th>
			<th scope="col">Roll20</th>
			<th scope="col"></th>
		</tr>
		</thead>
		<tbody>
			<?php
			foreach ($aRows as $row ) {

				echo "<tr>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td>" . $row['origine'] . "</td>";
					echo "<td>" . $row['metier'] . "</td>";
					echo "<td>" . $row['niveau'] . "</td>";
					echo "<td>" . $row['source'] . "</td>";
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