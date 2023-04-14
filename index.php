<?php 
	session_start(); 

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once("includes/config.php");	
	require_once("includes/mailer.php");	
	require_once("includes/framework.php");	
	require_once("includes/authenticate.php");
?>
<!doctype html>
<html lang="en">
<head>
	<?php include_once("includes/head.php");?>
</head>

<body>
	<?php include_once("includes/header.php");?>

	<!-- Begin page content -->
	<main role="main" class="container">
		<?php include "$page.php";?>
	</main>

	<div class="modal" tabindex="-1" role="dialog" id="myModal">
		<div class="modal-dialog  modal-lg" role="document">
			<div class="modal-content">
				<!--- ajax --->
			</div>
		</div>
	</div>

	<?php include_once("includes/footer.php");?>
</body>
</html>