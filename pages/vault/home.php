<?php
// Check si l'utilisateur n'est pas connecté pour le rediriger vers le login
if( !is_user_logged_in() ) {
	echo '<meta http-equiv="refresh" content="0; URL=/vault/login">';
	die();
}
?>

<div class="starter-template">
	<h1 class="mt-5">Vault</h1>
	<p class="lead">Stockez vos feuilles de personnages roll20 (PJ / PNJ / monstres...)</p>
</div>

<div class="container">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "pj" ) {?>active<?php }?>" href="/vault/home/pj">Mes PJ</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "pnj" ) {?>active<?php }?>" href="/vault/home/pnj">Mes PNJ</a>
		</li>
		<li class="nav-item">
			<a class="nav-link <?php if( $subgroup == "bestiaire" ) {?>active<?php }?>" href="/vault/home/bestiaire">Mon bestiaire</a>
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
			<th scope="col">Dernière MAJ</th>
			<th scope="col">Partager</th>
			<th scope="col">Roll20</th>
			<th scope="col"></th>
		</tr>
		</thead>
		<tbody>
			<?php
			while( $row = $statement->fetch() ) {
				echo "<tr>";
					echo "<td>" . $row['nom'] . "</td>";
					echo "<td>" . $row['origine'] . "</td>";
					echo "<td>" . $row['metier'] . "</td>";
					echo "<td>" . $row['niveau'] . "</td>";
					echo "<td><div class='d-none'>" . $row['updated'] . "</div>" . date( 'd/m/Y H:i:s', strtotime( $row['updated'] ) ) . "</td>";
					echo "<td class='cell-min-width text-center'><a class='openModal' href='/share/" . openssl_encrypt( $row['id'], $cipher, $key, 0, $iv, $tag ) . "'><span class='fa fa-share'></span></a></td>";
					echo "<td class='cell-min-width'>";
					if( $row['json'] != "" ) {
						echo "<input type='text' id='text_" . $row['id'] . "' class='form-control' value='" . $row['json'] . "' />";
					}
					echo "</td>";
					echo "<td class='cell-min-width'>";
					if( $row['json'] != "" ) {
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