<?php include("includes/config.php");?>
<?php include("includes/framework.php");?>
<!doctype html>
<html lang="en">
<head>
	<?php include("includes/head.php");?>
</head>

<body>
	<?php include("includes/header.php");?>

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

	<?php include("includes/footer.php");?>
</body>
</html>

