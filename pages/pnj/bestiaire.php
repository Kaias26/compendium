<div class="starter-template">
	<h1 class="mt-5">Le Bestiaire</h1>
	<p class="lead">Pack de monstres<br>Source : <a href="https://nnsprod.com/naheulbeuk/Bestiaire.php" target="_bank">https://nnsprod.com/naheulbeuk/Bestiaire.php</a></p>
</div>

<div class="container">
	<table class="table table-hover table-striped" id="myDatatable">
		<thead class="table-dark">
		<tr>
			<th scope="col">Type</th>
			<th scope="col">Localisation</th>
			<th scope="col">Nom</th>
			<th scope="col">Menace</th>
			<th scope="col">Notes</th>
			<th scope="col">Roll20</th>
			<th scope="col"></th>
		</tr>
		</thead>
		<tbody>
			<?php
			foreach ($aRows as $row ) {

				echo "<tr>";
					echo "<td>" . $row['type'] . "</td>";
					echo "<td>" . $row['localisation'] . "</td>";
					echo "<td class='cell-min-width'>" . $row['name'] . "</td>";
					echo "<td class='cell-min-width'>";
					if( $row['menace'] == 'faible' ) {
						echo "<span class='d-none'>1</span>";
						echo "<span class='fa fa-skull'></span>";
					} else if( $row['menace'] == 'intermédiaire' ) {
						echo "<span class='d-none'>2</span>";
						echo "<span class='fa fa-skull'></span>";
						echo "<span class='fa fa-skull'></span>";
					} else if( $row['menace'] == 'élevée' ) {
						echo "<span class='d-none'>3</span>";
						echo "<span class='fa fa-skull'></span>";
						echo "<span class='fa fa-skull'></span>";
						echo "<span class='fa fa-skull'></span>";
					}
					echo "</td>";
					echo "<td>" . $row['notes'] . "</td>";
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
<script type="text/javascript">
	var groupColumn = 0;

	var dataTables_options = {
		rowGroup: {
	        dataSrc: groupColumn
	    },
	    "columnDefs": [
			{ "targets": groupColumn,"visible": false },
			{ "targets": 1,"visible": false },
			{ "orderable": false, "targets": [ -1, -2 ] }
		],
		"order": [[ 0, "asc" ], [ 3, "asc" ]],
		"initComplete": function (settings, json) {
			var $column = this.api().column( 1 );
			var $div = $('<div class="dataTables_length" id="myDatatable_length"><label id="myDatatable_typefilter">Localisation : </label></div>')
				.prependTo( $( '#myDatatable_wrapper' ) );
			var $select = $('<select id="searchString"><option value=""></option></select>')
				.appendTo( $( '#myDatatable_typefilter' ) )
				.on( 'change', function () {
					var val = $.fn.dataTable.util.escapeRegex(
						$(this).val()
					);

					$column
						.search( val ? val : '', true, false )
						.draw();
				} );

			$column.data().unique().sort().each( function ( d, j ) {
				var nameArr = d.split(",");
                nameArr.forEach(function(number) {               
                    var optionExists = ($("#searchString option[value='"+number.trim()+"']").length > 0);
                    if(!optionExists){
                        $select.append( '<option value="'+number.trim()+'">'+number.trim()+'</option>' );
                    }                   
                });
			});
		}
	};
</script>