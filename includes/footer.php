<footer class="footer">
	<div class="container text-center">
		<span class="text-center text-muted">Le donjon de Naheulbeuk - &copy;<a href="https://www.naheulbeuk.com/" target="_blank">Pen of Chaos</a> <br> Compendium pour Roll20 - &copy;<a href="https://www.naheulbeuk-online.org/" target="_blank">Naheulbeuk Online</a> - &copy;<a href="https://discordapp.com/users/148057238680895488" target="_blank">Kaias</a> <?php print date("Y");?></span>
	</div>
</footer>

<!-- Bootstrap core JavaScript  -->
<script src="/js/jquery-3.4.1.min.js"></script>
<script src="/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="/js/datatables/datatables.min.js"></script>

<?php if( $folder == 'charactersheet' ) {?>
	<script src="/js/charactersheet.js?20220104"></script>
<?php }?>

<?php if( $folder == 'generateurButin' ) {?>
	<script src="/js/generateurButin.js?20220104"></script>
<?php }?>

<script>
	$(document).ready( function () {
		var dataTable_defaults = {
			"language": {
				"url": "/js/datatables/french.json"
			},
			"columnDefs": [
				{ "orderable": false, "targets": [ -1, -2 ] }
			],
			"paging": false,
			"info": false,
			"responsive": true
		};

		var datatable_settings = $.extend( {}, dataTable_defaults, dataTables_options );

		var myTable = $('#myDatatable').DataTable( datatable_settings );

		$('#myDatatable').on( "click", "button", function() {
			var $this = $( this );
			var $text_id = $this.data( "id" );
			var $input = $( "#text_" + $text_id );

			$input.select();
			document.execCommand("copy");
			$input.blur();

			$this.html( '<i class="fa fa-check"></i>' ).removeClass( "btn-default" ).addClass( "btn-success" );
			setTimeout( function() {
				$this.removeClass( "btn-success" ).addClass( "btn-default" ).html( '<i class="fa fa-copy"></i>' );
			}, 1000);

		});

		// Order by the grouping
		$('#myDatatable tbody').on( 'click', 'tr.group', function () {
			myTable.order( dataTables_options.order ).draw();
		} );

		$('.openModal').on( "click", function() {
			event.preventDefault();
			var _href = $( this ).attr('href');
			var _target = $( ".modal-content" );

			$.ajax( {
				url: _href,
				success: function(result){
					_target.html( result );
					$('#myModal').modal('show');
				}
			});
		});

		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.querySelectorAll('.needs-validation')

		// Loop over them and prevent submission
		Array.prototype.slice.call(forms)
			.forEach(function (form) {
		    	form.addEventListener('submit', function (event) {
		        if (!form.checkValidity()) {
		          event.preventDefault()
		          event.stopPropagation()
		        }

		        form.classList.add('was-validated')
		      }, false)
		    })
	} );
</script>