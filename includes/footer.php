<footer class="footer">
	<div class="container text-center">
		<span class="text-center text-muted">Le donjon de Naheulbeuk - &copy;<a href="https://www.naheulbeuk.com/" target="_blank">Pen of Chaos</a> <br> Compendium pour Roll20 - &copy;<a href="https://www.naheulbeuk-online.org/" target="_blank">Naheulbeuk Online</a> - &copy;<a href="https://discordapp.com/users/148057238680895488" target="_blank">Kaias</a> <?php print date("Y");?></span>
	</div>
</footer>

<!-- Bootstrap core JavaScript  -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-2.0.8/r-3.0.2/rg-1.5.0/datatables.min.js"></script>

<?php if( $folder == 'charactersheet' ) {?>
	<script src="/js/charactersheet.js?20220104"></script>
<?php }?>

<?php if( $folder == 'tools' ) {?>
	<script src="/js/generateurs.js?20220104"></script>
<?php }?>

<script src="/js/functions.js?20220104"></script>