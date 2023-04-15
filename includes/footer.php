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

<script src="/js/functions.js?20220104"></script>