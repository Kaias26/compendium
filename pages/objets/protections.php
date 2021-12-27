<div class="starter-template">
	<h1 class="mt-5">Les objets de protections</h1>
	<p class="lead">Armures, vêtements et protections<br>Source : <a href="http://naheulbeuk.com/doc-equipement.htm" target="_blank">http://naheulbeuk.com/doc-equipement.htm</a></p>
</div>

<ul class="nav nav-tabs">
	<li class="nav-item">
		<a class="nav-link <?php if( $subgroup == "armures" ) {?>active<?php }?>" href="/objets/protections/armures">Armures et protections</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?php if( $subgroup == "karma" ) {?>active<?php }?>" href="/objets/protections/karma">Prêtres et Paladins</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?php if( $subgroup == "astral" ) {?>active<?php }?>" href="/objets/protections/astral">Mages et Sorciers</a>
	</li>
	<li class="nav-item">
		<a class="nav-link <?php if( $subgroup == "astral" ) {?>active<?php }?>" href="/objets/protections/astral">Chapeaux et couvre-chefs</a>
	</li>
</ul>

<?php if( isset( $subgroup ) and $subgroup != "" ) {?>
<br>
<div class="container">
	<table class="table table-hover table-striped" id="myDatatable">
		<thead class="table-dark">
		<tr>
			<th scope="col">Type</th>
			<th scope="col">Emplacement</th>
			<th scope="col">Nom</th>
			<th scope="col">Prix</th>
			<th scope="col">PR Phy</th>
			<th scope="col">PR Mag.</th>
			<th scope="col">Effets</th>
			<th scope="col">Rup</th>
			<th scope="col">Roll20</th>
			<th scope="col"></th>
		</tr>
		</thead>
		<tbody>
			<?php
			foreach ($aRows as $row ) {

				$_effet = $row['malus'];
				if( $row['malus'] != "" and $row['bonus'] != "" ) {
					$_effet .= ", ";
				}
				$_effet .= $row['bonus'];

				$macro = '{"repeating_armures_rowID_armure_nom":"' . $row['name'] . '","repeating_armures_rowID_armure_prphy":"' . $row['PRPhy'] . '","repeating_armures_rowID_armure_prmag":"' . $row['PRMag'] . '","repeating_armures_rowID_armure_rup":"' . $row['rup'] . '","repeating_armures_rowID_armure_effet":"' . $_effet . '"}';

				echo "<tr>";
					echo "<td>" . $row['type'] . "</td>";
					echo "<td>" . $row['emplacement'] . "</td>";
					echo "<td class='cell-min-width'>" . $row['name'] . "</td>";
					echo "<td class='cell-min-width'>" . $row['prix'] . "</td>";
					echo "<td class='cell-min-width'>" . $row['PRPhy'] . "</td>";
					echo "<td class='cell-min-width'>" . $row['PRMag'] . "</td>";
					echo "<td>" . $_effet . "</td>";
					echo "<td class='cell-min-width'>" . $row['rup'] . "</td>";
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
<script type="text/javascript">
	var groupColumn = 0;

	var dataTables_options = {
		"columnDefs": [
			{ "targets": groupColumn,"visible": false },
			{ "targets": 1,"visible": false },
			{ "orderable": false, "targets": [ -1, -2 ] }
		],
		"drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last = null;

            api.column( groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="8">'+group+'</td></tr>'
                    );

                    last = group;
                }
            } );
        },
		"order": [[ groupColumn, "asc" ], [ 3, "asc" ]],
		"initComplete": function (settings, json) {
			var $column = this.api().column( 1 );
			var $div = $('<div class="dataTables_length" id="myDatatable_length"><label id="myDatatable_typefilter">Type : </label></div>')
				.prependTo( $( '#myDatatable_wrapper' ) );
			var $select = $('<select id="searchString"><option value=""></option></select>')
				.appendTo( $( '#myDatatable_typefilter' ) )
				.on( 'change', function () {
					var val = $.fn.dataTable.util.escapeRegex(
						$(this).val()
					);

					$column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
				} );

			$column.data().unique().sort().each( function ( d, j ) {
				$select.append( '<option value="'+d+'">'+d+'</option>' )
			});
		}
	};
</script>