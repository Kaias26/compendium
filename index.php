<?php 
	session_start(); 

	require_once(__DIR__ . "/includes/config.php");	
	require_once(__DIR__ . "/includes/mailer.php");	
	require_once(__DIR__ . "/includes/framework.php");	
	require_once(__DIR__ . "/includes/authenticate.php");
?>
<!doctype html>
<html lang="fr">
<head>
	<?php include_once(__DIR__ . "/includes/head.php");?>
</head>

<body>
	<?php include_once("includes/header.php");?>

	<!-- Begin page content -->
	<main role="main" class="container-fluid">
		<?php include "$page.php";?>
		<?php 
			// Fallback for flash messages if not displayed in the included page
			echo $flashMessenger->display_flash_messages();
			$flashMessenger->clear_flash_messages();
		?>
	</main>

	<div class="modal" tabindex="-1" role="dialog" id="myModal">
		<div class="modal-dialog  modal-lg" role="document">
			<div class="modal-content">
				<!--- ajax --->
			</div>
		</div>
	</div>

	<?php include_once(__DIR__ . "/includes/footer.php");?>
</body>
</html>